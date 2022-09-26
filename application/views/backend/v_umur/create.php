<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3> <?php echo $sub ?> </h3>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('backend/Umur/create') ?>" method="post">

                <label>Umur (bulan)</label>
                <?= form_error('bln_umur', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="bln_umur" value="<?= set_value('bln_umur'); ?>" placeholder="Masukkan Umur (bulan)">
                <p></p>

                <label>Tahun</label>
                <?= form_error('th_umur', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="th_umur" value="<?= set_value('th_umur'); ?>" placeholder="Masukkan Tahun">
                <p></p>

                <label>KBM (gr)</label>
                <?= form_error('kbm_umur', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="kbm_umur" value="<?= set_value('kbm_umur'); ?>" placeholder="Masukkan KBM(gr)">
                <p></p>

                <br>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo site_url('backend/Umur') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
            </form>
        </div>
    </div>
</div>