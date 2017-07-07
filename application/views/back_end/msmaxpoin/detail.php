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
                        <label class="col-md-3 col-xs-12 control-label">Max Poin Jabatan *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php echo form_input('max_poin_jabatan', set_value('max_poin_jabatan', $detail ? $detail->max_poin_jabatan : ''), 'class="form-control"'); ?>
                            </div>
                            <span class="help-block">Isikan sesuai dengan jabatan.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Max Poin Peringkat *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php echo form_input('max_poin_peringkat', set_value('max_poin_peringkat', $detail ? $detail->max_poin_peringkat : ''), 'class="form-control"'); ?>
                            </div>
                            <span class="help-block">Isikan sesuai dengan peringkat.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Max Poin Nilai *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php echo form_input('max_poin_nilai', set_value('max_poin_nilai', $detail ? $detail->max_poin_nilai : ''), 'class="form-control"'); ?>
                            </div>
                            <span class="help-block">Isikan sesuai dengan max nilai yang bisa diperoleh.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Max Poin TKD *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php echo form_input('max_poin_tkd', set_value('max_poin_tkd', $detail ? $detail->max_poin_tkd : ''), 'class="form-control"'); ?>
                            </div>
                            <span class="help-block">Isikan sesuai dengan TKD dalam rupiah.</span>
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