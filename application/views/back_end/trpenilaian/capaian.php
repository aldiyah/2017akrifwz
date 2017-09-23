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
                <h3 class="panel-title"><?php echo $header_title . " Capaian Pegawai"; ?></h3>
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
            </div>
        </div>
    </div>
</div>