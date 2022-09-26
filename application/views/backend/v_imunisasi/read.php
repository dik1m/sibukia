<div class="col-12">
    <?php $this->view('backend/message'); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= site_url('backend/Imunisasi/create') ?>"><button class="btn btn-block btn-primary">Tambah</button></a>
            </h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Imunisasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($read->result_array() as $row) {

                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['nm_imunisasi'] ?></td>
                        <td>
                            <a href="<?= site_url('backend/Imunisasi/edit/' . $row['id_imunisasi']) ?>" title="Ubah Data" class="badge badge-primary"><i class="far fa-edit"></i></a>
                            <a href="<?= site_url('backend/Imunisasi/delete/' . $row['id_imunisasi']) ?>" title="Hapus data" onclick="javascript: return confirm('Yakin Mau dihapus <?= $row['nm_imunisasi']; ?>')" class="badge badge-danger"><i class="fas fa-trash"></i></a>
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