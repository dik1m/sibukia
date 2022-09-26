<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3> <?php echo $sub ?> </h3>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('backend/Kategori/create') ?>" method="post">

                <label>Nama Kategori</label>
                <?= form_error('nm_kategori', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="nm_kategori" value="<?= set_value('nm_kategori'); ?>" placeholder="Masukkan Nama Admin">
                <p></p>

                <br>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo site_url('backend/Kategori') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
            </form>
        </div>
    </div>
</div>