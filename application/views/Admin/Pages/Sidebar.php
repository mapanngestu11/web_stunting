<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="<?php echo base_url() . "assets/Admin/"; ?>img/logo/logo_posyandu.png">
    </div>
    <div class="sidebar-brand-text mx-3">Website Stunting</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Informasi Balita
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
      aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>Balita</span>
    </a>
    <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Data Balita</h6>
        <a class="collapse-item" href="<?php echo base_url('Admin/Balita/') ?>">Data Balita</a>
        <a class="collapse-item" href="<?php echo base_url('Admin/Pengukuran/') ?>">Informasi Pengukuran</a>

      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="ui-colors.html">
      <i class="fas fa-fw fa-pen"></i>
      <span>Perubahan Data</span>
    </a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Informasi Tambahan
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
    aria-controls="collapsePage">
    <i class="fas fa-fw fa-users"></i>
    <span>Data User</span>
  </a>
  <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Data Kader</h6>
      <a class="collapse-item" href="<?php echo base_url('Admin/User/') ?>">Lihat Data User</a>
    </div>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link" href="charts.html">
    <i class="fas fa-fw fa-brush"></i>
    <span>Galeri</span>
  </a>
</li>
<hr class="sidebar-divider">
</ul>