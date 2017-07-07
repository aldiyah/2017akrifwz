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
                        <label class="col-md-3 col-xs-12 control-label">NIP Pegawai *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php echo form_input('pegawai_nip', set_value('pegawai_nip', $detail ? $detail->pegawai_nip : ''), 'class="form-control"'); ?>
                            </div>
                            <span class="help-block">Isikan sesuai dengan NIP pegawai.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nama Pegawai *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php echo form_input('pegawai_nama', set_value('pegawai_nama', $detail ? $detail->pegawai_nama : ''), 'class="form-control"'); ?>
                            </div>
                            <span class="help-block">Isikan sesuai dengan nama pegawai.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Jabatan *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <?php
                            $pilihan = array();
                            $pilihan[''] = 'Pilih Jabatan';
                            foreach ($jabatan as $row) {
                                $pilihan[$row->jabatan_id] = $row->jabatan_nama;
                            }
                            echo form_dropdown('jabatan_id', $pilihan, set_value('jabatan_id', $detail ? $detail->jabatan_id : ''), 'class="form-control select" data-live-search="true"');
                            ?>
                            </select>
                            <span class="help-block">Isikan sesuai dengan jabatan pegawai.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">User *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <?php
                            $pilihan = array();
                            $pilihan[''] = 'Pilih User';
                            foreach ($users as $row) {
                                $pilihan[$row->id_user] = $row->username;
                            }
                            echo form_dropdown('id_profil', $pilihan, set_value('id_profil', $detail ? $detail->id_profil : ''), 'class="form-control select" data-live-search="true"');
                            ?>
                            </select>
                            <span class="help-block">Isikan sesuai dengan username pegawai.</span>
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