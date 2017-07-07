<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<table class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th>NIP</th>
            <th>NAMA</th>
            <th>JABATAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($pegawai): ?>
            <?php foreach ($pegawai as $row) : ?>
                <tr>
                    <td><?php echo beautify_str($row->pegawai_nip) ?></td>
                    <td><?php echo beautify_str($row->pegawai_nama) ?></td>
                    <td><?php echo beautify_str($row->jabatan_nama) ?></td>
                    <td class="text-center"><button type="button" class="btn btn-success" onclick="pilihPegawai(<?php echo $row->pegawai_id ?>)" data-dismiss="modal">Pilih</button></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Belum ada data...</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>