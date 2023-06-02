

<div class="badan">

</div>
<script>
    $(document).ready(function() {
        $('.klik_menu').click(function() {
            // alert(JSON.stringify(data));
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
                csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var dataJson = {
                [csrfName]: csrfHash
            };
            var id_undangan = $('#id_undangan').val();
            var id = $(this).attr('id');

            xhr: $.ajax({
                method: "POST",
                url: "<?= base_url('undangan_pernikahan/halaman/') ?>" + id_undangan + '/' + id,
                data: dataJson,

                success: function(response) {
                    $('.badan').html(response)
                }
            })

        });
    });
    $(document).ready(function() {
        // alert(JSON.stringify(data));
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
            csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
        var dataJson = {
            [csrfName]: csrfHash
        };

        var id_undangan = $('#id_undangan').val();
        xhr: $.ajax({
            method: "POST",
            url: "<?= base_url('undangan_pernikahan/pengantin') ?>" + ,
            data: dataJson,

            success: function(response) {
                $('.badan').html(response)
            }
        })

    });
</script>