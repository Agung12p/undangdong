<footer class="site-footer">
    <div class="container">
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> <a href="https://muchtaragung.github.io" target="_blank">Muchtara</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>

        </div>
    </div>
</footer>

</div>

<script src="<?= base_url() ?>assets/web/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= base_url() ?>assets/web/js/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/web/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/web/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/web/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/web/js/jquery.stellar.min.js"></script>
<script src="<?= base_url() ?>assets/web/js/jquery.countdown.min.js"></script>
<script src="<?= base_url() ?>assets/web/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/web/js/aos.js"></script>
<script src="<?= base_url() ?>assets/web/js/source.js"></script>
<script src="<?= base_url() ?>assets/web/js/mediaelement-and-player.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<script>
    $("form").submit(function() {
        $("#loading_res").show();
        return true;
    });
    $(document).ready(function() {
        //group add limit
        var maxGroup = 12;
        var i = 1;

        //add more fields group
        $(".addMore").click(function() {
            if ($('body').find('.fieldGroup').length < maxGroup) {
                i = i + 1;
                var fieldHTML = '<div class="fieldGroup">' + $(".fieldGroupCopy").html() + '</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
            } else {
                swal(
                    'Perhatian',
                    'Form sudah Maksimum',
                    'warning'
                )
            }
        });

        //remove fields group
        $("body").on("click", ".remove", function() {
            $(this).parents(".fieldGroup").remove();
        });
    });
</script>
<script src="<?= base_url() ?>assets/web/js/main.js"></script>
</body>

</html>