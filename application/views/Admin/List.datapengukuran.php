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

                  <?php 
                  $hak_akses =  $this->session->userdata('hak_akses');
                  if ($hak_akses == 'Kepdes') { ?>
                  <?php }elseif ($hak_akses == 'Kader' || $hak_akses == 'Admin') { ?>
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Tambah Data
                  </button>
                <?php  } ?>
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
                     <form action="<?php echo base_url('Admin/Pengukuran/add/') ?>" method="POST">
                       <span class="badge badge-Primary mb-2">Data Balita</span>
                       <div class="form-group">
                         <div class="row">
                          <div class="col-md-12">
                            <label>Nomor Pendataan</label>
                            <select class="form-control" name="no_pendataan">
                              <option value=""> Pilih </option>
                              <?php
                              $no = 0;
                              foreach ($balita->result_array() as $row) :
                                $no_pendataan =  $row['no_pendataan']; 
                                $nama_balita  = $row['nama_balita'];
                                ?>

                                <option value="<?php echo $no_pendataan;?>"><?php echo $no_pendataan;?>, <?php echo $nama_balita;?></option>
                              <?php endforeach;?>

                            </select>
                          </div>
                        </div>
                        <span class="badge badge-Primary mt-4">Informasi Pengukuran Balita</span>
                        <div class="row mt-4 form-group">

                          <div class="col-md-4">
                            <label>Tinggi Badan</label>
                            <input type="text" name="tinggi_badan" class="form-control" required="">
                          </div>
                          <div class="col-md-4">
                            <label>Berat Badan</label>
                            <input type="text" name="berat_badan" class="form-control" required="">
                          </div>
                          <div class="col-md-4">
                            <label>Lingkar Kepala</label>
                            <input type="text" name="lingkar_kepala" class="form-control" required="">
                          </div>
                        </div>
                        <div class="row form-group mt-4">
                          <div class="col-md-12">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan"></textarea>
                          </div>
                        </div>
                        <div class="row form-group mt-4">
                          <div class="col-md-12">
                            <label>Tanggal Pengukuran</label>
                            <input type="date" name="tanggal_pengukuran" class="form-control" required="">
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
                   <th>Status Stunting</th>
                   <th>Detail</th>
                   <?php 
                   $hak_akses =  $this->session->userdata('hak_akses');
                   if ($hak_akses == 'Kepdes') { ?>
                   <?php }elseif ($hak_akses == 'Kader' || $hak_akses =='Admin') { ?>
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
                  <th>Status Stunting</th>
                  <th>Detail</th>
                  <?php 
                  $hak_akses =  $this->session->userdata('hak_akses');
                  if ($hak_akses == 'Kepdes') { ?>
                  <?php }elseif ($hak_akses == 'Kader' || $hak_akses =='Admin') { ?>
                    <th>Edit</th>
                    <th>Hapus</th>
                  <?php } ?>
                </tr>

              </tfoot>
              <tbody>

                <?php
                $no = 0;
                foreach ($data_pengukuran->result_array() as $row) :

                  $no++;
                  $id_stunting               = $row['id_stunting'];
                  $no_pendataan           = $row['no_pendataan'];
                  $nama_balita           = $row['nama_balita'];


                  $status_stunting = $row['status_stunting'];


                  ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $no_pendataan;?></td>
                    <td><?php echo $nama_balita;?></td>

                    <td>
                      <?php if ($status_stunting == '1') { ?>
                        <span class="badge badge-danger"> Bayi Mengalami Stunting Parah.</span>
                      <?php }elseif ($status_stunting == '2') { ?>
                        <span class="badge badge-warning">Bayi mengalami stunting.</span>
                      <?php }else{ ?>
                        <span class="badge badge-success">Normal.</span>
                      <?php }?>
                    </td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#myDetail<?php echo $id_stunting;?>">Detail</button></td>
                    <?php 
                    $hak_akses =  $this->session->userdata('hak_akses');
                    if ($hak_akses == 'Kepdes') { ?>
                    <?php }elseif ($hak_akses == 'Kader' || $hak_akses =='Admin') { ?>
                      <td><button class="btn btn-warning" data-toggle="modal" data-target="#myEdit<?php echo $id_stunting;?>">Edit</button></td>
                      <td><button class="btn btn-danger" data-toggle="modal" data-target="#myDelete<?php echo $id_stunting;?>">Hapus</button></td>
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
<?php
$no = 0;
foreach ($data_pengukuran->result_array() as $row) :

  $no++;
  $id_stunting               = $row['id_stunting'];
  $no_pendataan           = $row['no_pendataan'];
  $kader        = $row['kader'];
  $nama_balita           = $row['nama_balita'];
  $tempat_lahir = $row['tempat_lahir'];
  $tgl_lahir = $row['tgl_lahir'];
  $jenis_kelamin = $row['jenis_kelamin'];
  $nik_ayah = $row['nik_ayah'];
  $nama_ayah = $row['nama_ayah'];
  $nik_ibu = $row['nik_ibu'];
  $nama_ibu = $row['nama_ibu'];
  $alamat = $row['alamat'];

  $tinggi_badan = $row['tinggi_badan'];
  $berat_badan = $row['berat_badan'];
  $lingkar_kepala = $row['lingkar_kepala'];
  $status_stunting = $row['status_stunting'];
  $keterangan = $row['keterangan'];


  if ($status_stunting =='1') {
    $convert_status_stunting = 'Stunting Parah';
  }elseif ($status_stunting == '2'){
    $convert_status_stunting = 'Stunting';
  }else{
    $convert_status_stunting = 'Normal';
  }
  ?>
  <!-- modal detail -->
  <div class="modal fade" id="myDetail<?php echo $id_stunting;?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Informasi Detail <?php echo $tittle;?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('Admin/Pengukuran/add/') ?>" method="POST">
           <span class="badge badge-Primary mb-2">Data Balita</span>
           <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label>Nomor Pendataan</label>

                <input type="text" name="no_pendataan" class="form-control" value="<?php echo $no_pendataan;?>" readonly>
              </div>
              <div class="col-md-6">
                <label>Kader</label>
                <input type="text" name="kader" class="form-control" value="<?php echo $kader;?>" readonly>
              </div>
            </div>
            <div class="form-group mt-2">
              <div class="row">
                <div class="col-md-12">
                  <label>Nama Balita</label>
                  <input type="text" name="nama_balita" class="form-control" value="<?php echo $nama_balita;?>" readonly>
                </div>
              </div>
            </div>
            <div class="form-group mt-2">
              <div class="row">
                <div class="col-md-4">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" required="" value="<?php echo $tempat_lahir;?>" readonly="">
                </div>
                <div class="col-md-4">
                  <label>Tanggal Lahir</label>
                  <input type="text" name="tgl_lahir" value="<?php echo $tgl_lahir;?>" class="form-control"  readonly="">
                </div>
                <div class="col-md-4">
                  <label>Jenis Kelamin</label>
                  <input type="text" name="jenis_kelamin" class="form-control" value="<?php echo $jenis_kelamin;?>" readonly="">
                </div>
              </div>
            </div>
            <div class="form-group mt-2">
              <div class="row">
                <div class="col-md-6">
                  <label>NIK Ayah</label>
                  <input type="number" name="nik_ayah" class="form-control" placeholder="NIK Ayah" value="<?php echo $nik_ayah;?>" readonly>
                </div>
                <div class="col-md-6">
                  <label>NIK Ibu</label>
                  <input type="number" name="nik_ibu" class="form-control" placeholder="NIK Ibu" value="<?php echo $nik_ibu;?>" readonly> 
                </div>
              </div>
            </div>
            <div class="form-group mt-2">
              <div class="row">
                <div class="col-md-6">
                  <label>Nama Ayah</label>
                  <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" value="<?php echo $nama_ayah;?>" readonly>
                </div>
                <div class="col-md-6">
                  <label>Nama Ibu</label>
                  <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" required="" value="<?php echo $nama_ibu;?>" readonly>
                </div>
              </div>
            </div>
            <div class="form-group mt-2"> 
              <div class="row">
                <div class="col-md-12">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" rows="3" readonly=""><?php echo $alamat;?></textarea>
                </div>
              </div>
            </div>
            <span class="badge badge-Primary mb-2">Data Pengukuran</span>
            <div class="row form-group mt-2">
              <div class="col-md-4">
                <label>Tinggi Badan</label>
                <input type="text" name="tinggi_badan" class="form-control" value="<?php echo $tinggi_badan;?>" readonly="">
              </div>
              <div class="col-md-4">
                <label>Berat Badan</label>
                <input type="text" name="berat_badan" class="form-control" value="<?php echo $berat_badan;?>" readonly="">
              </div>
              <div class="col-md-4">
                <label>Lingkar Kepala</label>
                <input type="text" name="lingkar_kepala" class="form-control" value="<?php echo $lingkar_kepala;?>" readonly=""> 
              </div>
            </div>
            <div class="row form-group mt-2">
              <div class="col-md-12">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="<?php echo $keterangan;?>" readonly=""> 
              </div>
            </div>
            <div class="row form-group mt-2">
              <div class="col-md-12">
                <label>Status Stunting</label>
                <input type="text" name="status_stunting" class="form-control" value="<?php echo $convert_status_stunting;?>" readonly="">
              </div>
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>
<?php endforeach;?>
<!-- end  modal -->


<!-- hapus modal -->

<?php
$no = 0;
foreach ($data_pengukuran->result_array() as $row) :

  $no++;
  $id_stunting               = $row['id_stunting'];
  $no_pendataan                 = $row['no_pendataan'];
  $nama_balita           = $row['nama_balita'];

  ?>
  <!-- modal edit -->
  <div class="modal fade" id="myDelete<?php echo $id_stunting;?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data <?php echo $tittle;?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('Admin/Pengukuran/delete/') ?>" method="POST">
            <span class="badge badge-Primary mb-2">Hapus Data</span>
            <div class="form-group">
              <input type="hidden" name="id_stunting" value="<?php echo $id_stunting;?>">
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


<!-- edit modal -->

<?php
$no = 0;
foreach ($data_pengukuran->result_array() as $row) :

  $no++;
  $id_stunting               = $row['id_stunting'];
  $no_pendataan           = $row['no_pendataan'];
  $kader        = $row['kader'];
  $nama_balita           = $row['nama_balita'];
  $tempat_lahir = $row['tempat_lahir'];
  $tgl_lahir = $row['tgl_lahir'];
  $jenis_kelamin = $row['jenis_kelamin'];
  $nik_ayah = $row['nik_ayah'];
  $nama_ayah = $row['nama_ayah'];
  $nik_ibu = $row['nik_ibu'];
  $nama_ibu = $row['nama_ibu'];
  $alamat = $row['alamat'];

  $tinggi_badan = $row['tinggi_badan'];
  $berat_badan = $row['berat_badan'];
  $lingkar_kepala = $row['lingkar_kepala'];
  $status_stunting = $row['status_stunting'];
  $keterangan = $row['keterangan'];

  ?>

  <!-- modal detail -->
  <div class="modal fade" id="myEdit<?php echo $id_stunting;?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Data <?php echo $tittle;?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('Admin/Pengukuran/Update/') ?>" method="POST">
           <span class="badge badge-Primary mb-2">Data Balita</span>
           <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label>Nomor Pendataan</label>

                <input type="text" name="no_pendataan" class="form-control" value="<?php echo $no_pendataan;?>" readonly>
              </div>
              <div class="col-md-6">
                <label>Kader</label>
                <input type="text" name="kader" class="form-control" value="<?php echo $kader;?>" readonly>
              </div>
            </div>
            <div class="form-group mt-2">
              <div class="row">
                <div class="col-md-12">
                  <label>Nama Balita</label>
                  <input type="text" name="nama_balita" class="form-control" value="<?php echo $nama_balita;?>" readonly>
                </div>
              </div>
            </div>
            <div class="row form-group mt-4">
              <div class="col-md-12">
                <label>Tanggal Pengukuran</label>
                <input type="date" name="tanggal_pengukuran" class="form-control" required="">
              </div>
            </div>
            <span class="badge badge-Primary mb-2">Data Pengukuran</span>
            <div class="row form-group mt-2">
              <div class="col-md-4">
                <label>Tinggi Badan</label>
                <input type="text" name="tinggi_badan" class="form-control" value="<?php echo $tinggi_badan;?>">
                <input type="hidden" name="id_stunting" value="<?php echo $id_stunting;?>">
              </div>
              <div class="col-md-4">
                <label>Berat Badan</label>
                <input type="text" name="berat_badan" class="form-control" value="<?php echo $berat_badan;?>">
              </div>
              <div class="col-md-4">
                <label>Lingkar Kepala</label>
                <input type="text" name="lingkar_kepala" class="form-control" value="<?php echo $lingkar_kepala;?>"> 
              </div>
            </div>
            <div class="row form-group mt-2">
              <div class="col-md-12">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="<?php echo $keterangan;?>"> 
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

<?php endforeach;?>
<!-- end edit modal -->
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