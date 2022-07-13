<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register - Perpustakaan</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url() ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="<?php echo base_url() ?>register/doregister">
              <h1>Register</h1>
              <?php
                $announce = $this->session->flashdata('announce');
                if(!empty($announce)){
                  echo '
                    <div class="alert alert-danger">
                    '.$announce.' 
                    </div>
                  ';
                }
              ?>
              <div class="form-group text-left">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" />
              </div>
              <div class="form-group text-left">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="gender">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group text-left">
                    <label>No. Telepon</label>
                    <input type="number" name="telp" class="form-control">
                </div>
              <div class="form-group text-left">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" />
              </div>
              <div class="form-group text-left">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" />
              </div>
              <div>
                <button class="btn btn-default submit pull-left">Register</button>
                <button type="button" onclick="window.location.href='<?php echo base_url('login'); ?>'" class="btn btn-default submit pull-right">Login</button>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-book"></i>  Perpustakaan</h1>
                  <p>Copyright © <?php echo date('Y') ?> All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
