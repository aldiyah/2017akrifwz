<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">
    var uri = '<?php echo base_url() . 'back_end/setaktifitas' ?>';
    
    $(document).ready(function () {
    });
    
    function lihatAktifitas(el, idPegawai) {
        var baris = $('<tr>').addClass('container-aktifitas');
        baris.append($('<td colspan="3">').addClass('list-aktifitas').append($('<span>').addClass('fa').addClass('fa-cog').addClass('fa-spin')).append(' Sedang mengambil data...'));
        if ($(el).hasClass('open')) {
            $('.container-aktifitas').remove();
            $('button.open').html('<i class="fa fa-folder"></i> Aktifitas');
            $('button.open').removeClass('open');
        } else {
            $('.container-aktifitas').remove();
            $('button.open').html('<i class="fa fa-folder"></i> Aktifitas');
            $('button.open').removeClass('open');
            $(baris).insertAfter($(el).closest('tr'));
            $(el).addClass('open');
            $(el).html('<i class="fa fa-folder-open"></i> Aktifitas');
            $.get(uri + '/getaktifitas/' + idPegawai, function (data) {
                $('.list-aktifitas').html(data);
            });
        }
    }
    function tambahAktifitas(idPegawai) {
        $.ajax({
            type: 'POST',
            url: uri + '/pilihaktifitas/' + idPegawai,
            success: function (data) {
                $('#tambah-aktifitas .modal-body').html(data);
                $('#tambah-aktifitas').modal();
            }
        });
    }
    function pilihAktifitas(idPegawai, idAktifitas) {
        $.ajax({
            type: 'POST',
            url: uri + '/tambahaktifitas/' + idPegawai + '/' + idAktifitas,
            success: function (data) {
                if (data > 0) {
                    $('.list-aktifitas').append($('<span>').addClass('fa').addClass('fa-cog').addClass('fa-spin')).append(' Sedang menambah data...');
                    $.get(uri + '/getaktifitas/' + idPegawai, function (data) {
                        $('.list-aktifitas').html(data);
                    });
                } else {
                    console.log('Error - Gagal menambahkan bawahan');
                }
            }
        });
    }
    function tambahKegiatan(idPegawai, idAktif) {
        $.ajax({
            type: 'POST',
            url: uri + '/pilihkegiatan/' + idPegawai + '/' + idAktif,
            success: function (data) {
                $('#tambah-kegiatan .modal-body').html(data);
                $('#tambah-kegiatan').modal();
            }
        });
    }
    function pilihKegiatan(idPegawai, idSetAktif, idKegiatan) {
        $.ajax({
            type: 'POST',
            url: uri + '/tambahkegiatan/' + idSetAktif + '/' + idKegiatan,
            success: function (data) {
                if (data > 0) {
                    $('.list-aktifitas').append($('<span>').addClass('fa').addClass('fa-cog').addClass('fa-spin')).append(' Sedang menambah data...');
                    $.get(uri + '/getaktifitas/' + idPegawai, function (data) {
                        $('.list-aktifitas').html(data);
                    });
                } else {
                    console.log('Error - Gagal menambahkan bawahan');
                }
            }
        });
    }
</script>


