<div class="id">
    <div class="site-blocks-cover inner-page-cover bg-light mb-5">
        <div class="container">
            <div id="un" class="row align-items-center">
                <div class="col-12 text-center">
                    <?php if ($this->session->flashdata('msg') != null) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                    <?php } ?>
                    <h1 class="mb-0">Undangan</h1>
                    <?php
                    foreach ($undangan as $u) {
                        $id_undangan = $u['id_undangan'];
                    }
                    foreach ($cek as $un) {
                        $status = $un['status'];
                        $id_users = $un['id_users'];
                    }
                    ?>
                    <?php if ($status == 0) { ?>
                        <a href="<?= base_url() ?>undangan/buat_undangan" class="btn btn-outline-info btn-md">Buat Undangan</a>
                    <?php } else { ?>
                        <a href="<?= base_url() ?>undangan_pernikahan/pengantin/<?= $id_undangan ?>/kepada=" class="btn btn-outline-success btn-md">Bagikan</a>
                        <a href="<?= base_url() ?>undangan/hapus/<?= $id_users ?>" class="alert_notif btn btn-outline-danger btn-md">Hapus</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php if ($status == 4) { ?>

        <div class="site-section pt-3">
            <div class="container">
                <div class="col-md-12 text-center mb-5">
                    <h2 class="display-5 mb-5 text-black">Undanganmu</h2>
                </div>
                <div class="row mb-5">
                    <!-- <div class="col-3"></div> -->
                    <div class="col-md-6 offset-md-3">
                        <div class="card-1  shadow-lg p-3 mb-5 bg-white rounded">
                            <button type="button" id="buka" class="buka btn btn-info btn-lg btn-block">Buka</button>
                            <div class="badan">
                            </div>

                            <!-- Menu -->

                            <div id="menu" style="display: none;" class="card card-nav bg-light shadow-lg p-3 mb-5 rounded">
                                <div class="row justify-content-center navbar-expand">
                                    <!-- <div class="col-md-1"></div> -->
                                    <div class="col-md-2 col-md-offset-1">
                                        <a title="Cover" id="cover" class="klik_menu btn btn-sm btn-light"><img width="28px" src="<?= base_url() ?>assets/img/cover.svg" alt="" srcset=""></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a title="Mempelai" id="mempelai" class="klik_menu btn btn-sm btn-light"><img width="28px" src="<?= base_url() ?>assets/img/wedding-couple.svg" alt="" srcset=""></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a title="Acara" id="acara" class="klik_menu btn btn-sm btn-light"><img width="28px" src="<?= base_url() ?>assets/img/place.svg" alt="" srcset=""></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a title="Mengundang" id="mengundang" class="klik_menu btn btn-sm btn-light"><img width="28px" src="<?= base_url() ?>assets/img/mengundang.svg" alt="" srcset=""></a>
                                    </div>
                                    <div class="col-md-2">
                                        <a title="Lokasi" id="lokasi" class="klik_menu btn btn-sm btn-light"><img width="28px" src="<?= base_url() ?>assets/img/lokasi.svg" alt="" srcset=""></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-3"></div> -->
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="site-section pt-3 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mb-1">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-md-4 text-center mb-5">

                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
        <div class="site-section pt-3 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mb-1">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-md-4 text-center mb-5">

                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
    <?php }   ?>
</div>
<script>
    jQuery(document).ready(function($) {
        $('#un').on('click', '.alert_notif', function() {
            var getLink = $(this).attr('href');
            swal({
                title: "Apakah anda yakin?",
                text: "Undangan yang dihapus tidak dapat kembali.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Tidak, kembali!",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function() {
                window.location.href = getLink
            });
            return false;
        });
    });
    $(document).ready(function() {
        $('.klik_menu').click(function() {
            // alert(JSON.stringify(data));
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
                csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var dataJson = {
                [csrfName]: csrfHash
            };
            var id = $(this).attr('id');

            xhr: $.ajax({
                method: "POST",
                url: "<?= base_url('undangan/halaman/') ?>" + id,
                data: dataJson,

                success: function(response) {
                    $('.badan').html(response)
                }
            })

        });
    });
    $(document).ready(function() {
        $('#buka').click(function() {
            // alert(JSON.stringify(data));
            var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
                csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            var dataJson = {
                [csrfName]: csrfHash
            };
            var id = $(this).attr('id');

            xhr: $.ajax({
                method: "POST",
                url: "<?= base_url('undangan/halaman/') ?>",
                data: dataJson,

                success: function(response) {
                    $('.badan').html(response)
                }
            })

            $('#menu').show()
            // $('#bagi').show()
            $('#buka').hide()
        });
    });
</script>