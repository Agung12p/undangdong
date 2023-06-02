<div id="main">
    <div class="container">
        <?php if ($this->session->flashdata('msg') != null) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('regis') != null) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('regis'); ?>
            </div>
        <?php } ?>

        <style>
            input[type=radio]:checked~label {
                border: 3px solid orange;
            }
        </style>
        <form id="form" action="<?= base_url() ?>undangan/create " method="post" enctype="multipart/form-data">

            <div class="row mt-3">
                <div class="col-md-6" data-wow-delay="0.22s">
                    <h2>Pilih Thema <img width="50px" height="100px" src="<?= base_url() ?>assets/img/wedding.svg" alt=""></h2>
                    <div class="row justify-content-md-center">
                        <?php foreach ($theme as $the) { ?>
                            <div class="col-lg-6 col-6 pt-3">
                                <div class="custom-control custom-radio image-checkbox">
                                    <input required type="radio" <?php if ($theme == $the['id_theme']) echo "checked='checked'"; ?><?php echo $this->form_validation->set_radio('theme', $the['id_theme']); ?> value="<?= $the['id_theme'] ?>" class="custom-control-input" id="<?= $the['id_theme'] ?>" name="theme">
                                    <label class="custom-control-label" for="<?= $the['id_theme'] ?>">
                                        <div class="text-center">
                                            <img src="<?= base_url() ?>assets/img/theme/<?= $the['nama_theme'] ?>/preview.png" alt="#" class="img-fluid">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="row justify-content-md-center pt-3">
                        <?php
                        echo form_error('theme');
                        ?>
                    </div>
                </div>
                <div class="col-md-6" data-wow-delay="0.22s">
                    <h2>Data Pengantin <img width="50px" height="100px" src="<?= base_url() ?>assets/img/wedding.svg" alt=""></h2><br>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    <h5>
                        <li>Data Pengantin Pria</li>
                    </h5>
                    <div class="form-group">
                        <input type="text" name="nama_pria" required value="<?php echo set_value('nama_pria'); ?>" class="form-control" placeholder="Nama Pengantin Pria">
                        <?php
                        echo form_error('nama_pria');
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="ot_pria_p" required value="<?php echo set_value('ot_pria_p'); ?>" class="form-control" placeholder="Putra dari Bapak....">
                        <?php
                        echo form_error('ot_pria_p');
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="ot_wanita_p" required value="<?php echo set_value('ot_wanita_p'); ?>" class="form-control" placeholder="Putra dari Ibu....">
                        <?php
                        echo form_error('ot_wanita_p');
                        ?>
                    </div>
                    <h6 class="text-center">Foto Pria</h6>
                    <div class="text-center">
                        <img width="100px" height="100px" src="<?= base_url() ?>assets/img/groom.svg" alt="">
                    </div>
                    <div class="form-group">
                        <input type="file" name="foto_pria" required accept="image/*" class="form-control">
                        <span style="font-size: 12px;color:black">*Maksimal 1 mb</span>
                        <?php
                        echo form_error('foto_pria');
                        ?>
                    </div>
                    <h5>
                        <li>Data Pengantin Wanita</li>
                    </h5>
                    <div class="form-group">
                        <input type="text" name="nama_wanita" required value="<?php echo set_value('nama_wanita'); ?>" class="form-control" placeholder="Nama Pengantin Wanita">
                        <?php
                        echo form_error('nama_wanita');
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="ot_pria_w" required value="<?php echo set_value('ot_pria_w'); ?>" class="form-control" placeholder="Putri dari Bapak....">
                        <?php
                        echo form_error('ot_pria_w');
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="ot_wanita_w" required value="<?php echo set_value('ot_wanita_w'); ?>" class="form-control" placeholder="Putri dari Ibu....">
                        <?php
                        echo form_error('ot_wanita_w');
                        ?>
                    </div>
                    <h6 class="text-center">Foto Wanita</h6>
                    <div class="text-center">
                        <img width="100px" height="100px" src="<?= base_url() ?>assets/img/bride.svg" alt="">
                    </div>
                    <div class="form-group">
                        <input type="file" name="foto_wanita" required accept="image/*" class="form-control">
                        <span style="font-size: 12px;color:black">*Maksimal 1 mb</span>
                        <?php
                        echo form_error('foto_wanita');
                        ?>
                    </div>
                    <hr>
                    <h5>
                        <li>Foto bersama</li>
                    </h5>
                    <div class="text-center">
                        <img width="100px" height="100px" src="<?= base_url() ?>assets/img/wedding-couple.svg" alt="">
                    </div>
                    <div class="form-group">
                        <input type="file" name="foto_bersama" required accept="image/*" class="form-control">
                        <span style="font-size: 12px;color:black">*Maksimal 1 mb</span>
                        <?php
                        echo form_error('foto_bersama');
                        ?>
                    </div>
                </div>
            </div>
            <div class="row mb-5 pt-5">
                <div class="col-md-12">
                    <div class="form-group">
                        <button id="submit" type="submit" class="btn btn-outline-info btn-md btn-block">Lanjutkan <img id="loading_res" style="display: none ;" width="25px" src="<?= base_url() ?>assets/web/images/icon.gif" alt="" srcset=""></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>