<h3><?php echo $judul ?> <small><?php echo '>>';
                                echo $sub ?></small></h3>
<form action="<?php echo site_url('Surat/save') ?>" method="post">

    <label>Nama</label><br>
    <input type="text" name="surat_judul" value="" placeholder="Masukan Judul Surat">
    <p></p>

    <label>Pengirim</label><br>
    <input type="text" name="pengirim" value="" placeholder="PENGIRIM">
    <p></p>

    <label>Tujuan</label><br>
    <input type="text" name="tujuan" value="" placeholder="Masukan Tujuan">
    <p></p>

    <label>ADMIN</label><br>
    <input type="text" name="kd_admin" value="">
    <p></p>

    <label>No Surat</label><br>
    <input type="text" name="jenis_id" value="">
    <p></p>

    <label>Keterangan</label><br>
    <input type="text" name="ket_surat" value="" placeholder="ISI KETERANGAN SURAT">
    <p></p>

    <label>Dokumen Surat</label><br>
    <input type="text" name="doc_surat" value="">
    <p></p>

    <button type="submit">Simpan</button>
    <a href="<?php echo site_url('Surat') ?>"><button type="button">Batal</button></a>

</form>