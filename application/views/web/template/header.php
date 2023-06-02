<!DOCTYPE html>
<html lang="en">

<head>
    <title>UndangDong</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/web/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/web/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/web/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url() ?>assets/web/favicon/site.webmanifest">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900">
    <link rel="stylesheet" href="<?= base_url() ?>assets/web/fonts/icomoon/style.css">
    <link rel="stylesheet" href=" <?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/web/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/web/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/web/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/web/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/web/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/web/css/bootstrap-image-checkbox.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/web/css/aos.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/web/css/style.css">
    <script src="<?= base_url() ?>assets/web/js/jquery-3.3.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <header class="site-navbar py-4" role="banner">

            <div class="container">
                <div class="row align-items-center">


                    <div class="col-3">
                        <h1 class="site-logo"><a href="index.html" class="h2">UndangDong<span class="text-primary">.</span> </a></h1>
                    </div>
                    <div class="col-9">
                        <nav class="site-navigation position-relative text-right text-md-right" role="navigation">



                            <div class="d-block d-lg-none ml-md-0 mr-auto"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li <?= $this->uri->segment(1) == '' ? 'class="active"' : 'class=""' ?>>
                                    <a href="<?= base_url() ?>"><b>Home</b> </a>
                                </li>
                                <!-- <li class="has-children">
                                    <a href="#">Dropdown</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="#">Menu One</a></li>
                                        <li><a href="#">Menu Two</a></li>
                                        <li><a href="#">Menu Three</a></li>
                                    </ul>
                                </li> -->
                                <li <?= $this->uri->segment(1) == 'undangan' ? 'class="active"' : 'class=""' ?>>
                                    <a href="<?= base_url() ?>undangan"><b>Undangan</b></a>
                                </li>
                                <li <?= $this->uri->segment(1) == 'about' ? 'class="active"' : 'class=""' ?>>
                                    <a href="<?= base_url() ?>about"><b>About</b></a>
                                </li>
                                <?php if ($this->session->userdata('id') != null) { ?>
                                    <li>
                                        <div class="dropdown">
                                            <a type="button" class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Hi, <?= $this->session->userdata('nama') ?>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <a href="<?= base_url() ?>profile" class="dropdown-item" type="button">Profile</a>
                                                <a href="<?= base_url() ?>login/logout" class="dropdown-item" type="button">Logout</a>
                                            </div>
                                        </div>
                                    </li>
                                <?php } else { ?>
                                    <li><a href="<?= base_url() ?>login"><b>Login / Register</b></a></li>
                                <?php } ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>