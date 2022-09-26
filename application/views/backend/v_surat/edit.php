<h3><?php echo $judul ?> <small><?php echo '>>';
                                echo $sub ?></small></h3>
<form action="<?php echo site_url('Surat/update/' . $edit['surat_no']) ?>" method="post">
    <label>No Surat</label><br>
    <input type="text" disabled name="surat_no" value="<?php echo $edit['surat_no'] ?>" placeholder="Masukan No Surat">
    <p></p>
    <input type="text" hidden name="surat_no" value="<?php echo $edit['surat_no'] ?>">
    <p></p>

    <label>Judul Surat</label><br>
    <input type="text" name="surat_judul" value="<?php echo $edit['surat_judul'] ?>" placeholder="Masukan Judul Surat">
    <p></p>

    <label>Pengirim</label><br>
    <input type="text" name="pengirim" value="<?php echo $edit['pengirim'] ?>" placeholder="Masukan Pengirim">
    <p></p>

    <label>Tujuan Surat</label><br>
    <input type="text" name="tujuan" value="<?php echo $edit['tujuan'] ?>" placeholder="Masukan Tujuan">
    <p></p>

    <label>ADMIN</label><br>
    <input type="text" name="kd_Admin" value="<?php echo $edit['kd_admin'] ?>">
    <p></p>

    <label>ID Jenis</label><br>
    <input type="text" name="jenis_id" value="<?php echo $edit['jenis_id'] ?>">
    <p></p>

    <label>Keterangan Surat</label><br>
    <input type="text" name="ket_surat" value="<?php echo $edit['ket_surat'] ?>" placeholder="isi keterangan">
    <p></p>

    <label>Dokumen surat</label><br>
    <input type="text" name="doc_surat" value="<?php echo $edit['doc_surat'] ?>">
    <p></p>

    <button type="submit">Perbaharui</button>
    <a href="<?php echo site_url('Surat') ?>"><button type="button">Batal</button></a>

</form>