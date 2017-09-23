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
?>
<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title"><?php echo $header_title; ?></h3>
            </div>
            <div class="panel-body">
                <div class="block">
                    <div class="col-md-12">
                        Daftar Kegiatan Bawahan Anda.<br>
                        Silahkan klik <strong>Tampilkan Kegiatan</strong> untuk melihat kegiatan pegawai terkait.
                    </div>
                </div>
                <div class="block-full-width">
                    <div class="col-md-12">
                        <table class="table table-condensed table-bordered no-footer">
                            <thead>
                                <tr>
                                    <th>PEGAWAI</th>
                                    <th>JABATAN</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($records != FALSE): ?>
                                    <?php foreach ($records as $key => $record): ?>
                                        <tr>
                                            <td>
                                                <?php echo beautify_str($record->namaLengkap) ?><br>
                                                NIP : <?php echo beautify_str($record->nip) ?>
                                            </td>
                                            <td>
                                                <?php echo beautify_str($record->namaJabatan) ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-default" onclick="tambahKegiatan(<?php echo $record->idIdentitas ?>)"><i class="fa fa-plus-circle"></i> Kegiatan</button>
                                                    <button class="btn btn-default" onclick="lihatKegiatan(this,<?php echo $record->idIdentitas ?>)"><i class="fa fa-folder"></i> Kegiatan</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $next_list_number++; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="10"> Kosong / Data tidak ditemukan. </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="tambah-kabid" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-tambah-kabid" enctype="multipart/form-data" method="POST" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="defModalHead">Tambah Sekretaris/Kepala Bidang</h4>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal" id="tambah-kegiatan" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-tambah-kegiatan" enctype="multipart/form-data" method="POST" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="defModalHead">Pilih Kegiatan</h4>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </form>
    </div>
</div>
