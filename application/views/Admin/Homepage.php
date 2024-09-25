<!DOCTYPE html>
<html lang="en">

<?php include 'Pages/Head.php';?> 

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include 'Pages/Sidebar.php';?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include 'Pages/Topbar.php';?>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Informasi User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_user[0]->jumlah ;?></div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Data Balita</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_balita[0]->jumlah ;?></div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Laporan Stunting</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_stunting[0]->jumlah ;?></div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Laporan perubahan data</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlah_perubahan[0]->jumlah ;?></div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file fa-2x text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->


            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Grafik</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                  aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <div class="card-body">
             <div class="chart-bar">
              <canvas id="myBarChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- Pie Chart -->
      <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Grafik</h6>
          </div>
          <div class="card-body">
            <div class="chart-pie pt-4">
              <canvas id="myPieChart"></canvas>
            </div>
            <hr>
          </div>
        </div>
      </div>
      <!-- Invoice Example -->

      <!-- Message From Customer-->
      <div class="col-xl-12 col-lg-5 ">
        <div class="card">
          <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-light">Infromasi Perubahan Data</h6>
          </div>
          <div>
            <div class="customer-message align-items-center">
              <a class="font-weight-bold" href="#">
                <div class="text-truncate message-title">Hi there! I am wondering if you can help me with a
                problem I've been having.</div>
                <div class="small text-gray-500 message-time font-weight-bold">Udin Cilok · 58m</div>
              </a>
            </div>
            <div class="customer-message align-items-center">
              <a href="#">
                <div class="text-truncate message-title">But I must explain to you how all this mistaken idea
                </div>
                <div class="small text-gray-500 message-time">Nana Haminah · 58m</div>
              </a>
            </div>
            <div class="customer-message align-items-center">
              <a class="font-weight-bold" href="#">
                <div class="text-truncate message-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit
                </div>
                <div class="small text-gray-500 message-time font-weight-bold">Jajang Cincau · 25m</div>
              </a>
            </div>
            <div class="customer-message align-items-center">
              <a class="font-weight-bold" href="#">
                <div class="text-truncate message-title">At vero eos et accusamus et iusto odio dignissimos
                  ducimus qui blanditiis
                </div>
                <div class="small text-gray-500 message-time font-weight-bold">Udin Wayang · 54m</div>
              </a>
            </div>
            <div class="card-footer text-center">
              <a class="m-0 small text-primary card-link" href="<?php echo base_url('Admin/Perubahan/') ?>">View More <i
                class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Row-->


      <!-- Modal Logout -->

    </div>
    <!---Container Fluid-->
  </div>
  <!-- Footer -->
  <?php include 'Pages/Footer.php';?>
  <!-- Footer -->
</div>
</div>

<?php include 'Pages/Js.php';?>
</body>

</html>