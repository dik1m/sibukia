<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>sibukia</title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/img_icon/img_icon.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/style.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Breaking News Area -->
                            <div class="top-breaking-news-area">
                                <div id="breakingNewsTicker" class="ticker">
                                    <!-- pesan singkat -->
                                    <ul>
                                        <li><a href="#">Memantau atau melakukan pelayanan imunisasi</a></li>
                                        <li><a href="#">Pengertian Posyandu adalah kegiatan kesehatan dasar</a></li>
                                        <li><a href="#">diselenggarakan dari, oleh dan untuk masyarakat</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="viral-news-main-menu" id="stickyMenu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="viralnewsNav">

                        <!-- Logo -->
                        <table>
                            <tr>
                                <td><img src="<?= base_url(); ?>assets/img_icon/img_icon.png" alt="Logo"></td>
                                <td><b>Kementrian Kesehatan</b> <br> <small>Republik Indonesia</small>
                                </td>
                            </tr>
                        </table>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="<?php echo site_url('') ?>">Beranda</a></li>
                                    <!-- <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="catagory.html">Catagories</a></li>
                                            <li><a href="single-post.html">Single Article</a></li>
                                            <li><a href="quize-article.html">Quize Article</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="#">Dropdown</a>
                                                <ul class="dropdown">
                                                    <li><a href="#">Home</a></li>
                                                    <li><a href="catagory.html">Catagories</a></li>
                                                    <li><a href="single-post.html">Single Article</a></li>
                                                    <li><a href="quize-article.html">Quize Article</a></li>
                                                    <li><a href="contact.html">Contact</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> -->

                                    <li><a href="<?php echo site_url('Berita') ?>">Berita</a></li>
                                    <li><a href="<?php echo site_url('Berita') ?>">Artiket</a></li>
                                    <li><a href="<?php echo site_url('Page/profil') ?>">Info Posyandu</a></li>
                                    <li><a href="<?php echo site_url('Page/profil') ?>">Tentang Kami</a></li>


                                </ul>

                                <!-- Video Post Button -->
                                <div class="add-post-button">
                                    <a href="<?php echo site_url('users/Auth') ?>" class="btn add-post-btn">Login</a>
                                </div>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-slides owl-carousel">
                        <!-- Single Blog Post -->
                        <?php
                        $no = 1;
                        foreach ($newsterkini->result_array() as $row) {
                        ?>
                            <div class="single-blog-post d-flex align-items-center mb-50">
                                <div class="post-thumb">
                                    <a href="#"><img src="<?php echo base_url('assets/img_berita/small/' . $row['img_berita']) ?>" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-title">
                                        <h6><?php echo $row['judul_berita'] ?></h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-date"><a href="#"><?php echo $row['tgl_berita'] ?></a></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Welcome Slide Area Start ##### -->
    <div class="welcome-slide-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="welcome-slides owl-carousel">

                        <!-- Single Welcome Slide -->
                        <div class="single-welcome-slide">
                            <div class="row no-gutters">
                                <?php
                                $no = 1;
                                foreach ($newshead1->result_array() as $row) {
                                ?>
                                    <div class="col-12 col-lg-8">
                                        <!-- Welcome Post -->
                                        <div class="welcome-post">
                                            <img src="<?php echo base_url('assets/img_berita/large/' . $row['img_berita']) ?>" alt="">
                                            <div class="post-content" data-animation="fadeInUp" data-duration="500ms">
                                                <a href="<?php echo site_url('BeritaUsr/readmore/' . $row['id_berita']) ?>" class="post-title"><?php echo $row['judul_berita'] ?></a>
                                                <p><?php echo $row['tgl_berita'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="col-12 col-lg-4">
                                    <div class="welcome-posts--">
                                        <!-- Welcome Post -->
                                        <?php
                                        $no = 1;
                                        foreach ($newshead2->result_array() as $row) {
                                        ?>
                                            <div class="welcome-post style-2">
                                                <img src="<?php echo base_url('assets/img_berita/medium/' . $row['img_berita']) ?>" alt="">
                                                <div class="post-content" data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">
                                                    <a href="<?php echo site_url('BeritaUsr/readmore/' . $row['id_berita']) ?>" class="post-title"><?php echo $row['judul_berita'] ?></a>
                                                    <p><?php echo $row['tgl_berita'] ?></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!-- Welcome Post -->
                                        <?php
                                        $no = 1;
                                        foreach ($newshead3->result_array() as $row) {
                                        ?>
                                            <div class="welcome-post style-2">
                                                <img src="<?php echo base_url('assets/img_berita/medium/' . $row['img_berita']) ?>" alt="">
                                                <div class="post-content" data-animation="fadeInUp" data-delay="750ms" data-duration="500ms">
                                                    <a href="<?php echo site_url('BeritaUsr/readmore/' . $row['id_berita']) ?>" class="post-title"><?php echo $row['judul_berita'] ?></a>
                                                    <p><?php echo $row['tgl_berita'] ?></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Welcome Slide -->
                        <div class="single-welcome-slide">
                            <div class="row no-gutters">
                                <?php
                                $no = 1;
                                foreach ($newshead1->result_array() as $row) {
                                ?>
                                    <div class="col-12 col-lg-8">
                                        <!-- Welcome Post -->
                                        <div class="welcome-post">
                                            <img src="<?php echo base_url('assets/img_berita/large/' . $row['img_berita']) ?>" alt="">
                                            <div class="post-content" data-animation="fadeInUp" data-duration="500ms">
                                                <a href="<?php echo site_url('BeritaUsr/readmore/' . $row['id_berita']) ?>" class="post-title"><?php echo $row['judul_berita'] ?></a>
                                                <p><?php echo $row['tgl_berita'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="col-12 col-lg-4">
                                    <div class="welcome-posts--">
                                        <!-- Welcome Post -->
                                        <?php
                                        $no = 1;
                                        foreach ($newshead2->result_array() as $row) {
                                        ?>
                                            <div class="welcome-post style-2">
                                                <img src="<?php echo base_url('assets/img_berita/medium/' . $row['img_berita']) ?>" alt="">
                                                <div class="post-content" data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">
                                                    <a href="<?php echo site_url('BeritaUsr/readmore/' . $row['id_berita']) ?>" class="post-title"><?php echo $row['judul_berita'] ?></a>
                                                    <p><?php echo $row['tgl_berita'] ?></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!-- Welcome Post -->
                                        <?php
                                        $no = 1;
                                        foreach ($newshead3->result_array() as $row) {
                                        ?>
                                            <div class="welcome-post style-2">
                                                <img src="<?php echo base_url('assets/img_berita/medium/' . $row['img_berita']) ?>" alt="">
                                                <div class="post-content" data-animation="fadeInUp" data-delay="750ms" data-duration="500ms">
                                                    <a href="<?php echo site_url('BeritaUsr/readmore/' . $row['id_berita']) ?>" class="post-title"><?php echo $row['judul_berita'] ?></a>
                                                    <p><?php echo $row['tgl_berita'] ?></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Welcome Slide Area End ##### -->

    <!-- ##### Blog Post Area Start ##### -->
    <div class="viral-story-blog-post section-padding-0-50">
        <div class="container">
            <div class="row">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <!--isi content-->
                        <?= $contents ?>
                        <!--end isi content-->

                    </div>

                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="viral-news-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">01</a></li>
                                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                                        <li class="page-item"><a class="page-link" href="#">04</a></li>
                                        <li class="page-item"><a class="page-link" href="#">05</a></li>
                                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link" href="#">15</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div> -->
                </div>

                <!-- Sidebar Area -->
                <div class="col-12 col-lg-4">
                    <div class="sidebar-area">
                        <div class="treading-articles-widget mb-70">
                            <h4>Berita Terkini</h4>
                            <!-- berita terkini -->
                            <?php
                            $no = 1;
                            foreach ($newsterkini->result_array() as $row) {
                            ?>
                                <div class="single-blog-post style-2 d-flex align-items-center">
                                    <div class="post-thumb">
                                        <a href="<?php echo site_url('Berita/readmore/' . $row['id_berita']) ?>"><img src="<?php echo base_url('assets/img_berita/small/' . $row['img_berita']) ?>" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="<?php echo site_url('Berita/readmore/' . $row['id_berita']) ?>" class="post-title">
                                            <h6><?php echo $row['judul_berita'] ?></h6>
                                        </a>
                                        <div class="post-meta">
                                            <p class="post-date"><a href="#"><?php echo $row['tgl_berita'] ?></a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                            <!-- iklan -->
                            <div class="add-widget mb-70">
                                <a href="#"><img src="<?= base_url(); ?>assets/img_icon/add.png" alt=""></a>
                            </div>

                            <h4>Artikel Terkini</h4>
                            <!-- artikel -->
                            <?php
                            $no = 1;
                            foreach ($newsterkini->result_array() as $row) {
                            ?>
                                <div class="single-blog-post style-2 d-flex align-items-center">
                                    <div class="post-thumb">
                                        <a href="<?php echo site_url('Berita/readmore/' . $row['id_berita']) ?>"><img src="<?php echo base_url('assets/img_berita/small/' . $row['img_berita']) ?>" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="<?php echo site_url('Berita/readmore/' . $row['id_berita']) ?>" class="post-title">
                                            <h6><?php echo $row['judul_berita'] ?></h6>
                                        </a>
                                        <div class="post-meta">
                                            <p class="post-date"><a href="#"><?php echo $row['tgl_berita'] ?></a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Post Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">

        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="footer-widget-area">
                            <!-- Footer Logo -->
                            <div class="footer-logo">
                                <table>
                                    <tr>
                                        <td align="center">
                                            <img src="<?= base_url(); ?>assets/img_icon/img_icon.png" width="70%" alt="Logo">
                                        </td>
                                    <tr>
                                        <td align="center">
                                            <b>Kementrian Kesehatan</b> <br> <small>Republik Indonesia</small>
                                        </td>
                                    </tr>


                                    </tr>
                                </table>
                            </div>
                            <!-- Footer Nav -->
                            <div class="footer-nav">
                                <ul>

                                    <li><a href="#">Beranda</a></li>
                                    <li><a href="#">Berita</a></li>
                                    <li><a href="#">Artikel</a></li>
                                    <li><a href="#">Info Posyandu</a></li>
                                    <li><a href="#">Tentang Kami</a></li>
                                    <li><a href="#">Login</a></li>


                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <!-- Newsletter Widget -->
                        <div class="footer-widget-area">
                            <!-- Widget Title -->
                            <h4 class="widget-title">Berita</h4>
                            <?php
                            $no = 1;
                            foreach ($newsfooter->result_array() as $row) {
                            ?>
                                <!-- Single Latest Post -->
                                <div class="single-blog-post style-2 d-flex align-items-center">
                                    <div class="post-thumb">
                                        <a href="<?php echo site_url('Berita/readmore/' . $row['id_berita']) ?>"><img src="<?php echo base_url('assets/img_berita/small/' . $row['img_berita']) ?>" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="<?php echo site_url('Berita/readmore/' . $row['id_berita']) ?>" class="post-title">
                                            <h6><?php echo $row['judul_berita'] ?></h6>
                                        </a>
                                        <div class="post-meta">
                                            <p class="post-date"><a href="#"><?php echo $row['tgl_berita'] ?></a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="footer-widget-area">
                            <!-- Widget Title -->
                            <h4 class="widget-title">Artikel</h4>
                            <?php
                            $no = 1;
                            foreach ($newsfooter->result_array() as $row) {
                            ?>
                                <!-- Single Latest Post -->
                                <div class="single-blog-post style-2 d-flex align-items-center">
                                    <div class="post-thumb">
                                        <a href="<?php echo site_url('Berita/readmore/' . $row['id_berita']) ?>"><img src="<?php echo base_url('assets/img_berita/small/' . $row['img_berita']) ?>" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="<?php echo site_url('Berita/readmore/' . $row['id_berita']) ?>" class="post-title">
                                            <h6><?php echo $row['judul_berita'] ?></h6>
                                        </a>
                                        <div class="post-meta">
                                            <p class="post-date"><a href="#"><?php echo $row['tgl_berita'] ?></a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Copywrite -->
                        <p><a href="#">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?= base_url(); ?>assets/frontend/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?= base_url(); ?>assets/frontend/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= base_url(); ?>assets/frontend/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?= base_url(); ?>assets/frontend/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?= base_url(); ?>assets/frontend/js/active.js"></script>
</body>

</html>