<div class="section-heading">
    <h2 class="text-black"><?php echo $row['nm_layanan'] ?></h2>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="post-entry-big">
            <img src="<?php echo base_url('assets/img_layanan/large/' . $row['img_layanan']) ?>" alt="Image" class="img-fluid">
            <div class="post-content">

                <p><?php echo $row['isi_layanan'] ?></p>
            </div>
        </div>
    </div>
</div>