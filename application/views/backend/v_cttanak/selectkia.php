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
								Data Perkembangan Anak
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
										<th>Nama Anak</th>
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
											<td><?= $k['nmanak_kia'] ?></td>
											<td>

												<a href="<?php echo site_url('backend/CttAnak/create/' . $posy['no_posy'] . '/' . $k['no_kia']) ?>" title="Detail Data" class="btn btn-block bg-gradient-success btn-xs">
													<i class="fa fa-plus"></i> Tambah</a>

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