<div id="main">
    <div class="container">
        <div class="row mt-5 pt-5 mb-5 pb-5">

            <div class="col-sm-6 in-order-1" data-wow-delay="0.22s">
                <div class="col-sm-image-container">
                    <img class="rounded mx-auto d-block" style="width: 400px;" src="<?= base_url() ?>assets/web/images/1x/login.svg" alt="smartphone-1">
                </div>
            </div>
            <div class="col-sm-6 in-order-1" data-wow-delay="0.22s">
                <?php if ($this->session->flashdata('error_login') != null) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('error_login'); ?>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('regis') != null) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('regis'); ?>
                    </div>
                <?php } ?>
                <h2>Login</h2><br>
                <form action="<?= base_url() ?>login/auth " method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Anda">
                        <center>
                            <small id="emailHelp" class="form-text text-muted">Kami tidak akan pernah membagikan email Anda kepada orang lain.</small>
                        </center>
                        <?php
                        echo form_error('email');
                        ?>
                    </div>
                    <div class="form-group pt-2">
                        <input type="password" name="password" class="form-control" placeholder="Password Anda">
                        <?php
                        echo form_error('password');
                        ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-info btn-md btn-block">Login</button>
                    </div>
                </form>
                <br>
                <p>Belum Memiliki Akun? Silahkan <a href="<?php echo  base_url() ?>register">Register</a></p>
            </div>
        </div>
    </div>
</div>