<div class="col-12 col-md-12 col-lg-12">
<div class="all-services">
<div class="row">           
    <?php
    $no=1;
    foreach ($newshome->result_array() as $row) {
    ?>
    <!-- Single Service -->
    <div class="col-12 col-lg-6">
    <div class="single-service">
        <img src="<?php echo base_url(); ?>assets/frontend/img/bg-img/service1.jpg" alt="">
        <h5><?php echo $row['judul_berita'] ?></h5>
        <p><?php echo substr($row['isi_berita'],0,160) ?></p>
        <a href="#">Read More</a>
    </div>
    </div>
    <!-- Single Service -->
    <?php
    }
?>
</div>
</div>
</div>