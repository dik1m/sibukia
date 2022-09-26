<div class="col-12">
	<?php $this->view('backend/message'); ?>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">
				<a href="<?= site_url('backend/Berita/create') ?>"><button class="btn btn-block btn-primary">Tambah</button></a>
			</h3>
		</div>
		<div class="card-body">
			<table id="example2" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Kategori</th>
						<th>Status</th>
						<th>Judul</th>
						<th>Tgl</th>
						<th>Jam</th>
						<th>Aksi</th>
					</tr>
					</tfoot>
				<tbody>
					<?php
					$no = 1;
					foreach ($read->result_array() as $row) {
					?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $row['nm_kategori'] ?></td>
							<td>
								<?php
								if ($row['st_berita'] == '1') {
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
							<td><?php echo $row['judul_berita'] ?></td>
							<td><?php echo $row['tgl_berita'] ?></td>
							<td><?php echo $row['jam_berita'] ?></td>
							<td>
								<?php
								if ($row['st_berita'] == '1') {
								?>
									<a href="<?php echo site_url('backend/Berita/status/' . $row['id_berita']) . '/' . '0'; ?>" title="Ubah status ke Blok" onclick="javascript: return confirm('Yakin Mau Ubah status ke Blok Judul= <?php echo $row['judul_berita']; ?>')" class="badge badge-success"><i class="fas fa-check"></i></a>
								<?php
								} else {
								?>
									<a href="<?php echo site_url('backend/Berita/status/' . $row['id_berita']) . '/' . '1'; ?>" title="Ubah status ke Publik" onclick="javascript: return confirm('Yakin Mau Ubah status ke Publik Judul= <?php echo $row['judul_berita']; ?>')" class="badge badge-secondary "><i class="fas fa-times"></i></a>
								<?php
								}
								?>
								<a href="<?php echo site_url('backend/Berita/edit/' . $row['id_berita']) ?>" title="Ubah Data" class="badge badge-primary "><i class="far fa-edit"></i></a>
								<a href="<?php echo site_url('backend/Berita/delete/' . $row['id_berita']) ?>" title="Hapus data" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $row['judul_berita']; ?>')" class="badge badge-danger"><i class="fas fa-trash"></i></a>
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
</div>