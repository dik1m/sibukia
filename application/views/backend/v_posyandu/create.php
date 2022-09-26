<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
	<div class="card mb-3">
		<div class="card-header">
			<h3> <?= $sub ?> </h3>
		</div>
		<div class="card-body">
			<form method="post" action="<?= site_url('backend/Posyandu/create') ?>" enctype="multipart/form-data">
				<div class="card-body">
					<label>No Posyandu</label>
					<input type="text" disabled name='no_posy' class="form-control" value="<?= $ai_posyandu; ?>">
					<input type="hidden" name='no_posy' class="form-control" value="<?= $ai_posyandu; ?>">
					<p></p>

					<label>Tanggal</label>
					<?= form_error('tgl_posy', '<small class="text-danger">', '</small>'); ?><br>
					<input type="date" name="tgl_posy" class="form-control" value="<?= set_value('tgl_posy'); ?>">
					<p></p>

					<label>Jam</label>
					<?= form_error('jam_posy', '<small class="text-danger">', '</small>'); ?><br>
					<input type="time" name="jam_posy" class="form-control" value="<?= set_value('jam_posy'); ?>">
					<p></p>

					<label>Jenis</label>
					<?= form_error('jenis_posy', '<small class="text-danger">', '</small>'); ?><br>
					<select name="jenis_posy" class="form-control">
						<option value="" selected>- Pilih Jenis Posyandu -</option>
						<option value="Posyandu Umum">Posyandu Umum</option>
						<option value="Posyandu dan Vitamin">Posyandu dan Vitamin</option>
						<option value="Posyandu dan Imunisasi">Posyandu dan Imunisasi</option>

					</select>
					<p></p>

					<label>Tempat</label>
					<?= form_error('tmp_posy', '<small class="text-danger">', '</small>'); ?><br>
					<input type="text" name="tmp_posy" value="<?= set_value('tmp_posy'); ?>" class="form-control" placeholder="Masukan Judul Berita">
					<p></p>

					<label>Detail</label>
					<?= form_error('detail_posy', '<small class="text-danger">', '</small>'); ?><br>
					<textarea name="detail_posy" class="form-control ckeditor" placeholder="Detail Posyandu"><?= set_value('detail_posy'); ?></textarea>
					<p></p>

					<br>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?= site_url('backend/Posyandu') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
			</form>
		</div>
	</div>
</div>