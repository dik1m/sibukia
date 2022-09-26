<div class="row">
    <?php
    $no = 1;
    foreach ($newskategori->result_array() as $row) {
    ?>
        <div class="single-blog-area">
            <!-- Post Thumb -->
            <div class="post-thumb">
                <img src="<?php echo base_url('assets/img_berita/medium/' . $row['img_berita']) ?>" width="95%" alt="">
                <!-- Post Date -->
                <div class="post-date">
                    <a href="#"><?php echo $row['nm_kategori'] ?></a>
                </div>
            </div>
            <!-- Post Content -->
            <div class="post-content">
                <h4><?php echo $row['judul_berita'] ?></h4>
                <div class="post-meta mb-30 d-flex align-items-center">
                    <p class="author mb-0">Author:<a> <?php echo $row['nm_user'] ?></a> |</p>
                    <p class="author mb-0">tanggal<a> <?php echo $row['tgl_berita'] ?></a></p>
                </div>
                <?php echo substr($row['isi_berita'], 0, 200) ?>
                <a href="<?php echo site_url('Berita/readmore/' . $row['id_berita']) ?>">Read More</a>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- End Single Featured Post -->


</div>