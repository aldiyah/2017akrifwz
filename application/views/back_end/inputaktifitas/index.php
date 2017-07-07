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
    <div class="col-md-3">
        <div class="panel panel-default padding-bottom-0">
            <div class="panel-heading ui-draggable-handle">
                <h3 class="panel-title">Kalender</h3>
            </div>
            <div class="panel-body">
                <!--<div id="alert_holder"></div>-->
                <div class="calendar">                                
                    <div id="calendar"></div>                            
                </div>
                <!--                <div class="alert alert-info">
                                    asdasd
                                </div>-->
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default tabs">           
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Aktifitas Utama</a></li>
                <li><a href="#tab-second" role="tab" data-toggle="tab">Aktifitas Umum</a></li>
            </ul>           
            <div class="panel-body tab-content">
                <div class="tab-pane active" id="tab-first">
                    <div class="block">
                        Tanggal Aktif : <?php echo string_to_date($tanggal) ?>
                    </div>
                    <?php if ($tugas): ?>
                        <?php $nomor = 1 ?>
                        <?php foreach ($tugas as $data) : ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <table>
                                        <tr>
                                            <td><?php echo $nomor++ ?>.</td>
                                            <td>Tupoksi</td>
                                            <td>:</td>
                                            <td><?php echo beautify_str($data['aktifitas']->tupoksi_uraian != NULL ? $data['aktifitas']->tupoksi_uraian : '-') ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Uraian Tupoksi</td>
                                            <td>:</td>
                                            <td><?php echo beautify_str($data['aktifitas']->tupoksi_uraian != NULL ? $data['aktifitas']->tupoksi_uraian : '-') ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Nama Aktifitas</td>
                                            <td>:</td>
                                            <td><?php echo beautify_str($data['aktifitas']->aktifitas_nama != NULL ? $data['aktifitas']->aktifitas_nama : '-') ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>Waktu</td>
                                            <td>:</td>
                                            <td><?php echo $data['aktifitas']->aktifitas_waktu ?> Menit</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="panel-body panel-body-table">
                                    <table class="table table-condensed table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Kegiatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($data['kegiatan']): ?>
                                                <?php foreach ($data['kegiatan'] as $kegiatan) : ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $kegiatan->kegiatan_kode ?></td>
                                                        <td><?php echo beautify_str($kegiatan->kegiatan_nama) ?></td>
                                                        <td class="text-center"><a href="<?php echo base_url() . 'back_end/inputaktifitas/laporan/' . $tanggal . '/' . $kegiatan->tugas_id ?>" class="btn btn-default btn-sm">Laporkan</a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="3">Belum ada kegiatan...</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php if ($data['laporan']): ?>
                                    <?php $i = 0; ?>
                                    <div class="panel-body panel-body-table">
                                        <table class="table table-striped table-condensed table-top">
                                            <tbody>
                                                <?php foreach ($data['laporan'] as $laporan) : ?>
                                                    <tr>
                                                        <td class="text-right"><?php echo ++$i; ?>.</td>
                                                        <td><?php
                                                            echo "Aktifitas sudah dilakukan. Pada pukul " . $laporan->tr_aktifitas_mulai . " - " . $laporan->tr_aktifitas_selesai .
                                                            ". Dengan volume " . $laporan->tr_aktifitas_volume . " dan keterangan " . $laporan->tr_aktifitas_keterangan;
                                                            ?></td>
                                                        <td><button type="button" class="btn btn-default btn-sm">Hapus</button></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="block">
                            Belum ada aktifitas...
                        </div>
                    <?php endif; ?>
                </div>
                <div class="tab-pane" id="tab-second">
                    <div class="block">
                        Tanggal Aktif : <?php echo string_to_date($tanggal) ?>
                    </div>
                    <form enctype="multipart/form-data" method="POST" class="form-horizontal">
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
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="modal" id="lapor-aktifitas" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
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
</div>
