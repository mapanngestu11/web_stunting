<!DOCTYPE html>
<html lang="en">
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
            <h1 class="h3 mb-0 text-gray-800"><?php echo $tittle;?></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $tittle;?></li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $tittle;?></h6>

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Tambah Data
                  </button>
                </div>

                <!-- Start Modal -->

                <div class="modal fade" id="myModal">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Tambahkan <?php echo $tittle;?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form action="<?php echo base_url('Admin/User/add/') ?>" method="POST">
                          <span class="badge badge-Primary mb-2">Data User</span>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="username" required="">
                              </div>
                              <div class="col-md-6">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="***" required="" minlength="8">
                              </div>
                            </div>
                            <div class="form-group mt-2">
                              <div class="row">
                                <div class="col-md-4">
                                  <label>Nama Lengkap</label>
                                  <input type="text" name="nama_lengkap" class="form-control" required="" placeholder="Nama Lengkap">
                                </div>
                                <div class="col-md-4">
                                  <label>Kader</label>
                                  <select class="form-control" name="kader">
                                    <option value=""> Pilih </option>
                                    <option value="1"> 1 </option>
                                    <option value="2"> 2 </option>
                                  </select>
                                </div>
                                <div class="col-md-4">
                                  <label>Hak Akses</label>
                                  <select class="form-control" name="hak_akses">
                                    <option value=""> Pilih </option>
                                    <option value="Kader"> Kader </option>
                                    <option value="Bidan"> Bidan </option>
                                    <option value="Kepdes"> Kepala Desa </option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Tambahkan</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
                <!-- end Modal -->

                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>Last Login</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                       <th>No</th>
                       <th>Nama Lengkap</th>
                       <th>Username</th>
                       <th>Hak Akses</th>
                       <th>Last Login</th>
                       <th>Edit</th>
                       <th>Hapus</th>
                     </tr>

                   </tfoot>
                   <tbody>
                    <tr>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                      <td>1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- DataTable with Hover -->

          <!--Row-->

          <!-- Documentation Link -->

        </div>
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
      <?php include 'Pages/Footer.php';?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include 'Pages/Js.php';?>
</body>

</html>