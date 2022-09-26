<div class="col-lg-12 col-xs-12">
  <div class="card card-default ">
    <div class="card-header">
      <h3 class="card-title"><?php echo $sub ?></h3>
    </div>
    <div class="card-body">
      <form class="form-horizontal" action="<?= site_url('backend/User/update/' . $show['kd_user']) ?>" enctype="multipart/form-data" method="post">

        <div class="row">
          <div class="col-md-3">
            <table width="100%" style="border: hidden;">
              <tr>
                <td>
                  <p></p>
                  <img src="<?= base_url('assets/img_user/' . $show['img_user']) ?>" width="100%">
                  <p></p>
                </td>
              </tr>
            </table>
            <!--kanan-->
          </div>
          <div class="col-md-9">
            <!--kiri-->

            <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
              <tr>
                <p></p>
                <td width="40%">Email</td>
                <td width="60%">
                  <?php
                  if ($show['active_user'] == '0') {
                  ?>
                    <span class="badge badge-secondary"><i class="far fa-envelope"></i> <?= $show['email_user'] ?></span>
                  <?php
                  } else {
                  ?>
                    <span class="badge badge-success"><i class="far fa-envelope"></i> <?= $show['email_user'] ?></span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td width="40%">Status Email</td>
                <td width="60%">
                  <?php
                  if ($show['active_user'] == '0') {
                  ?>
                    Email belum aktif
                  <?php
                  } else {
                  ?>
                    Email Aktif
                  <?php } ?>
                </td>
              </tr>

              <tr>
                <td width="40%">Whatsapp</td>
                <td width="60%">
                  <?php
                  if ($show['wa_nouser'] == '') {
                  ?>
                    <span class="badge badge-secondary"><i class="fa fa-exclamation"></i> tdk tersedia</span>
                  <?php
                  } else {
                  ?>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= $show['wa_kduser'];
                                                                                  echo $show['wa_nouser'] ?>&text=Hai%20user"><span class="badge badge-success"><i class="fab fa-whatsapp"></i> whatsapp</span>
                    </a>
                  <?php
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td width="40%">Status Whatsapp</td>
                <td width="60%">
                  <?php
                  if ($show['wa_nouser'] == '') {
                  ?>
                    Tidak tersedia
                  <?php
                  } else {
                  ?>
                    Aktif
                    </a>
                  <?php
                  }
                  ?>
                </td>
              </tr>

              <tr>
                <td width="40%">No HP</td>
                <td width="60%"><?= $show['hp_user'] ?></td>
              </tr>

              <tr>
                <td width="40%">kd_user</td>
                <td width="60%"><?= $show['kd_user'] ?></td>
              </tr>
              <tr>
                <td width="40%">Nama</td>
                <td width="60%"><?= $show['nm_user'] ?></td>
              </tr>

              <tr>
                <td width="40%">Tanggal Buat</td>
                <td width="60%"><?= $show['date_user'] ?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <a href="<?= site_url('backend/User') ?>"><button type="button" class="btn btn-secondary float-right">Kembali</button></a>
        </div>
      </form>
    </div>
  </div>
</div>