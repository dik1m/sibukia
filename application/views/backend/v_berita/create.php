<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
	<div class="card mb-3">
		<div class="card-header">
			<h3> <?= $sub ?> </h3>
		</div>
		<div class="card-body">
			<form method="post" action="<?= site_url('backend/Berita/create') ?>" enctype="multipart/form-data">
				<div class="card-body">

					<label>Judul Berita</label>
					<?= form_error('judul_berita', '<small class="text-danger">', '</small>'); ?><br>
					<input type="text" name="judul_berita" value="<?= set_value('judul_berita'); ?>" class="form-control" placeholder="Masukan Judul Berita">
					<p></p>

					<label>Kategori</label>
					<?= form_error('id_kategori', '<small class="text-danger">', '</small>'); ?><br>
					<select name="id_kategori" class="form-control">
						<option value="" selected>- Pilih kategori -</option>
						<?php
						foreach ($kategori->result_array() as $r) {
						?>
							<option value="<?= $r['id_kategori'] ?>"><?= $r['nm_kategori']; ?></option>
						<?php } ?>
					</select>
					<p></p>

					<label>Isi Berita</label>
					<?= form_error('isi_berita', '<small class="text-danger">', '</small>'); ?><br>
					<textarea name="isi_berita" class="form-control ckeditor" placeholder="isi Berita"><?= set_value('isi_berita'); ?></textarea>
					<p></p>

					<label>Foto Berita</label>
					<input type="file" class="form-control" name="img_berita" required oninvalid="this.setCustomValidity('Foto Berita Harus Di Isi')" oninput="setCustomValidity('')">
					<p></p>

					<br>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?= site_url('backend/Berita') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
			</form>
		</div>
	</div>
</div>