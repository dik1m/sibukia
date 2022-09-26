<div class="section-heading">
    <h2 class="text-black"><?php echo $judul ?></h2>
</div>
<form method="post" action="<?php echo site_url('AkunUsr/update/'.$akun['id_penduduk']) ?>"  enctype="multipart/form-data">
<div class="row">
	<div class="col-lg-12">
	<?php $this->view('frontend/message'); ?>
	</div>

	<div class="col-lg-6">

  <table style="border: hidden;" width="100%">
      <tr>
        <td align="left"><img src="<?php echo base_url('assets/img_user/'.$akun['img_user1']) ?>" width="55%"></td>
      </tr>
      <tr>
        <td>
          <label>Ubah Foto</label><br>
          <input type="file" class="form-control" name="img_user1">
        </td>
      </tr>
    </table><p></p>

		<label>Nomor KK</label><br>
		<input type="text" name="no_kk" maxlength="18" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Masukan Nomor KK" value="<?php echo $akun['no_kk'] ?>" onKeyPress="return isNumberKey(event)"><p></p>

		<label>Nomor KTP/NIK</label><br>
		<input type="text" name="no_ktp" maxlength="18" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Masukan Nomor KTP" value="<?php echo $akun['no_ktp'] ?>" onKeyPress="return isNumberKey(event)"><p></p>

		<label>Nama Lengkap <font color="red">*</font></label><br>
		<input type="text" name="nama_user" class="form-control" placeholder="Masukan Nama Lengkap User" value="<?php echo $akun['nama_user'] ?>" required oninvalid="this.setCustomValidity('Nama user Harus Di Isi')" oninput="setCustomValidity('')"><p></p>
<!--
		<label>Email</label><br>
		<input type="email" name="email_user" class="form-control" placeholder="Masukan Email user" value=""><p></p>
-->
		<label>HP <font color="red">*</font></label><br>
		<input type="text" maxlength="13" name="hp_user" class="form-control" placeholder="Masukan Nomor HP user" value="<?php echo $akun['hp_user'] ?>" required oninvalid="this.setCustomValidity('Nomor HP user Harus Di Isi')" oninput="setCustomValidity('')" onKeyPress="return isNumberKey(event)"><p></p>

		<label>Whatsapp <small style="color: red;">format 62+NomorWA, contoh: 6281234567891</small> </label><br>
  		<input type="text" maxlength="15" onkeypress="return hanyaAngka(event)" class="form-control" name="wa_user" placeholder="Format 62+Nomor WA" value=""><p></p>

		  <label>Jenis Kelamin</label><br>
		<select name="jenis_kelamin" class="form-control" required>
		<option value="" selected>- Pilih Jenis Kelamin -</option>
		<option value="Laki-Laki">Laki-Laki</option>
		<option value="Perempuan">Perempuan</option>
		</select><p></p>

		<label>Tempat Lahir <font color="red">*</font></label><br>
		<input type="text" name="tmp_lahir" class="form-control" placeholder="Masukan Tempat Lahir" value="" required oninvalid="this.setCustomValidity('Tempat Lahir Harus Di Isi')" oninput="setCustomValidity('')"><p></p>

		<label>Tanggal Lahir <font color="red">*</font></label><br>
		<input type="date" name="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Lahir" value="" required oninvalid="this.setCustomValidity('Tanggal Lahir Harus Di Isi')" oninput="setCustomValidity('')"><p></p>

		<label>Agama</label><br>
		<select name="agama" class="form-control" required>
		<option value="" selected>- Pilih Jenis Kelamin -</option>
		<option value="Islam">Islam</option>
		<option value="Protestan">Protestan</option>
		<option value="Katolik">Katolik</option>
		<option value="Hindu">Hindu</option>
		<option value="Buddha">Buddha</option>
		<option value="Khonghucu">Khonghucu</option>
		</select><p></p>

	</div>

	<div class="col-lg-6">
	<label>Pilih Provinsi</label><br>
	<select name="id_prov" class="form-control">
		<option value="<?php echo $akun['id_prov'] ?>"><?php echo $akun['nama_prov'] ?></option>
		<?php
		foreach ($prov->result_array() as $rprov) {
		?>
		<option value="<?php echo $rprov['id_prov'] ?>"><?php echo $rprov['nama_prov']; ?></option>
		<?php } ?>
	</select><p></p>

	<label>Pilih Kabupaten/Kota</label><br>
	<select name="id_kab" class="form-control">
		<option value="<?php echo $akun['id_kab'] ?>"><?php echo $akun['nama_kab'] ?></option>
		<?php
		foreach ($kab->result_array() as $rkab) {
		?>
		<option value="<?php echo $rkab['id_kab'] ?>"><?php echo $rkab['nama_kab']; ?></option>
		<?php } ?>
	</select><p></p>

	<label>Pilih Kecamatan</label><br>
	<select name="id_kec" class="form-control">
		<option value="<?php echo $akun['id_kec'] ?>"><?php echo $akun['nama_kec'] ?></option>
		<?php
		foreach ($kec->result_array() as $rkec) {
		?>
		<option value="<?php echo $rkec['id_kec'] ?>"><?php echo $rkec['nama_kec']; ?></option>
		<?php } ?>
	</select><p></p>

	<label>Pilih Kelurahan/Desa</label><br>
	<select name="id_kel" class="form-control">
		<option value="<?php echo $akun['id_kel'] ?>"><?php echo $akun['nama_kel'] ?></option>
		<?php
		foreach ($kel->result_array() as $rkel) {
		?>
		<option value="<?php echo $rkel['id_kel'] ?>"><?php echo $rkel['nama_kel']; ?></option>
		<?php } ?>
	</select><p></p>

  <label>Alamat <font color="red">*</font></label><br>
		<textarea class="form-control" cols="10" rows="5" name="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat Harus Di Isi')" oninput="setCustomValidity('')"><?php echo $akun['alamat'] ?></textarea><p></p>

		<label>Kode POS <font color="red">*</font></label><br>
		<input type="text" onkeypress="return hanyaAngka(event)" name="kd_pos" class="form-control" placeholder="Masukan Kode POS" value="<?php echo $akun['kd_pos'] ?>" required oninvalid="this.setCustomValidity('Kode POS Harus Di Isi')" oninput="setCustomValidity('')" onKeyPress="return isNumberKey(event)"><p></p>
	</div>

  <div class="col-lg-12">

  <table style="border: hidden;" width="100%">
      <tr>
        <td>
          <?php
          if($akun['img_user2']==''){
          ?>
          <label><font color="red"><small>KTP belum tersedia</small></font></label><br>
          <input type="file" name="img_user2"><p></p>
          <?php
          }
          else{
          ?>
          <img src="<?php echo base_url('assets/img_berkas/'.$akun['img_user2']) ?>" width="70%"><br>
          <label>Ubah KTP</label><br>
          <input type="file" name="img_user2"><p></p>
          <?php
          }
          ?>
      </td>
      </tr>     
  </table><p></p>

  <table style="border: hidden;" width="100%">
      <tr>
        <td>
          <?php
          if($akun['img_user3']==''){
          ?>
          <label><font color="red"><small>KK belum tersedia</small></font></label><br>
          <input type="file" name="img_user3"><p></p>
          <?php
          }
          else{
          ?>
          <img src="<?php echo base_url('assets/img_berkas/'.$akun['img_user3']) ?>" width="100%"><br>
          <label>Ubah KK</label><br>
          <input type="file" name="img_user3"><p></p>
          <?php
          }
          ?>
      </td>
      </tr>     
  </table><p></p>

  </div>

	<div class="col-lg-12">
		<br>
		<input type="submit" value="Simpan" class="small btn btn-primary px-4 py-2 rounded-0">			
	</div>
</form>
</div>


   
