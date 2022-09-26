<div class="col-12">
    <?php $this->view('backend/message'); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= site_url('backend/TenagaKes/create') ?>"><button class="btn btn-block btn-primary">Tambah</button></a>
            </h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Whatsapp</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($read->result_array() as $row) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nik_kes'] ?></td>
                            <td><?= $row['nm_kes'] ?></td>
                            <td>
                                <?php
                                if ($row['st_kes'] == '0') {
                                ?>
                                    <span class="badge badge-secondary"><i class="far fas fa fa-user-times"></i> tidak bertugas</span>
                                <?php
                                } else {
                                ?>
                                    <span class="badge badge-success"><i class="fas fa fa-user-md"></i> Bertugas</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                if ($row['wa_kdkes'] == '') {
                                ?>
                                    <span class="badge badge-secondary"><i class="fa fa-exclamation"></i> tdk tersedia</span>
                                <?php
                                } else {
                                ?>
                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= $row['wa_kdkes'];
                                                                                                    echo $row['wa_nokes'] ?>&text=Hai%20user"><span class="badge badge-success"><i class="fab fa-whatsapp"></i> whatsapp</span>
                                    </a>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($row['active_kes'] == '0') {
                                ?>
                                    <span class="badge badge-secondary"><i class="far fa-envelope"></i> <?= $row['email_kes'] ?></span>
                                <?php
                                } else {
                                ?>
                                    <span class="badge badge-success"><i class="far fa-envelope"></i> <?= $row['email_kes'] ?></span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                if ($row['st_kes'] == '0') {
                                ?>
                                    <a href="<?php echo site_url('backend/TenagaKes/status/' . $row['nik_kes']) . '/' . '1'; ?>" title="Ubah status ke Tidak Bertugas" onclick="javascript: return confirm('Yakin Mau Ubah status ke Tidak Bertugas NIK <?php echo $row['nik_kes']; ?>')" class="badge badge-secondary"><i class="fas fa fa-user-times"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo site_url('backend/TenagaKes/status/' . $row['nik_kes']) . '/' . '0'; ?>" title="Ubah status ke Bertugas" onclick="javascript: return confirm('Yakin Mau Ubah status ke Bertugas NIK <?php echo $row['nik_kes']; ?>')" class="badge badge-success"><i class="fas fa fa-user-md"></i></a>
                                <?php
                                }
                                ?>

                                <a href="<?= site_url('backend/TenagaKes/show/' . $row['nik_kes']) ?>" title="Detail Data" class="badge badge-warning" style="color: white;"><i class="fa fa-paw"></i></a>
                                <a href="<?= site_url('backend/TenagaKes/edit/' . $row['nik_kes']) ?>" title="Ubah Data" class="badge badge-primary"><i class="far fa-edit"></i></a>
                                <a href="<?= site_url('backend/TenagaKes/delete/' . $row['nik_kes']) ?>" title="Hapus data" onclick="javascript: return confirm('Yakin Mau dihapus NIK <?= $row['nik_kes']; ?>')" class="badge badge-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>