<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <?php $this->view('users/message'); ?>
    <div class="card mb-3">
        <div class="card-header">
            <a href="<?= site_url('users/Pengajuan/create/' . $user['no_ktp']) ?>"><button type="button" class="btn btn-primary"><span class="btn-label"><i class="fas fa-plus"></i></span>Tambah</button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                        <tr>
                            <td>No</td>
                            <td>No Pengajuan</td>
                            <td>Status</td>
                            <td>Tanggal</td>
                            <td>Layanan</td>
                            <td>Aksi</td>
                        </tr>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($data->result_array() as $row) {
                    ?>

                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row['no_ajuan'] ?></td>
                            <td>
                                <?php
                                if ($row['st_ajuan'] == 'Belum dicek' or $row['st_ajuan'] == 'Revisi') {
                                ?>
                                    <span class="badge badge-warning"><?= $row['st_ajuan'] ?></span>
                                <?php
                                } elseif ($row['st_ajuan'] == 'Selesai') {
                                ?>
                                    <span class="badge badge-success"><?= $row['st_ajuan'] ?></span>
                                <?php
                                } else {
                                ?>
                                    <span class="badge badge-info"><?= $row['st_ajuan'] ?></span>
                                <?php } ?>
                            </td>
                            <td>
                                <span class="badge badge-info">Pengajuan Baru <?= $row['tgl_ajuan'] ?></span>
                                <?php
                                if ($row['tgl_ambil'] == '0000-00-00') {
                                } else {
                                ?>
                                    <span class="badge badge-info"><?= 'Pengambilan: ';
                                                                    $row['tgl_ambil'] ?></span>
                                <?php
                                }
                                ?>
                                <?php
                                if ($row['tgl_selesai'] == '0000-00-00') {
                                } else {
                                ?>
                                    <span class="badge badge-success"><?= 'Selesai: ';
                                                                        $row['tgl_selesai'] ?></span>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $row['nm_layanan'] ?></td>
                            <td>
                                <?php
                                if ($row['st_ajuan'] == 'Belum dicek' or $row['st_ajuan'] == 'Telah dicek' or $row['st_ajuan'] == 'Revisi') {
                                ?>
                                    <a href="<?= site_url('PengajuanUsr/edit/' . $row['no_ajuan']) ?>" title="Ubah"><span class="badge badge-warning" style="color:#FBF9F9">Ubah</span></a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?= site_url('users/Pengajuan/show/' . $row['no_ajuan']) ?>" title="Lihat Detail"><span class="badge badge-warning" style="color: white;"><i class="far fa-eye"></i> Detail</span></a>
                                <?php
                                }
                                ?>

                                <?php
                                if ($row['st_ajuan'] == 'Pengambilan' or $row['st_ajuan'] == 'Selesai') {
                                ?>
                                    <a href="<?= site_url('PengajuanUsr/cetak/' . $row['no_ajuan']) ?>" title="Cetak&bawa pada saat pengambilan berkas" target='_blank'><span class="badge badge-danger">Cetak Undangan</span></a>
                                <?php } ?>

                            </td>

                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>