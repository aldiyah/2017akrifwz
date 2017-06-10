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
                    <h3 class="panel-title">Formulir <strong><?php echo $header_title; ?></strong></h3>
                </div>
                <div class="panel-body">
                    <p><?php echo load_partial("back_end/shared/attention_message"); ?></p>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Pilih Aktifitas *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <select name="aktifitas_id" id="slc-aktifitas" class="form-control select2-basic">
                            </select>
                            <span class="help-block">Isikan sesuai dengan nama aktifitas.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Tanggal Aktifitas *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="text" name="tr_aktifitas_tanggal" class="form-control" value="<?php echo $detail ? $detail->tr_aktifitas_tanggal : ""; ?>">
                            <span class="help-block">Isikan sesuai dengan tanggal aktifitas (yyyy-mm-dd).</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Aktifitas Volume *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="text" name="tr_aktifitas_volume" class="form-control" value="<?php echo $detail ? $detail->tr_aktifitas_volume : ""; ?>">
                            <span class="help-block">Isikan sesuai dengan volume aktifitas.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Aktifitas Mulai *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="text" name="tr_aktifitas_mulai" class="form-control" value="<?php echo $detail ? $detail->tr_aktifitas_mulai : ""; ?>">
                            <span class="help-block">Isikan sesuai dengan waktu mulai aktifitas (hh:mm:ss).</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Aktifitas Selesai *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="text" name="tr_aktifitas_selesai" class="form-control" value="<?php echo $detail ? $detail->tr_aktifitas_selesai : ""; ?>">
                            <span class="help-block">Isikan sesuai dengan waktu selesai aktifitas (hh:mm:ss).</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Keterangan Aktifitas *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="text" name="tr_aktifitas_keterangan" class="form-control" value="<?php echo $detail ? $detail->tr_aktifitas_keterangan : ""; ?>">
                            <span class="help-block">Isikan sesuai dengan keterangan input aktifitas.</span>
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