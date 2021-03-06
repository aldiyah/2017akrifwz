<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$header_title = isset($header_title) ? $header_title : '';
$message_error = isset($message_error) ? $message_error : '';
$records = isset($records) ? $records : FALSE;
$field_id = isset($field_id) ? $field_id : FALSE;
$paging_set = isset($paging_set) ? $paging_set : FALSE;
$active_modul = isset($active_modul) ? $active_modul : 'none';
$next_list_number = isset($next_list_number) ? $next_list_number : 1;
?>
<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title">Set User <?php echo $header_title; ?></h3>
            </div>
            <div class="panel-body">
                <div class="block">
                    <?php echo load_partial("back_end/shared/attention_message"); ?>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <?php if ($access_rules[1][0] == 'allow'): ?>
                                <div class="col-md-8">
                                <?php else: ?>
                                    <div class="col-md-12">
                                    <?php endif; ?>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" name="keyword" value="<?php echo $keyword; ?>" class="form-control" placeholder="Silahkan masukkan kata kunci disini"/>
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary">Cari</button>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($access_rules[1][0] == 'allow'): ?>
                                    <div class="col-md-4">
                                        <a href="<?php echo base_url('back_end/' . $active_modul . '/detail'); ?>" class="btn btn-success btn-block">
                                            <span class="fa fa-plus"></span> Tambah baru
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                    </form>
                </div>
                <div class="dataTables_wrapper no-footer">
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed table-bordered no-footer" id="DataTables_Table_0">
                            <thead>
                                <tr role="row">
                                    <th>NO</th>
                                    <th>NIP</th>
                                    <th>NAMA</th>
                                    <th>JABATAN</th>
                                    <?php if ($access_rules[2][0] == 'allow' || $access_rules[3][0] == 'allow'): ?>
                                        <th width="15%">AKSI</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($records != FALSE): ?>
                                    <?php foreach ($records as $key => $record): ?>
                                        <tr>
                                            <td class="text-right">
                                                <?php echo $next_list_number; ?>
                                            </td>
                                            <td>
                                                <?php echo beautify_str($record->pegawai_nip) ?>
                                            </td>
                                            <td>
                                                <?php echo beautify_str($record->pegawai_nama) ?>
                                            </td>
                                            <td>
                                                <?php echo beautify_str($record->jabatan_nama) ?>
                                            </td>
                                            <?php if ($access_rules[2][0] == 'allow' || $access_rules[3][0] == 'allow'): ?>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm">
                                                        <?php if ($access_rules[2][0] == 'allow'): ?>
                                                            <a class="btn btn-default" href="<?php echo base_url("back_end/" . $active_modul . "/detail") . "/" . $record->pegawai_id; ?>">Ubah</a>
                                                            <a class="btn btn-default" href="<?php echo base_url("back_end/" . $active_modul . "/setuser") . "/" . $record->pegawai_id; ?>">User</a>
                                                        <?php endif; ?>
                                                        <?php if ($access_rules[3][0] == 'allow'): ?>
                                                            <a class="btn btn-default btn-hapus-row" href="javascript:void(0);" rel="<?php echo base_url("back_end/" . $active_modul . "/delete") . "/" . $record->pegawai_id; ?>">Hapus</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php $next_list_number++; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5"> Kosong / Data tidak ditemukan. </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <?php /** <div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to 10 of 57 entries</div> */ ?>
                        <?php
                        echo $paging_set;
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>