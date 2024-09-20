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
            <h1 class="h3 mb-0 text-gray-800">Data Galeri</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Galeri</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Galeri</h6>

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
                        <h4 class="modal-title">Tambahkan Galeri</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form action="<?php echo base_url('Admin/Galeri/add/') ?>" method="POST" enctype="multipart/form-data">

                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-12">
                                <label>Nama Gambar</label>
                                <input type="text" name="nama_gambar" class="form-control" placeholder="Nama File" required="">
                              </div>
                            </div>

                          </div>
                          <div class="row form-group">
                            <div class="col-md-12">
                              <label>Deskkripsi</label>
                              <textarea class="form-control" name="deskripsi"></textarea>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col-md-12">
                              <label>File Gambar</label>
                              <input type="file" name="gambar" class="form-control" required="">
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
                        <th>Gambar</th>
                        <th>Nama Gambar</th>

                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                       <th>No</th>
                       <th>Gambar</th>
                       <th>Nama Gambar</th>

                       <th>Edit</th>
                       <th>Hapus</th>
                     </tr>
                   </tfoot>
                   <tbody>
                    <?php
                    $no = 0;
                    foreach ($galeri->result_array() as $row) :

                      $no++;
                      $id_galeri               = $row['id_galeri'];
                      $nama_gambar               = $row['nama_gambar'];
                      $gambar           = $row['gambar'];


                      ?>
                      <tr>
                        <style type="text/css">
                          .data_gambar{
                            width: 50px;
                            height: 50px;
                            border-radius: 10px;
                          }
                        </style>
                        <td><?php echo $no;?></td>
                        <td><img class="data_gambar" src="<?php echo base_url() . "assets/upload/"; ?><?php echo $gambar;?>"></td>
                        <td><?php echo $nama_gambar;?></td>

                        <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myEdit<?php echo $id_galeri;?>">Edit</button></td>
                        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myDelete<?php echo $id_galeri;?>">Hapus</button></td>
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



    <!-- modal hapus -->
    <!-- hapus modal -->

    <?php
    $no = 0;
    foreach ($galeri->result_array() as $row) :

      $no++;
      $id_galeri               = $row['id_galeri'];
      $nama_gambar           = $row['nama_gambar'];

      ?>
      <!-- modal hapus -->
      <div class="modal fade" id="myDelete<?php echo $id_galeri;?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Hapus Data Gambar</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="<?php echo base_url('Admin/Galeri/delete/') ?>" method="POST">

                <div class="form-group">
                  <input type="hidden" name="id_galeri" value="<?php echo $id_galeri;?>">
                  <h5>Apakah Yakin anda akan menghapus gambar ini,  <?php echo $nama_gambar;?> ?</h5>
                </div>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Hapus Data</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </form>

          </div>
        </div>
      </div>
      <!-- end modal -->
    <?php endforeach;?>
    <!-- end hapus -->


    <!-- update modal -->

    <?php
    $no = 0;
    foreach ($galeri->result_array() as $row) :

      $no++;
      $id_galeri               = $row['id_galeri'];
      $nama_gambar           = $row['nama_gambar'];
      $deskripsi  = $row['deskripsi'];
      $gambar = $row['gambar'];

      ?>
      <!-- modal hapus -->
      <div class="modal fade" id="myEdit<?php echo $id_galeri;?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Update Data Gambar</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="<?php echo base_url('Admin/Galeri/update/') ?>" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <label>Nama Gambar</label>
                    <input type="text" name="nama_gambar" class="form-control" placeholder="Nama File" value="<?php echo $nama_gambar;?>" required="">
                    <input type="hidden" name="id_galeri" value="<?php echo $id_galeri;?>">
                  </div>
                </div>

              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label>Deskkripsi</label>
                  <textarea class="form-control" name="deskripsi"><?php echo $deskripsi;?></textarea>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6">
                  <label>File Gambar</label>
                  <input type="file" name="gambar" class="form-control" >
                </div>
                <div class="col-md-6">
                  <label>Preview Gambar Sebelumnya</label>
                  <style type="text/css">
                    .preview_gambar{
                      width: 100px;
                      height: 100px;
                      border-radius: 15px;

                    }
                  </style>
                  <br>
                  <img class="preview_gambar" src="<?php echo base_url() . "assets/upload/"; ?><?php echo $gambar;?>">
                </div>

              </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Update Data</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- end modal -->
  <?php endforeach;?>
  <!-- end hapus -->

  <!-- end modal -->
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