<div id="main">
    <div class="container">
        <div class="row mt-5 pt-5 mb-5 pb-5">
            <div class="col-sm-6 in-order-2 sm-6-content" data-wow-delay="0.22s">
                <h2>Register</h2><br>
                <form action="<?= base_url() ?>register/create_user" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    <div class="form-group">
                        <input type="text" name="nama" value="<?php echo set_value('nama'); ?>" class="form-control" placeholder="Nama Anda">
                        <?php
                        echo form_error('nama');
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email Anda">
                        <?php
                        echo form_error('email');
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="number" name="no_hp" value="<?php echo set_value('no_hp'); ?>" minlength="11" min="0" class="form-control" placeholder="Nomer Handphoone Anda">
                        <?php
                        echo form_error('no_hp');
                        ?>
                    </div>
                    <div class="form-group pt-2">
                        <input type="password" name="password" class="form-control" placeholder="Password Anda">
                        <?php
                        echo form_error('password');
                        ?>
                    </div>
                    <div class="form-group pt-2">
                        <input type="password" name="repassword" class="form-control" placeholder="Konfirmasi Password Anda">
                        <?php
                        echo form_error('repassword');
                        ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-info btn-md btn-block">Submit</button>
                    </div>
                </form>
                <br>
                <p>Sudah Memiliki Akun? Silahkan <a href="<?php echo  base_url() ?>login">Login</a></p>
            </div>
            <div class="col-sm-6 in-order-1" data-wow-delay="0.22s">
                <div class="col-sm-image-container">
                    <img class="rounded mx-auto d-block" style="width: 400px;" src="<?= base_url() ?>assets/web/images/1x/regis.svg" alt="smartphone-1">
                </div>
            </div>
        </div>
    </div>
</div>