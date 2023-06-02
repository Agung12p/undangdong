<?php
// var_dump($undangan);
foreach ($undangan as $un) {
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
        <div class="row mt-5 pt-5">
            <div class="col-md-8 offset-md-2">
                <div class="text-center">
                    <p class="bismillah">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّ حِيم</p>
                    <h4 class="text-center acara">Doa</h4>
                    <p class="salam">“Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya diantaramu rasa kasih dan sayang. Sesungguhnya pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berfikir.” -Ar-Ruum (30:21)</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-8 offset-md-2">
                <div class="text-center">
                    <h4 class="text-center acara">Turut Mengundang</h4>
                </div>
            </div>
        </div>

        <?php
        //Columns must be a factor of 12 (1,2,3,4,6,12)
        $numOfCols = 3;
        $rowCount = 0;
        $bootstrapColWidth = 12 / $numOfCols;
        ?>
        <div class="row">
            <?php foreach ($mengundang as $row) {
                $id_users = $row['id_users'];
            ?>

                <div class="col-lg-6 col-6 mt-3">
                    <ul>
                        <li><?= $row['nama_mengundang'] ?></li>
                    </ul>
                </div>
            <?php } ?>
        </div>
        <div class="row mt-2">
            <div class="col-md-8 offset-md-2">
                <div class="text-center">
                    <h4 class="text-center acara">Ucapan Selamat</h4>
                </div>
            </div>
        </div>
        <div id="ucapan" class="row mt-3">
            <div class="col-md-8 offset-md-3">
                <div class="scrollable-ucapan">
                    <?php
                    // var_dump($ucapan);
                    foreach ($ucapan as $row) {

                    ?>
                        <div class="card bg-light mt-3" style="width: 15rem;">
                            <div class="card-header">
                                <h5 class="text-center">Dari :<?= $row['nama_ucapan'] ?></h5>
                            </div>
                            <div class="card-body ">
                                <p class="text-center salam"><?= $row['pesan'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="text-center">
                    <h4 class="text-center acara">Ucapkan selamat kepada pengantin</h4>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-8 offset-md-2">
                <form id="form" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" id="id_users" name="id_users" value="<?= $id_users ?>">
                    <div class="form-group">
                        <input type="text" name="nama_ucapan" required class="form-control" placeholder="Nama Anda">
                        <div id="nama_ucapan"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" required class="form-control" placeholder="Email Anda">
                        <div id="email"></div>
                    </div>
                    <div class="form-group">
                        <textarea name="pesan" required class="form-control" cols="30" rows="5" placeholder="Ucapan Anda"></textarea>
                        <div id="pesan"></div>
                    </div>

                </form>
                <div class="text-center">
                    <button id="butsave" onclick="save()" type="submit" class="btn btn-outline-info btn-md">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function save() {
        var url;
        url = "<?php echo site_url('undangan_pernikahan/ucapan_masuk') ?>";
        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                //if success close modal and reload ajax table
                if (data !== 'sukses') {
                    $('#nama_ucapan').html(data.nama_ucapan);
                    $('#email').html(data.email);
                    $('#pesan').html(data.pesan);
                    // ajaxindicatorstop();
                    // $('.error').html(obj);
                    return false;
                } else {
                    window.swal({
                        title: "Pesan berhasil terkirim",
                        showConfirmButton: false,
                    });
                    timer: 1000
                    location.reload();
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                ajaxindicatorstop();
                swal(
                    'Gagal!',
                    'Terjadi kesalahan',
                    'warning'
                )
            }
        });
    }
</script>
<!-- Menu -->