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

        <form id="form" action="<?= base_url() ?>undangan/create_mengundang " method="post" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="col-md-6 offset-md-3" data-wow-delay="0.22s">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    <h2>Mengundang<img width="50px" height="100px" src="<?= base_url() ?>assets/img/mengundang.svg" alt=""></h2><br>
                    <div class="fieldGroup">
                        <div class="form-group">
                            <div class="text-right">
                                <a href="javascript:void(0)" required class="btn btn-outline-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Mengundang</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama_mengundang[]" required class="form-control" placeholder="Turut mengundang siapa?">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5 pb-5 pt-5">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-info btn-md btn-block">Buat Undangan <img id="loading_res" style="display: none ;" width="25px" src="<?= base_url() ?>assets/web/images/icon.gif" alt="" srcset=""></button>
                    </div>
                </div>
            </div>
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
            <div class="site-section ">
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
        </form>
        <div class="fieldGroupCopy" style="display:none">
            <div class="row">
                <div class="col-10">
                    <div class="form-group">
                        <input type="text" name="nama_mengundang[]" class="form-control" placeholder="Turut mengundang siapa?">
                        <?php
                        echo form_error('nama_pria');
                        ?>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <div class="text-right">
                            <a href="javascript:void(0)" class="btn btn-outline-danger remove"><span class="fa fa-remove" aria-hidden="true"></span>X</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>