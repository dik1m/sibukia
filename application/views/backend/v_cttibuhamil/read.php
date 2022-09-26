<div class="col-12">
	<?php $this->view('backend/message'); ?>
	<div class="card">

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
								<span class="badge badge-warning" style="color: white;"><i class="fa fa-calendar"></i> <?php echo $row['tgl_posy'] ?></span><br>
								<span class="badge badge-warning" style="color: white;"><i class="fa fa-clock"></i> <?php echo $row['jam_posy'] ?></span>
							</td>
							<td><?php echo $row['tmp_posy'] ?></td>
							<td>
								<a href="<?php echo site_url('backend/CttIbuHamil/selectkia/' . $row['no_posy']) ?>" title="Detail Data" class="btn btn-block bg-gradient-primary btn-xs"><i class="fa fa-plus"></i> Tambah</a>
								<a href="<?php echo site_url('backend/CttIbuHamil/detailall/' . $row['no_posy']) ?>" title="Detail Data" class="btn btn-block bg-gradient-warning btn-xs" style="color: white;"><i class="fa fa-paw"></i> Detail</a>

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