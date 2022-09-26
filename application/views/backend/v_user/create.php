<div class="col-lg-12 col-xs-12">
  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"><?php echo $sub ?></h3>
    </div>
    <div class="card-body">
      <!--Form-->
      <form action="<?= site_url('backend/User/create') ?>" method="post">
        <div class="row">
          <div class="col-md-6">
            <label>Kode</label>
            <?= form_error('kd_user', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="kd_user" value="<?= set_value('kd_user'); ?>" placeholder="Masukkan Kode User">
            <p></p>

            <label>Nama</label>
            <?= form_error('nm_user', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="nm_user" value="<?= set_value('nm_user'); ?>" placeholder="Masukkan Nama User">
            <p></p>

            <label>HP</label>
            <?= form_error('hp_user', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="hp_user" value="<?= set_value('hp_user'); ?>" placeholder="Masukkan Nomor HP">
            <p></p>

            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="inputEmail4">Kode</label>
                <?= form_error('wa_kduser', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="wa_kduser" placeholder=" +62" value="<?= set_value('wa_kduser'); ?>">
              </div>
              <div class="form-group col-md-10">
                <label for="inputPassword4">Nomor Whatsapp</label>
                <?= form_error('wa_nouser', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="wa_nouser" placeholder="Masukan Nomor Whatsapp" value="<?= set_value('wa_nouser'); ?>">
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <label>Email</label>
            <?= form_error('email_user', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="email_user" value="<?= set_value('email_user'); ?>" placeholder="Masukkan Email User">
            <p></p>

            <label>Password</label>
            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?><br>
            <input type="password" class="form-control" name="password1" placeholder="Masukkan Password" value="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Password Harus Di Isi dan password terdiri dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka')" oninput="setCustomValidity('')">
            <p></p>

            <label>Konfirmasi Password</label>
            <?= form_error('password2', '<small class="text-danger">', '</small>'); ?><br>
            <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" value="">
            <p></p>
          </div>
        </div>

        <br>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= site_url('backend/User') ?>"><button type="button" class="btn btn-secondary float-right">Kembali</button></a>
        </div>


      </form>
    </div>
  </div>
</div>