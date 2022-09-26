<div class="section-heading">
    <h2 class="text-black"><?php echo $judul ?></h2>
</div>
<form action="<?php echo site_url('DaftarUsr/save') ?>" method="post">
<div class="row">
	<div class="col-lg-12">
	<?php $this->view('frontend/message'); ?>
	</div>

	<div class="col-lg-6">
		<label>Nomor KK</label><br>
		<input maxlength="18" onkeypress="return hanyaAngka(event)" type="text" name="no_kk" class="form-control" placeholder="Masukan Nomor KK" value="" onKeyPress="return isNumberKey(event)"><p></p>

		<label>Nomor KTP/NIK</label><br>
		<input maxlength="18" onkeypress="return hanyaAngka(event)" type="text" name="no_ktp" class="form-control" placeholder="Masukan Nomor KTP" value="" onKeyPress="return isNumberKey(event)"><p></p>

		<label>Nama Lengkap <font color="red">*</font></label><br>
		<input type="text" name="nama_user" class="form-control" placeholder="Masukan Nama Lengkap User" value="" required oninvalid="this.setCustomValidity('Nama user Harus Di Isi')" oninput="setCustomValidity('')"><p></p>

		<label>Email</label><br>
		<input type="email" name="email_user" class="form-control" placeholder="Masukan Email user" value=""><p></p>

		<label>HP <font color="red">*</font></label><br>
		<input maxlength="13" onkeypress="return hanyaAngka(event)" type="text" name="hp_user" class="form-control" placeholder="Masukan Nomor HP user" value="" required oninvalid="this.setCustomValidity('Nomor HP user Harus Di Isi')" oninput="setCustomValidity('')" onKeyPress="return isNumberKey(event)"><p></p>

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
		<label>Pilih Provinsi <font color="red">*</font></label><br>
		<select class="form-control" name="id_prov" id="prop" onchange="ajaxkota(this.value)" required oninvalid="this.setCustomValidity('Harus Di Isi Pilih Provinsi ')" oninput="setCustomValidity('')">
		<option value="">Pilih Provinsi</option>
		<?php
		foreach($provinsi as $data){
		echo '<option value="'.$data->id_prov.'">'.$data->nama_prov.'</option>';
		}
		?>
		</select><p></p>

		<label>Pilih Kabupaten/Kota <font color="red">*</font></label><br>
		<select class="form-control" name="id_kab" id="kota" onchange="ajaxkec(this.value)" required oninvalid="this.setCustomValidity('Harus Di Isi Pilih Kabupaten/Kota')" oninput="setCustomValidity('')">
		<option value="">Pilih Kabupaten/Kota</option>
		</select><p></p>

		<label>Pilih Kecamatan <font color="red">*</font></label><br>
		<select class="form-control" name="id_kec" id="kec" onchange="ajaxkel(this.value)" required oninvalid="this.setCustomValidity('Harus Di Isi Pilih Kecamatan ')" oninput="setCustomValidity('')">
		<option value="">Pilih Kecamatan</option>
		</select><p></p>

		<label>Pilih Kelurahan/Desa <font color="red">*</font></label><br>
		<select class="form-control" name="id_kel" id="kel" onchange="showCoordinate();" required oninvalid="this.setCustomValidity('Harus Di Isi Pilih Kelurahan/Desa ')" oninput="setCustomValidity('')">
		<option value="">Pilih Kelurahan/Desa</option>
		</select><p></p>

		<label>Alamat <font color="red">*</font></label><br>
		<textarea class="form-control" cols="10" rows="5" name="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat Harus Di Isi')" oninput="setCustomValidity('')"></textarea><p></p>

		<label>Kode POS <font color="red">*</font></label><br>
		<input onkeypress="return hanyaAngka(event)" type="text" name="kd_pos" class="form-control" placeholder="Masukan Kode POS" value="" required oninvalid="this.setCustomValidity('Kode POS Harus Di Isi')" oninput="setCustomValidity('')" onKeyPress="return isNumberKey(event)"><p></p>


		<label>Password <font color="red">*</font></label><br>
		<input type="password" name="pswd_user" class="form-control" placeholder="Masukan Password" value="" required oninvalid="this.setCustomValidity('Password Harus Di Isi')" oninput="setCustomValidity('')"><p></p>

		<label>Konfirmasi Password <font color="red">*</font></label><br>
		<input type="password" name="kpswd_user" class="form-control" placeholder="Masukan Kembali password" value="" required oninvalid="this.setCustomValidity('Konfrimasi Password Harus Di Isi')" oninput="setCustomValidity('')"><p></p>			
	</div>

	<div class="col-lg-12">
		<br>
		<input type="submit" value="Simpan" class="small btn btn-primary px-4 py-2 rounded-0">			
	</div>
</form>
</div>


   
