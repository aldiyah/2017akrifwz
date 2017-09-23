<?php
$header_title = isset($header_title) ? $header_title : '';
$active_modul = isset($active_modul) ? $active_modul : 'none';
$detail = isset($detail) ? $detail : FALSE;
$kategori = isset($kategori) ? $kategori : FALSE;
//var_dump($jenis);
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
                        <label class="col-md-3 col-xs-12 control-label">Kategori *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <?php
                            $pilihan = array();
                            $pilihan[''] = 'Pilih Kategori';
                            if ($kategori) {
                                foreach ($kategori as $row) {
                                    $pilihan[$row->kategori_id] = $row->kategori_nama;
                                }
                            }
                            echo form_dropdown('kategori_id', $pilihan, set_value('kategori_id', $detail ? $detail->kategori_id : ''), 'class="form-control select" data-live-search="true"');
                            ?>
                            </select>
                            <span class="help-block">Isikan sesuai dengan kategori pertanyaan.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Isi Pertanyaan *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <?php echo form_textarea('pertanyaan_isi', set_value('pertanyaan_isi', $detail ? $detail->pertanyaan_isi : ''), 'class="form-control"'); ?>
                            <span class="help-block">Isikan sesuai dengan isi pertanyaan.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Jenis Pegawai *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <?php
                            $pilihan = array();
                            $pilihan[''] = 'Pilih Jenis Pegawai';
                            if ($jenis) {
                                foreach ($jenis as $key => $value) {
                                    $pilihan[$key] = beautify_str($value);
                                }
                            }
                            echo form_dropdown('pertanyaan_jenis', $pilihan, set_value('pertanyaan_jenis', $detail ? $detail->pertanyaan_jenis : ''), 'class="form-control select" data-live-search="true"');
                            ?>
                            </select>
                            <span class="help-block">Isikan sesuai dengan jenis pegawai.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Status *</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <?php echo form_dropdown('pertanyaan_status', array('Aktif', 'Tidak'), set_value('pertanyaan_status', $detail ? $detail->pertanyaan_status : ''), 'class="form-control"'); ?>
                            </div>
                            <span class="help-block">Isikan sesuai dengan status Pertanyaan.</span>
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