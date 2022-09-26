<div class="single-blog-area">
    <!-- Post Thumb -->
    <div class="post-thumb">
        <img class="img-fluid" src="<?php echo base_url('assets/img_berita/large/' . $row['img_berita']) ?>" alt="">

    </div>

    <div class="post-content">
        <h4><?php echo $row['judul_berita'] ?></h4>
        <div class="post-meta mb-30 d-flex align-items-center">
            <p class="author mb-0">Author:<a> <?php echo $row['nm_user'] ?></a> |</p>
            <p class="author mb-0">Tanggal<a> <?php echo $row['tgl_berita'] ?></a> |</p>
            <p class="author mb-0">Kategori:<a> <?php echo $row['nm_kategori'] ?></a> </p>
        </div>
        <?php echo $row['isi_berita'] ?>

    </div>
</div>