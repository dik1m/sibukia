<!DOCTYPE html>
<html lang="en">

<head>
    <title>desapegundan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?php echo base_url(); ?>assets/login/images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <?php $this->view('users/message'); ?>
                <form class="login100-form validate-form" action="<?php echo site_url('users/Auth/forgotPassword') ?>" method="post">
                    <span class="login100-form-title p-b-49">
                        Website Desa <br>
                        <h6>Halaman Lupa Password</h6>
                    </span>


                    <div class="wrap-input100" data-validate="Username is reauired">
                        <span class="label-input100">Email <?= form_error('email_user', '<small class="text-danger">', '</small>'); ?></span>
                        <input class="input100" type="text" name="email_user" placeholder="Masukkan Email" value="<?= set_value('email_user'); ?>">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>




                    <br><br>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Kirim
                            </button>
                        </div>
                    </div>

                    <div class="flex-col-c p-t-155">
                        <span class="txt1 p-b-17">
                            Kembali kehalaman login
                        </span>

                        <a href="<?php echo site_url('users/Auth') ?>" class="txt2">
                            login
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/js/main.js"></script>

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