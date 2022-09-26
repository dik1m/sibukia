<div class="col-12">
	<?php $this->view('backend/message'); ?>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">
				<a href="<?= site_url('backend/Register') ?>"><button class="btn btn-block btn-primary">Tambah</button></a>
			</h3>
		</div>
		<div class="card-body">
			<table id="example2" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>No. Buku</th>
						<th>Status</th>
						<th>Nama Ibu</th>
						<th>Nama Suami</th>
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
							<td><?= $no; ?></td>
							<td><?= $row['no_kia'] ?></td>
							<td>
								<?php
								if ($row['st_kia'] == 'Hamil') {
								?>
									<span class="badge badge-warning" style="color: white;"><i class="far fa-clock"></i> <?= $row['st_kia'] ?></span>
								<?php
								} elseif ($row['st_kia'] == 'Anak') {
								?>
									<span class="badge badge-primary"><i class="far fa-clock"></i> <?= $row['st_kia'] ?></span>
								<?php
								} elseif ($row['st_kia'] == 'Selesai') {
								?>
									<span class="badge badge-success"><i class="far fa-clock"></i> <?= $row['st_kia'] ?></span>
								<?php
								}
								?>
							</td>
							<td><?= $row['nmibu_kia'] ?></td>
							<td>
								<?php
								if ($row['nmbpk_kia'] == '') {
								?>
									<span class="badge badge-secondary"><i class="fa fa-exclamation"></i> tidak tersedia</span>
								<?php
								} else {
								?>
									<?= $row['nmbpk_kia'] ?>
								<?php
								}
								?>
							</td>
							<td>
								<?php
								if ($row['wa_nokia'] == '') {
								?>
									<span class="badge badge-secondary"><i class="fa fa-exclamation"></i> tidak tersedia</span>
								<?php
								} else {
								?>
									<a target="_blank" href="https://api.whatsapp.com/send?phone=<?= $row['wa_kdkia'];
																									$row['wa_nokia'] ?>&text=Hai%20Bunda"><span class="badge badge-success"><i class="fab fa-whatsapp"></i> whatsapp</span>
									</a>
								<?php
								}
								?>
							</td>
							<td>
								<?php
								if ($row['active_kia'] == '0') {
								?>
									<span class="badge badge-secondary"><i class="far fa-envelope"></i> <?= $row['email_kia'] ?></span>
								<?php
								} else {
								?>
									<span class="badge badge-success"><i class="far fa-envelope"></i> <?= $row['email_kia'] ?></span>
								<?php } ?>
							</td>

							<td>
								<a href="<?= site_url('backend/Kia/show/' . $row['no_kia']) ?>" title="Detail Data" class="badge badge-warning" style="color: white;"><i class="fa fa-paw"></i></a>
								<a href="<?= site_url('backend/Kia/edit/' . $row['no_kia']) ?>" title="Ubah Data" class="badge badge-primary"><i class="far fa-edit"></i></a>
								<a href="<?= site_url('backend/Kia/delete/' . $row['no_kia']) ?>" title="Hapus data" onclick="javascript: return confirm('Yakin Mau dihapus <?= $row['no_kia']; ?>')" class="badge badge-danger"><i class="fas fa-trash"></i></a>

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