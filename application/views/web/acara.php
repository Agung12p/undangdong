<?php
// var_dump($undangan);
foreach ($undangan as $un) {
    $tgl_akad = $un['tgl_akad'];
    $tgl_resepsi = $un['tgl_resepsi'];
    $alamat_akad = $un['alamat_akad'];
    $alamat_resepsi = $un['alamat_resepsi'];
    $jam_mulai_akad = $un['jam_mulai_akad'];
    $jam_selesai_akad = $un['jam_selesai_akad'];
    $jam_mulai_resepsi = $un['jam_mulai_resepsi'];
    $jam_selesai_resepsi = $un['jam_selesai_resepsi'];
    $theme = $un['nama_theme'];
}
$jam_mulai_akad = date('h.i', strtotime($jam_mulai_akad));
$jam_selesai_akad = date('h.i', strtotime($jam_selesai_akad));
$jam_mulai_resepsi = date('h.i', strtotime($jam_mulai_resepsi));
$jam_selesai_resepsi = date('h.i', strtotime($jam_selesai_resepsi));
$tgl_akad1 = date('d F Y', strtotime($tgl_akad));
$tgl_resepsi1 = date('d F Y', strtotime($tgl_resepsi));

$hari_akad   = date('D', strtotime($tgl_akad));
$hari_resepsi   = date('D', strtotime($tgl_resepsi));

function hariIndo($hariInggris)
{
    switch ($hariInggris) {
        case 'Sun':
            return 'Minggu';
        case 'Mon':
            return 'Senin';
        case 'Tue':
            return 'Selasa';
        case 'Wed':
            return 'Rabu';
        case 'Thu':
            return 'Kamis';
        case 'Fri':
            return 'Jumat';
        case 'Sat':
            return 'Sabtu';
        default:
            return 'hari tidak valid';
    }
}
$hariAkad = hariIndo($hari_akad);
$hariResepsi = hariIndo($hari_resepsi);
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
        <div class="row mt-5 pt-5">
            <div class="col-md-8 offset-md-2">
                <div class="text-center">
                    <p class="bismillah">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّ حِيم</p>
                    <p class="isi">Kami bermaksud mengundang Bapak/Ibu/Saudara ke acara pernikahan putra putri kami yang InsyaAllah akan berlangsung :</p>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <h4 class="text-center acara">Akad Nikah</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-9">
                <table class="table table-responsive" style="border:none">
                    <tr>
                        <td class="salam">Hari</td>
                        <td class="salam">:</td>
                        <td class="salam"><?= $hariAkad ?> </td>
                    </tr>
                    <tr>
                        <td class="salam">Tanggal</td>
                        <td class="salam">:</td>
                        <td class="salam"><?= $tgl_akad1 ?></td>
                    </tr>
                    <tr>
                        <td class="salam">Pukul</td>
                        <td class="salam">:</td>
                        <td class="salam"><?= $jam_mulai_akad ?> sampai <?= $jam_selesai_akad ?></td>
                    </tr>
                    <tr>
                        <td class="salam">Lokasi</td>
                        <td class="salam">:</td>
                        <td class="salam"><?= $alamat_akad ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <h4 class="text-center acara">Resepsi</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-9">
                <table class="table table-responsive" style="border:none">
                    <tr>
                        <td class="salam">Hari</td>
                        <td class="salam">:</td>
                        <td class="salam"><?= $hariResepsi ?></td>
                    </tr>
                    <tr>
                        <td class="salam">Tanggal</td>
                        <td class="salam">:</td>
                        <td class="salam"><?= $tgl_resepsi1 ?></td>
                    </tr>
                    <tr>
                        <td class="salam">Pukul</td>
                        <td class="salam">:</td>
                        <td class="salam"><?= $jam_mulai_resepsi ?> sampai <?= $jam_selesai_resepsi ?></td>
                    </tr>
                    <tr>
                        <td class="salam">Lokasi</td>
                        <td class="salam">:</td>
                        <td class="salam"><?= $alamat_resepsi ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>