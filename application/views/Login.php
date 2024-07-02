<!DOCTYPE html>
<html lang="en">
<?php include 'Admin/Pages/Head.php';?>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <style type="text/css">
    .logo_posyandu
    {
      height: 180px;
      width: 200px;
    }
  </style>
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">

                    <img class="logo_posyandu" src="<?php echo base_url() . "assets/Homepage/assets/"; ?>img/logo_posyandu.png" height="70" alt="logo" />
                  </div>
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="username" class="form-control" id="exampleInputEmail" aria-describedby="usename"
                      placeholder="Username" required="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" required="">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                        Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <hr>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <?php include 'Admin/Pages/Js.php';?>
</body>

</html>