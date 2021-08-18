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
    <li class="nav-item <?php if ($this->uri->segment(1) == "perumahan") {
                            echo "active";
                        } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerumahan" aria-expanded="true" aria-controls="collapsePerumahan">

            <i class="fas fa-home"></i>
            <span>Perumahan</span>
        </a>
        <div id="collapsePerumahan" class="collapse <?php if ($this->uri->segment(1) == "perumahan") {
                                                        echo "show";
                                                    } ?>" aria-labelledby="headingPerumahan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Perumahan:</h6>
                <a class="collapse-item <?php if ($this->uri->segment(2) == "rtlh") {
                                            echo "active";
                                        } ?>" href="<?php echo base_url('perumahan__rtlh'); ?>">RTLH</a>
                <a class="collapse-item <?php if ($this->uri->segment(2) == "pembangunan_rumah") {
                                            echo "active";
                                        } ?>" href="<?php echo base_url('perumahan__pembangunan_rumah'); ?>">Pembangunan Rumah</a>
                <a class="collapse-item <?php if ($this->uri->segment(2) == "spm") {
                                            echo "active";
                                        } ?>" href="<?php echo base_url('perumahan__spm'); ?>">SPM</a>
                <a class="collapse-item <?php if ($this->uri->segment(2) == "kepemilikan_rumah") {
                                            echo "active";
                                        } ?>" href="<?php echo base_url('perumahan__kepemilikan_rumah'); ?>">Kepemilikan Rumah</a>

                <a class="collapse-item" href="#">Under Development</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Kawasan Permukiman Collapse Menu -->
    <li class="nav-item <?php if ($this->uri->segment(1) == "kawasan_permukiman") {
                            echo "active";
                        } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKawasanPermukiman" aria-expanded="true" aria-controls="collapseKawasanPermukiman">
            <i class="fas fa-globe-asia"></i>
            <span>Kawasan Permukiman</span>
        </a>
        <div id="collapseKawasanPermukiman" class="collapse <?php if ($this->uri->segment(1) == "kawasan_permukiman") {
                                                                echo "show";
                                                            } ?>" aria-labelledby=" headingKawasanPermukiman" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kawasan Permukiman:</h6>
                <a class="collapse-item <?php if ($this->uri->segment(2) == "surat_keterangan_kumuh") {
                                            echo "active";
                                        } ?>" href="<?php echo base_url('kawasan_permukiman/surat_keterangan_kumuh'); ?>">SK Kumuh</a>
                <a class="collapse-item <?php if ($this->uri->segment(2) == "lokasi_kumuh") {
                                            echo "active";
                                        } ?>" href="<?php echo base_url('kawasan_permukiman/lokasi_kumuh'); ?>">Lokasi Kumuh</a>
                <a class="collapse-item <?php if ($this->uri->segment(2) == "penanganan_kumuh") {
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