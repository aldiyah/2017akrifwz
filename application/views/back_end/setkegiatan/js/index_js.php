<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">
    var uri = '<?php echo base_url() . uri_string() ?>';
    $(document).ready(function () {
//        $('button[type=submit]').click(function () {
//            $(this).closest('form').submit();
//        });
    });
//    $('#form-tambah-kegiatan').submit(function (e) {
//        e.preventDefault();
//        var box = $('#mb-success');
//        box.toggleClass('open');
//        var sound = box.data("sound");
//        playAudio(sound);
//    });
    function tambahPegawai() {
        $.ajax({
            type: 'POST',
            url: uri + '/pilihpegawai',
            success: function (data, textStatus, jqXHR) {
                $('#tambah-kabid .modal-body').html(data);
                $('#tambah-kabid').modal();
            }
        });
    }
    function pilihPegawai(idPegawai) {
        $.ajax({
            type: 'POST',
            url: uri + '/tambahpegawai/' + idPegawai,
            success: function (data) {
                if (data > 0) {
                    window.location = 'setkegiatan';
                } else {
                    console.log('Error - Gagal menambahkan bawahan');
                }
            }
        });
    }
    function lihatKegiatan(el, idPegawai) {
        var baris = $('<tr>').addClass('container-kegiatan');
        baris.append($('<td colspan="3">').addClass('list-kegiatan').html('Sedang mengambil data...'));
        if ($(el).hasClass('open')) {
            $('.container-kegiatan').remove();
            $('.open').text('Lihat Kegiatan');
            $('.open').removeClass('open');
        } else {
            $('.container-kegiatan').remove();
            $('.open').text('Lihat Kegiatan');
            $('.open').removeClass('open');
            $(baris).insertAfter($(el).closest('tr'));
            $(el).addClass('open');
            $(el).text('Tutup Info');
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
                    $('.list-kegiatan').html('Sedang mengambil data...');
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


