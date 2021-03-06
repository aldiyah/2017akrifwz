<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$header_title = isset($header_title) ? $header_title : '';
$message_error = isset($message_error) ? $message_error : '';
$records = isset($records) ? $records : FALSE;
$field_id = isset($field_id) ? $field_id : FALSE;
$paging_set = isset($paging_set) ? $paging_set : FALSE;
$active_modul = isset($active_modul) ? $active_modul : 'none';
$next_list_number = isset($next_list_number) ? $next_list_number : 1;
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar <?php echo $header_title; ?></h3>
            </div>
            <div class="panel-body">
                <div class="block">
                    Daftar aktifitas bawahan yang harus divalidasi.<br />
                    <?php echo load_partial("back_end/shared/attention_message"); ?>
                </div>
                <?php if ($records): ?>
                    <table class="table table-striped table-condensed table-bordered no-footer" id="DataTables_Table_0">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Pegawai</th>
                                <th>Aktifitas</th>
                                <th>Output</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records as $row) : ?>
                                <tr>
                                    <td class="text-right"><?php echo $next_list_number++; ?></td>
                                    <td><?php echo $row->pegawai_nip . ' - ' . $row->pegawai_nama; ?></td>
                                    <td><?php echo $row->aktifitas_nama . ' pada tanggal ' . string_to_date($row->tr_aktifitas_tanggal) . ' jam ' . $row->tr_aktifitas_mulai . ' selama ' . $row->aktifitas_waktu . ' menit.'; ?></td>
                                    <td class="text-center"><?php echo $row->aktifitas_output; ?></td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm btn-group-icon">
                                            <?php echo anchor(backend_url('validasiaktifitas/validasi/' . $row->tr_aktifitas_id), '<span class="fa fa-check-square-o"></span>', 'class="btn btn-default"'); ?>
                                            <?php echo anchor(backend_url('validasiaktifitas/reject/' . $row->tr_aktifitas_id), '<span class="fa fa-ban"></span>', 'class="btn btn-default"'); ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="panel-body">
                    Belum ada data...
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
