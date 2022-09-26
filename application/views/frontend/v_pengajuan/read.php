<style>
	/* table */
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
	/* button */
	button[type="button"], button[type="submit"], button[type="reset"]{
		padding: 4px 6px;
		width: 90px;
		height: 30px;
		font-size: 14px;
		margin-top: 5px;
		border: 1px solid #ed3974;
		color: #FFF;
		background-color: #dd3333;
	}
	button[type="button"]:hover, button[type="submit"]:hover, button[type="reset"]:hover{
		background-color: #000000;
		border: 1px solid #000000;
		color: #FFF;
	}
</style>

<div class="section-heading">
    <h2 class="text-black"><?php echo $judul ?></h2>
</div>
<form action="<?php echo site_url('DaftarUsr/save') ?>" method="post">
<div class="row">
	<div class="col-lg-12">
	<?php $this->view('frontend/message'); ?>
	</div>

<div class="col-lg-12">
<a href="<?php echo site_url('PengajuanUsr/tahap1/'.$this->session->userdata('id_user')) ?>" title="Tambah Data">
<button type="button" name="button">Tambah</button></a>
<table width="100%">

	<tr>
		<td>No</td>
		<td>No Pengajuan</td>
		<td>Status</td>
		<td>Tanggal</td>
		<td>Layanan</td>
		<td>Aksi</td>
	</tr>
	<?php
	$no=1;
	foreach ($data->result_array() as $row) {
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['nopengajuan'] ?></td>
		<td>
			<?php
			if($row['st_pengajuan']=='Belum dicek' or $row['st_pengajuan']=='Revisi'){
			?>
			<span class="label label-warning"><?php echo $row['st_pengajuan'] ?></span>
			<?php
			}
			elseif($row['st_pengajuan']=='Selesai'){
			?>
			<span class="label label-success"><?php echo $row['st_pengajuan'] ?></span>
			<?php
			}else{
			?>
			<span class="label label-info"><?php echo $row['st_pengajuan'] ?></span>
		  <?php } ?>
		</td>
		<td>
		<span class="badge badge-warning" style="color:#FBF9F9"><?php echo 'Pengajuan: '; echo $row['tgl_pengajuan'] ?></span>
		<?php
		if($row['tgl_ambil']=='0000-00-00'){
		}
		else{
		?>
		<span class="badge badge-info"><?php echo 'Pengambilan: '; echo $row['tgl_ambil'] ?></span>
		<?php
	  }
		?>
		<?php
		if($row['tgl_selesai']=='0000-00-00'){
		}
		else{
		?>
		<span class="badge badge-success"><?php echo 'Selesai: '; echo $row['tgl_selesai'] ?></span>
		<?php
	  }
		?>
		</td>
		<td><?php echo $row['nama_layanan'] ?></td>
		<td>
			<?php
			if($row['st_pengajuan']=='Belum dicek' or $row['st_pengajuan']=='Telah dicek' or $row['st_pengajuan']=='Revisi'){
			?>
		<a href="<?php echo site_url('PengajuanUsr/edit/'.$row['nopengajuan']) ?>" title="Ubah"><span class="badge badge-warning" style="color:#FBF9F9">Ubah</span></a>
		<?php
	   }
		 else{
		 ?>
		 <a href="<?php echo site_url('PengajuanUsr/detail/'.$row['nopengajuan']) ?>" title="Detail"><span class="badge badge-info">Detail</span></a>
		 <?php
			}
			?>

			<?php
			if($row['st_pengajuan']=='Pengambilan' or $row['st_pengajuan']=='Selesai' ){
			?>
			<a href="<?php echo site_url('PengajuanUsr/cetak/'.$row['nopengajuan']) ?>" title="Cetak&bawa pada saat pengambilan berkas" target='_blank'><span class="badge badge-danger">Cetak Undangan</span></a>
			<?php } ?>

		</td>

	</tr>
	<?php
	$no++;
	}
?>
</table>

</div>
</div>
