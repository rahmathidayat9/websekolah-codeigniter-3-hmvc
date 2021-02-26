    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area blog-page section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Kategori <?= $nama_kategori; ?></h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach ($list_blog_kategori as $blog): ?>

                <!-- <?php 
                    $kategori = $this->db->get_where("tbl_kategori_blog",["id_kategori_blog" => $blog["blog_kategori_id"]])->row_array();
                 ?> -->
                    <!-- Single Blog Area -->
                <div class="col-12 col-lg-6">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="<?= base_url('asset/img/blog/').$blog['blog_thumb']; ?>" alt="">
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <a href="<?= base_url('blog/').$blog['blog_slug'] ?>" class="blog-headline">
                                <h4><?= $blog['blog_title'] ?></h4>
                            </a>
                            <div class="meta d-flex align-items-center">
                                <a href="#"><?= $blog['blog_author'] ?></a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="<?= base_url('blog/kategori/').$kategori['nama_kategori'] ?>"><?= $kategori['nama_kategori'] ?></a>
                            </div>
                                <p><?= substr($blog['blog_isi'], 0,100); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="load-more text-center mt-100 wow fadeInUp" data-wow-delay="1000ms">
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->