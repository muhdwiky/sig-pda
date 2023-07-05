<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGPDA | <?= $judul ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/fontawesome-free/css/all.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/daterangepicker/daterangepicker.css">

    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/dist/css/adminlte.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Plugin Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('template') ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url('template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- date-range-picker -->
    <script src="<?= base_url('template') ?>/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- bs-custom-file-input -->
    <script src="<?= base_url('template') ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <!-- bootstrap color picker -->
    <script src="<?= base_url('template') ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

    <!-- Select2 -->
    <script src="<?= base_url('template') ?>/plugins/select2/js/select2.full.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?= base_url('template') ?>/dist/js/adminlte.min.js"></script>
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
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('Admin') ?>" class="brand-link">
                <img src="<?= base_url('template') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIGPDA</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('template') ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-close">
                            <a href="<?= base_url('Admin') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                            <!-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Active Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inactive Page</p>
                                    </a>
                                </li>
                            </ul> -->
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('PetaLokasi') ?>" class="nav-link <?= $menu == 'peta_lokasi' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-store"></i>
                                <p>
                                    Peta Lokasi Toko
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('RiwayatAbsensi') ?>" class="nav-link <?= $menu == 'riwayat_absensi' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-history"></i>
                                <p>
                                    Riwayat Absensi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('CatatanDistribusi') ?>" class="nav-link <?= $menu == 'catatan_distribusi' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>
                                    Catatan Distribusi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('DaftarPengguna') ?>" class="nav-link <?= $menu == 'daftar_pengguna' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Daftar Pengguna
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Wilayah') ?>" class="nav-link <?= $menu == 'wilayah' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-layer-group"></i>
                                <p>
                                    Wilayah
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/Pengaturan') ?>" class="nav-link <?= $menu == 'pengaturan' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Pengaturan
                                </p>
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 class="m-0"><?= $judul ?></h4>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <!-- Main content -->
            <div class="content">

                <!-- ISI KONTEN -->
                <?php
                if ($isi) {
                    echo view($isi);
                }
                ?>

            </div>
            <!-- /.content -->


        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
</body>

</html>