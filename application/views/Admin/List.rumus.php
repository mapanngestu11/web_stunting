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
                </div>

                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Median Tinggi</th>
                        <th>Standart Deviasi Tinggi</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                       <th>No</th>
                       <th>Median Tinggi</th>
                       <th>Standart Deviasi Tinggi</th>
                       <th>Edit</th>
                     </tr>

                   </tfoot>
                   <tbody>
                     <?php
                     $no = 0;
                     foreach ($rumus->result_array() as $row) :

                      $no++;
                      $id_rumus               = $row['id_rumus'];
                      $tinggi_rata           = $row['tinggi_rata'];
                      $berat_rata           = $row['berat_rata'];
                      $tinggi_standar       = $row['tinggi_standar'];
                      $berat_standar        = $row['berat_standar'];

                      ?>
                      <tr>
                        <td>1</td>
                        <td><?php echo $tinggi_rata;?></td>
                        <td><?php echo $tinggi_standar;?></td>
                        <td>
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal<?php echo $id_rumus;?>">
                            Edit
                          </button>
                        </td>
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


          <!-- edit rumus -->
          <?php
          $no = 0;
          foreach ($rumus->result_array() as $row) :

            $no++;
            $id_rumus               = $row['id_rumus'];
            $tinggi_rata           = $row['tinggi_rata'];
            $berat_rata           = $row['berat_rata'];
            $tinggi_standar       = $row['tinggi_standar'];
            $berat_standar        = $row['berat_standar'];

            ?>
            <div class="modal fade" id="EditModal<?php echo $id_rumus;?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Tambahkan <?php echo $tittle;?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="<?php echo base_url('Admin/Rumus/update/') ?>" method="POST">
                     <span class="badge badge-Primary mb-2">Data Balita</span>
                     <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                         <label>Tinggi Badan Rata-rata</label>
                         <input type="text" name="tinggi_rata" class="form-control" value="<?php echo $tinggi_rata;?>">
                         <input type="hidden" name="id_rumus" value="<?php echo $id_rumus;?>">
                       </div>
                       <div class="col-md-6">
                        <label>Tinggi Badan Standar</label>
                        <input type="text" name="tinggi_standar" class="form-control" value="<?php echo $tinggi_standar;?>">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Ubdah Data</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </form>
            <?php endforeach;?>
          </div>
        </div>
      </div>
      <!-- end -->

    </div>
    <!---Container Fluid-->
  </div>
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