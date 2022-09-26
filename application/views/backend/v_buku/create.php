<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3> <?php echo $sub ?> </h3>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('backend/Buku/create') ?>" method="post">

                <label>Nomor KIA</label>
                <?= form_error('no_kia', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="no_kia" value="<?= set_value('no_kia'); ?>" placeholder="Masukkan Nomor KIA">
                <p></p>

                <br>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo site_url('backend/Buku') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
            </form>
        </div>
    </div>
</div>