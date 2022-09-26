<div class="col-12">
	<?php $this->view('backend/message'); ?>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">
				<a href="<?= site_url('backend/Posyandu/create') ?>"><button class="btn btn-block btn-primary">Tambah</button></a>
			</h3>
		</div>
		<div class="card-body">
			<table id="example2" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>No. Posyandu</th>
						<th>Status</th>
						<th>Tanggal</th>
						<th>Jenis</th>
						<th>Tempat</th>
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
							<td><?php echo $row['no_posy'] ?></td>
							<td>
								<?php
								if ($row['st_posy'] == '1') {
								?>
									<span class="badge badge-success"><i class="fa fa-eye"></i> Aktif</span>
								<?php
								} else {
								?>
									<span class="badge badge-secondary"><i class="fa fa-eye-slash"></i> Blok</span>
								<?php
								}
								?>
							</td>
							<td>
								<span class="badge badge-warning" style="color: white;"><i class="fa fa-calendar"></i> <?php echo $row['tgl_posy'] ?></span>
								<span class="badge badge-warning" style="color: white;"><i class="fa fa-clock"></i> <?php echo $row['jam_posy'] ?></span>
							</td>
							<td><?php echo $row['jenis_posy'] ?></td>
							<td><?php echo $row['tmp_posy'] ?></td>
							<td>
								<?php
								if ($row['st_posy'] == '1') {
								?>
									<a href="<?php echo site_url('backend/Posyandu/status/' . $row['no_posy']) . '/' . '0'; ?>" title="Ubah status ke Blok" onclick="javascript: return confirm('Yakin Mau Ubah status ke Blok No.Posyandu  <?php echo $row['no_posy']; ?>')" class="badge badge-success"><i class="fa fa-eye"></i></a>
								<?php
								} else {
								?>
									<a href="<?php echo site_url('backend/Posyandu/status/' . $row['no_posy']) . '/' . '1'; ?>" title="Ubah status ke Publik" onclick="javascript: return confirm('Yakin Mau Ubah status ke Publik No.Posyandu <?php echo $row['no_posy']; ?>')" class="badge badge-secondary "><i class="fa fa-eye-slash"></i></a>
								<?php
								}
								?>
								<a href="<?php echo site_url('backend/Posyandu/show/' . $row['no_posy']) ?>" title="Detail Data" class="badge badge-warning" style="color: white;"><i class="fa fa-paw"></i></a>
								<a href="<?php echo site_url('backend/Posyandu/edit/' . $row['no_posy']) ?>" title="Ubah Data" class="badge badge-primary "><i class="far fa-edit"></i></a>
								<a href="<?php echo site_url('backend/Posyandu/delete/' . $row['no_posy']) ?>" title="Hapus data" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $row['no_posy']; ?>')" class="badge badge-danger"><i class="fas fa-trash"></i></a>
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