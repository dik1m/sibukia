<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sibukia</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/img_icon/img_icon.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/ionicons-2.0.1/css/ionicons.min.css">
    <!-- ckeditor -->
    <script src="<?= base_url() ?>assets/backend/ckeditor/ckeditor.js"></script>
    <!-- daerah -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax_daerah.js"></script>
    <!-- //daerah -->

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo site_url('Home') ?>" class="nav-link">Beranda</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <b><img src="<?php echo base_url(); ?>assets/img_icon/img_icon1.png" alt="logo"></b>
                <span class="brand-text font-weight-light"><img src="<?php echo base_url(); ?>assets/img_icon/img_icon2.png" alt="logo"></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/img_kia/' .  $user['img_kia']) ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= site_url('users/Profil/edit/' . $user['no_kia']) ?>" class="d-block" title="Profil User"><?= $user['nmibu_kia'] ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="<?= site_url('users/Home') ?>" class="nav-link"><i class="nav-icon far fa fa-home"></i>
                                <p>Beranda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('users/DataUser') ?>" class="nav-link"><i class="nav-icon far fa fa-user"></i>
                                <p>Data User</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?php echo site_url('#') ?>" class="nav-link">
                                <i class="nav-icon fas fa fa-heartbeat"></i>
                                <p>
                                    Catatan Kesehatan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('Bidang') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Catatan Ibu Hamil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('SubBidang') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Catatan Anak</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('SumBiaya') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Catatan Imunisasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('Kegiatan') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Catatan Vitamin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('Kegiatan') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sertifikat Imunisasi</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('users/Auth/logout') ?>" class="nav-link"><i class="nav-icon far fa fa-power-off"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?php echo $judul ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active"><?php echo $judul ?></li>
                                <li class="breadcrumb-item active"><?php echo $sub ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!--isi content-->
                        <?php echo $contents ?>
                        <!--end isi content-->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                www.sibukia.com
            </div>

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/backend/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url(); ?>assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/backend/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/backend/dist/js/demo.js"></script>
    <!-- Page specific script -->

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
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


        /*digunakan untuk menyembunyikan form tanggal, bulan dan tahun saat halaman di load */
        $(document).ready(function() {
            $("#tanggalfilter").hide();
            $("#tahunfilter").hide();
            $("#bulanfilter").hide();
            $("#cardbayar").hide();
        });
    </script>
    <!-- end message -->
</body>

</html>