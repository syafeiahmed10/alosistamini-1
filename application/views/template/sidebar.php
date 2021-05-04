<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-database"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Alosista<sup>mini</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kawasan</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Kawasan</h6>
                <a class="<?php if ($this->uri->segment(2) == "sk_kumuh" or $this->uri->segment(2) == "sk_kumuh_ubah" or $this->uri->segment(2) == "sk_kumuh_tambah") {
                                echo "active";
                            } ?> collapse-item" href="<?php echo base_url('user/sk_kumuh') ?>">SK Kumuh</a>
                <a class="<?php if ($this->uri->segment(2) == "lokasi_kumuh" or $this->uri->segment(2) == "lokasi_kumuh_ubah" or $this->uri->segment(2) == "lokasi_kumuh_tambah") {
                                echo "active";
                            } ?> collapse-item" href="<?php echo base_url('user/lokasi_kumuh') ?>">Lokasi Kumuh</a>
                <a class="<?php if ($this->uri->segment(2) == "penanganan_kumuh" or $this->uri->segment(2) == "penanganan_kumuh_ubah" or $this->uri->segment(2) == "penanganan_kumuh_tambah") {
                                echo "active";
                            } ?> collapse-item" href="<?php echo base_url('user/penanganan_kumuh') ?>">Penanganan Kumuh</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <!-- <div class="sidebar-card">
    <img class="sidebar-card-illustration mb-2" src="<?php echo base_url() ?>assets/img/undraw_rocket.svg" alt="">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div> -->

</ul>
<!-- End of Sidebar -->