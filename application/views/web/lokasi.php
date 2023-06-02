<?php
// var_dump($undangan);
foreach ($undangan as $un) {
    $latitude_akad = $un['latitude_akad'];
    $longitude_akad = $un['longitude_akad'];
    $alamat_akad = $un['alamat_akad'];
    $alamat_resepsi = $un['alamat_resepsi'];
    $latitude_resepsi = $un['latitude_resepsi'];
    $longitude_resepsi = $un['longitude_resepsi'];
    $theme = $un['nama_theme'];
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
</style>

<div class="scrollable">
    <div class="container">

        <div class="row mt-3 pt-5">
            <div class="col">
                <h4 class="text-center acara">Lokasi Akad</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div id="akad" class="z-depth-1-half map-container" style="height: 220px">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <h4 class="text-center acara">Lokasi Resepsi</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div id="resepsi" class="z-depth-1-half map-container" style="height: 220px">
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var mapOptions = {
        center: [<?= $latitude_akad ?>, <?= $longitude_akad ?>],
        zoom: 13
    }

    var map = new L.map('akad', mapOptions);

    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Muchtara'
    });
    map.addLayer(layer);

    var marker = L.marker([<?= $latitude_akad ?>, <?= $longitude_akad ?>]).addTo(map);
    marker.bindPopup('<b><?= $alamat_akad ?>');
</script>
<script type="text/javascript">
    var mapOptions = {
        center: [<?= $latitude_resepsi ?>, <?= $longitude_resepsi ?>],
        zoom: 13
    }

    var map = new L.map('resepsi', mapOptions);

    var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Muchtara'
    });
    map.addLayer(layer);

    var marker = L.marker([<?= $latitude_resepsi ?>, <?= $longitude_resepsi ?>]).addTo(map);
    marker.bindPopup('<b><?= $alamat_resepsi ?>');
</script>