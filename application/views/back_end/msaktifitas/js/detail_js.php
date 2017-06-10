<?php
$detail = isset($detail) ? $detail : FALSE;
?>
<script>
    var slc_kategori_cfg = {
        data: [],
        ajax: {
            url: "<?php echo base_url(); ?>back_end/mskategoriaktifitas/get_like",
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
                    obj.id = obj.id || obj.kategori_id;
                    obj.text = obj.text || obj.kategori_nama;
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

<?php if ($detail && $detail->kategori_id != ""): ?>
        slc_kategori_cfg.data = [
            {
                id: '<?php echo $detail->kategori_id ?>',
                text: '<?php echo $detail->kategori_nama ?>'
            }
        ];
<?php endif; ?>
    $(document).ready(function () {
        $("#slc-kategori").select2(slc_kategori_cfg);
<?php if ($detail && $detail->kategori_id != ""): ?>
            $("#slc-kategori").val(<?php echo $detail->kategori_id ?>).trigger("change");
            ;
<?php endif; ?>
    });
</script>