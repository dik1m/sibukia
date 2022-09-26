<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
	<?php $this->view('backend/message'); ?>

	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
			<div class="card-box noradius noborder bg-danger">
				<i class="far fa-user float-right text-white"></i>
				<h6 class="text-white text-uppercase m-b-20">User</h6>
				<h1 class="m-b-20 text-white counter"><?= $total_user ?></h1>
				<a href="<?= site_url('UserBack') ?>"><span class="text-white">Read Info</span></a>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
			<div class="card-box noradius noborder bg-purple">
				<i class="fas fa-download float-right text-white"></i>
				<h6 class="text-white text-uppercase m-b-20">Penduduk</h6>
				<h1 class="m-b-20 text-white counter"><?= $total_people ?></h1>
				<a href="<?= site_url('UserBack') ?>"><span class="text-white">Read Info</span></a>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
			<div class="card-box noradius noborder bg-warning">
				<i class="fas fa-shopping-cart float-right text-white"></i>
				<h6 class="text-white text-uppercase m-b-20">Kategori</h6>
				<h1 class="m-b-20 text-white counter"><?= $total_kategori ?></h1>
				<a href="<?= site_url('UserBack') ?>"><span class="text-white">Read Info</span></a>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
			<div class="card-box noradius noborder bg-info">
				<i class="far fa-envelope float-right text-white"></i>
				<h6 class="text-white text-uppercase m-b-20">Berita</h6>
				<h1 class="m-b-20 text-white counter"><?= $total_berita ?></h1>
				<a href="<?= site_url('UserBack') ?>"><span class="text-white">Read Info</span></a>
			</div>
		</div>
	</div>
	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
			<div class="card">

				<!-- /.card-header -->
				<div class="card-body">
					<div class="table-responsive">
						<table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal</th>
									<th>Judul</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($berita->result_array() as $row) {
								?>
									<tr>
										<td><?= $no ?></td>
										<td>
											<small class="badge badge-secondary">
												<font color="white"><?= $row['tgl_berita'] ?></font>
											</small>

										</td>
										<td><?= $row['judul_berita'] ?></td>

									</tr>

								<?php
									$no++;
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
			<div class="card mb-3">
				<div class="card-header">
					<h3><i class="far fa-user"></i> Profil</h3>
				</div>
				<div class="card-body text-center">

					<div class="row">
						<div class="col-lg-12">
							<img alt="avatar" class="img-fluid" src="<?= base_url('assets/img_user/' . $user['img_user']) ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<br>
							<h5><?= $user['nm_user'] ?></h5>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<a href="<?= site_url('backend/User/edit/' . $user['kd_user']) ?>"><button type="button" class="btn btn-danger btn-block mt-3">Ubah Profil</button></a>
						</div>

						<div class="col-lg-12">
							<a href="<?= site_url('backend/User/changepswd/' . $user['kd_user']) ?>"><button type="button" class="btn btn-info btn-block mt-3">Ganti Password</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>