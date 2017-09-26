<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($aktifitas): ?>
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
            <?php foreach ($aktifitas as $row) : ?>
                <tr>
                    <td class="text-right"><?php echo $i++; ?></td>
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
