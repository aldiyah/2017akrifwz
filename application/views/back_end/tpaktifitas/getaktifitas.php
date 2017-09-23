<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $next_list_number = isset($next_list_number) ? $next_list_number : 1; ?>
<?php $records = isset($records) ? $records : FALSE; ?>
<?php
//var_dump($records);
//exit();
?>
<?php if ($records): ?>
    <?php foreach ($records as $record): ?>
        <tr>
            <td class="text-right">
                <?php echo $next_list_number; ?>
            </td>
            <td>
                <?php echo beautify_str($record->kategori_nama) ?>
            </td>
            <td>
                <?php echo beautify_str($record->aktifitas_nama) ?>
            </td>
            <td>
                <?php echo beautify_str($record->aktifitas_output) ?>
            </td>
            <td class="text-center">
                <?php echo beautify_str($record->aktifitas_waktu) ?>
            </td>
            <td class="text-center">
                <?php echo beautify_str($record->aktifitas_kesulitan) ?>
            </td>
            <td class="text-center">
                <?php echo beautify_str($record->aktifitas_bobot) ?>
            </td>
            <?php if ($access_rules[2][0] == 'allow' || $access_rules[3][0] == 'allow'): ?>
                <td class="text-center">
                    <div class="btn-group btn-group-sm btn-group-icon">
                        <?php if ($access_rules[2][0] == 'allow'): ?>
                                <!--<a class="btn btn-default" href="<?php echo base_url("back_end/" . $active_modul . "/detail") . "/" . $detail_tupoksi->tupoksi_id . "/" . $record->uraian_id; ?>"><i class="fa fa-edit"></i></a>-->
                        <?php endif; ?>
                        <?php if ($access_rules[1][0] == 'allow'): ?>
                                <!--<a class="btn btn-default" href="<?php echo base_url("back_end/tpaktifitas/index") . "/" . $record->uraian_id; ?>"><i class="fa fa-list"></i></a>-->
                        <?php endif; ?>
                        <?php if ($access_rules[3][0] == 'allow'): ?>
                            <a class="btn btn-default btn-hapus-row" href="javascript:void(0);" rel="<?php echo base_url("back_end/" . $active_modul . "/delete") . "/" . $record->tp_aktifitas_id; ?>"><i class="fa fa-times-circle"></i></a>
                            <?php endif; ?>
                    </div>
                </td>
            <?php endif; ?>
        </tr>
        <?php $next_list_number++; ?>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="8">Belum ada data...!</td>
    </tr>
<?php endif; ?>
