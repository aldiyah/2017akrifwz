<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">
    $(document).ready(function () {
    });
    function lihatAktifitas(el, id) {
        var parent = $(el).parent().parent();
        var kotak = $('<div>').addClass('daftar-aktifitas');
        if ($(el).hasClass('open')) {
            $('.daftar-aktifitas').remove();
            $('.open').text('Lihat Kegiatan');
            $('.open').removeClass('open');
        } else {
            $('.daftar-aktifitas').remove();
            $('.open').text('Lihat Kegiatan');
            $('.open').removeClass('open');
            $(parent).append(kotak);
            $(el).addClass('open');
            $(el).text('Tutup Info');
            $.get('back_end/home/lihataktifitas/' + id, function (data) {
                $(kotak).html(data);
            });
        }
    }
</script>


