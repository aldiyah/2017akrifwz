<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$header_title = isset($header_title) ? $header_title : '';
$message_error = isset($message_error) ? $message_error : '';
$records = isset($records) ? $records : FALSE;
$field_id = isset($field_id) ? $field_id : FALSE;
$paging_set = isset($paging_set) ? $paging_set : FALSE;
$active_modul = isset($active_modul) ? $active_modul : 'none';
$next_list_number = isset($next_list_number) ? $next_list_number : 1;
//var_dump($records);
//exit();
?>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default padding-bottom-0">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Kalender</h3>
                </div>
                <div class="panel-body">
                    <div class="calendar">                                
                        <div id="calendar"></div>                            
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Aktifitas Harian Tanggal <?php echo string_to_date($tanggal) ?></h3>
                </div>
                <div class="panel-body">
                    <?php if ($absensi): ?>
                        <div class="block">
                            <a href="<?php echo base_url('back_end/' . $active_modul . '/detail/' . $tanggal); ?>" class="btn btn-default pull-right"><span class="fa fa-plus"></span> Tambah</a>
                            <?php if ($records): ?>
                                <?php echo load_partial("back_end/shared/attention_message"); ?>
                                Daftar aktifitas Anda pada tanggal <?php echo string_to_date($tanggal) ?>
                            </div>
                            <table class="table table-striped table-condensed table-bordered no-footer" id="DataTables_Table_0">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Aktifitas</th>
                                        <th>Lama</th>
                                        <th>Output</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($records as $data) : ?>
                                        <?php $status = array('Laporan', 'Diterima', 'Ditolak'); ?>
                                        <tr>
                                            <td class="text-right"><?php echo $next_list_number++ ?></td>
                                            <td><?php echo beautify_str($data->aktifitas_nama) ?></td>
                                            <td class="text-center"><?php echo $data->aktifitas_waktu ?> menit</td>
                                            <td class="text-center"><?php echo $data->aktifitas_output ?></td>
                                            <td class="text-center"><?php echo $status[$data->tr_aktifitas_status] ?></td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm btn-group-icon">
                                                    <?php
                                                    if ($data->tr_aktifitas_status == 0) {
                                                        echo anchor(backend_url('aktifitasharian/detail/' . $tanggal . '/' . $data->tr_aktifitas_id), '<span class="fa fa-edit"></span>', 'class="btn btn-default"');
                                                    } else {
//                                                    echo anchor(backend_url('aktifitasharian/lihat/' . $tanggal . '/' . $data->tr_aktifitas_id), '<span class="fa fa-fa-check"></span>', 'class="btn btn-default"');
                                                        echo '<button class="btn btn-default"><span class="fa fa-check"></span></button>';
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            Belum ada aktifitas...
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="block">
                        Maaf, Anda tidak hadir pada tanggal <?php echo string_to_date($tanggal) ?>. Silahkan menguhubungi admin Kepegawaian anda.
                    </div>
                <?php endif; ?>
            </div>
            <!--            <form enctype="multipart/form-data" method="POST" class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Input Aktifitas Umum Tanggal <?php echo string_to_date($tanggal); ?></h3>
                                </div>
                                <div class="panel-body">
                                    <p><?php echo load_partial("back_end/shared/attention_message"); ?></p>
                                    <input type="hidden" name="pegawai_id" value="<?php echo $id_pegawai; ?>">
                                    <input type="hidden" name="tr_aktifitas_tanggal" value="<?php echo $tanggal; ?>">
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Nama Aktifitas *</label>
                                        <div class="col-md-6 col-xs-12">                                            
            <?php
            $pilihan = array();
            $pilihan[''] = 'Pilih Aktifitas';
            foreach ($aktifitas as $row) {
                $pilihan[$row->aktifitas_id] = $row->aktifitas_nama;
            }
            echo form_dropdown('aktifitas_id', $pilihan, set_value('aktifitas_id'), 'class="form-control select" data-live-search="true"');
            ?>
                                            </select>
                                            <span class="help-block">Isikan sesuai dengan nama aktifitas.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Volume *</label>
                                        <div class="col-md-3 col-xs-12">
                                            <select name="tr_aktifitas_volume" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Mulai *</label>
                                        <div class="col-md-3 col-xs-12 input-group bootstrap-timepicker">
                                            <input type="text" name="tr_aktifitas_mulai" class="form-control timepicker24">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Sampai *</label>
                                        <div class="col-md-3 col-xs-12 input-group bootstrap-timepicker">
                                            <input type="text" name="tr_aktifitas_selesai" class="form-control timepicker24">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-time"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Keterangan *</label>
                                        <div class="col-md-6 col-xs-12">
                                            <textarea name="tr_aktifitas_keterangan" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button type="submit" class="btn-primary btn pull-right">Submit</button>
                                    <a href="<?php echo base_url("back_end/" . $active_modul . "/index"); ?>" class="btn-default btn">Batal / Kembali</a>
                                </div>
                            </div>
                        </form>-->
        </div>
    </div>
</div>
<!--<div class="clearfix"></div>-->
<!--<div class="modal" id="lapor-aktifitas" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-tambah-kegiatan" enctype="multipart/form-data" method="POST" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="defModalHead">Laporan Aktifitas</h4>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </form>
    </div>
</div>-->
