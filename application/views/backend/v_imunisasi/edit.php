<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3> <?= $sub ?> </h3>
        </div>
        <div class="card-body">
            <form action="<?= site_url('backend/Imunisasi/edit/' . $edit['id_imunisasi']) ?>" method="post">

                <label>Nama Imunisasi</label>
                <?= form_error('nm_imunisasi', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="nm_imunisasi" value="<?= $edit['nm_imunisasi'] ?>" placeholder="Masukkan Nama Admin">
                <p></p>

                <br>
                <button type="submit" class="btn btn-primary">Perbaharui</button>
                <a href="<?= site_url('backend/Imunisasi') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
            </form>
        </div>
    </div>
</div>