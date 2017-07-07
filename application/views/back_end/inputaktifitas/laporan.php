<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$header_title = isset($header_title) ? $header_title : '';
$active_modul = isset($active_modul) ? $active_modul : 'none';
$detail = isset($detail) ? $detail : FALSE;
?>
<div class="row">
    <div class="col-md-12">
        <form enctype="multipart/form-data" method="POST" class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Laporan Aktifitas Tanggal <?php echo string_to_date($tanggal); ?></h3>
                </div>
                <div class="panel-body">
                    <p><?php echo load_partial("back_end/shared/attention_message"); ?></p>
                    <div><?php echo $tugas[0]->aktifitas_nama; ?></div>
                    <div>di kegiatan <?php echo $tugas[0]->kegiatan_nama; ?></div>
                    <input type="hidden" name="pegawai_id" value="<?php echo $tugas[0]->pegawai_id; ?>">
                    <input type="hidden" name="tugas_id" value="<?php echo $tugas[0]->tugas_id; ?>">
                    <input type="hidden" name="kegiatan_id" value="<?php echo $tugas[0]->kegiatan_id; ?>">
                    <input type="hidden" name="aktifitas_id" value="<?php echo $tugas[0]->aktifitas_id; ?>">
                    <input type="hidden" name="tr_aktifitas_tanggal" value="<?php echo $tanggal; ?>">
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Hasil *</label>
                        <div class="col-md-3 col-xs-12">
                            <select name="tr_aktifitas_volume" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            x <?php echo $tugas[0]->aktifitas_output; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Waktu *</label>
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