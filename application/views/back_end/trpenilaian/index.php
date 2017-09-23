<?php
$header_title = isset($header_title) ? $header_title : '';
$records = isset($records) ? $records : FALSE;
$detail_tupoksi = isset($detail_tupoksi) ? $detail_tupoksi : FALSE;
$active_modul = isset($active_modul) ? $active_modul : 'none';
$next_list_number = isset($next_list_number) ? $next_list_number : 1;
//var_dump($records);
?>

<div class="page-content-wrap">
    <div class="row">
        <?php if ($records): ?>
            <?php foreach ($records as $record) : ?>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body profile">
<!--                            <div class="profile-image">
                                <img src="<?php echo base_url() ?>_assets/uploads/images/users/pria.png" alt="<?php echo $current_user_profil_name; ?>"/>
                            </div>-->
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $record->pegawai_nama; ?></div>
                                <div class="profile-data-title" style="color: #FFF;">
                                    <div><?php echo $record->pegawai_nama; ?></div>
                                    <div>NIP : <?php echo $record->pegawai_nip; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="capaian">100%</div>
                            <div><strong>Capaian Kinerja</strong></div>
                            <div>Aktifitas (0%)</div>
                            <div>Perilaku (0%)</div>
                            <div>Capaian (0%)</div>
                            <br>
                            <table style="width: 100%;">
                                <tr>
                                    <td><strong>TKD Tahap I</strong> :</td>
                                    <td><strong>TKD Tahap II</strong> :</td>
                                </tr>
                                <tr>
                                    <td>Rp 0</td>
                                    <td>Rp 299</td>
                                </tr>
                            </table>
                            <br>
                            <table style="width: 100%;">
                                <tr>
                                    <td>0 Aktif</td>
                                    <td>0 Aktif</td>
                                    <td>0 Aktif</td>
                                </tr>
                            </table>
                            <br>
                            <div class="alert alert-warning">
                                <strong>Note</strong>:<br>
                                Cuti [0 hari]<br>
                                Status Hukuman Disiplin : N<br>
                                Kehadiran [0 hari] Absen [0 hari]
                            </div>
                            <div>
                                <div class="col-md-4">
                                    <a href="<?php echo base_url("back_end/" . $active_modul . "/aktifitas") . "/" . $record->pegawai_id; ?>" class="btn btn-default btn-block">Aktifitas</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="<?php echo base_url("back_end/" . $active_modul . "/perilaku") . "/" . $record->pegawai_id; ?>" class="btn btn-default btn-block">Perilaku</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="<?php echo base_url("back_end/" . $active_modul . "/capaian") . "/" . $record->pegawai_id; ?>" class="btn btn-default btn-block">Capaian</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $header_title; ?></h3>
                    </div>
                    <div class="panel-body">
                        Belum ada data...
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>