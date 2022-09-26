<div class="col-lg-12 col-xs-12">
  <div class="card card-default ">
    <div class="card-header">
      <h3 class="card-title"><?php echo $sub ?></h3>
    </div>
    <div class="card-body">
      <form class="form-horizontal" action="<?= site_url('backend/User/update/' . $show['nik_kes']) ?>" enctype="multipart/form-data" method="post">

        <div class="row">
          <div class="col-md-4">
            <table width="100%" style="border: hidden;">
              <tr>
                <td>
                  <p></p>
                  <img src="<?= base_url('assets/img_tenagakes/' . $show['img_kes']) ?>" width="100%">
                  <p></p>
                </td>
              </tr>
            </table>
            <!--kanan-->
          </div>
          <div class="col-md-8">
            <!--kiri-->

            <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
              <tr>
                <td width="40%">NIK</td>
                <td width="60%"><?= $show['nik_kes'] ?></td>
              </tr>
              <tr>
                <td width="40%">Nama</td>
                <td width="60%"><?= $show['nm_kes'] ?></td>
              </tr>
              <tr>
                <td width="40%">Tanggal Lahir</td>
                <td width="60%"><?= $show['born_tglkes'] ?></td>
              </tr>
              <tr>
                <p></p>
                <td width="40%">Email</td>
                <td width="60%">
                  <?php
                  if ($show['active_kes'] == '0') {
                  ?>
                    <span class="badge badge-secondary"><i class="far fa-envelope"></i> <?= $show['email_kes'] ?></span>
                  <?php
                  } else {
                  ?>
                    <span class="badge badge-success"><i class="far fa-envelope"></i> <?= $show['email_kes'] ?></span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td width="40%">HP</td>
                <td width="60%"><?= $show['hp_kes'] ?></td>
              </tr>
              <tr>
                <td width="40%">Whatsapp</td>
                <td width="60%">
                  <?php
                  if ($show['wa_nokes'] == '') {
                  ?>
                    <span class="badge badge-secondary"><i class="fa fa-exclamation"></i> tdk tersedia</span>
                  <?php
                  } else {
                  ?>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= $show['wa_kdkes'];
                                                                                  echo $show['wa_nokes'] ?>&text=Hai%20user"><span class="badge badge-success"><i class="fab fa-whatsapp"></i> whatsapp</span>
                    </a>
                  <?php
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td width="40%">Alamat</td>
                <td width="60%"><?= $show['addres_kes'] ?></td>
              </tr>

              <tr>
                <td width="40%">Tanggal Buat</td>
                <td width="60%"><?= $show['date_kes'] ?></td>
              </tr>
            </table>


          </div>

        </div>


        <div class="card-footer">
          <a href="<?= site_url('backend/TenagaKes') ?>"><button type="button" class="btn btn-secondary float-right">Kembali</button></a>
        </div>
      </form>
    </div>
  </div>
</div>