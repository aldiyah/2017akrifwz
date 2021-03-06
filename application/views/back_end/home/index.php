<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$header_title = isset($header_title) ? $header_title : '';
$message_error = isset($message_error) ? $message_error : '';
$records = isset($records) ? $records : FALSE;
$field_id = isset($field_id) ? $field_id : FALSE;
$paging_set = isset($paging_set) ? $paging_set : FALSE;
$active_modul = isset($active_modul) ? $active_modul : 'none';
$next_list_number = isset($next_list_number) ? $next_list_number : 1;
$pegawai_nip = isset($pegawai_nip) ? $pegawai_nip : '-';
//var_dump($records);
?>
<div class="page-content-wrap">
    <div class="row">
        <!--        <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body profile">
                            <div class="profile-image">
                                <img src="<?php echo base_url() ?>_assets/uploads/images/users/pria.png" alt="<?php echo $current_user_profil_name; ?>"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $current_user_profil_name; ?></div>
                                <div class="profile-data-title" style="color: #FFF;">
                                    <div><?php echo $current_user_roles; ?></div>
                                    <div>NIP : <?php echo $pegawai_nip; ?></div>
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
                            <div class="alert alert-info">
                                <table style="width: 100%;">
                                    <tr>
                                        <td>Pribadi : 0%</td>
                                        <td>Bawahan : 109%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            Pribadi + Bawahan<br>
                                            <strong>109%</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="alert alert-warning">
                                <strong>Note</strong>:<br>
                                Cuti [0 hari]<br>
                                Status Hukuman Disiplin : N<br>
                                Kehadiran [0 hari] Absen [0 hari]
                            </div>
                            <div class="text-center">
                                <ul class="pagination month pagination-sm">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">6</a></li>
                                    <li><a href="#">7</a></li>
                                    <li><a href="#">8</a></li>
                                    <li><a href="#">9</a></li>
                                    <li><a href="#">10</a></li>
                                    <li><a href="#">11</a></li>
                                    <li><a href="#">12</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading ui-draggable-handle">                                
                            <h3 class="panel-title">Aktivitas</h3>
                        </div>
        <?php if ($records): ?>
                                        <div class="panel-body panel-body-table list-group list-group-contacts border-bottom">
            <?php foreach ($records as $pegawai) : ?>
                                                            <div class="list-group-item">
                                                                <img src="<?php echo base_url() ?>_assets/uploads/images/users/pria.png" alt="<?php echo $pegawai->pegawai_nama; ?>"/>
                                                                <span class="contacts-title"><?php echo beautify_str($pegawai->pegawai_nama); ?></span>
                                                                <div class="list-group-controls">
                                                                    <button class="btn btn-default" onclick="lihatAktifitas(this, <?php echo $pegawai->pegawai_id; ?>)">Lihat Aktifitas</button>
                                                                </div>
                                                            </div>
            <?php endforeach; ?>
                                        </div>
        <?php else: ?>
                                        <div class="panel-body">
                                            Belum ada data...
                                        </div>
        <?php endif; ?>
                    </div>
                </div>-->


        <div class="col-md-4">
            <div class="widget widget-success widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-star"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int">1.000.000</div>
                    <div class="widget-title">TPP Aktifitas</div>
                    <div class="widget-subtitle">TPP Aktifitas Anda</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-suitcase"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int">1</div>
                    <div class="widget-title">Aktifitas Harian</div>
                    <div class="widget-subtitle">Jumlah aktifitas Anda hari ini</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget widget-danger widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-tag"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int">3</div>
                    <div class="widget-title">Aktifitas Ditolak</div>
                    <div class="widget-subtitle">Jumlah aktifitas Anda yang ditolak</div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Pengumuman</h3>
                </div>
                <div class="panel-body">
                    <p>Isi pengumuman...!!!</p>
                </div>
            </div>
        </div>
    </div>
</div>