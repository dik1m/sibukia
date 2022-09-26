<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <div class="card mb-3">
    <div class="card-header">
      <h3> <?= $sub ?> </h3>
    </div>
    <div class="card-body">
      <form method="post" action="<?php echo site_url('backend/Berita/edit/' . $edit['id_berita']) ?>" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">

              <img src="<?php echo base_url('assets/img_berita/' . $edit['img_berita']) ?>" width="100%"><br>
              <label>Ganti Foto</label><br>
              <input type="file" name="img_berita">
              <p></p>

              <label>Tanggal</label>
              <?= form_error('tgl_berita', '<small class="text-danger">', '</small>'); ?><br>
              <input type="date" name="tgl_berita" class="form-control" value="<?php echo $edit['tgl_berita'] ?>">
              <p></p>

              <label>Jam</label>
              <?= form_error('jam_berita', '<small class="text-danger">', '</small>'); ?><br>
              <input type="time" name="jam_berita" class="form-control" value="<?php echo $edit['jam_berita'] ?>">
              <p></p>
            </div>

            <div class="col-md-8">
              <label>Judul Berita</label>
              <?= form_error('judul_berita', '<small class="text-danger">', '</small>'); ?><br>
              <input type="text" name="judul_berita" class="form-control" placeholder="Masukan Judul Berita" value="<?php echo $edit['judul_berita'] ?>">
              <p></p>

              <label>kategori</label>
              <?= form_error('id_kategori', '<small class="text-danger">', '</small>'); ?><br>
              <select name="id_kategori" class="form-control">
                <option value="<?php echo $edit['id_kategori'] ?>"><?php echo $edit['nm_kategori'] ?></option>
                <?php
                foreach ($kategori->result_array() as $r) {
                ?>
                  <option value="<?php echo $r['id_kategori'] ?>"><?php echo $r['nm_kategori']; ?></option>
                <?php } ?>
              </select>
              <p></p>

              <label>Isi Berita</label>
              <?= form_error('isi_berita', '<small class="text-danger">', '</small>'); ?><br>
              <textarea name="isi_berita" class="form-control ckeditor" placeholder="isi Berita" required><?php echo $edit['isi_berita'] ?></textarea>
              <p></p>

            </div>
          </div>

          <br>
          <button type="submit" class="btn btn-primary">Perbaharui</button>
          <a href="<?= site_url('backend/Berita') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
        </div>
      </form>
    </div>
  </div>
</div>