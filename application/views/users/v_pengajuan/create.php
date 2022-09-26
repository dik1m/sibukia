<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3> <?php echo $sub ?> </h3>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row">

                    <div class="col-md-2">
                        <!--kiri-->
                        <table id="dataTable" style="width:100%" style="border-style: hidden;">
                            <tr style="border-style: hidden;">
                                <td style="border-style: hidden;">
                                    <p></p>
                                    <img src="<?= base_url('assets/img_penduduk/' . $user['img_peop']) ?>" width="100%">
                                    <p></p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-2">
                        <p></p>
                        <table id="dataTable" style="width:100%" style="border-style: hidden;">
                            <tr style="border-style: hidden;">
                                <td style="border-style: hidden;">
                                    <label>Scan KTP</label><br>
                                    <?php
                                    if ($user['img_ktp'] == '') {
                                    ?>
                                        <span class="btn btn-secondary"><i class="fa fa-exclamation"></i> tidak tersedia</span>
                                    <?php
                                    } else {
                                    ?>
                                        <a class="btn btn-primary" href="<?= base_url('assets/img_ktp/' . $user['img_ktp']); ?>" title="Download KTP" target='_blank'> <i class="fa fa-download"></i> Detail KTP </a>
                                    <?php } ?>
                                    <p></p>

                                    <label>Scan KK</label><br>
                                    <?php
                                    if ($user['img_kk'] == '') {
                                    ?>
                                        <span class="btn btn-secondary"><i class="fa fa-exclamation"></i> tidak tersedia</span>
                                    <?php
                                    } else {
                                    ?>
                                        <a class="btn btn-primary" href="<?= base_url('assets/img_kk/' . $user['img_kk']); ?>" title="Download KK" target='_blank'> <i class="fa fa-download"></i> Detail KK </a>
                                    <?php } ?>

                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-8">
                        <p></p>
                        <label>Nomor Pengajuan</label><br>
                        <input type="text" disabled name='ai_pengajuan' class="form-control" value="<?= $ai_pengajuan; ?>">
                        <input type="hidden" name='no_ajuan' class="form-control" value="<?= $ai_pengajuan; ?>">
                        <input type="hidden" name='key_ajuan' class="form-control" value="<?= random_string('alnum', 50) ?>">
                        <p></p>

                        <label>Nama</label><br>
                        <input type="text" disabled name='nm_peop' class="form-control" value="<?= $user['nm_peop'] ?>">
                        <input type="text" name='no_ktp' class="form-control" value="<?= $user['no_ktp'] ?>">
                        <p></p>

                        <label>Pilih Layanan</label>
                        <?= form_error('id_layanan', '<small class="text-danger">', '</small>'); ?><br>
                        <select class="form-control" name="id_layanan">
                            <option value="" selected>- Pilih Layanan -</option>
                            <?php
                            foreach ($row->result_array() as $r) {
                            ?>
                                <option value="<?= $r['id_layanan'] ?>"><?= $r['nm_layanan']; ?></option>
                            <?php } ?>
                        </select>
                        <p></p>

                        <label>Keterangan</label>
                        <?= form_error('ket_ajuan', '<small class="text-danger">', '</small>'); ?><br>
                        <textarea name="ket_ajuan" class="form-control" placeholder="Masukkan Keterangan Ajuan"></textarea>
                        <p></p>
                    </div>

                </div>
                <br><br><br>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href=""><button type="button" class="btn btn-secondary">Batal</button></a>
            </form>
        </div>
    </div>
</div>