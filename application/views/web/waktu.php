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
        <form id="form" action="<?= base_url() ?>undangan/create_waktu " method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <input type="hidden" name="id_undangan" value="<?= $this->uri->segment('3'); ?>">
            <div class="row mt-3">
                <div class="col-md-6 offset-md-3" data-wow-delay="0.22s">
                    <h2>Tanggal & Waktu <img width="50px" height="100px" src="<?= base_url() ?>assets/img/place.svg" alt=""></h2>
                    <div class="form-group">
                        <input type="text" onfocus="(this.type='date')" required name="tgl_akad" value="<?php echo set_value('tgl_akad'); ?>" class="form-control" placeholder="Tanggal Akad">
                        <?php
                        echo form_error('tgl_akad');
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <div class="form-group">
                                <input type="text" onfocus="(this.type='time')" required name="jam_mulai_akad" value="<?php echo set_value('jam_mulai_akad'); ?>" class="form-control" placeholder="Waktu Mulai Akad">
                                <?php
                                echo form_error('jam_mulai_akad');
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="form-group">
                                <input type="text" onfocus="(this.type='time')" required name="jam_selesai_akad" value="<?php echo set_value('jam_selesai_akad'); ?>" class="form-control" placeholder="Waktu Selesai Akad">
                                <?php
                                echo form_error('jam_selesai_akad');
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" onfocus="(this.type='date')" required name="tgl_resepsi" value="<?php echo set_value('tgl_resepsi'); ?>" class="form-control" placeholder="Tanggal Resepsi">
                        <?php
                        echo form_error('tgl_resepsi');
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <div class="form-group">
                                <input type="text" onfocus="(this.type='time')" required name="jam_mulai_resepsi" value="<?php echo set_value('jam_mulai_resepsi'); ?>" class="form-control" placeholder="Waktu Mulai Resepsi">
                                <?php
                                echo form_error('jam_mulai_resepsi');
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="form-group">
                                <input type="text" onfocus="(this.type='time')" required name="jam_selesai_resepsi" value="<?php echo set_value('jam_selesai_resepsi'); ?>" class="form-control" placeholder="Waktu Selesai Resepsi">
                                <?php
                                echo form_error('jam_selesai_resepsi');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mb-5 pt-5">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-info btn-md btn-block">Lanjutkan <img id="loading_res" style="display: none ;" width="25px" src="<?= base_url() ?>assets/web/images/icon.gif" alt="" srcset=""></button>
                    </div>
                </div>
            </div>
        </form>
        <div class="site-section pb-5 mb-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mb-1">
                    </div>
                    <div class="col-4"></div>
                    <div class="col-md-4 text-center mb-5">

                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>