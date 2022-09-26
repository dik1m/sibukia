<div class="col-12">
	<?php $this->view('backend/message'); ?>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">
				<a href="<?= site_url('backend/User/create') ?>"><button class="btn btn-block btn-primary">Tambah</button></a>
			</h3>
		</div>
		<div class="card-body">
			<table id="example2" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Whatsapp</th>
						<th>Email</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($read->result_array() as $row) {
					?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $row['kd_user'] ?></td>
							<td><?= $row['nm_user'] ?></td>
							<td>
								<?php
								if ($row['wa_nouser'] == '') {
								?>
									<span class="badge badge-secondary"><i class="fa fa-exclamation"></i> tdk tersedia</span>
								<?php
								} else {
								?>
									<a target="_blank" href="https://api.whatsapp.com/send?phone=<?= $row['wa_kduser'];
																									$row['wa_nouser'] ?>&text=Hai%20user"><span class="badge badge-success"><i class="fab fa-whatsapp"></i> whatsapp</span>
									</a>
								<?php
								}
								?>
							</td>
							<td>
								<?php
								if ($row['active_user'] == '0') {
								?>
									<span class="badge badge-secondary"><i class="far fa-envelope"></i> <?= $row['email_user'] ?></span>
								<?php
								} else {
								?>
									<span class="badge badge-success"><i class="far fa-envelope"></i> <?= $row['email_user'] ?></span>
								<?php } ?>
							</td>
							<td>
								<a href="<?= site_url('backend/User/show/' . $row['kd_user']) ?>" title="Detail Data" class="badge badge-warning" style="color: white;"><i class="fa fa-paw"></i></a>
								<a href="<?= site_url('backend/User/edit/' . $row['kd_user']) ?>" title="Ubah Data" class="badge badge-primary"><i class="far fa-edit"></i></a>
								<a href="<?= site_url('backend/User/delete/' . $row['kd_user']) ?>" title="Hapus data" onclick="javascript: return confirm('Yakin Mau dihapus Kode <?= $row['kd_user']; ?>')" class="badge badge-danger"><i class="fas fa-trash"></i></a>
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
</div>