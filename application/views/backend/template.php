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
                        <img src="<?= base_url('assets/img_user/' .  $user['img_user']) ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= site_url('backend/User/edit/' . $user['kd_user']) ?>" class="d-block" title="Profil User"><?= $user['nm_user'] ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="<?= site_url('backend/Home') ?>" class="nav-link"><i class="nav-icon far fa fa-home"></i>
                                <p>Beranda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa fa-retweet"></i>
                                <p>
                                    Pengaturan Website
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backend/Umur') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Umur</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backend/Imunisasi') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Imunisasi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="<?= site_url('backend/User') ?>" class="nav-link"><i class="nav-icon far fa fa-user"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('backend/TenagaKes') ?>" class="nav-link"><i class="nav-icon fa fa-stethoscope"></i>
                                <p>Tenaga Kesehatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('backend/Buku') ?>" class="nav-link"><i class="nav-icon fas fa-book"></i>
                                <p>Buku KIA</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('backend/Kia') ?>" class="nav-link"><i class="nav-icon far fa fa-users"></i>
                                <p>Ibu & Anak</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Posyandu
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backend/Posyandu') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Posyandu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backend/Umur') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Umur</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backend/Imunisasi') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Imunisasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backend/Posyandu/all') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kegiatan Posyandu</p>
                                    </a>
                                </li>

                            </ul>
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
                                    <a href="<?php echo site_url('backend/CttIbuHamil') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Catatan Ibu Hamil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backend/CttAnak') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Catatan Anak</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backend/CttImunisasi') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Catatan Imunisasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('Kegiatan') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sertifikat Imunisasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backend/Note/selesai') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Buku Kia Selesai</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-newspaper"></i>
                                <p>
                                    Publikasi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backend/Kategori') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backend/Berita') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Berita</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('backend/Artikel') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Artikel</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Laporan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo site_url('Perangkat/cetak') ?>" class="nav-link" target='_blank'>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Perangkat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('Admin/cetak') ?>" class="nav-link" target='_blank'>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('RptKegiatan') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kegiatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('RptRealisasi') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Realisasi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('backend/Auth/logout') ?>" class="nav-link"><i class="nav-icon far fa fa-power-off"></i>
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

                    <!--isi content-->
                    <?php echo $contents ?>
                    <!--end isi content-->

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