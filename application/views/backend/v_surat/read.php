<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <?php $this->view('backend/message'); ?>
    <div class="card mb-3">
        <div class="card-header">
            <a href="<?php echo site_url('SuratMasuk/create') ?>"><button type="button" class="btn btn-primary"><span class="btn-label"><i class="fas fa-plus"></i></span>Tambah</button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Surat</th>
                            <th>Pengirim</th>
                            <th>Tujuan</th>
                            <th>admin</th>
                            <th>No Surat</th>
                            <th>Keterangan</th>
                            <th>Dokumen Surat</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($read->result_array() as $row) {
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $row['surat_judul'] ?></td>
                                <td><?php echo $row['pengirim'] ?></td>
                                <td><?php echo $row['tujuan'] ?></td>
                                <td><?php echo $row['kd_admin'] ?></td>
                                <td><?php echo $row['jenis_id'] ?></td>
                                <td><?php echo $row['ket_surat'] ?></td>
                                <td><?php echo $row['doc_surat'] ?></td>
                                <td>
                                    <a href="<?php echo site_url('Surat/edit/' . $row['surat_no']) ?>">Ubah</a>
                                    <a href="<?php echo site_url('Surat/delete/' . $row['surat_no']) ?>" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $row['surat_judul']; ?>')">Hapus</a>
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