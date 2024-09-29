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
            <div class="col-xl-12 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Jumlah Balita</h6>
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
      <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Grafik Stunting</h6>
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