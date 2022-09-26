<div class="section-heading">
    <h2 class="text-black"><?php echo $judul ?></h2>
</div>
<div class="row">

    <div class="col-lg-12">
    <?php $this->view('frontend/message'); ?>
    </div>

    <div class="col-12 col-lg-6">
    <form action="<?php echo site_url('AuthUsr/login') ?>" method="post">
    <input type="text" style="color:#536174" class="form-control" id="name" name="hp_user" placeholder="Masukan Nomor HP"> <p></p>
    <input type="password" style="color:#536174" class="form-control" id="name" name=pswd_user placeholder="Masukan Password" style="font-color:black"> <p></p>  
    <br>
    <button class="small btn btn-primary px-4 py-2 rounded-0" type="submit">Masuk</button>
    </form>
    </div>

    <div class="col-12 col-lg-6">
    Untuk Mendaftarkan Akun Anda<br>
    <h2><a href="<?php echo site_url('DaftarUsr') ?>">klik dsini</a></h2>   
    </div>

</div>  
