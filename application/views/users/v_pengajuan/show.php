<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
  <div class="card mb-3">
    <div class="card-header">
      <h3> <?= $sub ?> </h3>
    </div>
    <div class="card-body">

      <form class="form-horizontal" action="<?= site_url('PeopleBack/update/' . $show['no_ktp']) ?>" enctype="multipart/form-data" method="post">


        <div class="row">
          <div class="col-md-3">
            <table id="dataTable" style="width:100%" style="border-style: hidden;">
              <tr style="border-style: hidden;">
                <td style="border-style: hidden;">
                  <p></p>
                  <img src="<?= base_url('assets/img_penduduk/' . $show['img_peop']) ?>" width="100%">
                  <p></p>
                  <label>Scan KTP</label><br>
                  <?php
                  if ($show['img_ktp'] == '') {
                  ?>
                    <span class="btn btn-secondary"><i class="fa fa-exclamation"></i> tidak tersedia</span>
                  <?php
                  } else {
                  ?>
                    <a class="btn btn-primary" href="<?= base_url('assets/img_ktp/' . $show['img_ktp']); ?>" title="Download KTP" target='_blank'> <i class="fa fa-download"></i> Detail KTP </a>
                  <?php } ?>
                  <p></p>

                  <label>Scan KK</label><br>
                  <?php
                  if ($show['img_kk'] == '') {
                  ?>
                    <span class="btn btn-secondary"><i class="fa fa-exclamation"></i> tidak tersedia</span>
                  <?php
                  } else {
                  ?>
                    <a class="btn btn-primary" href="<?= base_url('assets/img_kk/' . $show['img_kk']); ?>" title="Download KK" target='_blank'> <i class="fa fa-download"></i> Detail KK </a>
                  <?php } ?>

                </td>
              </tr>
            </table>
            <!--kanan-->
          </div>
          <div class="col-md-9">
            <!--kiri-->
            <h5>Data Pemohon</h5>
            <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
              <tr>
                <td width="40%">Nomor KTP</td>
                <td width="60%"><?= $show['no_ktp'] ?></td>
              </tr>
              <tr>
                <td width="40%">Nama</td>
                <td width="60%"><?= $show['nm_peop'] ?></td>
              </tr>
              <tr>
                <td width="40%">Email</td>
                <td width="60%">
                  <?php
                  if ($show['active_peop'] == '0') {
                  ?>
                    <span class="badge badge-secondary"><i class="far fa-envelope"></i> <?= $show['email_peop'] ?></span>
                  <?php
                  } else {
                  ?>
                    <span class="badge badge-success"><i class="far fa-envelope"></i> <?= $show['email_peop'] ?></span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td width="40%">Whatsapp</td>
                <td width="60%">
                  <?php
                  if ($show['wa_nopeop'] == '') {
                  ?>
                    <span class="badge badge-secondary"><i class="fa fa-exclamation"></i> tdk tersedia</span>
                  <?php
                  } else {
                  ?>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= $show['wa_kdpeop'];
                                                                                  echo $show['wa_nopeop'] ?>&text=Hai%20user"><span class="badge badge-success"><i class="fab fa-whatsapp"></i> whatsapp</span>
                    </a>
                  <?php
                  }
                  ?>
                </td>
              </tr>

              <tr>
                <td width="40%">Alamat</td>
                <td width="60%">
                  <?= $show['addres_peop']; ?>
                  Kel. <?= $show['nama_kel']; ?> Kec. <?= $show['nama_kec'] ?> <br>
                  Kab. <?= $show['nama_kab'] ?>, <?= $show['nama_prov'] ?> <br>
                  Kode POS. <?= $show['kdpos_peop'] ?>
                </td>
              </tr>
            </table>

            <h5>Data Pengajuan</h5>
            <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
              <tr>
                <td width="40%">Nomor Pengajuan</td>
                <td width="60%"><?= $show['no_ajuan'] ?></td>
              </tr>
              <tr>
                <td width="40%">Status Pengajuan</td>
                <td width="60%"><?= $show['st_ajuan'] ?></td>
              </tr>
              <tr>
                <td width="40%">Tanggal Pengajuan</td>
                <td width="60%"><?= $show['tgl_ajuan'] ?></td>
              </tr>

              <tr>
                <td width="40%">Keterangan</td>
                <td width="60%"><?= $show['ket_ajuan']; ?></td>
              </tr>
            </table>

          </div>

          <div class="col-md-12">
            <h5>Data Pendukung</h5>

            <a href="<?= site_url('users/Pengajuan/create/' . $show['no_ktp']) ?>"><button type="button" class="btn btn-primary"><span class="btn-label"><i class="fas fa-plus"></i></span>Tambah Berkas</button></a>

            <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Detail</th>
                <th>Upload</th>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </table>
          </div>

        </div>

        <br>
        <br>
        <a href="<?= site_url('users/Profil/show/' . $show['no_ktp']) ?>" title="Kembali"><button class="mb-xs mt-xs mr-xs btn btn-secondary" type="button">Kembali</button></a>

      </form>
      <!--EndForm-->
    </div>
  </div>
</div>