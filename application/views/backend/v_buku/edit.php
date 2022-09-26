<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3> <?= $sub ?> </h3>
        </div>
        <div class="card-body">
            <form action="<?= site_url('backend/Buku/edit/' . $edit['no_kia']) ?>" method="post">

                <label>Nomor KIA</label>
                <?= form_error('no_kia', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" disabled class="form-control" name="no_kia" value="<?= $edit['no_kia']; ?>" placeholder="Masukkan Nomor KIA">
                <p></p>

                <label>Status Buku</label>
                <?= form_error('st_buku', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="st_buku" value="<?= $edit['st_buku']; ?>" placeholder="Masukkan Tanggal Masuk">
                <p></p>

                <label>Tanggal Masuk</label>
                <?= form_error('tgl_inbuku', '<small class="text-danger">', '</small>'); ?><br>
                <input type="date" class="form-control" name="tgl_inbuku" value="<?= $edit['tgl_inbuku']; ?>" placeholder="Masukkan Tanggal Masuk">
                <p></p>

                <label>Tanggal Keluar</label>
                <?= form_error('tgl_outbuku', '<small class="text-danger">', '</small>'); ?><br>
                <input type="date" class="form-control" name="tgl_outbuku" value="<?= $edit['tgl_outbuku']; ?>" placeholder="Masukkan Tanggal Masuk">
                <p></p>


                <br>
                <button type="submit" class="btn btn-primary">Perbaharui</button>
                <a href="<?= site_url('backend/Buku') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
            </form>
        </div>
    </div>
</div>