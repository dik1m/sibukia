	<style>
		/* button */
		button[type="button"], button[type="submit"], button[type="reset"]{
			padding: 4px 6px;
			width: 90px;
			height: 30px;
			font-size: 14px;
			margin-top: 5px;
			border: 1px solid #d083cf;
			color: #FFF;
			background-color: #d083cf;
		}
		button[type="button"]:hover, button[type="submit"]:hover, button[type="reset"]:hover{
			background-color: #ffffff;
			color: #d083cf;
		}
	</style>
	<div class="col-12 col-xl-8">
	<div class="contact-content-area bg-white mb-30 p-30 box-shadow">
		<?php $this->view('frontend/message'); ?>
	<div class="contact-form-area">
	<div class="row">
	<!--kanan-->

		<div class="section-heading">
		<h5>Ubah Data Pengajuan</h5>
		</div>

	<?php
	//ctt pengajuan
	if($data['ctt_pengajuan']==''){
	}else{
		?>
	<div class='col-lg-12 alert alert-info'>
	<?php echo $data['ctt_pengajuan'] ?>
	</div>
	<?php } ?>

	<form method="post" action="<?php echo site_url('PengajuanUsr/update/'.$data['nopengajuan']) ?>" enctype="multipart/form-data">
  <label>Nomor Pengajuan</label><br>
  <input type="text" disabled name='ai_pengajuan' class="form-control" value="<?php echo $data['nopengajuan'] ?>">

	<label>Mengajukan Layanan</label><br>
	<select class="form-control" name="id_layanan" required oninvalid="this.setCustomValidity('Harus Di Isi Pilih Provinsi ')" oninput="setCustomValidity('')">
		<option value="<?php echo $data['id_layanan'] ?>"><?php echo $data['nama_layanan'] ?></option>
	  <?php
	  foreach ($row->result_array() as $r) {
	  ?>
	  <option value="<?php echo $r['id_layanan'] ?>"><?php echo $r['nama_layanan']; ?></option>
	  <?php } ?>
	</select><br><br>


	<label>Nomor KTP</label><br>
	<input type="text" disabled name="no_ktp" class="form-control" placeholder="Masukan Nomor KTP" value="<?php echo $data['no_ktp'] ?>" onKeyPress="return isNumberKey(event)" required oninvalid="this.setCustomValidity('Nomor KTP Harus Di Isi')" oninput="setCustomValidity('')">

  <label>Nama Lengkap</label><br>
  <input type="text" disabled name="nama_user" class="form-control" placeholder="Masukan Nama Lengkap User" value="<?php echo $data['nama_user'] ?>" required oninvalid="this.setCustomValidity('Nama user Harus Di Isi')" oninput="setCustomValidity('')">

  <label>HP</label><br>
  <input type="text" disabled name="hp_user" class="form-control" placeholder="Masukan Nomor HP user" value="<?php echo $data['hp_user'] ?>" required oninvalid="this.setCustomValidity('Nomor HP user Harus Di Isi')" oninput="setCustomValidity('')" onKeyPress="return isNumberKey(event)">

	<label>Alamat</label><br>
	<textarea disabled class="form-control" cols="10" rows="4" name="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat Harus Di Isi')" oninput="setCustomValidity('')"><?php echo $data['alamat_pengaju'] ?></textarea><p></p>



	<label>Tanggal Pengajuan</label><br>
  <input type="date" disabled name="tgl_pengajuan" class="form-control" placeholder="Masukan tanggal pengajuan" value="<?php echo $data['tgl_pengajuan'] ?>" required oninvalid="this.setCustomValidity('Nama user Harus Di Isi')" oninput="setCustomValidity('')">

  <label>Status</label><br>
  <input type="text" disabled name="hp_user" class="form-control" placeholder="Masukan Nomor HP user" value="<?php echo $data['st_pengajuan'] ?>" required oninvalid="this.setCustomValidity('Nomor HP user Harus Di Isi')" oninput="setCustomValidity('')" onKeyPress="return isNumberKey(event)">



	<label>Isi detail pengajuan</label><br>
	<textarea name="isi_pengajuan" class="form-control ckeditor" id="ckeditor" placeholder="Isi Pengajuan" required oninvalid="this.setCustomValidity('Harus Mengisi detail pengajuan')" oninput="setCustomValidity('')"><?php echo $data['isi_pengajuan'] ?></textarea>
<br>
	<img src="<?php echo base_url('assets/img_scan/'.$data['img_scan1']) ?>" width="100%"><br>
	<label><small>Ubah lampiran(jpeg|jpg|png)</small></label><br>
	<input type="file" name="img_scan1"><p></p>

	<?php
	if($data['img_scan2']==''){
	?>
	<label><font color="red"><small>Scan Lampiran belum tersedia(jpeg|jpg|png)</small></font></label><br>
	<input type="file" name="img_scan2"><p></p>
	<?php
	}else{
	?>
	<img src="<?php echo base_url('assets/img_scan/'.$data['img_scan2']) ?>" width="100%"><br>
	<label><small>Ubah lampiran(jpeg|jpg|png)</small></label><br>
	<input type="file" name="img_scan2"><br>
	<?php
	}
	?>

	<?php
	if($data['img_scan3']==''){
	?>
	<label><font color="red"><small>Scan Lampiran belum tersedia(jpeg|jpg|png)</small></font></label><br>
	<input type="file" name="img_scan3"><p></p>
	<?php
	}else{
	?>
	<img src="<?php echo base_url('assets/img_scan/'.$data['img_scan3']) ?>" width="100%"><br>
	<label><small>Ubah lampiran(jpeg|jpg|png)</small></label><br>
	<input type="file" name="img_scan3"><br>
	<?php
	}
	?>

	<br>
	<button type="submit" name="button">Perbaharui</button>
	<button type="reset"  onClick=self.history.back()>Kembali</button>

</form>
</div>
</div>

</div>
</div>
