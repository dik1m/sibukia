<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>desapegundan</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/frontend/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/core-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/responsive.css">

    <!-- daerah -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax_daerah.js"></script>
    <!-- //daerah -->

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="medica-load"></div>
        <img src="<?php echo base_url(); ?>assets/frontend/img/core-img/plus.png" alt="logo">
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Top Header Area -->

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 h-100">
                        <div class="main-menu h-100">
                            <nav class="navbar h-100 navbar-expand-lg">
                                <!-- Logo Area  -->
                                <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>assets/img_desa/pegundan.png" width="50%" alt="Logo"></a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medicaMenu" aria-controls="medicaMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>

                                <div class="collapse navbar-collapse" id="medicaMenu">
                                    <!-- Menu Area -->
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('') ?>">Beranda</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('Berita') ?>">Berita</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('Page/profil') ?>">Profil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('Page/kontak') ?>">Kontak</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layanan</a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <?php
                                                foreach ($layanan->result_array() as $row) {
                                                ?>
                                                    <a class="dropdown-item" href="<?php echo site_url('Layanan/infolayanan/' . $row['id_layanan']) ?>"><?php echo $row['nm_layanan'] ?></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </li>
                                        <!-- 
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  $this->session->userdata('nama_user'); ?></a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="<?php echo site_url('AkunUsr/akun/' . $this->session->userdata('id_user')) ?>">Akun Saya</a>
                                                <a class="dropdown-item" href="<?php echo site_url('AkunUsr/changepswd/' . $this->session->userdata('id_user')) ?>">Ubah Password</a>
                                                <a class="dropdown-item" href="<?php echo site_url('PengajuanUsr/read/' . $this->session->userdata('id_user')) ?>">Pengajuan</a>
                                                <a class="dropdown-item" href="<?php echo site_url('AuthUsr/logout') ?>">Keluar</a>

                                            </div>
                                        </li> -->


                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url('users/Auth') ?>">Masuk</a>
                                        </li>
                                    </ul>

                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Hero Area Start ***** -->
    <?php if ($this->uri->segment(1) == '') { ?>
        <section class="hero-area">
            <div class="hero-slides owl-carousel">
                <!-- Single Hero Slide -->
                <div class="single-hero-slide height-800 bg-img" style="background-image: url(<?php echo base_url(); ?>assets/img_desa/bg_desa01.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="hero-slides-content">
                                    <h2 data-animation="fadeInUp" data-delay="100ms">Selamat Datang<br></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Hero Slide -->
                <div class="single-hero-slide height-800 bg-img" style="background-image: url(<?php echo base_url(); ?>assets/img_desa/bg_desa02.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="hero-slides-content">
                                    <h2 data-animation="fadeInUp" data-delay="100ms">Di <br>Sistem Informasi</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Hero Slide -->
                <div class="single-hero-slide height-800 bg-img" style="background-image: url(<?php echo base_url(); ?>assets/img_desa/bg_desa03.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="hero-slides-content">
                                    <h2 data-animation="fadeInUp" data-delay="100ms">Layanan<br>Desa Pegundan</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    } else {
    ?>
        <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(img/bg-img/hero5.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="breadcumb-content">
                            <!-- Title -->
                            <h3 class="breadcumb-title"> <?php echo $judul ?> </h3>
                            <!-- Breadcumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><?php echo $judul ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $sub ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!-- ***** Hero Area End ***** -->

    <?php if ($this->uri->segment(1) == '') { ?>
        <!-- ***** Contact Info Area Start ***** -->
        <div class="medica-contact-info-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="contact-icon mr-30">
                                <img src="<?php echo base_url(); ?>assets/frontend/img/icons/alarm-clock.png" alt="">
                            </div>
                            <div class="contact-meta">
                                <p>Senin - Minggu 08:00 - 14:00 <br> Sabtu dan Minggu - Tutup</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="contact-icon mr-30">
                                <h2 font style="color: #2b89fd;"><i class="fa fa-whatsapp"></i></h2>
                            </div>
                            <div class="contact-meta">
                                <p><a target="_blank" href="https://api.whatsapp.com/send?phone=6282328500527&text=Hai...%20Admin">
                                        6282328500527</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="contact-icon mr-30">
                                <img src="<?php echo base_url(); ?>assets/frontend/img/icons/map-pin.png" alt="">
                            </div>
                            <div class="contact-meta">
                                <p>Jl. Kartini Desa Pegundan <br>Petarukan - Pemalang 52362</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Contact Info Area End ***** -->

        <!-- ***** About Us Area Start ***** -->

        <!-- About Contact -->
        <div class="medica-about-content section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="medica-about-text">
                            <h2>Selamat Datang Di Sistem Informasi Layanan Desa Pegundan</h2>
                            <p>
                            <h5> Halaman ini membantu Masyarakat Desa Pegundan dalam melakukan Pelayanan Desa, Khususnya bagi warga yang berlokasi jauh dari Desa Pegundan. Disini juga memuat berita terkini yang ada di Desa Pegundan dan sekitarnya</h5>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="medica-about-thumbnail">
                            <img src="<?php echo base_url(); ?>assets/frontend/img/bg-img/lurah.jpeg" width="60%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!-- ***** About Us Area End ***** -->


    <?php } ?>

    <section class="medica-blog-area section_padding_100">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-8">
                    <!-- Single Blog Area Start  -->
                    <!--isi content-->
                    <?php echo $contents ?>
                    <!--end isi content-->

                </div>

                <div class="col-12 col-lg-4">
                    <div class="medica-blog-sidebar-area">
                        <!-- Medica Emergency Card -->
                        <div class="medica-emergency-card">
                            <h5>Kontak Admin</h5>
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=6282328500527&text=Hai%20Admin" title="langsung wa admin">
                                <h4><i class="fa fa-whatsapp"></i> whatsapp</h4>
                            </a>
                            <p class="mb-0">Silahkan Hubungi Admin Apabila ada sesuatu yang ingin ditanyakan</p>
                        </div>
                        <!-- Medica Doctors Card -->
                        <div class="medica-catagories-card px-0">
                            <h5>Kategori</h5>
                            <ul class="catagories-menu">
                                <?php
                                foreach ($kategori->result_array() as $row) {
                                ?>
                                    <li><a href="<?php echo site_url('Berita/newskategori/' . $row['id_kategori']) ?>"><?php echo $row['nm_kategori'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- Latest News -->
                        <div class="latest-news-widget-area px-0">
                            <h5>Berita Terkini</h5>
                            <div class="widget-blog-post">
                                <!-- Single Blog Post -->
                                <?php
                                $no = 1;
                                foreach ($newsterkini->result_array() as $row) {
                                ?>
                                    <div class="widget-single-blog-post d-flex">
                                        <div class="widget-post-thumbnail pr-2">
                                            <img src="<?php echo base_url('assets/img_berita/small/' . $row['img_berita']) ?>" alt="">
                                        </div>
                                        <div class="widget-post-content">
                                            <a href="<?php echo site_url('Berita/readmore/' . $row['id_berita']) ?>" class="text-default"><?php echo $row['judul_berita'] ?></a>
                                            <p><?php echo $row['tgl_berita'] ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- Single Blog Post -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area">
        <!-- Main Footer Area -->
        <div class="main-footer-area section_padding_100 bg-default">
            <div class="container">
                <div class="row">
                    <div class="footer-widget-area">
                        <div class="footer-logo">
                            <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>assets/img_desa/pegundan.png" width="50%" alt="Logo"></a>
                            <p>
                            <h5 font style="color: #fff;">Terimakasih Telah Mengakses halaman SILADES - Sistem Informasi Layanan Desa Pegundan.</h5>
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- jQuery (Necessary for All JavaScript Plugins) -->
                <script src="<?php echo base_url(); ?>assets/frontend/js/jquery/jquery-2.2.4.min.js"></script>
                <!-- Popper js -->
                <script src="<?php echo base_url(); ?>assets/frontend/js/popper.min.js"></script>
                <!-- Bootstrap js -->
                <script src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
                <!-- Plugins js -->
                <script src="<?php echo base_url(); ?>assets/frontend/js/plugins.js"></script>
                <!-- Active js -->
                <script src="<?php echo base_url(); ?>assets/frontend/js/active.js"></script>

                <!-- message -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#notice').hide();
                        <?php if ($this->session->flashdata('message_true')) { ?>
                            $('#notice').fadeIn(2000);
                            $('#notice').addClass('alert-success');
                            $('#pesan').html('<?php echo $this->session->flashdata('message_true'); ?>');
                            $('#notice').delay(2000).fadeOut(2000);
                        <?php } elseif ($this->session->flashdata('message_false')) { ?>
                            $('#notice').fadeIn(2000);
                            $('#notice').addClass('alert-danger');
                            $('#pesan').html('<?php echo $this->session->flashdata('message_false'); ?>');
                            $('#notice').delay(2000).fadeOut(2000);
                        <?php } ?>
                    });
                </script>
                <!-- end-message -->

</body>

</html>