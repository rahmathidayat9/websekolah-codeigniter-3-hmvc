    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area blog-page section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="blog-catagories mb-70 d-flex flex-wrap justify-content-between">
                        <?php if ($check_blog>0) : ?>
                        <?php foreach ($kategori_blog as $kategori): ?>
                            <!-- Single Catagories -->
                        <div class="single-catagories bg-img" style="">
                            <a href="<?= base_url('blog/kategori/').$kategori['nama_kategori'] ?>">
                                <h6><?= $kategori['nama_kategori'] ?></h6>  
                            </a>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php if ($check_blog>0) : ?>
                <?php foreach ($all_blog as $blog): ?>

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
                                <p><?= substr($blog['blog_isi'], 0,100)."..."; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                          <h4 class="alert-heading"><?= $title; ?> Kosong</h4>
                          <p></p>
                          <hr>
                          <p class="mb-0">
                              Tidak Ada Artikel
                          </p>
                        </div>
                    </div>
                <?php endif; ?>
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