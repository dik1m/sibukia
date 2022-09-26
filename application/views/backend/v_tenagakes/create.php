<div class="col-lg-12 col-xs-12">
  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"><?php echo $sub ?></h3>
    </div>
    <div class="card-body">

      <form class="form-horizontal" action="<?= site_url('backend/TenagaKes/create') ?>" method="post">

        <div class="row">
          <div class="col-md-6">
            <!--kiri-->
            <label>NIK</label>
            <?= form_error('nik_kes', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="nik_kes" value="<?= set_value('nik_kes'); ?>" placeholder="Masukkan Nomor Induk Kependudukan">
            <p></p>

            <label>Nama</label>
            <?= form_error('nm_kes', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="nm_kes" value="<?= set_value('nm_kes'); ?>" placeholder="Masukkan Nama Lengkap">
            <p></p>

            <label>Tanggal Lahir</label>
            <?= form_error('born_tglkes', '<small class="text-danger">', '</small>'); ?><br>
            <input type="date" class="form-control" name="born_tglkes" value="<?= set_value('born_tglkes'); ?>" placeholder="Masukkan Tanggal Lahir">
            <p></p>

            <label>Alamat</label>
            <?= form_error('addres_kes', '<small class="text-danger">', '</small>'); ?><br>
            <textarea name="addres_kes" class="form-control" placeholder="Masukkan Alamat Lengkap"><?= set_value('addres_kes'); ?></textarea>
            <p></p>


          </div>
          <div class="col-md-6">
            <!--kanan-->
            <label>Email</label>
            <?= form_error('email_kes', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="email_kes" value="<?= set_value('email_kes'); ?>" placeholder="Masukkan Email User">
            <p></p>

            <label>HP</label>
            <?= form_error('hp_kes', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="hp_kes" value="<?= set_value('hp_kes'); ?>" placeholder="Masukkan Nomor HP User">
            <p></p>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputEmail4">Kode</label>
                <?= form_error('wa_kdkes', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="wa_kdkes" maxlength="3" placeholder="+62" value="<?= set_value('wa_kdkes'); ?>">
              </div>
              <div class="form-group col-md-9">
                <label for="inputPassword4">Nomor Whatsapp</label>
                <?= form_error('wa_nokes', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="wa_nokes" placeholder="Masukan Nomor Whatsapp" value="<?= set_value('wa_nokes'); ?>">
              </div>
            </div>


          </div>
        </div>

        <br>
        <button class="mb-xs mt-xs mr-xs btn btn-primary" type="submit">Simpan</button>
        <a href="<?= site_url('backend/TenagaKes') ?>" title="Kembali"><button class="mb-xs mt-xs mr-xs btn btn-secondary" type="button">Batal</button></a>

      </form>
      <!--EndForm-->
    </div>
  </div>
</div>