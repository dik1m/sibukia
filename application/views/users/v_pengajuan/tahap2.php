	<style>
	/* button */
	button[type="button"], button[type="submit"], button[type="reset"]{
		padding: 4px 6px;
		width: 90px;
		height: 30px;
		font-size: 14px;
		margin-top: 5px;
		border: 1px solid #ed3974;
		color: #FFF;
		background-color: #ed3974;
	}
	button[type="button"]:hover, button[type="submit"]:hover, button[type="reset"]:hover{
		background-color: #000000;
		border: 1px solid #000000;
		color: #FFF;
	}
	</style>
<div class="col-12 col-xl-12">
<div class="contact-content-area bg-white mb-30 p-30 box-shadow">
	<?php $this->view('frontend/message'); ?>
<!-- Contact Form Area -->
<div class="contact-form-area">
<div class="row">
<!--kanan-->
<div class="col-lg-12">
<div class="form-group">
	<div class="section-heading">
	<h5>Layanan Pengajuan</h5>
	</div>

	<?php
	$ai_pengajuan	= $this->input->post('ai_pengajuan');
	$id_penduduk	= $this->input->post('id_penduduk');
	$id_layanan	= $this->input->post('id_layanan');
	$security_key	= $this->input->post('security_key');
	$alamat_pengaju	= $this->input->post('alamat_pengaju');
	?>
	<form class="contact_form" method="post" action="<?php echo site_url('PengajuanUsr/save') ?>" enctype="multipart/form-data">
	<input type="hidden" name='ai_pengajuan' class="form-control" value="<?php echo $ai_pengajuan ?>">
	<input type="hidden" name='id_penduduk' class="form-control" value="<?php echo $id_penduduk ?>">
	<input type="hidden" name='id_layanan' class="form-control" value="<?php echo $id_layanan ?>">
	<input type="hidden" name='security_key' class="form-control" value="<?php echo $security_key ?>">
	<textarea class="form-control"  style="display:none;" cols="10" rows="4" name="alamat_pengaju" placeholder="Alamat"><?php echo $alamat_pengaju ?></textarea>

	<label>Isi detail pengajuan</label><br>
	<textarea name="isi_pengajuan" class="form-control ckeditor" id="ckeditor" placeholder="Isi Pengajuan" required oninvalid="this.setCustomValidity('Harus Mengisi detail pengajuan')" oninput="setCustomValidity('')"></textarea>
<br>

	<label>Scan Lampiran<font color="red">*</font> <span class="label label-warning">Format jpeg|jpg|png</span></label><br>
	<input type="file" name="img_scan1" required oninvalid="this.setCustomValidity('Harus Unggah Scan Lampiran')" oninput="setCustomValidity('')"><p></p>

	<label>Scan Lampiran <span class="label label-warning">Tambahkan unggah jika diperlukan (jpeg|jpg|png)</span></label><br>
	<input type="file" name="img_scan2"><p></p>

	<label>Scan Lampiran <span class="label label-warning">Tambahkan unggah jika diperlukan (jpeg|jpg|png)</span></label><br>
	<input type="file" name="img_scan3"><br><br>

	<br>
	<button type="submit">Simpan</button>
</form>
</div>
</div>

</div>
</div>
</div>
</div>

