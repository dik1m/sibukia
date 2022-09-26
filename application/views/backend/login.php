<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>sibukia</title>

  <link rel="icon" href="<?php echo base_url(); ?>assets/img_icon/img_icon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <!-- <a href="#" class="h1"><b>SI</b>BUKIA</a> -->
        <table width="100%">
          <tr>
            <td align="center">
              <img src="<?= base_url(); ?>assets/img_icon/img_icon.png" alt="Logo">
            </td>
          <tr>
            <td align="center">
              <b>Kementrian Kesehatan</b> <br> <small>Republik Indonesia</small>
            </td>
          </tr>


          </tr>
        </table>
      </div>
      <div class="card-body">
        <?php $this->view('backend/message'); ?>
        <p class="login-box-msg">Halaman Login Administrator</p>

        <form action="<?php echo site_url('backend/Auth') ?>" method="post">
          <?= form_error('email_user', '<small class="text-danger">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="email" name="email_user" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?= form_error('pswd_user', '<small class="text-danger">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="password" name="pswd_user" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <br><br>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-lock"></i> Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.social-auth-links -->

        <br>
        <p class="mb-0">
          <a href="<?php echo site_url('backend/Auth/forgotPassword') ?>" class="text-center">Lupa Password</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/backend/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/backend/dist/js/adminlte.min.js"></script>

  <!-- message -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#notice').hide();
      <?php if ($this->session->flashdata('message_true')) { ?>
        $('#notice').fadeIn(2000);
        $('#notice').addClass('alert-success');
        $('#pesan').html('<?php echo $this->session->flashdata('message_true'); ?>');
        $('#notice').delay(2000).fadeOut(2000);
      <?php } elseif ($this->session->flashdata('message_false')) { ?>
        $('#notice').fadeIn(2000);
        $('#notice').addClass('alert-danger');
        $('#pesan').html('<?php echo $this->session->flashdata('message_false'); ?>');
        $('#notice').delay(2000).fadeOut(2000);
      <?php } ?>
    });
  </script>
  <!-- end message -->

</body>

</html>