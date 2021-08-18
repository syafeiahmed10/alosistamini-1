<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php /*echo $title; */ ?></title>
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        table td,
        table th {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        table tr td {
            font-size: 13px;
        }
    </style>
    <script type="text/javascript">
        var BASE_URL = "<?php echo base_url(); ?>";
    </script>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <!-- <i class="fas fa-database"></i> -->
                    <i><img width="60" src="<?php echo base_url('assets/img/logo_jawa_tengah_icon.ico') ?>" alt=""></i>
                </div>
                <div class="sidebar-brand-text mx-3">Alosista PKP<sup>V2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($this->uri->segment(1) == "dashboard") {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data PKP
            </div>

            <!-- Nav Item - Perumahan Collapse Menu -->
            <li class="nav-item <?php if ($this->uri->segment(1) == "perumahan__rtlh" || $this->uri->segment(1) == "perumahan__pembangunan_rumah" || $this->uri->segment(1) == "perumahan__spm" || $this->uri->segment(1) == "perumahan__kepemilikan_rumah") {
                                    echo "active";
                                } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerumahan" aria-expanded="true" aria-controls="collapsePerumahan">

                    <i class="fas fa-home"></i>
                    <span>Perumahan</span>
                </a>
                <div id="collapsePerumahan" class="collapse <?php if ($this->uri->segment(1) == "perumahan__rtlh" || $this->uri->segment(1) == "perumahan__pembangunan_rumah" || $this->uri->segment(1) == "perumahan__spm" || $this->uri->segment(1) == "perumahan__kepemilikan_rumah") {
                                                                echo "show";
                                                            } ?>" aria-labelledby="headingPerumahan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Perumahan:</h6>
                        <a class="collapse-item <?php if ($this->uri->segment(1) == "perumahan__rtlh") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url('perumahan__rtlh'); ?>">RTLH</a>
                        <a class="collapse-item <?php if ($this->uri->segment(1) == "perumahan__pembangunan_rumah") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url('perumahan__pembangunan_rumah'); ?>">Pembangunan Rumah</a>
                        <a class="collapse-item <?php if ($this->uri->segment(1) == "perumahan__spm") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url('perumahan__spm'); ?>">SPM</a>
                        <a class="collapse-item <?php if ($this->uri->segment(1) == "perumahan__kepemilikan_rumah") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url('perumahan__kepemilikan_rumah'); ?>">Kepemilikan Rumah</a>

                        <a class="collapse-item" href="#">Under Development</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Kawasan Permukiman Collapse Menu -->
            <li class="nav-item <?php if ($this->uri->segment(1) == "kawasan__surat_keterangan_kumuh" || $this->uri->segment(1) == "kawasan__lokasi_kumuh" || $this->uri->segment(1) == "kawasan__penanganan_lokasi_kumuh") {
                                    echo "active";
                                } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKawasanPermukiman" aria-expanded="true" aria-controls="collapseKawasanPermukiman">
                    <i class="fas fa-globe-asia"></i>
                    <span>Kawasan Permukiman</span>
                </a>
                <div id="collapseKawasanPermukiman" class="collapse <?php if ($this->uri->segment(1) == "kawasan__surat_keterangan_kumuh" || $this->uri->segment(1) == "kawasan__lokasi_kumuh" || $this->uri->segment(1) == "kawasan__penanganan_lokasi_kumuh") {
                                                                        echo "show";
                                                                    } ?>" aria-labelledby=" headingKawasanPermukiman" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kawasan Permukiman:</h6>
                        <a class="collapse-item <?php if ($this->uri->segment(1) == "kawasan__surat_keterangan_kumuh") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url('kawasan_permukiman/surat_keterangan_kumuh'); ?>">SK Kumuh</a>
                        <a class="collapse-item <?php if ($this->uri->segment(1) == "kawasan__lokasi_kumuh") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url('kawasan_permukiman/lokasi_kumuh'); ?>">Lokasi Kumuh</a>
                        <a class="collapse-item <?php if ($this->uri->segment(1) == "kawasan__penanganan_lokasi_kumuh") {
                                                    echo "active";
                                                } ?>" href="<?php echo base_url('kawasan_permukiman/penanganan_kumuh'); ?>">Penanganan Kumuh</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>

            </div>


        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php /*echo $this->session->userdata('username');*/ ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/undraw_profile.svg') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $title ?></h6>
                        </div>
                        <div class="card-body">
                            <!-- sa -->
                            <section class="content">
                                <?php
                                if (isset($_view) && $_view)
                                    $this->load->view($_view);
                                ?>
                            </section>
                            <!-- sa -->
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Modal Import -->
            <div class="modal fade" id="modalimport" tabindex="-1" role="dialog" aria-labelledby="modalimportLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('perumahan/helper_perumahan/import') ?>">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalimportLabel">Import Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="berkas_excel">
                                    <div class="form-group">
                                        <input value="<?php echo $this->uri->segment(2) ?>" type="hidden" name="path" id="path">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="import" id="import" class="btn btn-primary">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Disperakim <?php echo date("Y"); ?> </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets/js/demo/chart-area-demo.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/demo/chart-bar-demo.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/myChart/luasKawasan.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/demo/chart-pie-demo.js') ?>"></script>


    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>assets/js/demo/datatables.js"></script>



    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo base_url('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('#select-all').click(function() {
                $('input[type="checkbox"]').prop('checked', this.checked);
            })
        });
    </script>


</body>

</html>