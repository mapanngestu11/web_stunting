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
                            <div class="form-group mt-4">
                              <div class="row">
                                <div class="col-md-4">
                                  <label>Nama Lengkap</label>
                                  <input type="text" name="nama_lengkap" class="form-control" required="" placeholder="Nama Lengkap">
                                </div>
                                <div class="col-md-4">
                                  <label>Kader</label>
                                  <select class="form-control" name="kader">
                                    <option value=""> Pilih </option>
                                    <option value="Mekarsari 1"> Mekarsari 1 </option>
                                    <option value="Mekarsari 2"> Mekarsari 2 </option>
                                    <option value="Mekarsari 3"> Mekarsari 3 </option>
                                    <option value="Mekarsari 4"> Mekarsari 4 </option>
                                    <option value="Mekarsari 5"> Mekarsari 5 </option>
                                  </select>
                                </div>
                                <div class="col-md-4">
                                  <label>Hak Akses</label>
                                  <select class="form-control" name="hak_akses">
                                    <option value=""> Pilih </option>
                                    <option value="Kader"> Kader </option>
                                    <option value="Bidan"> Bidan </option>
                                    <option value="Kepdes"> Kepala Desa </option>
                                    <option value="Admin"> Admin </option>
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
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Kader</th>
                        <th>Hak Akses</th>
                        <th>Last Login</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Kader</th>
                        <th>Hak Akses</th>
                        <th>Last Login</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($user->result_array() as $row) :

                        $no++;
                        $id_user               = $row['id_user'];
                        $username               = $row['username'];
                        $nama_lengkap           = $row['nama_lengkap'];
                        $kader       = $row['kader'];
                        $hak_akses        = $row['hak_akses'];
                        $last_login      = $row['last_login'];

                        ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $username;?></td>
                          <td><?php echo $nama_lengkap;?></td>
                          <td><?php echo $kader;?></td>
                          <td>
                            <?php if ($hak_akses == 'Admin') { ?>
                              <span class="badge badge-danger">Admin</span>
                            <?php }elseif($hak_akses == 'Kader'){?>
                              <span class="badge badge-primary">Kader</span>
                            <?php }elseif($hak_akses == 'Bidan'){ ?>
                              <span class="badge badge-success">Bidan</span>
                            <?php }else{ ?>
                              <span class="badge badge-warning">Kepala Desa</span>
                            <?php } ?>
                          </td>
                          <td><?php echo $last_login;?></td>
                          <td><button class="btn btn-warning">Edit</button></td>
                          <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#EditModal<?php echo $id_user;?>">Hapus</button></td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
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