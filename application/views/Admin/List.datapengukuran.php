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
                        <form action="<?php echo base_url('Admin/Pengukuran/add/') ?>" method="POST">
                          <?php
                          $no = 0;
                          foreach ($data_pengukuran->result_array() as $row) :

                            $no++;
                            $id_stunting               = $row['id_stunting'];
                            $no_pendataan           = $row['no_pendataan'];
                            $nama_balita           = $row['nama_balita'];
                            $jenis_kelamin         = $row['jenis_kelamin'];
                            $kader = $row['kader'];
                            $tgl_lahir = $row['tgl_lahir'];
                            $tanggal_pengukuran           = $row['tanggal_pengukuran'];
                            $status_pengukuran = $row['status_pengukuran'];
                            $status_stunting = $row['status_stunting'];

                            $birthDate = new DateTime($tgl_lahir);
                            $today = new DateTime("today");
                            $interval = $today->diff($birthDate);

                            $years = $interval->y;
                            $months = $interval->m;

                            ?>
                            <span class="badge badge-Primary mb-2">Data Balita</span>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-6">
                                  <label>Nomor Pendataan</label>
                                  <input type="text" name="no_pendataan" class="form-control" value="<?php echo $no_pendataan;?>" readonly>
                                </div>
                                <div class="col-md-6">
                                  <label>Kader</label>
                                  <input type="text" name="kader" class="form-control" value="<?php echo $kader;?>" readonly="">
                                </div>
                              </div>
                              <div class="form-group  mt-2">
                                <div class="row">
                                  <div class="col-md-4">
                                    <label>Nama Balita</label>
                                    <input type="text" name="nama_balita" class="form-control" value="<?php echo $nama_balita;?>" readonly="">
                                  </div>
                                  <div class="col-md-4">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" name="jenis_kelamin" class="form-control" value="<?php echo $jenis_kelamin;?>" readonly>
                                  </div>
                                  <div class="col-md-4">
                                    <label>Umur</label>
                                    <input type="text" name="umur" class="form-control" value="<?php echo $years;?> Tahun, <?php echo $months;?> Bulan." readonly="">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group mt-2">
                                <div class="row">
                                  <div class="">

                                  </div>
                                </div>
                              </div>
                            <?php endforeach;?>
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
                        <th>Tanggal Pengukuran</th>
                        <th>Status Pengukuran</th>
                        <th>Status Stunting</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>No Pendataan</th>
                        <th>Nama Balita</th>
                        <th>Tanggal Pengukuran</th>
                        <th>Status Pengukuran</th>
                        <th>Status Stunting</th>
                        <th>Edit</th>
                        <th>Hapus</th>
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
                        $tanggal_pengukuran           = $row['tanggal_pengukuran'];
                        $status_pengukuran = $row['status_pengukuran'];
                        $status_stunting = $row['status_stunting'];

                        $date = new DateTime($tanggal_pengukuran);
                        $months = [
                          1 => "Januari", 
                          2 => "Februari", 
                          3 => "Maret", 
                          4 => "April", 
                          5 => "Mei", 
                          6 => "Juni", 
                          7 => "Juli", 
                          8 => "Agustus", 
                          9 => "September", 
                          10 => "Oktober", 
                          11 => "November", 
                          12 => "Desember"
                        ];
                        $day = $date->format('d');
                        $month = $months[(int)$date->format('m')];
                        $year = $date->format('Y');
                        $indonesianDate = "$day $month $year";

                        ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $no_pendataan;?></td>
                          <td><?php echo $nama_balita;?></td>
                          <td><?php echo $indonesianDate;?></td>
                          <td>
                            <?php if ($status_pengukuran == 'Sudah') { ?>
                              <span class="badge badge-success">sudah</span>
                            <?php }else{ ?>
                              <span class="badge badge-success">belum</span>
                            <?php } ?>
                          </td>
                          <td><?php if ($status_stunting == '0') { ?>
                            <span class="badge badge-primary">Data Belum Di Input</span>
                          <?php }elseif ($status_stunting == '1') { ?>
                            <span class="badge badge-danger">Stunting</span>
                          <?php }else{ ?>
                           <span class="badge badge-success">Normal</span>
                         <?php } ?>
                       </td>
                       <td><button class="btn btn-warning">Edit</button></td>
                       <td><button class="btn btn-danger">Hapus</button></td>
                     </tr>
                   <?php endforeach;?>
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