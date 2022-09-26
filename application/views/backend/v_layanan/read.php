<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
	<?php $this->view('backend/message'); ?>
	<div class="card mb-3">
		<div class="card-header">
			<a href="<?php echo site_url('backend/Layanan/create') ?>"><button type="button" class="btn btn-primary"><span class="btn-label"><i class="fas fa-plus"></i></span>Tambah</button></a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="dataTable" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Status</th>
							<th>Nama Layanan</th>
							<th>Info</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($read->result_array() as $row) {
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td>
									<?php
									if ($row['st_layanan'] == 'Publik') {
									?>
										<span class="badge badge-success">Publis</span>
									<?php
									} else {
									?>
										<span class="badge badge-secondary">Blok</span>
									<?php
									}
									?>
								</td>
								<td><?php echo $row['nm_layanan'] ?></td>
								<td><?php echo substr($row['isi_layanan'], 0, 100) ?>...</td>
								<td>
									<?php
									if ($row['st_layanan'] == 'Publik') {
									?>
										<a href="<?php echo site_url('backend/Layanan/status/' . $row['id_layanan']) . '/' . 'Blokir'; ?>" title="Ubah status ke Blok" class="badge badge-success"><i class="fas fa-smile"></i> Publik</a>
									<?php
									} elseif ($row['st_layanan'] == 'Blokir') {
									?>
										<a href="<?php echo site_url('backend/Layanan/status/' . $row['id_layanan']) . '/' . 'Publik'; ?>" title="Ubah status ke Publik" class="badge badge-secondary"><i class="fas fa-frown"></i> Blok</a>
									<?php
									}
									?>

									<a href="<?php echo site_url('backend/Layanan/edit/' . $row['id_layanan']) ?>" title="Ubah Data" class="badge badge-primary"><i class="far fa-edit"></i> Ubah</a>
									<a href="<?php echo site_url('backend/Layanan/delete/' . $row['id_layanan']) ?>" title="Hapus data" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $row['nm_layanan']; ?>')" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>

								</td>
							</tr>
						<?php
							$no++;
						}
						?>
				</table>
			</div>
		</div>
	</div>
</div>