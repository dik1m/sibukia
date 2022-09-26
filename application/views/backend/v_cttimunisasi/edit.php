<section class="content">
	<div class="container-fluid">
		<form method="post" action="<?= site_url('backend/CttAnak/edit/' . $edit['gb_posykia']) ?>">
			<div class="row">

				<!-- posyandu -->
				<section class="col-lg-4">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">
								Data Posyandu
							</h3>
						</div>
						<div class="card-body">
							<div class="card-body">

								<div class="alert alert-primary alert-dismissible">
									<h5>No. Posyandu</h5>
									<?php echo $edit['no_posy'] ?>
									<input type="hidden" name='no_posy' class="form-control" value="<?= $edit['no_posy']; ?>">
								</div>

								<div class="alert alert-primary alert-dismissible">
									<h5>Tanggal</h5>
									<?php echo $edit['tgl_posy'] ?>
									<input type="hidden" name='tgl_posy' class="form-control" value="<?= $edit['tgl_posy']; ?>">
								</div>


								<div class="alert alert-primary alert-dismissible">
									<h5>Tempat</h5>
									<?php echo $edit['tmp_posy'] ?>
								</div>
							</div>
						</div>
				</section>
				<!-- end posyandu -->

				<!-- kia -->
				<section class="col-lg-8">
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">
								Data Perkembangan Anak
							</h3>
						</div>
						<div class="card-body">
							<table class="table">
								<tr>
									<td>No KIA</td>
									<td>:</td>
									<td>
										<?= $edit['no_kia'] ?>
										<input type="hidden" name='no_kia' class="form-control" value="<?= $edit['no_kia']; ?>">
										<input type="hidden" name='st_kia' class="form-control" value="<?= $edit['st_kia']; ?>">
									</td>
								</tr>
								<tr>
									<td>Nama Ibu</td>
									<td>:</td>
									<td><?= $edit['nmibu_kia'] ?></td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td>:</td>
									<td><?= $edit['born_tglibu'] ?></td>
								</tr>
								<tr>
									<td>Nama Anak</td>
									<td>:</td>
									<td><?= $edit['nmanak_kia'] ?></td>
								</tr>
								<tr>
									<td>Tempat, Tanggal Lahir</td>
									<td>:</td>
									<td><?php
										echo
										$edit['born_tmpanak'];
										echo ', ';
										echo $edit['born_tglanak'] ?></td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td>:</td>
									<td>
										<?php
										if ($edit['gender_anak'] == 'Perempuan') {
										?>
											<span class="badge badge" style="background-color:#f829c5;color: white;"><i class="fa fa-venus"></i> <?= $edit['gender_anak'] ?></span>
										<?php } else { ?>
											<span class="badge badge-primary"><i class="fa fa-mars"></i> <?= $edit['gender_anak'] ?></span>
										<?php } ?>
									</td>
								</tr>



								</tr>
							</table>
						</div>
					</div>
				</section>

				<!-- jika kia sdh digunakan -->
				<?= form_error(
					'gb_posykia',
					'<div class="alert alert-danger alert-dismissible col-lg-12"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <h5><i class="icon fas fa-ban"></i> Peringatan!</h5>',
					'</div>'
				); ?>
				<input type="hidden" name='gb_posykia' class="form-control" value="<?php echo $edit['no_posy'];
																					echo $edit['no_kia']; ?>">
				<!-- jika kia sdh digunakan -->

				<section class="col-lg-12">
					<div class="card card-warning">
						<div class="card-header">
							<h3 class="card-title" style="color: white;">
								Data Perkembangan Anak
							</h3>
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<!--kiri-->
									<label>Umur Terakhir</label>
									<select name="bln_umur" disabled class="form-control">
										<option value="<?php echo $last['bln_umur'] ?>"><?php echo $last['th_umur'];
																						echo ' | KMB(gr) ';
																						echo $last['kbm_umur']; ?></option>
										<?php
										foreach ($umur->result_array() as $u) {
										?>
											<option value="<?= $u['bln_umur'] ?>"><?php echo $u['th_umur'];
																					echo ' | KMB(gr) ';
																					echo $u['kbm_umur']; ?></option>
										<?php } ?>
									</select>
									<p></p>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">BB(gr) Terakhir</label>
											<input type="text" disabled class="form-control" name="bb_ank" placeholder="-" value="<?= $last['bb_ank']; ?>">
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">BB(gr)<a style="color: red;">*</a></label>
											<?= form_error('bb_ank', '<small class="text-danger">', '</small>'); ?><br>
											<input type="text" class="form-control" name="bb_ank" placeholder="Masukkan BB(gr)" value="<?= $edit['bb_ank']; ?>">
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Panjang Badan(cm) Terakhir</label>
											<input type="text" disabled class="form-control" name="panjang_ank" placeholder="-" value="<?= $last['panjang_ank']; ?>">
										</div>
										<div class="form-group col-md-6">
											<label for="inputPassword4">Panjang Badan(cm)</label>
											<?= form_error('panjang_ank', '<small class="text-danger">', '</small>'); ?><br>
											<input type="text" class="form-control" name="panjang_ank" placeholder="Masukkan BB(gr)" value="<?= $edit['panjang_ank']; ?>">
										</div>
									</div>

									<label>ASI Eksklusif</label>
									<?= form_error('asi_ank', '<small class="text-danger">', '</small>'); ?><br>
									<select name="asi_ank" class="form-control">
										<?php
										if ($edit['asi_ank'] == '') {
										?>
											<option value="" selected>- Pilih ASI Eksklusif -</option>
										<?php
										} else { ?>
											<option value="<?= $edit['asi_ank'] ?>" selected><?= $edit['asi_ank']; ?></option>
										<?php } ?>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
									<p></p>

									<label>Imunisasi</label>
									<?= form_error('id_imunisasi', '<small class="text-danger">', '</small>'); ?><br>
									<select name="id_imunisasi" class="form-control">
										<option value="<?= $edit['id_imunisasi'] ?>" selected><?= $edit['nm_imunisasi']; ?></option>
										<?php
										foreach ($imunisasi->result_array() as $im) {
										?>
											<option value="<?= $im['id_imunisasi'] ?>"><?php echo $im['nm_imunisasi']; ?></option>
										<?php } ?>
									</select>
									<p></p>

									<label for="inputEmail4">Pemberian Vitamin</label>
									<input type="text" class="form-control" name="vitamin_ank" value="<?= $edit['vitamin_ank']; ?>" placeholder="Masukan Pemberian Vitamin">
									<p></p>

								</div>
								<div class="col-md-6">
									<!--kanan-->
									<label>Umur<a style="color: red;">*</a></label>
									<?= form_error('bln_umur', '<small class="text-danger">', '</small>'); ?>

									<select name="bln_umur" class="form-control">
										<option value="<?= $edit['bln_umur'] ?>" selected><?php echo $edit['th_umur'];
																							echo ' | KMB(gr) ';
																							echo $edit['kbm_umur']; ?></option>
										<?php
										foreach ($umur->result_array() as $u) {
										?>
											<option value="<?= $u['bln_umur'] ?>"><?php echo $u['th_umur'];
																					echo ' | KMB(gr) ';
																					echo $u['kbm_umur']; ?></option>
										<?php } ?>
									</select>
									<p></p>

									<label>Hasil BB<a style="color: red;">*</a></label>
									<?= form_error('hbb_ank', '<small class="text-danger">', '</small>'); ?><br>
									<select name="hbb_ank" class="form-control">
										<option value="<?= $edit['hbb_ank'] ?>" selected><?= $edit['hbb_ank']; ?></option>
										<option value="Sangat Kurus">Sangat Kurus</option>
										<option value="Kurus">Kurus</option>
										<option value="Normal">Normal</option>
										<option value="Gemuk">Gemuk</option>
										<option value="Obesitas">Obesitas</option>
									</select>
									<p></p>

									<label>Hasil Panjang Badan(cm)</label>
									<?= form_error('hpanjang_ank', '<small class="text-danger">', '</small>'); ?><br>
									<select name="hpanjang_ank" class="form-control">
										<?php
										if ($edit['hpanjang_ank'] == '') {
										?>
											<option value="" selected>- Hasil Panjang Badan -</option>
										<?php
										} else { ?>
											<option value="<?= $edit['hpanjang_ank'] ?>" selected><?= $edit['hpanjang_ank']; ?></option>
										<?php } ?>
										<option value="Sangat Pendek">Sangat Pendek</option>
										<option value="Pendek">Pendek</option>
										<option value="Normal">Normal</option>
										<option value="Tinggi">Tinggi</option>
									</select>
									<p></p>

								</div>

							</div>
						</div>

					</div>
				</section>

				<section class="col-lg-12">
					<div class="card card-danger">
						<div class="card-header">
							<h3 class="card-title">
								Data Tenaga Kesehatan
							</h3>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<label>Tenaga Kesehatan <a style="color: red;">*</a></label>
								<?= form_error('nik_kes', '<small class="text-danger">', '</small>'); ?><br>
								<select name="nik_kes" class="form-control">
									<option value="<?= $edit['nik_kes'] ?>" selected><?= $edit['nm_kes']; ?></option>
									<?php
									foreach ($tenagakes->result_array() as $tkes) {
									?>
										<option value="<?= $tkes['nik_kes'] ?>"><?= $tkes['nm_kes']; ?></option>
									<?php } ?>
								</select>
								<p></p>

								<br>
								<button class="mb-xs mt-xs mr-xs btn btn-primary" type="submit">Simpan</button>
								<a href="<?= site_url('backend/CttAnak') ?>" title="Kembali"><button class="mb-xs mt-xs mr-xs btn btn-secondary" type="button">Batal</button></a>

							</div>

						</div>
					</div>
				</section>




			</div>
		</form>
	</div>

</section>