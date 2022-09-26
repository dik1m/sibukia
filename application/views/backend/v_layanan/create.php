<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <div class="card mb-3">
    <div class="card-header">
      <h3> <?= $sub ?> </h3>
    </div>
    <div class="card-body">
      <!--Form-->
      <form method="post" action="<?php echo site_url('backend/Layanan/create') ?>" enctype="multipart/form-data">

        <label>Nama Layanan</label>
        <?= form_error('nm_layanan', '<small class="text-danger">', '</small>'); ?><br>
        <input type="text" name="nm_layanan" value="<?= set_value('nm_layanan'); ?>" class="form-control" placeholder="Masukan Nama Layanan">
        <p></p>

        <label>Isi</label>
        <?= form_error('isi_layanan', '<small class="text-danger">', '</small>'); ?><br>
        <textarea name="isi_layanan" class="form-control ckeditor"><?= set_value('isi_layanan'); ?></textarea>
        <br>

        <label>Foto Layanan</label><br>
        <input type="file" name="img_layanan" class="form-control" required oninvalid="this.setCustomValidity('Foto Layanan Harus Di Isi')" oninput="setCustomValidity('')">
        <p></p>

        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('backend/Layanan') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
      </form>
    </div>
  </div>
</div>