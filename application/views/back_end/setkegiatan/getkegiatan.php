<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="table-responsive">
    <table class="table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>KODE</th>
                <th>NAMA KEGIATAN</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($records): ?>
                <?php foreach ($records as $row) : ?>
                    <tr>
                        <td><?php echo beautify_str($row->kegiatan_kode) ?></td>
                        <td><?php echo beautify_str($row->kegiatan_nama) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">
                        Belum ada kegiatan...
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>