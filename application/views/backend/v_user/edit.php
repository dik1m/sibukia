<div class="col-lg-12 col-xs-12">
  <div class="card card-default ">
    <div class="card-header">
      <h3 class="card-title"><?php echo $sub ?></h3>
    </div>
    <div class="card-body">
      <!--Form-->
      <form action="<?php echo site_url('backend/User/edit/' . $edit['kd_user']) ?>" enctype="multipart/form-data" method="post">
        <div class="row">
          <div class="col-md-4">
            <table width="100%" style="border: hidden;">
              <tr>
                <td>

                  <img src="<?php echo base_url('assets/img_user/' . $edit['img_user']) ?>" width="100%">
                  <p></p>
                  <label>Ganti Foto</label><br>
                  <input type="file" name="img_user" class="form-control">
                  <p></p>
                </td>
              </tr>
            </table>
          </div>

          <div class="col-md-8">
            <label>Email</label>
            <?= form_error('email_user', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" disabled name="email_user" value="<?= $edit['email_user'] ?>" placeholder="Masukkan Email User">
            <p></p>

            <label>Kode</label>
            <?= form_error('kd_user', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" disabled name="kd_user" value="<?= $edit['kd_user'] ?>" placeholder="Masukan Kode user">
            <p></p>
            <input type="hidden" class="form-control" name="kd_user" value="<?= $edit['kd_user'] ?>" placeholder="Masukan Kode user">
            <p></p>

            <label>Nama</label>
            <?= form_error('nm_user', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="nm_user" value="<?= $edit['nm_user'] ?>" placeholder="Masukan Nama Lengkap">
            <p></p>

            <label>HP</label>
            <?= form_error('hp_user', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="hp_user" value="<?= $edit['hp_user'] ?>" placeholder="Masukkan Nomor HP">
            <p></p>

            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="inputEmail4">Kode</label>
                <?= form_error('wa_kduser', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="wa_kduser" placeholder="+62" value="<?= $edit['wa_kduser'] ?>">
              </div>
              <div class="form-group col-md-10">
                <label for="inputPassword4">Nomor Whatsapp</label>
                <?= form_error('wa_nouser', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="wa_nouser" placeholder="Masukan Nomor Whatsapp" value="<?= $edit['wa_nouser'] ?>">
              </div>
            </div>
          </div>

        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Perbaharui</button>
          <a href="<?= site_url('backend/User') ?>"><button type="button" class="btn btn-secondary float-right">Kembali</button></a>
        </div>
      </form>
    </div>
  </div>
</div>