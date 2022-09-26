<div class="section-heading">
	<h2 class="text-black"><?= $judul ?></h2>
</div>

<div class="row">
	<div class="col-lg-12">
		<?php $this->view('users/message'); ?>
	</div>
	<div class="col-lg-12">
		<form method="post" action="<?= site_url('PengajuanUsr/tahap2/' . $this->session->userdata('id_user')) ?>">

			<label>Nomor Pengajuan</label><br>
			<input type="text" disabled name='ai_pengajuan' class="form-control" value="<?= $ai_pengajuan; ?>">
			<input type="hidden" name='ai_pengajuan' class="form-control" value="<?= $ai_pengajuan; ?>">
			<input type="hidden" name='id_penduduk' class="form-control" value="<?= $data['id_penduduk'] ?>">
			<input type="hidden" name='security_key' class="form-control" value="<?= random_string('alnum', 50) ?>">

			<label>Mengajukan Layanan</label><br>
			<select class="form-control" name="id_layanan" required oninvalid="this.setCustomValidity('Mengajukan Layanan Harus Di Isi Pilih')" oninput="setCustomValidity('')">
				<option value="" selected>- Pilih Layanan -</option>
				<?php
				foreach ($row->result_array() as $r) {
				?>
					<option value="<?= $r['id_layanan'] ?>"><?= $r['nama_layanan']; ?></option>
				<?php } ?>
			</select><br><br>
			<span class="label label-warning">Berikut ini data yang mengajuakan, jika ada perubahan data maka ubah pada "AKUN SAYA"</span>
			<p></p>
	</div>


	<!--kanan-->
	<div class="col-lg-6">


		<label>Nomor KK</label><br>
		<?php
		if ($data['no_kk'] == '') {
		?>
			<input type="text" disabled name="no_kk" class="form-control" placeholder="Nomor KK Belum Tersedia" value="" onKeyPress="return isNumberKey(event)">
		<?php
		} else {
		?>
			<input type="text" disabled name="no_kk" class="form-control" placeholder="Masukan Nomor KK" value="<?= $data['no_kk'] ?>" onKeyPress="return isNumberKey(event)">
		<?php } ?>
		<label>Nomor KTP/NIK</label><br>
		<input type="text" disabled name="no_ktp" class="form-control" placeholder="Masukan Nomor KTP" value="<?= $data['no_ktp'] ?>" onKeyPress="return isNumberKey(event)">

		<label>Nama Lengkap</label><br>
		<input type="text" disabled name="nama_user" class="form-control" placeholder="Masukan Nama Lengkap User" value="<?= $data['nama_user'] ?>" required oninvalid="this.setCustomValidity('Nama user Harus Di Isi')" oninput="setCustomValidity('')">

		<label>HP</label><br>
		<input type="text" disabled name="hp_user" class="form-control" placeholder="Masukan Nomor HP user" value="<?= $data['hp_user'] ?>" required oninvalid="this.setCustomValidity('Nomor HP user Harus Di Isi')" oninput="setCustomValidity('')" onKeyPress="return isNumberKey(event)">

		<label>Alamat</label><br>
		<textarea disabled class="form-control" cols="10" rows="4" name="alamat_pengaju" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat Harus Di Isi')" oninput="setCustomValidity('')"> <?= $data['alamat'];
																																																					echo ' Kel. ';
																																																					echo $data['nama_kel'];
																																																					echo ' Kec. ';
																																																					echo $data['nama_kec'];
																																																					echo ' Kab. ';
																																																					echo $data['nama_kab'];
																																																					echo ' Prov. ';
																																																					echo $data['nama_prov'];
																																																					echo ' Kode POS ';
																																																					echo $data['kd_pos'];
																																																					?>
	</textarea>
		<p></p>

		<textarea style="display:none;" class="form-control" cols="10" rows="4" name="alamat_pengaju" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat Harus Di Isi')" oninput="setCustomValidity('')"> <?= $data['alamat'];
																																																								echo ' Kel. ';
																																																								echo $data['nama_kel'];
																																																								echo ' Kec. ';
																																																								echo $data['nama_kec'];
																																																								echo ' Kab. ';
																																																								echo $data['nama_kab'];
																																																								echo ' Prov. ';
																																																								echo $data['nama_prov'];
																																																								echo ' Kode POS ';
																																																								echo $data['kd_pos'];
																																																								?>
	</textarea>

	</div>

	<!--kiri-->
	<div class="col-lg-6">


		<img src="<?= base_url('assets/img_user/' . $data['img_user1']) ?>" width="50%"><br>
		<?php
		//img_user2
		if ($data['img_user2'] == '') {
		?>
			<br>
			<label>
				<font color="red"><small>*KTP belum tersedia</small></font>
			</label><br>
		<?php
		} else {
		?>
			<br>
			<label>Scan KTP</label><br>
			<img src="<?= base_url('assets/img_berkas/' . $data['img_user2']) ?>" width="100%"><br>
		<?php
		}
		?>

	</div>

	<div class="col-lg-12">

		<?php
		//img_user3
		if ($data['img_user3'] == '') {
		?>
			<label>
				<font color="red"><small>KK belum tersedia</small></font>
			</label><br>
			<p></p>
		<?php
		} else {
		?>
			<img src="<?= base_url('assets/img_berkas/' . $data['img_user3']) ?>" width="700"><br>
			<p></p>
		<?php
		}
		?>
		<br>
		<button type="submit">Berikutnya</button>

		</form>

	</div>

</div>