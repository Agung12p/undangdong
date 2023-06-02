<div id="main">
    <div class="container">
        <div class="row mt-5 pt-5 mb-5 pb-5">
            <div class="col-sm-6 in-order-2 sm-6-content" data-wow-delay="0.22s">
                <?php if ($this->session->flashdata('error_login') != null) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('error_login'); ?>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('profile') != null) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('profile'); ?>
                    </div>
                <?php } ?>
                <h2>Profile</h2><br>
                <?php foreach ($users as $us) : ?>
                    <form action="<?= base_url() ?>profile/users" method="post">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <div class="form-group">
                            <input type="text" name="nama" value="<?php echo $us->nama ?>" class="form-control" placeholder="Nama Anda">
                            <?php
                            echo form_error('nama');
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="email" readonly name="email" value="<?php echo $us->email ?>" class="form-control" placeholder="Email Anda">
                            <?php
                            echo form_error('email');
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="number" name="no_hp" value="<?php echo $us->no_hp ?>" minlength="11" min="0" class="form-control" placeholder="Nomer Handphoone Anda">
                            <?php
                            echo form_error('no_hp');
                            ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-info btn-md btn-block">Update</button>
                        </div>
                    </form>
                <?php endforeach ?>
                <br>
                <a href="<?php echo  base_url() ?>profile/ubah_password">Ubah Password</a>
            </div>
            <div class="col-sm-6 in-order-1" data-wow-delay="0.22s">
                <div class="col-sm-image-container">
                    <img class="rounded mx-auto d-block" style="width: 400px;" src="<?= base_url() ?>assets/web/images/1x/regis.svg" alt="smartphone-1">
                </div>
            </div>
        </div>
    </div>
</div>