<div id="main">
    <div class="container">
        <div class="row mt-5 pt-5 mb-5 pb-5">
            <div class="col-sm-6 in-order-2 sm-6-content" data-wow-delay="0.22s">
                <?php if ($this->session->flashdata('error') != null) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('profile') != null) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('profile'); ?>
                    </div>
                <?php } ?>
                <h2>Profile</h2><br>
                <form action="<?= base_url() ?>profile/update_password" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password lama anda">
                        <?php
                        echo form_error('password');
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_baru" class="form-control" placeholder="Password baru anda">
                        <?php
                        echo form_error('password_baru');
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="repassword" class="form-control" placeholder="Konfirmasi password anda">
                        <?php
                        echo form_error('repassword');
                        ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-info btn-md btn-block">Update</button>
                    </div>
                </form>

            </div>
            <div class="col-sm-6 in-order-1" data-wow-delay="0.22s">
                <div class="col-sm-image-container">
                    <img class="rounded mx-auto d-block" style="width: 400px;" src="<?= base_url() ?>assets/web/images/1x/regis.svg" alt="smartphone-1">
                </div>
            </div>
        </div>
    </div>
</div>