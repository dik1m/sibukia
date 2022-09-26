<div class="col-lg-12 col-xs-12">
  <div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#tabbuku" data-toggle="tab">Buku KIA</a></li>
        <li class="nav-item"><a class="nav-link" href="#tabibu" data-toggle="tab">Data Ibu</a></li>
        <li class="nav-item"><a class="nav-link" href="#tabsuami" data-toggle="tab">Data Suami</a></li>
        <li class="nav-item"><a class="nav-link" href="#tabkehamilan" data-toggle="tab">Kehamilan</a></li>
        <li class="nav-item"><a class="nav-link" href="#tabanak" data-toggle="tab">Data Anak</a></li>
        <li class="nav-item"><a class="nav-link" href="#tablain" data-toggle="tab">Identitas Lain</a></li>
        <li class="nav-item"><a class="nav-link" href="#tabketselesai" data-toggle="tab">Keterangan</a></li>


      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <form action="<?= site_url('backend/Kia/edit/' . $edit['no_kia']) ?>" method="post" enctype="multipart/form-data">
        <div class="tab-content">
          <!-- tabbuku -->
          <div class="active tab-pane" id="tabbuku">
            <div class="row">
              <div class="col-md-3">
                <table width="100%" style="border: hidden;">
                  <tr>
                    <td>

                      <img src="<?php echo base_url('assets/img_kia/' . $edit['img_kia']) ?>" width="100%">
                      <p></p>
                      <label>Ganti Foto</label><br>
                      <input type="file" name="img_kia" class="form-control">
                      <p></p>
                    </td>
                  </tr>
                </table>
              </div>

              <div class="col-md-9">
                <label>Nomor Buku KIA<small style="color: red;">*</small></label>
                <?= form_error('no_kia', '<small class="text-danger">', '</small>'); ?><br>
                <select name="no_kia" class="form-control" disabled>
                  <option value="<?php echo $edit['no_kia'] ?>" selected><?php echo $edit['no_kia'] ?></option>
                  <?php
                  foreach ($buku->result_array() as $b) {
                  ?>
                    <option value="<?= $b['no_kia'] ?>"><?= $b['no_kia']; ?></option>
                  <?php } ?>
                </select>
                <p></p>


                <label>Status Buku Kia<small style="color: red;">*</small></label>
                <?= form_error('st_kia', '<small class="text-danger">', '</small>'); ?><br>
                <select name="st_kia" class="form-control">
                  <option value="<?php echo $edit['st_kia'] ?>" selected><?php echo $edit['st_kia'] ?></option>
                  <option value="Hamil">Hamil</option>
                  <option value="Anak">Anak</option>
                  <option value="Selesai">Selesai</option>
                </select>
                <p></p>


                <label>Nomor Registrasi Ibu</label>
                <?= form_error('noreg_kia', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="noreg_kia" value="<?= $edit['noreg_kia']; ?>" placeholder="Masukkan Nomor Registrasi Ibu">
                <p></p>

                <label>Nomor Urut di Kohort Ibu</label>
                <?= form_error('no_kohort', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="no_kohort" value="<?= $edit['no_kohort']; ?>" placeholder="Masukkan Nomor Urut di Kohort Ibu">
                <p></p>

                <label>Tanggal Menerima Buku KIA<small style="color: red;">*</small></label>
                <?= form_error('tgl_nerimakia', '<small class="text-danger">', '</small>'); ?><br>
                <input type="date" class="form-control" name="tgl_nerimakia" value="<?= $edit['tgl_nerimakia']; ?>" placeholder="Masukkan Tanggal menerima buku KIA">
                <p></p>

                <label>Tenaga Kesehatan<small style="color: red;">*</small></label>
                <?= form_error('nik_kes', '<small class="text-danger">', '</small>'); ?><br>
                <select name="nik_kes" class="form-control">
                  <option value="<?php echo $edit['nik_kes'] ?>" selected><?php echo $edit['nik_kes'] ?></option>
                  <?php
                  foreach ($tenagakes->result_array() as $r) {
                  ?>
                    <option value="<?= $r['nik_kes'] ?>"><?= $r['nm_kes']; ?></option>
                  <?php } ?>
                </select>
                <p></p>

              </div>
            </div>
          </div>
          <!-- //tabbuku -->

          <!-- tabibu -->
          <div class="tab-pane" id="tabibu">

            <label>Nama Ibu<a style="color: red;">*</a></label>
            <?= form_error('nmibu_kia', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="nmibu_kia" value="<?= $edit['nmibu_kia']; ?>" placeholder="Masukkan Nama Ibu">
            <p></p>

            <label>Tempat Lahir<a style="color: red;">*</a></label>
            <?= form_error('born_tmpibu', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="born_tmpibu" value="<?= $edit['born_tmpibu']; ?>" placeholder="Masukkan Tempat Lahir">
            <p></p>

            <label>Tanggal Lahir<a style="color: red;">*</a></label>
            <?= form_error('born_tglibu', '<small class="text-danger">', '</small>'); ?><br>
            <input type="date" class="form-control" name="born_tglibu" value="<?= $edit['born_tglibu']; ?>" placeholder="Masukkan Tanggal Lahir">
            <p></p>

            <div class="form-row col-md-12">
              <div class="form-group col-md-6">
                <label>Kehamilan ke<a style="color: red;">*</a></label>
                <?= form_error('hamilke', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="hamilke" placeholder="angka" value="<?= $edit['hamilke']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label>Anak terakhir umur<a style="color: red;">*</a></label>
                <?= form_error('age_anakterakhir', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="age_anakterakhir" placeholder="Masukan Tahun Anak" value="<?= $edit['age_anakterakhir']; ?>">
              </div>
            </div>


            <label>Agama</label>
            <?= form_error('religibu_kia', '<small class="text-danger">', '</small>'); ?><br>
            <select name="religibu_kia" class="form-control">
              <option value="<?php echo $edit['religibu_kia'] ?>" selected><?php echo $edit['religibu_kia'] ?></option>
              <option value="Islam">Islam</option>
              <option value="Protestan">Protestan</option>
              <option value="Katolik">Katolik</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddha">Buddha</option>
              <option value="Khonghucu">Khonghucu</option>
            </select>
            <p></p>


            <label>Pendidikan</label>
            <?= form_error('studiibu_kia', '<small class="text-danger">', '</small>'); ?><br>
            <select name="studiibu_kia" class="form-control">
              <option value="<?php echo $edit['studiibu_kia'] ?>" selected><?php echo $edit['studiibu_kia'] ?></option>
              <option value="Tidak Sekolah">Tidak Sekolah</option>
              <option value="SD">SD</option>
              <option value="SMP">SMP</option>
              <option value="SMU">SMU</option>
              <option value="Akademik">Akademik</option>
              <option value="Perguruan Tinggi">Perguruan Tinggi</option>
            </select>
            <p></p>

            <label>Golongan Darah<a style="color: red;">*</a></label>
            <?= form_error('bloodibu_kia', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="bloodibu_kia" value="<?= $edit['bloodibu_kia']; ?>" placeholder="Masukkan Golongan Darah">
            <p></p>

            <label>Pekerjaan</label>
            <?= form_error('jobibu_kia', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="jobibu_kia" value="<?= $edit['jobibu_kia']; ?>" placeholder="Masukkan Pekerjaan">
            <p></p>

            <label>No. JKN</label>
            <?= form_error('no_jkn', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="no_jkn" value="<?= $edit['no_jkn']; ?>" placeholder="Masukkan Nomor JKN">
            <p></p>

          </div>
          <!-- //tabibu -->

          <!-- tabsuami -->
          <div class="tab-pane" id="tabsuami">

            <label>Nama Suami<a style="color: red;">*</a></label>
            <?= form_error('nmbpk_kia', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="nmbpk_kia" value="<?= $edit['nmbpk_kia']; ?>" placeholder="Masukkan Nama Suami">
            <p></p>

            <label>Tempat Lahir</label>
            <?= form_error('born_tmpbpk', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="born_tmpbpk" value="<?= $edit['born_tmpbpk']; ?>" placeholder="Masukkan Tempat Lahir">
            <p></p>

            <label>Tanggal Lahir</label>
            <?= form_error('born_tglbpk', '<small class="text-danger">', '</small>'); ?><br>
            <input type="date" class="form-control" name="born_tglbpk" value="<?= $edit['born_tglbpk']; ?>" placeholder="Masukkan Tanggal Lahir">
            <p></p>

            <label>Agama</label>
            <?= form_error('religbpk_kia', '<small class="text-danger">', '</small>'); ?><br>
            <select name="religbpk_kia" class="form-control">
              <option value="<?php echo $edit['religbpk_kia'] ?>" selected><?php echo $edit['religbpk_kia'] ?></option>
              <option value="Islam">Islam</option>
              <option value="Protestan">Protestan</option>
              <option value="Katolik">Katolik</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddha">Buddha</option>
              <option value="Khonghucu">Khonghucu</option>
            </select>
            <p></p>


            <label>Pendidikan</label>
            <?= form_error('studibpk_kia', '<small class="text-danger">', '</small>'); ?><br>
            <select name="studibpk_kia" class="form-control">
              <option value="<?php echo $edit['studibpk_kia'] ?>" selected><?php echo $edit['studibpk_kia'] ?></option>
              <option value="Tidak Sekolah">Tidak Sekolah</option>
              <option value="SD">SD</option>
              <option value="SMP">SMP</option>
              <option value="SMU">SMU</option>
              <option value="Akademik">Akademik</option>
              <option value="Perguruan Tinggi">Perguruan Tinggi</option>
            </select>
            <p></p>

            <label>Golongan Darah</label>
            <?= form_error('bloodbpk_kia', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="bloodbpk_kia" value="<?= $edit['bloodbpk_kia']; ?>" placeholder="Masukkan Golongan Darah">
            <p></p>

            <label>Pekerjaan</label>
            <?= form_error('jobbpk_kia', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="jobbpk_kia" value="<?= $edit['jobbpk_kia']; ?>" placeholder="Masukkan Pekerjaan">
            <p></p>

          </div>
          <!-- //tabsuami -->

          <!-- tabkehamilan -->
          <div class="tab-pane" id="tabkehamilan">

            <label>Hari Pertama Haid Terakhir (HPHT)<a style="color: red;">*</a></label>
            <?= form_error('tgl_hpht', '<small class="text-danger">', '</small>'); ?><br>
            <input type="date" class="form-control" name="tgl_hpht" value="<?= $edit['tgl_hpht']; ?>" placeholder="Masukkan Tempat Lahir">
            <p></p>

            <label>Hari Taksir Persalinan (HTP)<a style="color: red;">*</a></label>
            <?= form_error('tgl_htp', '<small class="text-danger">', '</small>'); ?><br>
            <input type="date" class="form-control" name="tgl_htp" value="<?= $edit['tgl_htp']; ?>" placeholder="Masukkan Tempat Lahir">
            <p></p>

            <label>Lingkar Lengan Atas<a style="color: red;">*</a></label>
            <?= form_error('ling_lengan', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="ling_lengan" value="<?= $edit['ling_lengan']; ?>" placeholder="Lingkar Lengan Satuan CM">
            <p></p>

            <label>KEK<a style="color: red;">*</a></label>
            <?= form_error('kek', '<small class="text-danger">', '</small>'); ?><br>
            <select name="kek" class="form-control">
              <option value="<?php echo $edit['kek'] ?>" selected><?php echo $edit['kek'] ?></option>
              <option value="KEK">KEK</option>
              <option value="Non KEK">Non KEK</option>
            </select>
            <p></p>

            <label>Tinggi Badan<a style="color: red;">*</a></label>
            <?= form_error('ting_badan', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="ting_badan" value="<?= $edit['ting_badan']; ?>" placeholder="Tinggi Badan Satuan CM">
            <p></p>

            <label>Penggunan Kontrasepsi Sebelum Kehamilan ini<a style="color: red;">*</a></label>
            <?= form_error('kontrasepsi', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="kontrasepsi" value="<?= $edit['kontrasepsi']; ?>" placeholder="Penggunan Kontrasepsi Sebelum Kehamilan">
            <p></p>

            <label>Riwayat Penyakit Yang diderita Ibu<a style="color: red;">*</a></label>
            <?= form_error('riw_penyakit', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="riw_penyakit" value="<?= $edit['riw_penyakit']; ?>" placeholder="Riwayat Penyakit Yang diderita">
            <p></p>

            <label>Riwayat Alergi<a style="color: red;">*</a></label>
            <?= form_error('riw_alergi', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="riw_alergi" value="<?= $edit['riw_alergi']; ?>" placeholder="Riwayat Alergi">
            <p></p>

            <label>Jumlah Persalinan<a style="color: red;">*</a></label>
            <?= form_error('jumpersalinan', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="jumpersalinan" value="<?= $edit['jumpersalinan']; ?>" placeholder="Jumlah Persalinan">
            <p></p>

            <div class="form-row col-md-12">
              <div class="form-group col-md-3">
                <label>Jumlah Gugur<a style="color: red;">*</a></label>
                <?= form_error('jumgugur', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="jumgugur" value="<?= $edit['jumgugur']; ?>" placeholder="Jumlah Gugur">
              </div>
              <div class="form-group col-md-3">
                <label>G<a style="color: red;">*</a></label>
                <?= form_error('jum_g', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="jum_g" value="<?= $edit['jum_g']; ?>" placeholder="Jumlah G">
              </div>
              <div class="form-group col-md-3">
                <label>P<a style="color: red;">*</a></label>
                <?= form_error('jum_p', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="jum_p" value="<?= $edit['jum_p']; ?>" placeholder="Jumlah P">
              </div>
              <div class="form-group col-md-3">
                <label>A<a style="color: red;">*</a></label>
                <?= form_error('jum_a', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="jum_a" value="<?= $edit['jum_a']; ?>" placeholder="Jumlah A">
              </div>
            </div>

            <div class="form-row col-md-12">
              <div class="form-group col-md-6">
                <label>Jumlah Anak Hidup<a style="color: red;">*</a></label>
                <?= form_error('jmlanakhidup', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="jmlanakhidup" value="<?= $edit['jmlanakhidup']; ?>" placeholder="Jumlah Anak Hidup">
              </div>
              <div class="form-group col-md-6">
                <label>Jumlah Lahir Mati<a style="color: red;">*</a></label>
                <?= form_error('jmllahirmati', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="jmllahirmati" value="<?= $edit['jmllahirmati']; ?>" placeholder="Jumlah Lahir Mati">
              </div>
            </div>

            <label>Jarak Kehamilan ini dengan persalinan terakhir<a style="color: red;">*</a></label>
            <?= form_error('jarakkehamilan', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="jarakkehamilan" value="<?= $edit['jarakkehamilan']; ?>" placeholder="Jumlah Persalinan">
            <p></p>

            <label>Status Imunisasi TT Terakhir<a style="color: red;">*</a></label>
            <?= form_error('imu_tt', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="imu_tt" value="<?= $edit['imu_tt']; ?>" placeholder="Masukkan Imunisasi TT terakhir [bulan/tahun]">
            <p></p>

            <label>Penolongan persalinan terakhir<a style="color: red;">*</a></label>
            <?= form_error('penolongan', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="penolongan" value="<?= $edit['penolongan']; ?>" placeholder="Penolong Persalinan">
            <p></p>

            <div class="form-row col-md-12">
              <div class="form-group col-md-6">
                <label>Cara Persalinan Terakhir<a style="color: red;">*</a></label>
                <?= form_error('cr_persalinan', '<small class="text-danger">', '</small>'); ?><br>
                <select name="cr_persalinan" class="form-control">
                  <option value="<?php echo $edit['cr_persalinan'] ?>" selected><?php echo $edit['cr_persalinan'] ?></option>
                  <option value="Spontan/Normal">Spontan/Normal</option>
                  <option value="Tindakan">Tindakan</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label>Tindakan</label>
                <?= form_error('tindakan', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="tindakan" value="<?= $edit['tindakan']; ?>" placeholder="Tindakan">
              </div>
            </div>
          </div>
          <!-- //tabkehamilan -->


          <!-- tabanak -->
          <div class="tab-pane" id="tabanak">

            <label>Nama Anak</label>
            <?= form_error('nmanak_kia', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="nmanak_kia" value="<?= $edit['nmanak_kia']; ?>" placeholder="Masukkan Nama Anak">
            <p></p>

            <label>Jenis Kelamin</label>
            <?= form_error('gender_anak', '<small class="text-danger">', '</small>'); ?><br>
            <select name="gender_anak" class="form-control">
              <option value="<?php echo $edit['gender_anak'] ?>" selected><?php echo $edit['gender_anak'] ?></option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
            <p></p>

            <label>Tempat Lahir</label>
            <?= form_error('born_tmpanak', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="born_tmpanak" value="<?= $edit['born_tmpanak']; ?>" placeholder="Masukkan Tempat Lahir">
            <p></p>

            <label>Tanggal Lahir</label>
            <?= form_error('born_tglanak', '<small class="text-danger">', '</small>'); ?><br>
            <input type="date" class="form-control" name="born_tglanak" value="<?= $edit['born_tglanak']; ?>" placeholder="Masukkan Tanggal Lahir">
            <p></p>

            <div class="form-row col-md-12">
              <div class="form-group col-md-6">
                <label>Anak ke</label>
                <?= form_error('anakke', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="anakke" placeholder="Masukan Angka" value="<?= $edit['anakke']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label>dari Anak</label>
                <?= form_error('dranakke', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="dranakke" placeholder="Masukan Angka" value="<?= $edit['dranakke']; ?>">
              </div>
            </div>

            <label>No. Akte Kelahiran</label>
            <?= form_error('noakta_kia', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="noakta_kia" value="<?= $edit['noakta_kia']; ?>" placeholder="No. Akte Kelahiran">
            <p></p>

          </div>
          <!-- //tabanak -->

          <!-- tablain -->
          <div class="tab-pane" id="tablain">

            <label>Email<a style="color: red;">*</a></label>
            <?= form_error('email_kia', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="email_kia" value="<?= $edit['email_kia']; ?>" placeholder="Masukkan Email">
            <p></p>

            <label>HP<a style="color: red;">*</a></label>
            <?= form_error('hp_kia', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="hp_kia" value="<?= $edit['hp_kia']; ?>" placeholder="Masukkan Nomor HP">
            <p></p>

            <div class="form-row col-md-12">
              <div class="form-group col-md-4">
                <label for="inputEmail4">Kode<a style="color: red;">*</a></label>
                <?= form_error('wa_kdkia', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="wa_kdkia" maxlength="3" placeholder="+62" value="<?= $edit['wa_kdkia']; ?>">
              </div>
              <div class="form-group col-md-8">
                <label for="inputPassword4">Nomor Whatsapp<a style="color: red;">*</a></label>
                <?= form_error('wa_nokia', '<small class="text-danger">', '</small>'); ?><br>
                <input type="text" class="form-control" name="wa_nokia" placeholder="Masukan Nomor Whatsapp" value="<?= $edit['wa_nokia']; ?>">
              </div>
            </div>

            <label>Alamat<a style="color: red;">*</a></label>
            <?= form_error('addres_kia', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="addres_kia" value="<?= $edit['addres_kia']; ?>" placeholder="Masukkan Alamat Saat Ini">
            <p></p>

            <label>Pilih Provinsi<a style="color: red;">*</a></label>
            <?= form_error('id_prov', '<small class="text-danger">', '</small>'); ?><br>
            <select name="id_prov" class="form-control">
              <option value="<?php echo $edit['id_prov'] ?>" selected><?php echo $edit['nama_prov'] ?></option>
              <?php
              foreach ($prov->result_array() as $rprov) {
              ?>
                <option value="<?php echo $rprov['id_prov'] ?>"><?php echo $rprov['nama_prov']; ?></option>
              <?php } ?>
            </select>
            <p></p>


            <label>Pilih Kabupaten/Kota<a style="color: red;">*</a></label><br>
            <select name="id_kab" class="form-control">
              <option value="<?php echo $edit['id_kab'] ?>"><?php echo $edit['nama_kab'] ?></option>
              <?php
              foreach ($kab->result_array() as $rkab) {
              ?>
                <option value="<?php echo $rkab['id_kab'] ?>"><?php echo $rkab['nama_kab']; ?></option>
              <?php } ?>
            </select>
            <p></p>


            <label>Pilih Kecamatan<a style="color: red;">*</a></label><br>
            <select name="id_kec" class="form-control">
              <option value="<?php echo $edit['id_kec'] ?>"><?php echo $edit['nama_kec'] ?></option>
              <?php
              foreach ($kec->result_array() as $rkec) {
              ?>
                <option value="<?php echo $rkec['id_kec'] ?>"><?php echo $rkec['nama_kec']; ?></option>
              <?php } ?>
            </select>
            <p></p>


            <label>Pilih Kelurahan/Desa<a style="color: red;">*</a></label><br>
            <select name="id_kel" class="form-control">
              <option value="<?php echo $edit['id_kel'] ?>"><?php echo $edit['nama_kel'] ?></option>
              <?php
              foreach ($kel->result_array() as $rkel) {
              ?>
                <option value="<?php echo $rkel['id_kel'] ?>"><?php echo $rkel['nama_kel']; ?></option>
              <?php } ?>
            </select>
            <p></p>


            <label>Kode POS</label>
            <?= form_error('kdpos_kia', '<small class="text-danger">', '</small>'); ?><br>
            <input type="text" class="form-control" name="kdpos_kia" value="<?= $edit['kdpos_kia']; ?>" placeholder="Masukkan Kode POS">
            <p></p>

          </div>
          <!-- //tablain -->

          <!-- tablain -->
          <div class="tab-pane" id="tabketselesai">

            <label>Keterangan</label>
            <?= form_error('ket_selesaikia', '<small class="text-danger">', '</small>'); ?><br>
            <textarea name="ket_selesaikia" class="form-control ckeditor" placeholder="Masukkan Keterangan jika status selesai"><?= set_value('ket_selesaikia'); ?></textarea>
            <p></p>



          </div>
          <!-- //tablain -->

          <br><br>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Perbaharui</button>
            <a href="<?= site_url('backend/Kia') ?>"><button type="button" class="btn btn-secondary float-right">Kembali</button></a>
          </div>
        </div>
      </form>
    </div><!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>