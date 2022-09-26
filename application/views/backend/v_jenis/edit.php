<h3><?php echo $judul ?> <small><?php echo '>>';
                                echo $sub ?></small></h3>
<form action="<?php echo site_url('Jenis/update/' . $edit['jenis_id']) ?>" method="post">
    <label>ID</label><br>
    <input type="text" disabled name="jenis_id" value="<?php echo $edit['jenis_id'] ?>" placeholder="Masukan ID">
    <p></p>
    <input type="text" hidden name="jenis_id" value="<?php echo $edit['jenis_id'] ?>" placeholder="Masukan Masukan ID">
    <p></p>

    <label>Jenis Surat</label><br>
    <input type="text" name="jenis_surat" value="<?php echo $edit['jenis_surat'] ?>" placeholder="Masukan Jenis Surat">
    <p></p>

    <button type="submit">Perbaharui</button>
    <a href="<?php echo site_url('Jenis') ?>"><button type="button">Batal</button></a>

</form>