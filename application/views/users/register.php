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
	<!-- daerah -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax_daerah.js"></script>
	<!-- //daerah -->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url(); ?>assets/login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<?php $this->view('users/message'); ?>
				<form class="login100-form validate-form" action="<?php echo site_url('users/Register') ?>" method="post">
					<span class="login100-form-title p-b-49">
						Website Desa<br>
						<h6>Daftar User</h6>
					</span>

					<label>NIK</label>
					<?= form_error('no_ktp', '<small class="text-danger">', '</small>'); ?><br>
					<input type="text" class="form-control" name="no_ktp" value="<?= set_value('no_ktp'); ?>" placeholder="Masukkan Nomor KTP">
					<p></p>

					<label>Email</label>
					<?= form_error('email_peop', '<small class="text-danger">', '</small>'); ?><br>
					<input type="text" class="form-control" name="email_peop" value="<?= set_value('email_peop'); ?>" placeholder="Masukkan Email User">
					<p></p>

					<label>Nama</label>
					<?= form_error('nm_peop', '<small class="text-danger">', '</small>'); ?><br>
					<input type="text" class="form-control" name="nm_peop" value="<?= set_value('nm_peop'); ?>" placeholder="Masukkan Nama Lengkap">
					<p></p>

					<label>Pilih Provinsi</label>
					<?= form_error('id_prov', '<small class="text-danger">', '</small>'); ?><br>
					<select class="form-control" name="id_prov" id="prop" onchange="ajaxkota(this.value)">
						<option value="">Pilih Provinsi</option>
						<?php
						foreach ($provinsi as $data) {
							echo '<option value="' . $data->id_prov . '">' . $data->nama_prov . '</option>';
						}
						?>
					</select>
					<p></p>

					<label>Pilih Kabupaten/Kota</label>
					<?= form_error('id_kab', '<small class="text-danger">', '</small>'); ?><br>
					<select class="form-control" name="id_kab" id="kota" onchange="ajaxkec(this.value)">
						<option value="">Pilih Kabupaten/Kota</option>
					</select>
					<p></p>

					<label>Pilih Kecamatan</label>
					<?= form_error('id_kec', '<small class="text-danger">', '</small>'); ?><br>
					<select class="form-control" name="id_kec" id="kec" onchange="ajaxkel(this.value)">
						<option value="">Pilih Kecamatan</option>
					</select>
					<p></p>

					<label>Pilih Kelurahan/Desa</label>
					<?= form_error('id_kel', '<small class="text-danger">', '</small>'); ?><br>
					<select class="form-control" name="id_kel" id="kel" onchange="showCoordinate();">
						<option value="">Pilih Kelurahan/Desa</option>
					</select>
					<p></p>

					<label>Alamat</label>
					<?= form_error('addres_peop', '<small class="text-danger">', '</small>'); ?><br>
					<input type="text" class="form-control" name="addres_peop" value="<?= set_value('addres_peop'); ?>" placeholder="Masukkan Alamat Saat Ini">
					<p></p>


					<label>Password</label>
					<?= form_error('password1', '<small class="text-danger">', '</small>'); ?><br>
					<input type="password" class="form-control" name="password1" placeholder="Masukkan Password" value="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Password Harus Di Isi dan password terdiri dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka')" oninput="setCustomValidity('')">
					<p></p>

					<label>Konfirmasi Password</label>
					<?= form_error('password2', '<small class="text-danger">', '</small>'); ?><br>
					<input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" value="">
					<p></p>



					<br><br>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Daftar
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