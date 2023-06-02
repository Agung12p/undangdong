<?php
// var_dump($undangan);
foreach ($undangan as $un) {
    $nama_pria = $un['nama_pria'];
    $nama_wanita = $un['nama_wanita'];
    $foto_pria = $un['foto_pria'];
    $foto_wanita = $un['foto_wanita'];
    $theme = $un['nama_theme'];
    $id_theme = $un['id_theme'];
    $ot_pria_p = $un['ot_pria_p'];
    $ot_wanita_p = $un['ot_wanita_p'];
    $ot_pria_w = $un['ot_pria_w'];
    $ot_wanita_w = $un['ot_wanita_w'];
}
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

    <?php if ($id_theme == 5) { ?>#image1 {
        border: 3px solid #FA897D !important;
        padding: 0;
    }

    <?php } elseif ($id_theme == 4) { ?>#image1 {
        border: 3px solid white !important;
        padding: 0;
    }

    <?php } ?>
</style>
<div class="scrollable">
    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col-md-8 offset-md-2">
                <div class="text-center">
                    <p class="bismillah">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّ حِيم</p>
                    <p class="salam">Assalamuallaikum Warahmatullahi wabarakatauh</p>
                    <p class="isi">Maha suci Allah yang telah menjadikan segala sesuatu lebih indah dan sempurna. Ya Allah, dengan rahmat dan Ridho-mu, kami bermaksud menyelenggarakan Pernikahan putra putri kami </p>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <img id="image1" width="130px" height="130px" class=" mx-auto d-block rounded-circle" src="<?= base_url() ?>assets/img/pengantin/<?= $foto_wanita ?>" alt="" srcset="">
                <div class="text-center">
                    <h4 class="mempelai"><?= $nama_wanita ?></h4>
                </div>

                <div class="text-center">
                    <p class="salam">Putri Dari Bapak <?= $ot_pria_w ?> & Ibu <?= $ot_wanita_w ?></p>
                </div>
            </div>
            <div class="col-md-6 offset-md-3">
                <div class="text-center">
                    <h3 class="wedding">&</h3>
                </div>
            </div>
            <div class="col-md-6 offset-md-3">
                <img id="image1" width="130px" height="130px" class=" mx-auto d-block rounded-circle" src="<?= base_url() ?>assets/img/pengantin/<?= $foto_pria ?>" alt="" srcset="">
                <div class="text-center">
                    <h4 class="mempelai"><?= $nama_pria ?></h4>
                </div>

                <div class="text-center">
                    <p class="salam">Putra Dari Bapak <?= $ot_pria_p ?> & Ibu <?= $ot_wanita_p ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menu -->