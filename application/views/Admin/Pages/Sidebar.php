<?php
$hak_akses = $this->session->userdata('hak_akses');


if($hak_akses == 'Admin') {
  $bg_navbar_color = 'bg-blue';
} elseif($hak_akses == 'Bidan') {
  $bg_navbar_color = 'bg-red';
}elseif($hak_akses == 'Kader'){
  $bg_navbar_color = 'bg-green';
}else{
  $bg_navbar_color = 'bg-yellow';

}
?>

<style type="text/css">
  .bg-blue{
    background-color: #6777ef !important;
  }
  .bg-red{
    background-color: #da4848 !important;
  }
  .bg-green{
    background-color: #35a442 !important;
  }
  .bg-yellow{
    background-color: #bcc42e !important;
  }
</style>

<?php if($this->session->userdata('hak_akses')==='Admin' ):?> 
  <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center <?php echo $bg_navbar_color;?> justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <img src="<?php echo base_url() . "assets/Admin/"; ?>img/logo/logo_posyandu.png">
      </div>
      <?php $hak_akses =  $this->session->userdata('hak_akses');?>

      <div class="sidebar-brand-text mx-3"><?php echo $hak_akses;?></div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url('Admin/Homepage/') ?>">
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
      <a class="nav-link" href="<?php echo base_url('Admin/Perubahan/') ?>">
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
        <h6 class="collapse-header">Data User</h6>
        <a class="collapse-item" href="<?php echo base_url('Admin/User/') ?>">Lihat Data User</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Admin/Rumus/') ?>">
      <i class="fas fa-fw fa-pen"></i>
      <span>Informasi Rumus</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Admin/Laporan/') ?>">
      <i class="fas fa-fw fa-folder"></i>
      <span>Data Laporan</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Admin/Galeri/') ?>">
      <i class="fas fa-fw fa-brush"></i>
      <span>Galeri</span>
    </a>
  </li>
  <hr class="sidebar-divider">
</ul>
<?php elseif($this->session->userdata('hak_akses')==='Bidan'):?> 
  <ul class="navbar-nav sidebar sidebar-light  accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center <?php echo $bg_navbar_color;?> justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <img src="<?php echo base_url() . "assets/Admin/"; ?>img/logo/logo_posyandu.png">
      </div>
      <?php $hak_akses =  $this->session->userdata('hak_akses');?>

      <div class="sidebar-brand-text mx-3"><?php echo $hak_akses;?></div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url('Admin/Homepage/') ?>">
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

          <a class="collapse-item" href="<?php echo base_url('Admin/Pengukuran/') ?>">Informasi Pengukuran</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('Admin/Perubahan/') ?>">
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
        <h6 class="collapse-header">Data User</h6>
        <a class="collapse-item" href="<?php echo base_url('Admin/User/') ?>">Lihat Data User</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Admin/Rumus/') ?>">
      <i class="fas fa-fw fa-pen"></i>
      <span>Informasi Rumus</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Admin/Laporan/') ?>">
      <i class="fas fa-fw fa-folder"></i>
      <span>Data Laporan</span>
    </a>
  </li>
  <li class="nav-item">
   <a class="nav-link" href="<?php echo base_url('Admin/Galeri/') ?>">
    <i class="fas fa-fw fa-brush"></i>
    <span>Galeri</span>
  </a>
</li>
<hr class="sidebar-divider">
</ul>
<?php elseif($this->session->userdata('hak_akses')==='Kader'):?> 
  <ul class="navbar-nav sidebar sidebar-light  accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center <?php echo $bg_navbar_color;?> justify-content-center" href="index.html">
      <div class="sidebar-brand-icon <?php echo $bg_navbar_color;?>">
        <img src="<?php echo base_url() . "assets/Admin/"; ?>img/logo/logo_posyandu.png">
      </div>
      <?php $hak_akses =  $this->session->userdata('hak_akses');?>

      <div class="sidebar-brand-text mx-3 "><?php echo $hak_akses;?></div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url('Admin/Homepage/') ?>">
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
      <a class="nav-link" href="<?php echo base_url('Admin/Perubahan/') ?>">
        <i class="fas fa-fw fa-pen"></i>
        <span>Perubahan Data</span>
      </a>
    </li>
    
  </ul>
  <?php elseif($this->session->userdata('hak_akses')==='Kepdes' ):?> 
    <ul class="navbar-nav sidebar sidebar-light  accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center <?php echo $bg_navbar_color;?> justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="<?php echo base_url() . "assets/Admin/"; ?>img/logo/logo_posyandu.png">
        </div>
        <?php $hak_akses =  $this->session->userdata('hak_akses');?>

        <div class="sidebar-brand-text mx-3"><?php echo $hak_akses;?></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('Admin/Homepage/') ?>">
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

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Informasi Tambahan
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('Admin/Laporan/') ?>">
        <i class="fas fa-fw fa-folder"></i>
        <span>Data Laporan</span>
      </a>
    </li>
    <li class="nav-item">
     <a class="nav-link" href="<?php echo base_url('Admin/Galeri/') ?>">
      <i class="fas fa-fw fa-brush"></i>
      <span>Galeri</span>
    </a>
  </li>
  <hr class="sidebar-divider">
</ul>
<?php endif;?>