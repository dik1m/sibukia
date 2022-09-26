<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <div class="card mb-3">
    <div class="card-header">
      <h3> <?= $sub ?> </h3>
    </div>
    <div class="card-body">

      <form action="<?= site_url('users/Profil/edit/' . $edit['no_ktp']) ?>" method="post" enctype="multipart/form-data" method="post">

        <div class="row">
          <div class="col-md-6">
            <!--tengah-->
            <label>Nomor KTP</label>
            <?= form_error('no_ktp', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="no_ktp" disabled value="<?= $edit['no_ktp']; ?>" placeholder="Masukkan Nomor KTP">
            <p></p>

            <label>Nomor KK</label>
            <?= form_error('no_kk', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="no_kk" value="<?= $edit['no_kk']; ?>" placeholder="Masukkan Nomor Kartu Keluarga">
            <p></p>

            <label>Nama</label>
            <?= form_error('nm_peop', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="nm_peop" value="<?= $edit['nm_peop']; ?>" placeholder="Masukkan Nama Lengkap">
            <p></p>

            <label>Jenis Kelamin</label>
            <?= form_error('gender_peop', '<small class="text-danger">', '</small>'); ?><br>
            <select name="gender_peop" class="form-control">
              <option value="<?= $edit['gender_peop'] ?>" selected><?= $edit['gender_peop'] ?></option>
              <option value="">- Pilih Jenis Kelamin -</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
            <p></p>

            <label>Tempat Lahir</label>
            <?= form_error('born_tmppeop', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="born_tmppeop" value="<?= $edit['born_tmppeop']; ?>" placeholder="Masukkan Nama Lengkap">
            <p></p>

            <label>Tanggal Lahir</label>
            <?= form_error('born_tglpeop', '<small class="text-danger">', '</small>'); ?><br>
            <input type="date" class="form-control" name="born_tglpeop" value="<?= $edit['born_tglpeop']; ?>" placeholder="Masukkan Tanggal Lahir">
            <p></p>

            <label>Agama</label>
            <?= form_error('relig_peop', '<small class="text-danger">', '</small>'); ?><br>
            <select name="relig_peop" class="form-control">
              <option value="<?= $edit['relig_peop'] ?>" selected><?= $edit['relig_peop'] ?></option>
              <option value="">- Pilih Agama -</option>
              <option value="Islam">Islam</option>
              <option value="Protestan">Protestan</option>
              <option value="Katolik">Katolik</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddha">Buddha</option>
              <option value="Khonghucu">Khonghucu</option>
            </select>
            <p></p>

            <label>Pendidikan</label>
            <?= form_error('studi_peop', '<small class="text-danger">', '</small>'); ?><br>
            <select name="studi_peop" class="form-control">
              <option value="<?= $edit['studi_peop'] ?>" selected><?= $edit['studi_peop'] ?></option>
              <option value="">- Pilih Pendidikan Terakhir -</option>
              <option value="SMA/Sederajat">SMA/Sederajat</option>
              <option value="Diploma III">Diploma III</option>
              <option value="Diploma IV">Diploma IV</option>
              <option value="Strata I">Strata I</option>
              <option value="Strata II">Strata II</option>
            </select>
            <p></p>

            <label>Pekerjaan</label>
            <?= form_error('work_peop', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="work_peop" value="<?= $edit['work_peop']; ?>" placeholder="Masukkan Pekerjaan">
            <p></p>
          </div>

          <div class="col-md-6">
            <!--kanan-->
            <label>Email</label>
            <?= form_error('email_peop', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="email_peop" disabled value="<?= $edit['email_peop']; ?>" placeholder="Masukkan Email User">
            <p></p>

            <label>HP</label>
            <?= form_error('hp_peop', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="hp_peop" value="<?= $edit['hp_peop']; ?>" placeholder="Masukkan Nomor HP User">
            <p></p>

            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="inputEmail4">Kode</label>
                <?= form_error('wa_kdpeop', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="wa_kdpeop" maxlength="3" placeholder="+62" value="<?= $edit['wa_kdpeop']; ?>">
              </div>
              <div class="form-group col-md-10">
                <label for="inputPassword4">Nomor Whatsapp</label>
                <?= form_error('wa_nopeop', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="wa_nopeop" placeholder="Masukan Nomor Whatsapp" value="<?= $edit['wa_nopeop']; ?>">
              </div>
            </div>

            <label>Pilih Provinsi</label><br>
            <select name="id_prov" class="form-control">
              <option value="<?= $edit['id_prov'] ?>"><?= $edit['nama_prov'] ?></option>
              <?php
              foreach ($prov->result_array() as $rprov) {
              ?>
                <option value="<?= $rprov['id_prov'] ?>"><?= $rprov['nama_prov']; ?></option>
              <?php } ?>
            </select>
            <p></p>

            <label>Pilih Kabupaten/Kota</label><br>
            <select name="id_kab" class="form-control">
              <option value="<?= $edit['id_kab'] ?>"><?= $edit['nama_kab'] ?></option>
              <?php
              foreach ($kab->result_array() as $rkab) {
              ?>
                <option value="<?= $rkab['id_kab'] ?>"><?= $rkab['nama_kab']; ?></option>
              <?php } ?>
            </select>
            <p></p>


            <label>Pilih Kecamatan</label><br>
            <select name="id_kec" class="form-control">
              <option value="<?= $edit['id_kec'] ?>"><?= $edit['nama_kec'] ?></option>
              <?php
              foreach ($kec->result_array() as $rkec) {
              ?>
                <option value="<?= $rkec['id_kec'] ?>"><?= $rkec['nama_kec']; ?></option>
              <?php } ?>
            </select>
            <p></p>


            <label>Pilih Kelurahan/Desa</label><br>
            <select name="id_kel" class="form-control">
              <option value="<?= $edit['id_kel'] ?>"><?= $edit['nama_kel'] ?></option>
              <?php
              foreach ($kel->result_array() as $rkel) {
              ?>
                <option value="<?= $rkel['id_kel'] ?>"><?= $rkel['nama_kel']; ?></option>
              <?php } ?>
            </select>
            <p></p>

            <label>Alamat</label>
            <?= form_error('addres_peop', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="addres_peop" value="<?= $edit['addres_peop']; ?>" placeholder="Masukkan Alamat Saat Ini">
            <p></p>

            <label>Kode POS</label>
            <?= form_error('kdpos_peop', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="kdpos_peop" value="<?= $edit['kdpos_peop']; ?>" placeholder="Masukkan Kode POS">
            <p></p>

          </div>

          <div class="col-md-6">
            <br><br>
            <h5> Dokumen lain </h5>
            <!-- /.tabel -->

            <table class="table table-bordered table-hover display" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Dokumen</th>
                  <th>Berkas</th>
                  <th>Aksi</th>

                </tr>
              </thead>
              <tbody>
                <?php
                // $no = 1;
                // foreach ($berita->result_array() as $row) {
                ?>
                <tr>
                  <td>1</td>
                  <td>
                    Foto
                  </td>
                  <td>
                    <a class="badge badge-primary" href="<?= base_url('assets/img_penduduk/' . $edit['img_peop']) ?>" title="Download Foto" target='_blank'> <i class="fa fa-download"></i> <?= $edit['img_peop']; ?> </a>
                  </td>
                  <td>
                    <input type="file" name="img_peop" class="form-control">
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    Scan KTP
                  </td>
                  <td>
                    <?php
                    if ($edit['img_ktp'] == '') {
                    ?>
                      <span class="badge badge-secondary"><i class="fa fa-exclamation"></i> tidak tersedia</span>
                    <?php
                    } else {
                    ?>
                      <a class="badge badge-primary" href="<?= base_url('assets/img_ktp/' . $edit['img_ktp']) ?>" title="Download KTP" target='_blank'> <i class="fa fa-download"></i> <?= $edit['img_ktp']; ?> </a>
                    <?php } ?>
                  </td>
                  <td>
                    <input type="file" name="img_ktp" class="form-control">
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    Scan KK
                  </td>
                  <td>
                    <?php
                    if ($edit['img_kk'] == '') {
                    ?>
                      <span class="badge badge-secondary"><i class="fa fa-exclamation"></i> tidak tersedia</span>
                    <?php
                    } else {
                    ?>
                      <a class="badge badge-primary" href="<?= base_url('assets/img_kk/' . $edit['img_kk']) ?>" title="Download KK" target='_blank'> <i class="fa fa-download"></i> <?= $edit['img_kk']; ?> </a>
                    <?php } ?>
                  </td>
                  <td>
                    <input type="file" name="img_kk" class="form-control">
                  </td>
                </tr>

                <?php
                //   $no++;
                // }
                ?>
              </tbody>
            </table>

            <!-- /.tabel -->
          </div>

        </div>

        <br>
        <button class="mb-xs mt-xs mr-xs btn btn-primary" type="submit">Perbaharui</button>
        <a href="<?= site_url('users/Profil/show/' . $edit['no_ktp']) ?>" title="Kembali"><button class="mb-xs mt-xs mr-xs btn btn-secondary" type="button">Batal</button></a>

      </form>
      <!--EndForm-->
    </div>

  </div>


</div>