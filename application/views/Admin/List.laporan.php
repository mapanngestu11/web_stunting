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
                </div>
                <style type="text/css">
                  .tombol_cetak{
                    margin-top: 35px;
                  }
                </style>
                <form action="<?php echo base_url('Admin/Laporan/cetak_laporan_bulan') ?>" method="POST">
                  <div class="form-group row ml-3">
                    <div class="col-md-4">
                      <label>Tanggal Awal</label>
                      <input type="date" name="tanggal_awal" class="form-control" required="">
                    </div>
                    <div class="col-md-4">
                      <label>Tanggal Akhir</label>
                      <input type="date" name="tanggal_akhir" class="form-control" required="">
                    </div>
                    <div class="col-md-3">
                      <button class="btn btn-danger tombol_cetak">Cetak</button>
                    </div>
                  </div>
                </form>

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
                       <form action="<?php echo base_url('Admin/Balita/add/') ?>" method="POST">
                         <span class="badge badge-Primary mb-2">Data Balita</span>
                         <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                              <label>Nomor Pendataan</label>
                              <?php   
                              $lastNumber = $no_pendataan;
                              $newNumber = str_pad((int)$lastNumber + 1, 6, '0', STR_PAD_LEFT); ?>
                              <input type="text" name="no_pendataan" class="form-control" value="<?php echo $newNumber;?>" readonly>
                            </div>
                            <div class="col-md-6">
                              <label>Kader</label>
                              <select class="form-control" name="kader" required="">
                                <option value="">Pilih</option>
                                <option value="MEKAR SARI 1">MEKAR SARI 1</option>
                                <option value="MEKAR SARI 2">MEKAR SARI 2</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group mt-2">
                            <div class="row">
                              <div class="col-md-12">
                                <label>Nama Balita</label>
                                <input type="text" name="nama_balita" class="form-control" required="" placeholder="Nama Balita">
                              </div>
                            </div>
                          </div>
                          <div class="form-group mt-2">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" required="" placeholder="Tempat Lahir">
                              </div>
                              <div class="col-md-4">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" required="">
                              </div>
                              <div class="col-md-4">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" required="">
                                  <option value="">Pilih</option>
                                  <option value="Laki-laki"> Laki-laki </option>
                                  <option value="Perempuan"> Perempuan </option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group mt-2">
                            <div class="row">
                              <div class="col-md-6">
                                <label>NIK Ayah</label>
                                <input type="number" name="nik_ayah" class="form-control" placeholder="NIK Ayah">
                              </div>
                              <div class="col-md-6">
                                <label>NIK Ibu</label>
                                <input type="number" name="nik_ibu" class="form-control" placeholder="NIK Ibu">
                              </div>
                            </div>
                          </div>
                          <div class="form-group mt-2">
                            <div class="row">
                              <div class="col-md-6">
                                <label>Nama Ayah</label>
                                <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" required="">
                              </div>
                              <div class="col-md-6">
                                <label>Nama Ibu</label>
                                <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" required="">
                              </div>
                            </div>
                          </div>
                          <div class="form-group mt-2"> 
                            <div class="row">
                              <div class="col-md-12">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" rows="3"></textarea>
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
                      <th>Nama Balita</th>
                      <th>Jenis Kelamin</th>
                      <th>Kader</th>
                      <th>Status Pengukuran</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Balita</th>
                      <th>Jenis Kelamin</th>
                      <th>Kader</th>
                      <th>Status Pengukuran</th>

                    </tr>

                  </tfoot>
                  <tbody>

                    <?php
                    $no = 0;
                    foreach ($balita->result_array() as $row) :

                      $no++;
                      $id_data_balita               = $row['id_data_balita'];
                      $nama_balita           = $row['nama_balita'];
                      $jenis_kelamin           = $row['jenis_kelamin'];
                      $kader            = $row['kader'];
                      $status_pengukuran = $row['status_pengukuran'];


                      ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $nama_balita;?></td>
                        <td><?php echo $jenis_kelamin;?></td>
                        <td><?php echo $kader;?></td>
                        <td>
                          <?php if ($status_pengukuran == 'Sudah') { ?>
                            <span class="badge badge-success">sudah</span>
                          <?php }else{ ?>
                            <span class="badge badge-success">belum</span>
                          <?php } ?>
                        </td>
                        
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

        <?php
        $no = 0;
        foreach ($balita->result_array() as $row) :

          $no++;
          $id_data_balita               = $row['id_data_balita'];
          $no_pendataan                 = $row['no_pendataan'];
          $nama_balita           = $row['nama_balita'];
          $jenis_kelamin           = $row['jenis_kelamin'];
          $tempat_lahir         = $row['tempat_lahir'];
          $tgl_lahir          = $row['tgl_lahir'];
          $kader            = $row['kader'];
          $status_pengukuran = $row['status_pengukuran'];
          $nik_ayah   = $row['nik_ayah'];
          $nik_ibu    = $row['nik_ibu'];
          $nama_ayah  = $row['nama_ayah'];
          $nama_ibu   = $row['nama_ibu'];
          $alamat     = $row['alamat'];

          ?>
          <!-- modal edit -->
          <div class="modal fade" id="editBalita<?php echo $id_data_balita;?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Edit Data <?php echo $tittle;?></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form action="<?php echo base_url('Admin/Balita/update/') ?>" method="POST">
                   <span class="badge badge-Primary mb-2">Data Balita</span>
                   <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Nomor Pendataan</label>

                        <input type="text" name="no_pendataan" class="form-control" value="<?php echo $no_pendataan;?>" readonly>
                        <input type="hidden" name="id_data_balita" value="<?php echo $id_data_balita;?>">
                      </div>
                      <div class="col-md-6">
                        <label>Kader</label>
                        <select class="form-control" name="kader" required="">
                          <option value="<?php echo $kader;?>"> <?php echo $kader;?> </option>
                          <option value="MEKAR SARI 1">MEKAR SARI 1</option>
                          <option value="MEKAR SARI 2">MEKAR SARI 2</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group mt-2">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Nama Balita</label>
                          <input type="text" name="nama_balita" class="form-control" required="" placeholder="Nama Balita" value="<?php echo $nama_balita;?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group mt-2">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" class="form-control" required="" value="<?php echo $tempat_lahir;?>" placeholder="Tempat Lahir">
                        </div>
                        <div class="col-md-4">
                          <label>Tanggal Lahir</label>
                          <input type="date" name="tgl_lahir" class="form-control" required="" value="<?php echo $tgl_lahir;?>">
                        </div>
                        <div class="col-md-4">
                          <label>Jenis Kelamin</label>
                          <select class="form-control" name="jenis_kelamin" required="">
                            <option value="<?php echo $jenis_kelamin;?>"> <?php echo $jenis_kelamin;?> </option>
                            <option value="Laki-laki"> Laki-laki </option>
                            <option value="Perempuan"> Perempuan </option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group mt-2">
                      <div class="row">
                        <div class="col-md-6">
                          <label>NIK Ayah</label>
                          <input type="text" name="nik_ayah" class="form-control" inputmode="numeric" placeholder="NIK Ayah" value="<?php echo $nik_ayah;?>">
                        </div>
                        <div class="col-md-6">
                          <label>NIK Ibu</label>
                          <input type="text" name="nik_ibu" class="form-control" placeholder="NIK Ibu" value="<?php echo $nik_ibu;?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group mt-2">
                      <div class="row">
                        <div class="col-md-6">
                          <label>Nama Ayah</label>
                          <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" required="" value="<?php echo $nama_ayah;?>">
                        </div>
                        <div class="col-md-6">
                          <label>Nama Ibu</label>
                          <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" required="" value="<?php echo $nama_ibu;?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group mt-2"> 
                      <div class="row">
                        <div class="col-md-12">
                          <label>Alamat</label>
                          <textarea class="form-control" name="alamat" rows="3"><?php echo $alamat;?></textarea>
                        </div>
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



      <!-- hapus modal -->

      <?php
      $no = 0;
      foreach ($balita->result_array() as $row) :

        $no++;
        $id_data_balita               = $row['id_data_balita'];
        $no_pendataan                 = $row['no_pendataan'];
        $nama_balita           = $row['nama_balita'];

        ?>
        <!-- modal edit -->
        <div class="modal fade" id="hapusBalita<?php echo $id_data_balita;?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Hapus Data <?php echo $tittle;?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <form action="<?php echo base_url('Admin/Balita/delete/') ?>" method="POST">
                  <span class="badge badge-Primary mb-2">Hapus Data</span>
                  <div class="form-group">
                    <input type="hidden" name="id_data_balita" value="<?php echo $id_data_balita;?>">
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