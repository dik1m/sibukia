    <?php
    $no = 1;
    foreach ($newshome->result_array() as $row) {
    ?>
        <div class="col-12 col-lg-6">
            <div class="single-blog-post style-3">
                <!-- Post Thumb -->
                <div class="post-thumb">
                    <a href="<?php echo site_url('BeritaUsr/readmore/' . $row['id_berita']) ?>"><img src="<?php echo base_url('assets/img_berita/medium/' . $row['img_berita']) ?>" alt=""></a>
                </div>
                <!-- Post Data -->
                <div class="post-data">
                    <a href="#" class="post-catagory"><?php echo $row['nm_kategori'] ?></a>
                    <a href="<?php echo site_url('BeritaUsr/readmore/' . $row['id_berita']) ?>" class="post-title">
                        <h6><?php echo $row['judul_berita'] ?></h6>
                    </a>
                    <div class="post-meta">
                        <p class="post-date"><?php echo substr($row['isi_berita'], 0, 200) ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>