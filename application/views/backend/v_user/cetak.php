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
		<td align="center" style="border:hidden;"><h2>Laporan Data Admin</h2></td>
	</tr>
</table>

<table style="width: 80%;"   align="center">
	<tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>HP</th>
        <th>Email</th>
</tr>
</thead>
<tbody>
<?php
	$no=1;
	foreach ($read->result_array() as $row) {
	?>
	<tr>
    <td><?php echo $no ?></td>
      <td><?php echo $row['kd_admin'] ?></td>
      <td><?php echo $row['nama_admin'] ?></td>
      <td><?php echo $row['hp_admin'] ?></td>
      <td><?php echo $row['email_admin'] ?></td>
		</tr>
	<?php
	$no++;
	}
?>
</table>
