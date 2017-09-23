<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">
    var uri = '<?php echo base_url() . uri_string() ?>';
    $(document).ready(function () {
    });
    function lihatKegiatan(el, idPegawai) {
        var baris = $('<tr>').addClass('container-kegiatan');
        baris.append($('<td colspan="3">').addClass('list-kegiatan').append($('<span>').addClass('fa').addClass('fa-cog').addClass('fa-spin')).append(' Sedang mengambil data...'));
        if ($(el).hasClass('open')) {
            $('.container-kegiatan').remove();
            $('.open').html('<i class="fa fa-folder"></i>  Kegiatan');
            $('.open').removeClass('open');
        } else {
            $('.container-kegiatan').remove();
            $('.open').html('<i class="fa fa-folder"></i>  Kegiatan');
            $('.open').removeClass('open');
            $(baris).insertAfter($(el).closest('tr'));
            $(el).addClass('open');
            $(el).html('<i class="fa fa-folder-open"></i>  Kegiatan');
            $.get(uri + '/getkegiatan/' + idPegawai, function (data) {
                $('.list-kegiatan').html(data);
            });
        }
    }
    function tambahKegiatan(idPegawai) {
        $.ajax({
            type: 'POST',
            url: uri + '/pilihkegiatan/' + idPegawai,
            success: function (data) {
                $('#tambah-kegiatan .modal-body').html(data);
                $('#tambah-kegiatan').modal();
            }
        });
    }
    function pilihKegiatan(idPegawai, idKegiatan) {
        $.ajax({
            type: 'POST',
            url: uri + '/tambahkegiatan/' + idPegawai + '/' + idKegiatan,
            success: function (data) {
                if (data > 0) {
                    $('.list-kegiatan').append($('<span>').addClass('fa').addClass('fa-cog').addClass('fa-spin')).append(' Sedang menambah data...');
                    $.get(uri + '/getkegiatan/' + idPegawai, function (data) {
                        $('.list-kegiatan').html(data);
                    });
                } else {
                    console.log('Error - Gagal menambahkan bawahan');
                }
            }
        });
    }
</script>


