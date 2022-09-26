<div class="col-12">
	<?php $this->view('backend/message'); ?>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">
				<a href="<?= site_url('backend/Posyandu/create') ?>" class="btn btn-block btn-secondary"><i class="fa fa-print"></i></a>
			</h3>
		</div>
		<div class="card-body">
			<table id="example2" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>No. Posyandu</th>
						<th>Tanggal</th>
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
								<span class="badge badge-primary"><i class="fa fa-calendar"></i> <?php echo $row['tgl_posy'] ?></span>
								<span class="badge badge-primary"><i class="fa fa-clock"></i> <?php echo $row['jam_posy'] ?></span>
							</td>
							<td><?php echo $row['tmp_posy'] ?></td>
							<td>

								<a href="<?php echo site_url('backend/Posyandu/show/' . $row['no_posy']) ?>" title="Detail Data" class="badge badge-warning" style="color: white;"><i class="fa fa-paw"></i></a>
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