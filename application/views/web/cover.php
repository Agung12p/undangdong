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
</style>
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
                    <h4 style="color:#F1C40F  ;" class="wedding"><?= date('d - m - Y', strtotime($tgl_akad)) ?></h4>
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