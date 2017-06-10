<?php
$detail = isset($detail) ? $detail : FALSE;
?>
<script>
    var slc_aktifitas_cfg = {
        data: [],
        ajax: {
            url: "<?php echo base_url(); ?>back_end/msaktifitas/get_like",
            placeholder: 'Pilih Kategori',
            dataType: 'json',
            delay: 250,
            method: 'post',
            width: '100%',
            data: function (params) {
                return {
                    keyword: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
                var data = $.map(data, function (obj) {
                    obj.id = obj.id || obj.aktifitas_id;
                    obj.text = obj.text || obj.aktifitas_nama;
                    return obj;
                });
                params.page = params.page || 1;
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 2
    };

<?php if ($detail && $detail->aktifitas_id != ""): ?>
        slc_aktifitas_cfg.data = [
            {
                id: '<?php echo $detail->aktifitas_id ?>',
                text: '<?php echo $detail->aktifitas_nama ?>'
            }
        ];
<?php endif; ?>
    $(document).ready(function () {
        $("#slc-aktifitas").select2(slc_aktifitas_cfg);
<?php if ($detail && $detail->aktifitas_id != ""): ?>
            $("#slc-aktifitas").val(<?php echo $detail->aktifitas_id ?>).trigger("change");
            ;
<?php endif; ?>
    });
</script>