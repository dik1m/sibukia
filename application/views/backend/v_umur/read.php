<div class="col-12">
    <?php $this->view('backend/message'); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= site_url('backend/Umur/create') ?>"><button class="btn btn-block btn-primary">Tambah</button></a>
            </h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Umur(Bulan)</th>
                        <th>Tahun</th>
                        <th>KBM (gr)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($read->result_array() as $row) {

                ?>

                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['bln_umur'] ?></td>
                        <td><?= $row['th_umur'] ?></td>
                        <td><?= $row['kbm_umur'] ?></td>
                        <td>
                            <a href="<?= site_url('backend/Umur/edit/' . $row['bln_umur']) ?>" title="Ubah Data" class="badge badge-primary"><i class="far fa-edit"></i></a>
                            <a href="<?= site_url('backend/Umur/delete/' . $row['bln_umur']) ?>" title="Hapus data" onclick="javascript: return confirm('Yakin Mau dihapus <?= $row['bln_umur']; ?>')" class="badge badge-danger"><i class="fas fa-trash"></i></a>
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