<?php
$header_title = isset($header_title) ? $header_title : '';
$records = isset($records) ? $records : FALSE;
$detail_tupoksi = isset($detail_tupoksi) ? $detail_tupoksi : FALSE;
$active_modul = isset($active_modul) ? $active_modul : 'none';
$next_list_number = isset($next_list_number) ? $next_list_number : 1;
?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title"><strong><?php echo $header_title; ?></strong></h3>
                <div class="btn-group pull-right">
                    <a href="<?php echo base_url("back_end/mstupoksi"); ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
                    <a href="<?php echo base_url('back_end/' . $active_modul . '/detail/' . $detail_tupoksi->tupoksi_id); ?>" class="btn btn-default"><i class="fa fa-plus-circle"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="block">
                    <table>
                        <tr>
                            <td>Nama Tupoksi</td>
                            <td>:</td>
                            <td><?php echo beautify_str($detail_tupoksi->tupoksi_nama); ?></td>
                        </tr>
                    </table>
                </div>
                <table class="table table-striped table-condensed table-bordered no-footer">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Uraian</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($records): ?>
                            <?php foreach ($records as $record): ?>
                                <tr>
                                    <td class="text-right">
                                        <?php echo $next_list_number; ?>
                                    </td>
                                    <td>
                                        <?php echo beautify_str($record->uraian_uraian) ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo beautify_str($record->uraian_status == 0 ? "Aktif" : "Tidak") ?>
                                    </td>
                                    <?php if ($access_rules[2][0] == 'allow' || $access_rules[3][0] == 'allow'): ?>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm btn-group-icon">
                                                <?php if ($access_rules[2][0] == 'allow'): ?>
                                                    <a class="btn btn-default" href="<?php echo base_url("back_end/" . $active_modul . "/detail") . "/" . $detail_tupoksi->tupoksi_id . "/" . $record->uraian_id; ?>"><i class="fa fa-edit"></i></a>
                                                <?php endif; ?>
                                                <?php if ($access_rules[1][0] == 'allow'): ?>
                                                    <a class="btn btn-default" href="<?php echo base_url("back_end/tpaktifitas/index") . "/" . $record->uraian_id; ?>"><i class="fa fa-list"></i></a>
                                                <?php endif; ?>
                                                <?php if ($access_rules[3][0] == 'allow'): ?>
                                                    <a class="btn btn-default btn-hapus-row" href="javascript:void(0);" rel="<?php echo base_url("back_end/" . $active_modul . "/delete") . "/" . $record->uraian_id; ?>"><i class="fa fa-times-circle"></i></a>
                                                    <?php endif; ?>
                                            </div>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <?php $next_list_number++; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">Belum ada data...!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>