<div class="col-12">
    <?php $this->view('backend/message'); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= site_url('backend/Buku/create') ?>"><button class="btn btn-block btn-primary">Tambah</button></a>
            </h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Kia</th>
                        <th>Status</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($read->result_array() as $row) {

                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['no_kia'] ?></td>
                        <td><?= $row['st_buku'] ?></td>
                        <td><?= $row['tgl_inbuku'] ?></td>
                        <td>

                            <?php
                            if ($row['tgl_outbuku'] == '0000-00-00') {
                                echo '-';
                            } else {
                            ?>
                                <?= $row['tgl_outbuku'] ?>

                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?= site_url('backend/Buku/edit/' . $row['no_kia']) ?>" title="Ubah Data" class="badge badge-primary"><i class="far fa-edit"></i></a>
                            <a href="<?= site_url('backend/Buku/delete/' . $row['no_kia']) ?>" title="Hapus data" onclick="javascript: return confirm('Yakin Mau dihapus <?= $row['no_kia']; ?>')" class="badge badge-danger"><i class="fas fa-trash"></i></a>
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