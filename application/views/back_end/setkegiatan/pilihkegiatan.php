<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<table class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th>KODE</th>
            <th>NAMA KEGIATAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($kegiatan): ?>
            <?php foreach ($kegiatan as $row) : ?>
                <tr>
                    <td><?php echo beautify_str($row->kegiatan_kode) ?></td>
                    <td><?php echo beautify_str($row->kegiatan_nama) ?></td>
                    <td class="text-center"><button type="button" class="btn btn-success" onclick="pilihKegiatan(<?php echo $id_pegawai . ',' . $row->kegiatan_id ?>)" data-dismiss="modal">Pilih</button></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Belum ada data...</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>