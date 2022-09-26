<h3><?php echo $judul ?> <small><?php echo '>>';
                                echo $sub ?></small></h3>
<form action="<?php echo site_url('Jenis/save') ?>" method="post">
    <label>ID</label><br>
    <input type="text" name="jenis_id" value="" placeholder="Masukan ID Jenis">
    <p></p>

    <label>Jenis Surat</label><br>
    <input type="text" name="jenis_surat" value="" placeholder="Masukan Jenis Surat">
    <p></p>

    <button type="submit">Simpan</button>
    <a href="<?php echo site_url('Jenis') ?>"><button type="button">Batal</button></a>

</form>