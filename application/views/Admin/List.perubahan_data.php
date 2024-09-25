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
                        <form action="<?php echo base_url('Admin/Perubahan/add/') ?>" method="POST">
                          <span class="badge badge-Primary mb-2">Data Informasi Perubahan Data</span>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                <label>Nomor Pendataan</label>
                                <select class="form-control" name="no_pendataan" required="">
                                  <option value="">Pilih</option>
                                  <?php 
                                  $no = 0;
                                  foreach ($balita->result_array() as $info_balita) :
                                    $nomor_pendataan_balita = $info_balita['no_pendataan'];
                                    $nama_balita = $info_balita['nama_balita'];
                                    ?>
                                    <option value="<?php echo $nomor_pendataan_balita;?>"><?php echo $nomor_pendataan_balita;?>, <?php echo $nama_balita;?></option>
                                  <?php endforeach;?>
                                </select>

                              </div>
                              <div class="col-md-6">
                                <label>Kader</label>
                                <select class="form-control" name="kader">
                                  <option value=""> Pilih </option>
                                  <option value="Mekarsari 1"> Mekarsari 1 </option>
                                  <option value="Mekarsari 2"> Mekarsari 2 </option>
                                  <option value="Mekarsari 3"> Mekarsari 3 </option>
                                  <option value="Mekarsari 4"> Mekarsari 4 </option>
                                  <option value="Mekarsari 5"> Mekarsari 5 </option>
                                  <option value="Mekarsari 6"> Mekarsari 6 </option>
                                  <option value="Mekarsari 7"> Mekarsari 7 </option>
                                  <option value="Mekarsari 8"> Mekarsari 8 </option>
                                  <option value="Mekarsari 9"> Mekarsari 9</option>
                                </select>
                              </div>
                            </div>
                            <div class="row form-group mt-4">
                              <div class="col-md-12">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" required=""></textarea>
                              </div>
                            </div>
                            <div class="row form-group mt-4">
                              <div class="col-md-6">
                                <label>Diajukan Oleh</label>
                                <input type="text" name="diajukan_oleh" class="form-control">
                              </div>
                              <div class="col-md-6">
                                <label>Tanggal</label>
                                <?php
                                $tanggal_hari_ini = date('Y-m-d h:i:s');
                                ?>
                                <input type="text" name="tanggal_pengajuan" class="form-control" placeholder="<?php echo $tanggal_hari_ini;?>" readonly>
                              </div>
                            </div>
                            <span class="badge badge-Primary mt-4 mb-2">Data Informasi Penerimaan Data</span>
                            <div class="row form-group">
                              <div class="col-md-6">
                                <label>Nama Penerima</label>
                                <input type="text" name="penerima" class="form-control" required="" readonly="">
                              </div>
                              <div class="col-md-6">
                                <label>Tanggal Penerima</label>
                                <input type="text" name="tanggal_konfirmasi" class="form-control" readonly="">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <label>Keterangan Konfirmasi</label>
                                <textarea class="form-control" name="keterangan_konfirmasi" readonly=""></textarea>
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
                        <th>No Pendataan</th>
                        <th>Nama Balita</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <?php 
                        $hak_akses = $this->session->userdata('hak_akses');
                        if ($hak_akses == 'Bidan' || $hak_akses == 'Admin') {
                          ?>
                          <th>Edit</th>
                          <th>Hapus</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>No Pendataan</th>
                        <th>Nama Balita</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <?php 
                        $hak_akses = $this->session->userdata('hak_akses');
                        if ($hak_akses == 'Bidan' || $hak_akses == 'Admin') {
                          ?>
                          <th>Edit</th>
                          <th>Hapus</th>
                        <?php } ?>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($perubahan_data->result_array() as $row) :

                        $no++;
                        $id_perubahan_data               = $row['id_perubahan_data'];
                        $no_pendataan               = $row['no_pendataan'];
                        $nama_balita           = $row['nama_balita'];
                        $keterangan       = $row['keterangan'];
                        $status_keterangan        = $row['status_keterangan'];


                        ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $no_pendataan;?></td>
                          <td><?php echo $nama_balita;?></td>
                          <td><?php echo $keterangan;?></td>
                          <td>
                            <?php if ($status_keterangan == 'Tolak') { ?>
                              <span class="badge badge-danger">Tolak</span>
                            <?php }elseif($status_keterangan == 'Pengajuan'){?>
                              <span class="badge badge-warning">Pengajuan</span>
                            <?php }else{ ?>
                              <span class="badge badge-success">DiTerima</span>
                            <?php } ?>
                          </td>
                          <?php 
                          $hak_akses = $this->session->userdata('hak_akses');
                          if ($hak_akses == 'Bidan' || $hak_akses == 'Admin') {
                            ?>
                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myEdit<?php echo $id_perubahan_data;?>" >Edit</button></td>
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myDelete<?php echo $id_perubahan_data;?>">Hapus</button></td>
                          <?php } ?>
                          
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



      <!-- edit modal -->
      <?php
      $no = 0;
      foreach ($perubahan_data->result_array() as $row) :

        $no++;
        $id_perubahan_data               = $row['id_perubahan_data'];
        $no_pendataan                 = $row['no_pendataan'];
        $nama_balita           = $row['nama_balita'];
        $kader = $row['kader'];
        $keterangan = $row['keterangan'];
        $diajukan_oleh = $row['diajukan_oleh'];

        ?>
        <!-- modal edit -->
        <div class="modal fade" id="myEdit<?php echo $id_perubahan_data;?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Update Data <?php echo $tittle;?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form action="<?php echo base_url('Admin/Perubahan/Update/') ?>" method="POST">
                  <span class="badge badge-Primary mb-2">Data Informasi Perubahan Data</span>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Nomor Pendataan</label>
                        <input type="text" name="no_pendataan" class="form-control" value="<?php echo $no_pendataan;?>" readonly>
                        <input type="hidden" name="id_perubahan_data" value="<?php echo $id_perubahan_data;?>">
                      </div>
                      <div class="col-md-6">
                        <label>Kader</label>
                        <input type="text" name="kader" class="form-control" value="<?php echo $kader;?>" readonly>
                      </div>
                    </div>
                    <div class="row form-group mt-4">
                      <div class="col-md-12">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="<?php echo $keterangan;?>" readonly>
                      </div>
                    </div>
                    <div class="row form-group mt-4">
                      <div class="col-md-6">
                        <label>Diajukan Oleh</label>
                        <input type="text" name="diajukan_oleh" class="form-control"  value="<?php echo $diajukan_oleh;?>" readonly>
                      </div>
                      <div class="col-md-6">
                        <label>Tanggal</label>
                        <?php
                        $tanggal_hari_ini = date('Y-m-d h:i:s');
                        ?>
                        <input type="text" name="tanggal_pengajuan" class="form-control" placeholder="<?php echo $tanggal_hari_ini;?>" readonly>
                      </div>
                    </div>
                    <span class="badge badge-Primary mt-4 mb-2">Data Informasi Penerimaan Data</span>
                    <div class="row form-group">
                      <div class="col-md-6">
                        <label>Nama Penerima</label>
                        <input type="text" name="penerima" class="form-control" required="">
                      </div>
                      <div class="col-md-6">
                        <label>Tanggal Penerima</label>
                        <input type="date" name="tanggal_konfirmasi" class="form-control">
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col-md-12">
                        <label>Status Perubahan</label>
                        <select class="form-control" name="status_keterangan" required="">
                          <option value=""><?php echo $status_keterangan;?></option>
                          <option value="Tolak"> Tolak </option>
                          <option value="Diterima"> Diterima </option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label>Keterangan Konfirmasi</label>
                        <textarea class="form-control" name="keterangan_konfirmasi" ></textarea>
                      </div>
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
      <!-- end edit modal -->
      <!-- hapus modal -->

      <?php
      $no = 0;
      foreach ($perubahan_data->result_array() as $row) :

        $no++;
        $id_perubahan_data               = $row['id_perubahan_data'];
        $no_pendataan                 = $row['no_pendataan'];
        $nama_balita           = $row['nama_balita'];

        ?>
        <!-- modal edit -->
        <div class="modal fade" id="myDelete<?php echo $id_perubahan_data;?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Hapus Data <?php echo $tittle;?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form action="<?php echo base_url('Admin/Perubahan/delete/') ?>" method="POST">
                  <span class="badge badge-Primary mb-2">Hapus Data</span>
                  <div class="form-group">
                    <input type="hidden" name="id_perubahan_data" value="<?php echo $id_perubahan_data;?>">
                    <h5>Apakah Yakin anda akan menghapus No data <?php echo $no_pendataan;?>, Nama Balita <?php echo $nama_balita;?> ?</h5>
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