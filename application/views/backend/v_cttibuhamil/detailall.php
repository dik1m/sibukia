<section class="content">
	<div class="container-fluid">
		<form method="post" action="<?= site_url('backend/Posyandu/catatanibuhamil/') ?>">
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
							<h3 class="card-title" style="color: white;">
								Data Ibu Hamil
							</h3>
						</div>
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No</th>

										<th>No KIA</th>
										<th>Nama Ibu</th>
										<th>Nama Suami</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($kia->result_array() as $k) {
									?>
										<tr>
											<td><?= $no; ?></td>
											<td><?= $k['no_kia'] ?></td>

											<td><?= $k['nmibu_kia'] ?></td>
											<td>
												<?php
												if ($k['nmbpk_kia'] == '') {
												?>
													<span class="badge badge-secondary"><i class="fa fa-exclamation"></i> tidak tersedia</span>
												<?php
												} else {
												?>
													<?= $k['nmbpk_kia'] ?>
												<?php
												}
												?>
											</td>
											<td>
												<a href="<?= site_url('backend/CttIbuHamil/edit/' . $k['gb_posykia']) ?>" title="Ubah Data" class="badge badge-primary"><i class="far fa-edit"></i></a>
												<a href="<?= site_url('backend/CttIbuHamil/delete/' . $k['gb_posykia']) ?>" title="Hapus data" onclick="javascript: return confirm('Yakin Mau dihapus Nomor KIA <?= $k['no_kia']; ?>')" class="badge badge-danger"><i class="fas fa-trash"></i></a>
												<!-- baru -->
											</td>
										</tr>

									<?php
										$no++;
									}
									?>
								</tbody>
							</table>
						</div>
					</div>

				</section>

			</div>
		</form>
	</div>

</section>