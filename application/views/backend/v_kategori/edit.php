<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3> <?= $sub ?> </h3>
        </div>
        <div class="card-body">
            <form action="<?= site_url('backend/Kategori/edit/' . $edit['id_kategori']) ?>" method="post">

                <label>Nama Admin</label>
                <?= form_error('nm_kategori', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="nm_kategori" value="<?= $edit['nm_kategori'] ?>" placeholder="Masukkan Nama Admin">
                <p></p>

                <br>
                <button type="submit" class="btn btn-primary">Perbaharui</button>
                <a href="<?= site_url('backend/Kategori') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
            </form>
        </div>
    </div>
</div>