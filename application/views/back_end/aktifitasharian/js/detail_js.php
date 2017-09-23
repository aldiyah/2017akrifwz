<?php
$detail = isset($detail) ? $detail : FALSE;
?>
<script>
    $(document).ready(function () {
        $('#tr_aktifitas_mulai').timepicker({showMeridian: false});
    });
    function getWaktu(selectObject) {
        var idAktifitas = selectObject.value;
        $.ajax({
            url: "<?php echo base_url(); ?>back_end/aktifitasharian/get_waktu/" + idAktifitas,
            success: function (resp) {
                var tanggal = $('#tr_aktifitas_tanggal').val().split('-');
                var mulai = $('#tr_aktifitas_mulai').val().split(':');
                var selesai = new Date(tanggal[0], tanggal[1], tanggal[2], mulai[0], parseInt(mulai[1]) + resp, mulai[2]);
                console.log(mulai, ' - ', selesai, ' - ', tanggal, ' - ', selesai);
                $('#tr_aktifitas_selesai').val(selesai.getHours() + ':' + selesai.getMinutes() + ':' + selesai.getSeconds());
            }
        });
    }
</script>