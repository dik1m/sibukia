<div class="col-lg-12 col-xs-12">
  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"><?php echo $sub ?></h3>
    </div>
    <div class="card-body">

      <form class="form-horizontal" action="<?= site_url('backend/TenagaKes/edit/' . $edit['nik_kes']) ?>" method="post" enctype="multipart/form-data">

        <div class="row">
          <div class="col-md-4">
            <table width="100%" style="border: hidden;">
              <tr>
                <td>

                  <img src="<?php echo base_url('assets/img_tenagakes/' . $edit['img_kes']) ?>" width="100%">
                  <p></p>
                  <label>Ganti Foto</label><br>
                  <input type="file" name="img_kes" class="form-control">
                  <p></p>
                </td>
              </tr>
            </table>
          </div>

          <div class="col-md-8">
            <!--kiri-->
            <label>NIK</label>
            <?= form_error('nik_kes', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="nik_kes" value="<?= $edit['nik_kes']; ?>" placeholder="Masukkan Nomor Induk Kependudukan">
            <p></p>

            <label>Nama</label>
            <?= form_error('nm_kes', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="nm_kes" value="<?= $edit['nm_kes']; ?>" placeholder="Masukkan Nama Lengkap">
            <p></p>

            <label>Tanggal Lahir</label>
            <?= form_error('born_tglkes', '<small class="text-danger">', '</small>'); ?><br>
            <input type="date" class="form-control" name="born_tglkes" value="<?= $edit['born_tglkes']; ?>" placeholder="Masukkan Tanggal Lahir">
            <p></p>

            <label>Email</label>
            <?= form_error('email_kes', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="email_kes" value="<?= $edit['email_kes']; ?>" placeholder="Masukkan Email User">
            <p></p>

            <label>HP</label>
            <?= form_error('hp_kes', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="hp_kes" value="<?= $edit['hp_kes']; ?>" placeholder="Masukkan Nomor HP User">
            <p></p>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputEmail4">Kode</label>
                <?= form_error('wa_kdkes', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="wa_kdkes" maxlength="3" placeholder="+62" value="<?= $edit['wa_kdkes']; ?>">
              </div>
              <div class="form-group col-md-9">
                <label for="inputPassword4">Nomor Whatsapp</label>
                <?= form_error('wa_nokes', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="wa_nokes" placeholder="Masukan Nomor Whatsapp" value="<?= $edit['wa_nokes']; ?>">
              </div>
            </div>

            <label>Alamat</label>
            <?= form_error('addres_kes', '<small class="text-danger">', '</small>'); ?><br>
            <textarea name="addres_kes" class="form-control" placeholder="Masukkan Alamat Lengkap"><?= $edit['addres_kes']; ?></textarea>
            <p></p>

          </div>
        </div>

        <br>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Perbaharui</button>
          <a href="<?= site_url('backend/TenagaKes') ?>"><button type="button" class="btn btn-secondary float-right">Kembali</button></a>
        </div>

      </form>
      <!--EndForm-->
    </div>
  </div>
</div>