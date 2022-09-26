<h3><?php echo $judul ?> <small><?php echo '>>';
                                echo $sub ?></small></h3>
<a href="<?php echo site_url('Jenis/create') ?>"><button type="button">Tambah</button></a>
<table border="1" width="70%">
    <tr>
        <th>ID</th>
        <th>Jenis Surat</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    foreach ($read->result_array() as $row) {
    ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $row['jenis_surat'] ?></td>
            <td>
                <a href="<?php echo site_url('Jenis/edit/' . $row['jenis_id']) ?>">Ubah</a>
                <a href="<?php echo site_url('Jenis/delete/' . $row['jenis_id']) ?>" onclick="javascript: return confirm('Yakin Mau dihapus <?php echo $row['jenis_surat']; ?>')">Hapus</a>

            </td>
        </tr>
    <?php
        $no++;
    }
    ?>
</table>