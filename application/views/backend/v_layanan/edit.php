<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3> <?= $sub ?> </h3>
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo site_url('backend/Layanan/edit/' . $edit['id_layanan']) ?>" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <!--Form-->
                        <div class="col-md-4">
                            <img src="<?php echo base_url('assets/img_layanan/' . $edit['img_layanan']) ?>" width="100%"><br>
                            <label>Ganti Foto</label><br>
                            <input type="file" name="img_layanan">
                            <p></p>

                            <label>Tanggal</label>
                            <?= form_error('tgl_layanan', '<small class="text-danger">', '</small>'); ?><br>
                            <input type="date" name="tgl_layanan" class="form-control" value="<?php echo $edit['tgl_layanan'] ?>">
                            <p></p>

                            <label>Jam</label>
                            <?= form_error('jam_layanan', '<small class="text-danger">', '</small>'); ?><br>
                            <input type="time" name="jam_layanan" class="form-control" value="<?php echo $edit['jam_layanan'] ?>">
                            <p></p>
                        </div>

                        <div class="col-md-8">
                            <label>Nama Layanan</label>
                            <?= form_error('nm_layanan', '<small class="text-danger">', '</small>'); ?><br>
                            <input type="text" name="nm_layanan" value="<?php echo $edit['nm_layanan'] ?>" class="form-control" placeholder="Masukan Nama Layanan" value="">
                            <p></p>

                            <label>Info Layanan</label>
                            <?= form_error('isi_layanan', '<small class="text-danger">', '</small>'); ?><br>
                            <textarea name="isi_layanan" class="form-control ckeditor" id="ckeditor" placeholder="Masukan Info Layanan"><?php echo $edit['isi_layanan'] ?></textarea>
                            <p></p>

                        </div>

                        <button type="submit" class="btn btn-primary">Perbaharui</button>
                        <a href="<?= site_url('backend/Layanan') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                    </div>
            </form>
        </div>
    </div>
</div>