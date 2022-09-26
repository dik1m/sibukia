<section class="content">
	<div class="container-fluid">
		<form method="post" action="<?= site_url('backend/CttIbuHamil/create/' . $posy['no_posy'] . '/' . $kia['no_kia']) ?>" enctype="multipart/form-data">
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
									<?php echo $posy['no_posy'] ?>
									<input type="hidden" name='no_posy' class="form-control" value="<?= $posy['no_posy']; ?>">
								</div>

								<div class="alert alert-primary alert-dismissible">
									<h5>Tanggal</h5>
									<?php echo $posy['tgl_posy'] ?>
									<input type="hidden" name='tgl_posy' class="form-control" value="<?= $posy['tgl_posy']; ?>">
								</div>

								<div class="alert alert-primary alert-dismissible">
									<h5>Tempat</h5>
									<?php echo $posy['tmp_posy'] ?>
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
								Data Ibu Hamil
							</h3>
						</div>
						<div class="card-body">
							<table class="table">
								<tr>
									<td>No KIA</td>
									<td>:</td>
									<td>
										<?= $kia['no_kia'] ?>
										<input type="hidden" name='no_kia' class="form-control" value="<?= $kia['no_kia']; ?>">
										<input type="hidden" name='st_kia' class="form-control" value="<?= $kia['st_kia']; ?>">
									</td>
								</tr>
								<tr>
									<td>Nama Ibu</td>
									<td>:</td>
									<td><?= $kia['nmibu_kia'] ?></td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td>:</td>
									<td><?= $kia['born_tglibu'] ?></td>
								</tr>
								<tr>
									<td width="50%">Haid Pertama Haid Terakhir(HPHT)</td>
									<td>:</td>
									<td><?= $kia['born_tglibu'] ?></td>
								</tr>
								<tr>
									<td>Hari Taksiran Persalinan(HTP)</td>
									<td>:</td>
									<td><?= $kia['born_tglibu'] ?></td>
								</tr>
								<tr>
									<td>Hamil Ke</td>
									<td>:</td>
									<td><?= $kia['hamilke'] ?></td>
								</tr>
								<tr>
									<td>Anak terakhir umur</td>
									<td>:</td>
									<td><?= $kia['age_anakterakhir'] ?> Tahun</td>
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
				<input type="hidden" name='gb_posykia' class="form-control" value="<?php echo $posy['no_posy'];
																					echo $kia['no_kia']; ?>">
				<!-- jika kia sdh digunakan -->

				<section class="col-lg-12">
					<div class="card card-warning">
						<div class="card-header">
							<h3 class="card-title" style="color: white;">
								Data Ibu Hamil
							</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<!--kiri-->
									<label>Keluhan Sekarang</label>
									<?= form_error('keluhan_mil', '<small class="text-danger">', '</small>'); ?><br>
									<input type="text" class="form-control" name="keluhan_mil" value="<?= set_value('keluhan_mil'); ?>" placeholder="Masukkan Keluhan Sekarang">
									<p></p>

									<label>Tekanan Darah(mmHg)</label>
									<?= form_error('tekdarah_mil', '<small class="text-danger">', '</small>'); ?><br>
									<input type="text" class="form-control" name="tekdarah_mil" value="<?= set_value('tekdarah_mil'); ?>" placeholder="Masukkan Tekanan Darah(mmHg)">
									<p></p>

									<label>Berat Badan(Kg)</label>
									<?= form_error('berat_mil', '<small class="text-danger">', '</small>'); ?><br>
									<input type="text" class="form-control" name="berat_mil" value="<?= set_value('berat_mil'); ?>" placeholder="Masukkan Berat Badan(Kg)">
									<p></p>

									<label>Umur Kehamilan(Minggu)</label>
									<?= form_error('umur_mil', '<small class="text-danger">', '</small>'); ?><br>
									<input type="text" class="form-control" name="umur_mil" value="<?= set_value('umur_mil'); ?>" placeholder="Masukkan Umur Kehamilan(Minggu)">
									<p></p>

									<label>Tinggi Fundus(Cm)</label>
									<?= form_error('fundus_mil', '<small class="text-danger">', '</small>'); ?><br>
									<input type="text" class="form-control" name="fundus_mil" value="<?= set_value('fundus_mil'); ?>" placeholder="Masukkan Tinggi Fundus(Cm)">
									<p></p>

									<label>Letak Janin Kep/Su/Li</label>
									<?= form_error('janin_mil', '<small class="text-danger">', '</small>'); ?><br>
									<input type="text" class="form-control" name="janin_mil" value="<?= set_value('janin_mil'); ?>" placeholder="Masukkan Letak Janin Kep/Su/Li">
									<p></p>

									<label>Denyut Jantung Janin/Menit</label>
									<?= form_error('denjantung_mil', '<small class="text-danger">', '</small>'); ?><br>
									<input type="text" class="form-control" name="denjantung_mil" value="<?= set_value('denjantung_mil'); ?>" placeholder="Masukkan Denyut Jantung Janin/Menit">
									<p></p>


								</div>
								<div class="col-md-6">
									<!--kanan-->
									<label>Kaki Bengkak</label>
									<?= form_error('kaki_mil', '<small class="text-danger">', '</small>'); ?><br>
									<select name="kaki_mil" class="form-control">
										<option value="" selected>- Pilih Kaki Bengkak -</option>
										<option value="-">-</option>
										<option value="+">+</option>
									</select>
									<p></p>

									<label>Hasil Periksa Laboratorium</label>
									<?= form_error('hasillab_mil', '<small class="text-danger">', '</small>'); ?><br>
									<textarea name="hasillab_mil" class="form-control" placeholder="Masukkan Keluhan Sekarang"><?= set_value('hasillab_mil'); ?></textarea>
									<p></p>

									<label>Tindakan (Pemberian TT, Fe, Terapi, Rujukan, Umpan Balik)</label>
									<?= form_error('tindakan_mil', '<small class="text-danger">', '</small>'); ?><br>
									<textarea name="tindakan_mil" class="form-control" placeholder="Masukkan Tindakan (Pemberian TT, Fe, Terapi, Rujukan, Umpan Balik)"><?= set_value('tindakan_mil'); ?></textarea>
									<p></p>

									<label>Nasihat Yang Disampaikan</label>
									<?= form_error('nasehat_mil', '<small class="text-danger">', '</small>'); ?><br>
									<textarea name="nasehat_mil" class="form-control" placeholder="Masukkan Nasihat Yang  Disampaikan)"><?= set_value('nasehat_mil'); ?></textarea>
									<p></p>

									<label>Kapan Harus Kembali</label>
									<?= form_error('kembali_mil', '<small class="text-danger">', '</small>'); ?><br>
									<input type="text" class="form-control" name="kembali_mil" value="<?= set_value('kembali_mil'); ?>" placeholder="Masukkan Kapan Harus Kembali">
									<p></p>

								</div>

								<div class="col-md-12">
									<br>
									<label>Diisi oleh Tenaga Kesehatan (Dokter dan Dokter Spesialis</label>
									<?= form_error('ketspesialis_mil', '<small class="text-danger">', '</small>'); ?><br>
									<textarea name="ketspesialis_mil" class="form-control ckeditor" placeholder="Diisi oleh Tenaga Kesehatan (Dokter dan Dokter Spesialis<"><?= set_value('ketspesialis_mil'); ?></textarea>
									<p></p>
								</div>
								<p></p>

								<label>Upload Gambar</label><br>
								<input type="file" name="img_mil" class="form-control"><br>

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
								<label>Tenaga Kesehatan</label>
								<?= form_error('nik_kes', '<small class="text-danger">', '</small>'); ?><br>
								<select name="nik_kes" class="form-control">
									<option value="" selected>- Pilih Tenaga Kesehatan -</option>
									<?php
									foreach ($tenagakes->result_array() as $tkes) {
									?>
										<option value="<?= $tkes['nik_kes'] ?>"><?= $tkes['nm_kes']; ?></option>
									<?php } ?>
								</select>
								<p></p>

								<br>
								<button class="mb-xs mt-xs mr-xs btn btn-primary" type="submit">Simpan</button>
								<a href="<?= site_url('backend/CttIbuHamil') ?>" title="Kembali"><button class="mb-xs mt-xs mr-xs btn btn-secondary" type="button">Batal</button></a>

							</div>

						</div>
					</div>
				</section>


			</div>
		</form>
	</div>

</section>