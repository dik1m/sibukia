<div class="col-12">
    <?php $this->view('backend/message'); ?>
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo $total_user ?></h3>
                    <p>User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo $total_kia ?><sup style="font-size: 20px"></sup></h3>

                    <p>Penduduk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo $total_kategori ?></h3>

                    <p>Perangkat </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo $total_berita ?></h3>

                    <p>Realisasi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Profile Image -->
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img_user/' . $user['img_user']) ?>" alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center"><?= $user['kd_user'] ?></h3>

                    <p class="text-muted text-center"><?= $user['nm_user'] ?></p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <?php
                        if ($user['active_user'] == '0') {
                        ?>
                            <li class="list-group-item">
                                <b>Email</b> <i class="float-right"><span class="badge badge-secondary"><i class="far fa-envelope"></i> <?= $user['email_user'] ?></span></i>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="list-group-item">
                                <b>Email</b> <i class="float-right"><span class="badge badge-success"><i class="far fa-envelope"></i> <?= $user['email_user'] ?></span></i>
                            </li>
                        <?php } ?>

                        <?php
                        if ($user['wa_nouser'] == '') {
                        ?>
                            <li class="list-group-item">
                                <b>Whatsapp</b>
                                <i class="float-right"><span class="badge badge-secondary"><i class="fa fa-exclamation"></i> tdk tersedia</span></i>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="list-group-item">
                                <b>Whatsapp</b> <i class="float-right"><a target="_blank" href="https://api.whatsapp.com/send?phone=<?= $user['wa_kduser'];
                                                                                                                                    echo $user['wa_nouser'] ?>&text=Hai%20user"><span class="badge badge-success"><i class="fab fa-whatsapp"></i> whatsapp</span>
                                    </a></i>
                            </li>
                        <?php
                        }
                        ?>



                    </ul>

                    <a href="<?= site_url('backend/User/edit/' . $user['kd_user']) ?>" class="btn btn-primary btn-block"><b>Ubah Profil</b></a>
                    <a href="<?= site_url('backend/User/changepswd/' . $user['kd_user']) ?>" class="btn btn-primary btn-block"><b>Ganti Password</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Status Kegiatan</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tangal </th>
                                <th>Judul Berita</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($berita->result_array() as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $row['tgl_berita'] ?></td>
                                    <td><?= $row['judul_berita'] ?></td>
                                </tr>

                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>


    </div>
</div>