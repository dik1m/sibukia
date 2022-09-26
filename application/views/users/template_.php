<!DOCTYPE html>
<html lang="en">

<head>
    <title>desapegundan</title>
    <meta name="description" content="DataTables | Nura Admin">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Your website">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/backend/images/favicon.ico">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url(); ?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="<?= base_url(); ?>assets/backend/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/backend/css/style.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/backend/plugins/datatables/datatables.min.css" />
    <style>
        tfoot {
            display: table-header-group;
        }
    </style>
    <!-- END CSS for this page -->
    <!-- ckeditor -->
    <script src="<?= base_url() ?>assets/backend/ckeditor/ckeditor.js"></script>
    <!-- daerah -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax_daerah.js"></script>
    <!-- //daerah -->
</head>

<body class="adminbody">

    <div id="main">

        <!-- top bar navigation -->
        <div class="headerbar">

            <!-- LOGO -->
            <div class="headerbar-left">
                <a href="index.html" class="logo">
                    <img alt="Logo" src="<?= base_url(); ?>assets/backend/images/logo.png" />
                    <span>DESA PEGUNDAN</span>
                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="list-inline float-right mb-0">

                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <img src="<?= base_url('assets/img_penduduk/' . $user['img_peop']) ?>" alt="Profile image" class="avatar-rounded">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow">
                                    <small><?= $user['nm_peop'] ?></small>
                                </h5>
                            </div>

                            <!-- item-->
                            <a href="<?= site_url('users/Profil/edit/' . $user['no_ktp']) ?>" class="dropdown-item notify-item">
                                <i class="fas fa-user"></i>
                                <span>Akun Saya</span>
                            </a>

                            <a href="<?= site_url('users/Profil/changepswd/' . $user['no_ktp']) ?>" class="dropdown-item notify-item">
                                <i class="fas fa-user"></i>
                                <span>Ubah Password</span>
                            </a>

                            <!-- item-->
                            <a href="<?= site_url('users/Auth/logout') ?>" class="dropdown-item notify-item">
                                <i class="fas fa-power-off"></i>
                                <span>Keluar</span>
                            </a>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fas fa-bars"></i>
                        </button>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- End Navigation -->

        <!-- Left Sidebar -->
        <div class="left main-sidebar">

            <div class="sidebar-inner leftscroll">

                <div id="sidebar-menu">

                    <ul>

                        <li class="submenu">
                            <a href="<?= site_url('users/Home') ?>">
                                <i class="fas fa-home"></i>
                                <span> Beranda </span>
                            </a>
                        </li>


                        <li class="submenu">
                            <a href="<?= site_url('users/Profil/show/' . $user['no_ktp']) ?>">
                                <i class="fas fa-user"></i>
                                <span> Data User </span>
                            </a>
                        </li>


                        <li class="submenu">
                            <a id="tables" href="#">
                                <i class="fas fa-table"></i>
                                <span> Data Pengajuan </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="<?= site_url('users/Pengajuan') ?>">Data Pengajuan</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('Pengajuan/selesai') ?>">Pengajuan Selesai</a>
                                </li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="<?= site_url('users/Auth/logout') ?>">
                                <i class="fas fa-power-off"></i>
                                <span> Logout </span>
                            </a>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

            </div>

        </div>
        <!-- End Sidebar -->

        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left"> <?= $judul ?> </h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><?= $judul ?></li>
                                    <li class="breadcrumb-item active"><?= $sub ?></li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">

                        <!--isi content-->
                        <?= $contents ?>
                        <!--end isi content-->

                    </div>
                    <!-- end row-->

                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

        <footer class="footer">
            <span class="text-right">
                Copyright <a target="_blank" href="#">Your Company</a>
            </span>
            <span class="float-right">
                <!-- Copyright footer link MUST remain intact if you download free version. -->
                <!-- You can delete the links only if you purchased the pro or extended version. -->
                <!-- Purchase the pro or extended version with PHP version of this template: https://bootstrap24.com/template/nura-admin-4-free-bootstrap-admin-template -->

            </span>
        </footer>

        <script src="<?= base_url(); ?>assets/backend/js/modernizr.min.js"></script>
        <script src="<?= base_url(); ?>assets/backend/js/jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/backend/js/moment.min.js"></script>

        <script src="<?= base_url(); ?>assets/backend/js/popper.min.js"></script>
        <script src="<?= base_url(); ?>assets/backend/js/bootstrap.min.js"></script>

        <script src="<?= base_url(); ?>assets/backend/js/detect.js"></script>
        <script src="<?= base_url(); ?>assets/backend/js/fastclick.js"></script>
        <script src="<?= base_url(); ?>assets/backend/js/jquery.blockUI.js"></script>
        <script src="<?= base_url(); ?>assets/backend/js/jquery.nicescroll.js"></script>

        <!-- App js -->
        <script src="<?= base_url(); ?>assets/backend/js/admin.js"></script>

    </div>
    <!-- END main -->

    <!-- BEGIN Java Script for this page -->
    <script src="<?= base_url(); ?>assets/backend/plugins/datatables/datatables.min.js"></script>
    <!-- dataTabled data -->
    <script src="<?= base_url(); ?>assets/backend/data/data_datatables.js"></script>
    <script>
        $(document).on('ready', function() {
            var table = $('#dataTable').DataTable({
                //data: dataSet
            });
        });
    </script>
    <!-- END Java Script for this page -->

    <!-- message -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#notice').hide();
            <?php if ($this->session->flashdata('message_true')) { ?>
                $('#notice').fadeIn(2000);
                $('#notice').addClass('alert-success');
                $('#pesan').html('<?= $this->session->flashdata('message_true'); ?>');
                $('#notice').delay(2000).fadeOut(2000);
            <?php } elseif ($this->session->flashdata('message_false')) { ?>
                $('#notice').fadeIn(2000);
                $('#notice').addClass('alert-danger');
                $('#pesan').html('<?= $this->session->flashdata('message_false'); ?>');
                $('#notice').delay(2000).fadeOut(2000);
            <?php } ?>
        });
    </script>
    <!-- end message -->

    <!--Hanya Angka HTML-->
    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>
    <!--End Hanya Angka HTML-->

    <!--Auto Focus-->
    <script type="text/javascript">
        document.myform.myinput.focus();
    </script>
    <!--End Auto Focus-->

</body>

</html>