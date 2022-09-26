<script type="text/javascript">
function cetak()
{
window.print();
}
</script>

<style>
table{
	border-collapse: collapse;
	width: 70%;
	border: 1px solid #ffffff;
}

table tr td{
	padding: 6px;
	font-weight: normal;
	border: 1px solid #ffffff;
}
table th{
	border: 1px solid #ffffff;
}
</style>
<body onLoad="javascript:window.print()">
<table align="center">
    <tr align="center">
		<td><img src="<?php echo base_url('assets/img_desa/Kabupaten_Pemalang.png') ?>" width="10%"></td>
	</tr>
	<tr align="center">
		<td>
        <h2>PEMERINTAH KABUPATEN PEMALANG <br>
        KECAMATAN PETARUKAN<br>
        SEKRETARIAT DESA PEGUNDAN <br><br>
		<font style="font-size: medium;"><u>SURAT UNDANGAN PENGAMBILAN BERKAS</u><br>
		Nomor: <?php echo $data['nopengajuan'] ?></font>
    </h2>
    </td>
</tr>
</table>


<table align="center">
<tr>
	<td>Yang bertanda tangan dibawah ini, menerangkan bahwa:</td>
</tr>
<tr>
	<td>Nomor</td>
	<td>:</td>
	<td><?php echo $data['nopengajuan'] ?></td>
</tr>
<tr>
	<td>Tanggal</td>
	<td>:</td>
	<td><?php echo $data['tgl_ambil'] ?></td>
</tr>
<tr>
	<td>Nama</td>
	<td>:</td>
	<td><?php echo $data['nama_user'] ?></td>
</tr>
<tr>
	<td>Alamat</td>
	<td>:</td>
	<td><?php echo $data['alamat_pengaju'] ?></td>
</tr>
</table>

<table  align="center">
<tr>
	<td>
		<br><br>
Memberitahukan bahwa,<p></p>
Proses pengajuan <b><?php echo $data['nama_layanan'] ?></b> yang telah Bapak/Ibu/Saudara/i lakukan telah selesai.
Di mohon untuk segera mengambil berkas yang sudah setujui.

<br><br><br>
Demikian Pemberitahuan ini kami sampaikan, Atas kerjasamanya Bapak/Ibu/Saudara/i kami ucapkan terimakasih.
<br><br><br><br><br>

</td>
</tr>
<tr align="right">
    <td>
    <?php echo $data['security_key'] ?>
	</td>
</tr>
<tr>
	<td align="center">



</td>
</tr>
</table>

</body>
