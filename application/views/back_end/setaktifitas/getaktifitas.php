<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $next_list_number = isset($next_list_number) ? $next_list_number : 1; ?>
<?php
//var_dump($records);
?>
<div class="table-responsive">
    <table class="table table-top table-bordered table-condensed table-hover">
<!--        <thead>
            <tr>
                <th>KODE</th>
                <th>NAMA KEGIATAN</th>
            </tr>
        </thead>-->
        <tbody>
            <?php if ($records): ?>
                <?php foreach ($records as $row) : ?>
                    <tr>
                        <td class="text-right"><?php echo $next_list_number++ ?></td>
                        <td>
                            <?php echo beautify_str($row['aktifitas']->aktifitas_nama) ?><br>
                            Di kegiatan :<br>
                            <?php if ($row['kegiatan']): ?>
                                <ul>
                                    <?php foreach ($row['kegiatan'] as $kegiatan) : ?>
                                        <li><?php echo $kegiatan->kegiatan_kode . ' ' . $kegiatan->kegiatan_nama ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                Belum ada kegiatan...
                            <?php endif; ?>
                        </td>
                        <td><?php echo beautify_str($row['aktifitas']->aktifitas_output) ?></td>
                        <td><?php echo beautify_str($row['aktifitas']->aktifitas_waktu) ?></td>
                        <td><?php echo beautify_str($row['aktifitas']->kategori_nama) ?></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-default" onclick="tambahKegiatan(<?php echo $row['aktifitas']->pegawai_id . ',' . $row['aktifitas']->setaktif_id ?>)"><i class="fa fa-plus-circle"></i> Kegiatan</button>
                                <!--<button class="btn btn-default">Hapus Aktifitas</button>-->
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">
                        Belum ada aktifitas...
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>