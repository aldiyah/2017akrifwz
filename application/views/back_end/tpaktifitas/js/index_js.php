<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">
    var uri = '<?php echo base_url() . 'back_end/tpaktifitas' ?>';

    $(document).ready(function () {
    });

    function tambahAktifitas(idUraian) {
        $('#ajax-loading').show();
        $.ajax({
            type: 'POST',
            url: uri + '/pilihaktifitas/' + idUraian,
            success: function (data) {
                $('#ajax-loading').hide();
                $('#tambah-aktifitas .modal-body').html(data);
                $('#tambah-aktifitas').modal();
            }
        });
    }
    function pilihAktifitas(idUraian, idAktifitas) {
        $.ajax({
            type: 'POST',
            url: uri + '/tambahaktifitas/' + idUraian + '/' + idAktifitas,
            success: function (data) {
                if (data > 0) {
                    window.location.reload();
                } else {
                    console.log('Error - Gagal menambahkan aktifitas');
                }
            }
        });
    }
</script>


