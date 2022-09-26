<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <?php $this->view('backend/message'); ?>
  <div class="card mb-3">
    <div class="card-header">
      <h3> <?php echo $sub ?> </h3>
    </div>
    <div class="card-body">
      <!--Form-->
      <form method="post" action="<?php echo site_url('backend/User/changepswd/' . $edit['kd_user']) ?>">
        <div class="row">
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            <br>
            <table width="70%" style="border: hidden;">
              <tr>
                <td>
                  <img src="<?php echo base_url('assets/img_icon/key_4275.jpg') ?>" width="100%">
                  <p></p>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
            <label>Password</label>
            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?><br>
            <input type="password" name="password1" class="form-control" placeholder="Masukan Kata Sandi" value="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Password Harus Di Isi dan password terdiri dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka')" oninput="setCustomValidity('')">
            <p></p>

            <label>Password</label>
            <?= form_error('password2', '<small class="text-danger">', '</small>'); ?><br>
            <input type="password" name="password2" class="form-control" placeholder="Konfirmasi Kata Sandi" value="">
            <p></p>
            <br><br>

            <button class="mb-xs mt-xs mr-xs btn btn-primary" type="submit">Perbaharui</button>
            <a href="<?= site_url('backend/Home') ?>" title="Kembali"><button class="mb-xs mt-xs mr-xs btn btn-secondary" type="button">Batal</button></a>
          </div>
        </div>

      </form>
      <!--EndForm-->
    </div>
  </div>
</div>