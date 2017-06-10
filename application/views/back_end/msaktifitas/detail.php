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
                        <label class="col-md-3 col-xs-12 control-label">Kelompok *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <select name="kategori_id" id="slc-kategori" class="form-control select2-basic">
                            </select>
                            <span class="help-block">Isikan sesuai dengan kelompok aktifitas.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Kode Aktifitas *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="text" name="aktifitas_kode" class="form-control" value="<?php echo $detail ? $detail->aktifitas_kode : ""; ?>">
                            <span class="help-block">Isikan sesuai dengan kode aktifitas.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Aktifitas *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="text" name="aktifitas_nama" class="form-control" value="<?php echo $detail ? $detail->aktifitas_nama : ""; ?>">
                            <span class="help-block">Isikan sesuai dengan nama aktifitas.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Output Aktifitas *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="text" name="aktifitas_output" class="form-control" value="<?php echo $detail ? $detail->aktifitas_output : ""; ?>">
                            <span class="help-block">Isikan sesuai dengan output aktifitas.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Waktu Aktifitas *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="text" name="aktifitas_waktu" class="form-control" value="<?php echo $detail ? $detail->aktifitas_waktu : ""; ?>">
                            <span class="help-block">Isikan sesuai dengan waktu aktifitas.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Tingkat Kesulitan *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <input type="text" name="aktifitas_kesulitan" class="form-control" value="<?php echo $detail ? $detail->aktifitas_kesulitan : ""; ?>">
                            <span class="help-block">Isikan sesuai dengan tingkat kesulitan aktifitas.</span>
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