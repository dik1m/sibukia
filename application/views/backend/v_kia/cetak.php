<script type="text/javascript">
function cetak()
{
window.print();
}
</script>

<style>
table{
	border-collapse: collapse;
	width: 100%;
	border: 1px solid #ccc;
}

table tr td{
	padding: 6px;
	font-weight: normal;
	border: 1px solid #ccc;
}
table th{
	border: 1px solid #ccc;
}
</style>
<body onLoad="javascript:window.print()">
<table style="width: 80%;"   align="center">
	<tr>
		<td align="center"><h2>Laporan Data Penduduk</h2></td>
	</tr>
</table>

<table style="width: 80%;"   align="center">
	<tr>
		<th>No</th>
		<th>KK</th>
		<th>KTP</th>
		<th>Nama</th>
		<th>HP</th>
		<th>Kabupaten</th>

	</tr>
</thead>
<tbody>
	<?php
		$no=1;
		foreach ($read->result_array() as $row) {
		?>
		<tr>
		<td><?php echo $no; ?></td>
			<?php
			//jika kk
			if($row['no_kk']==''){
			?>
			<td><span class="badge badge-warning">belum tersedia</span></td>
			<?php
		  }else{
			?>
			<td><?php echo $row['no_kk'] ?></td>
			<?php
			}
			//jika kk
			?>
			<?php
			//jika ktp
			if($row['no_ktp']==''){
			?>
			<td><span class="badge badge-warning">belum tersedia</span></td>
			<?php
			}else{
			?>
			<td><?php echo $row['no_ktp'] ?></td>
			<?php
			}
			//jika ktp
			?>
			<td><?php echo $row['nama_user'] ?></td>
			<td><?php echo $row['hp_user'] ?></td>
			<td><?php echo $row['nama_kab'] ?></td>

		</tr>
		<?php
		$no++;
		}
	?>
</table>
