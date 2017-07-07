<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-default tabs">           
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Aktifitas Utama</a></li>
        <li><a href="#tab-second" role="tab" data-toggle="tab">Aktifitas Umum</a></li>
    </ul>           
    <div class="panel-body tab-content">
        <div class="tab-pane active" id="tab-first">
            <?php if ($utama): ?>
                <?php $i = 1; ?>
                <table class="table table-bordered table-condensed table-hover table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>AKTIVITAS</th>
                            <th>TANGGAL</th>
                            <th>JAM</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utama as $row) : ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo beautify_str($row->aktifitas_nama); ?></td>
                                <td class="text-center"><?php echo date('j M Y', strtotime($row->tr_aktifitas_tanggal)); ?></td>
                                <td class="text-center"><?php echo $row->tr_aktifitas_mulai . "-" . $row->tr_aktifitas_selesai; ?></td>
                                <td class="text-center"><?php echo $row->tr_aktifitas_status == 0 ? "Proses" : "Sukses"; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                Belum ada data...
            <?php endif; ?>
        </div>
        <div class="tab-pane" id="tab-second">
            <?php if ($umum): ?>
                <?php $i = 1; ?>
                <table class="table table-bordered table-condensed table-hover table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>AKTIVITAS</th>
                            <th>TANGGAL</th>
                            <th>JAM</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($umum as $row) : ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo beautify_str($row->aktifitas_nama); ?></td>
                                <td class="text-center"><?php echo date('j M Y', strtotime($row->tr_aktifitas_tanggal)); ?></td>
                                <td class="text-center"><?php echo $row->tr_aktifitas_mulai . "-" . $row->tr_aktifitas_selesai; ?></td>
                                <td class="text-center"><?php echo $row->tr_aktifitas_status == 0 ? "Proses" : "Sukses"; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                Belum ada data...
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>