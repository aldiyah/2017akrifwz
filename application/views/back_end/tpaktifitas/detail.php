<?php
$header_title = isset($header_title) ? $header_title : '';
$active_modul = isset($active_modul) ? $active_modul : 'none';
$detail_tupoksi = isset($detail_tupoksi) ? $detail_tupoksi : FALSE;
$detail = isset($detail) ? $detail : FALSE;
$id_tupoksi = isset($id_tupoksi) ? $id_tupoksi : 0;
//var_dump($detail_tupoksi);
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
                        <label class="col-md-3 col-xs-12 control-label">Nama Tupoksi</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <p class="form-control-static"><?php echo $detail_tupoksi->tupoksi_nama; ?></p>
                            <?php echo form_hidden('tupoksi_id', $detail_tupoksi->tupoksi_id); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Uraian *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php echo form_input('uraian_uraian', set_value('uraian_uraian', $detail ? $detail->uraian_uraian : ''), 'class="form-control"'); ?>
                            </div>
                            <span class="help-block">Isikan sesuai dengan Uraian Tupoksi.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Status *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php echo form_dropdown('uraian_status', array('Aktif', 'Tidak'), set_value('uraian_status', $detail ? $detail->uraian_status : ''), 'class="form-control"'); ?>
                            </div>
                            <span class="help-block">Isikan sesuai dengan status Uraian Tupoksi.</span>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn-primary btn pull-right">Submit</button>
                    <a href="<?php echo base_url("back_end/" . $active_modul . "/index/" . $id_tupoksi); ?>" class="btn-default btn">Batal / Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>