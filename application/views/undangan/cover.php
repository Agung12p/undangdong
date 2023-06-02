<!-- Main content -->

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php
                // var_dump($undangan);
                foreach ($undangan as $un) {
                    $nama_pria = $un['nama_pria'];
                    $nama_wanita = $un['nama_wanita'];
                    $tgl_akad = $un['tgl_akad'];
                    $foto_bersama = $un['foto_bersama'];
                    $theme = $un['nama_theme'];
                    $id_theme = $un['id_theme'];
                }
                $nama_pria = implode(" ", array_slice(explode(" ", $nama_pria), 0, 1));
                $nama_wanita = implode(" ", array_slice(explode(" ", $nama_wanita), 0, 1));
                ?>
                <style>
                    .card-1 {
                        min-height: 700px;
                        background-image: url("<?= base_url() ?>assets/img/theme/<?= $theme ?>/bg_22.png");
                        background-repeat: no-repeat;
                        -webkit-background-size: cover;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        background-size: cover;
                        background-position: center;
                    }

                    .modal-body {
                        background-image: url("<?= base_url() ?>assets/img/theme/<?= $theme ?>/bg_22.png");
                    }
                </style>
                <div class="card-1 shadow-lg p-3 mb-5 bg-white rounded">
                    <?php if ($id_theme == 4) { ?>
                        <div id="utama">
                            <div class="row">
                                <div class="col mt-5 pt-2">
                                    <div class="text-center">
                                        <h4 style="color:white;" class="wedding">The Wedding</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="text-center">
                                        <h3 style="color:white;" class="wedding"><?= $nama_wanita ?> & <?= $nama_pria ?></h3>
                                        <h4 style="color:white;" class="wedding"><?= date('d-m-Y', strtotime($tgl_akad)) ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row foto">
                                <img width="240px" height="240px" class="rounded mx-auto d-block rounded-circle" src="<?= base_url() ?>assets/img/pengantin/<?= $foto_bersama ?>" alt="" srcset="">
                            </div>
                            <div class="row bg">
                                <img width="370px" class="img-fluid mx-auto d-block" src="<?= base_url() ?>assets/img/theme/<?= $theme ?>/bg_1.png" alt="" srcset="">
                            </div>
                        </div>
                    <?php } elseif ($id_theme == 5) { ?>
                        <div id="utama">
                            <div class="row">
                                <div class="col mt-5 pt-2">
                                    <div class="text-center">
                                        <h4 style="color:#CD6155;" class="wedding">The Wedding</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="text-center">
                                        <h3 style="color:#CD6155 ;" class="wedding"><br><?= $nama_wanita ?> & <?= $nama_pria ?></h3>
                                        <h4 style="color:#ddb136 ;" class="wedding"><?= date('d / m /Y', strtotime($tgl_akad)) ?></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="row foto">
                                <img width="240px" height="240px" class="rounded mx-auto d-block rounded-circle" src="<?= base_url() ?>assets/img/pengantin/<?= $foto_bersama ?>" alt="" srcset="">
                            </div>
                            <div class="row bg">
                                <img width="370px" class="img-fluid mx-auto d-block" src="<?= base_url() ?>assets/img/theme/<?= $theme ?>/bg_1.png" alt="" srcset="">
                            </div>

                        </div>
                    <?php } elseif ($id_theme == 6) { ?>
                        <div id="utama">
                            <div class="row">
                                <div class="col mt-5 pt-2">
                                    <div class="text-center">
                                        <h4 style="color:#58D68D ;" class="wedding"></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row foto">
                                <img width="240px" height="240px" class="rounded mx-auto d-block rounded-circle" src="<?= base_url() ?>assets/img/theme/muslim/cover.png" alt="" srcset="">
                            </div>
                            <div class="row bg">
                                <img width="370px" class="img-fluid mx-auto d-block" src="<?= base_url() ?>assets/img/theme/<?= $theme ?>/bg_1.png" alt="" srcset="">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="text-center">
                                        <h3 style="color:#F1C40F ;" class="wedding"><br><?= $nama_wanita ?> & <?= $nama_pria ?></h3>
                                        <h4 style="color:#58D68D  ;" class="wedding"><?= date('d - m - Y', strtotime($tgl_akad)) ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div id="utama">
                            <div class="row">
                                <div class="col mt-5 pt-2">
                                    <div class="text-center">
                                        <h4 class="wedding">The Wedding</h4>

                                    </div>
                                </div>
                            </div>

                            <div class="row foto">
                                <img width="240px" height="240px" class="rounded mx-auto d-block rounded-circle" src="<?= base_url() ?>assets/img/pengantin/<?= $foto_bersama ?>" alt="" srcset="">
                            </div>
                            <div class="row bg">
                                <img width="370px" class="img-fluid mx-auto d-block" src="<?= base_url() ?>assets/img/theme/<?= $theme ?>/bg_1.png" alt="" srcset="">
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="text-center">
                                        <?php if ($id_theme == 4 || $id_theme == 5 || $id_theme == 6) { ?>
                                            <h3 style="color: #FDEBD0;" class="wedding"><?= $nama_wanita ?> & <?= $nama_pria ?></h3>
                                            <h4 style="color: #FDEBD0;" class="wedding"><?= date('d-m-Y', strtotime($tgl_akad)) ?></h4>
                                        <?php  } else { ?>
                                            <h3 class="wedding"><?= $nama_wanita ?> & <?= $nama_pria ?></h3>
                                            <h4 class="wedding"><?= date('d-m-Y', strtotime($tgl_akad)) ?></h4>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    foreach ($undangan as $key) {
                        $id_undangan = $key['id_undangan'];
                    }
                    ?>
                    <audio id="musik" hidden loop>
                        <source src="<?= base_url() ?>assets/web/audio/musik.mp3" type="audio/mpeg">
                        Browsermu tidak mendukung tag audio
                    </audio>
                    <input type="hidden" name="id_undangan" id="id_undangan" value="<?= $id_undangan ?>">
                    <div class="modal fade" id="kepada" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen-sm-down modal modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <?php
                                            $str = $this->uri->segment('4');
                                            $kalimat = substr($str, 7);
                                            $kalimat = str_replace('-', ' ', $kalimat);

                                            ?>
                                            <h6 class="text-center">Kepada Yth </h6>
                                            <h6 class="text-center">Bapak/Ibu/Saudara/i</h6>
                                            <h5 class="text-center"><?= $kalimat ?></h5>

                                            <button type="button" id="buka" class="btn btn-info btn-block" data-dismiss="modal">Buka <i class="fa fa-chevron-right"></i> </button>
                                        </div>

                                    </div>
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-12">
                                            <p class="text-center">Maaf bila ada kesalahan dalam penulisan nama/gelar</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#buka').click(function() {
                                $('#musik').get(0).play();
                            });

                        });
                        $(document).ready(function() {
                            $('#kepada').modal('show');
                            $('.klik_menu').click(function() {
                                var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
                                    csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
                                var dataJson = {
                                    [csrfName]: csrfHash
                                };
                                var id_undangan = $('#id_undangan').val();
                                var id = $(this).attr('id');

                                xhr: $.ajax({
                                    method: "POST",
                                    url: "<?= base_url('undangan_pernikahan/halaman/') ?>" + id + '/' + id_undangan,
                                    data: dataJson,

                                    success: function(response) {

                                        $('#utama').html(response)
                                    }
                                })

                            });
                        });
                    </script>
                    <!-- Menu -->


                    <!-- /.content-wrapper -->

                    <!-- Control Sidebar -->

                    <!-- /.control-sidebar -->

                    <!-- Main Footer -->