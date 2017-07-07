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
                            <?php
                            $pilihan = array();
                            $pilihan[''] = 'Pilih Kelompok';
                            foreach ($kelompok as $row) {
                                $pilihan[$row->keljab_id] = $row->keljab_nama;
                            }
                            echo form_dropdown('keljab_id', $pilihan, set_value('keljab_id', $detail ? $detail->keljab_id : ''), 'class="form-control select" data-live-search="true"');
                            ?>
                            </select>
                            <span class="help-block">Isikan sesuai dengan kelompok jabatan.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Jabatan *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php echo form_input('jabatan_nama', set_value('jabatan_nama', $detail ? $detail->jabatan_nama : ''), 'class="form-control"'); ?>
                            </div>
                            <span class="help-block">Isikan sesuai dengan nama jabatan.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Keterangan Jabatan *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php echo form_input('jabatan_keterangan', set_value('jabatan_keterangan', $detail ? $detail->jabatan_keterangan : ''), 'class="form-control"'); ?>
                            </div>
                            <span class="help-block">Isikan sesuai dengan keterangan jabatan.</span>
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