<?php
$header_title = isset($header_title) ? $header_title : '';
$active_modul = isset($active_modul) ? $active_modul : 'none';
$paging_set = isset($paging_set) ? $paging_set : FALSE;
$next_list_number = isset($next_list_number) ? $next_list_number : 1;
$records = isset($records) ? $records : FALSE;
//var_dump($records);
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle">                                
                <h3 class="panel-title"><?php echo $header_title . " Aktifitas Pegawai"; ?></h3>
            </div>
            <div class="panel-body">
                <div class="alert alert-danger">
                    <p>Berhati-hatilah! Ketika akan melakukan validasi terhadap aktifitas bawahan Anda.</p>
                </div>
                <table>
                    <tr>
                        <td>Nama Pegawai</td>
                        <td>:</td>
                        <td><?php echo $pegawai->pegawai_nama; ?></td>
                    </tr>
                    <tr>
                        <td>NIP Pegawai</td>
                        <td>:</td>
                        <td><?php echo $pegawai->pegawai_nip; ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan Pegawai</td>
                        <td>:</td>
                        <td><?php echo $pegawai->kode_jabatan; ?></td>
                    </tr>
                </table>
                <br>
                <div class="dataTables_wrapper no-footer">
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed table-bordered no-footer" id="DataTables_Table_0">
                            <thead>
                                <tr role="row">
                                    <th>NO</th>
                                    <th>NAMA KEGIATAN</th>
                                    <th>NAMA AKTIFITAS</th>
                                    <th>LAPORAN</th>
                                    <th>TANGGAL</th>
                                    <th>STATUS</th>
                                    <th>AKSI</th>
                                    <?php if ($access_rules[2][0] == 'allow' || $access_rules[3][0] == 'allow'): ?>
                                            <!--<th width="15%">AKSI</th>-->
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($records != FALSE): ?>
                                    <?php foreach ($records as $key => $record): ?>
                                        <tr>
                                            <td class="text-right">
                                                <?php echo $next_list_number; ?>
                                            </td>
                                            <td>
                                                <?php echo beautify_str($record->kegiatan_nama) ?>
                                            </td>
                                            <td>
                                                <?php echo beautify_str($record->aktifitas_nama) ?>
                                            </td>
                                            <td>
                                                <?php echo beautify_str($record->tr_aktifitas_keterangan) ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo string_to_date($record->tr_aktifitas_tanggal) ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo beautify_str($record->tr_aktifitas_status == 0 ? "Lapor" : "Disetujui") ?>
                                            </td>
                                            <?php if ($access_rules[2][0] == 'allow' || $access_rules[3][0] == 'allow'): ?>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-sm btn-group-icon">
                                                        <?php if ($access_rules[2][0] == 'allow'): ?>
                                                            <a class="btn btn-default" href="<?php echo base_url("back_end/" . $active_modul . "/detail") . "/" . $record->tr_aktifitas_id; ?>"><span class="fa fa-edit"></span></a>
                                                        <?php endif; ?>
                                                        <?php if ($access_rules[3][0] == 'allow'): ?>
                                                            <a class="btn btn-default btn-hapus-row" href="javascript:void(0);" rel="<?php echo base_url("back_end/" . $active_modul . "/delete") . "/" . $record->tr_aktifitas_id; ?>"><span class="fa fa-times-circle"></span></a>
                                                            <?php endif; ?>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php $next_list_number++; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="10"> Kosong / Data tidak ditemukan. </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <?php /** <div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to 10 of 57 entries</div> */ ?>
                        <?php
                        echo $paging_set;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>