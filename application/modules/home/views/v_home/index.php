    <!-- ##### Hero Area Start ##### -->
    <!-- <section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(<?= base_url('theme/clever/') ?>img/bg-img/bg1.jpg);"> -->
    <section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(<?= base_url() ?>asset/img/background/2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Hero Content -->
                    <div class="hero-content text-center">
                        <h2>SMK-YPC TASIKMALAYA</h2>
                        <span class="btn clever-btn">#SMK BISA</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    
    <section>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <blockquote class="blockquote text-center">
                  <p class="mb-0">SMK-YPC TASIKMALAYA , siap belajar , siap berusaha , siap sukses , Allahuakbar !</p>
                  <footer class="blockquote-footer"><cite title="Source Title">SMK-YPC TASIKMALAYA</cite></footer>
                </blockquote>
            </div>
        </div>
    </div>
    </section>


    <?php if ($check_jurusan>0) : ?>
    <!-- ##### Jurusan ##### -->
    <section class="best-tutors-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>KOMPETENSI KEAHLIAN</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tutors-slide owl-carousel wow fadeInUp" data-wow-delay="250ms">
                        
                        <?php foreach ($all_jurusan as $jurusan): ?>
                            <!-- Single Tutors Slide -->
                            <div class="single-tutors-slides">
                                <!-- Tutor Thumbnail -->
                                <div class="tutor-thumbnail">
                                    <img src="<?= base_url('asset/img/jurusan/').$jurusan['img_jurusan'] ?>" alt="">
                                </div>
                                <!-- Tutor Information -->
                                <div class="tutor-information">
                                    <h5><?= strtoupper($jurusan['nama_jurusan']) ?></h5>
                                    <span>#<?= strtoupper($jurusan['nama_kategori_jurusan']) ?></span>
                                    <p><?= $jurusan['deskripsi_jurusan'] ?></p>
                                    
                                </div>
                            </div>    
                        <?php endforeach; ?>
                        
                    </div>
                
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Jurusan ##### -->
    <?php endif; ?>
    

    <?php if ($check_pengumuman>0) : ?>
    <!-- ##### Pengumuman ##### -->
    <section class="popular-courses-area section-padding-100-0" style="background-image: url(<?= base_url() ?>theme/clever/img/core-img/texture.png);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Pengumuman Sekolah</h3>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Upcoming Events -->
                <?php foreach ($new_pengumuman as $pengumuman): ?>
                    <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="<?= base_url() ?>asset/img/background/pengumuman2.png" alt="">
                            <h6 class="event-date"></h6>
                            <h4 class="event-title text-light"><?= $pengumuman['pengumuman_nama'] ?></h4>
                        </div>
                        <!-- Date & Fee -->
                        <div class="date-fee d-flex justify-content-between">
                            <div class="date">
                                <p><i class="fa fa-clock"></i> BY SMK-YPC <?= date('d/m/Y',strtotime($pengumuman['created_at'])) ?></p>
                            </div>
                            <div class="events-fee">
                                <a href="#" id="<?= $pengumuman['id_pengumuman'] ?>" class="free detail-pengumuman">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <?php if ($check_pengumuman>3): ?>
                <!-- Single Blog Area -->
                <div class="col-md-12 text-center mb-5">
                    <a href="<?= base_url('pengumuman') ?>" class="btn btn-primary">LIHAT SEMUA PENGUMUMAN</a>
                </div>    
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- ##### Pengumuman ##### -->
    <?php endif; ?>


    <?php if ($check_agenda>0): ?>
    <!-- ##### Agenda ##### -->
    <section class="upcoming-events section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Agenda Mendatang</h3>
                    </div>
                </div>
            </div>

            <div class="row">

                <?php foreach ($new_agenda as $agenda): ?>
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="<?= base_url() ?>asset/img/background/agenda2.png" alt="">
                            <h6 class="event-date"><?= date('d/m/Y',strtotime($agenda['agenda_mulai'])) ?> SD 
                                <?= date('d/m/Y',strtotime($agenda['agenda_selesai'])) ?>
                            </h6>
                            <h4 class="event-title text-light"><?= $agenda['agenda_nama'] ?></h4>
                        </div>
                        <!-- Date & Fee -->
                        <div class="date-fee d-flex justify-content-between">
                            <div class="date">
                                <p><i class="fa fa-map-pin"></i>  : <?= $agenda['agenda_tempat'] ?></p>
                            </div>
                            <div class="events-fee">
                                <a href="#" id="<?= $agenda['id_agenda'] ?>" class="free detail-agenda">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <?php if ($check_agenda>3): ?>
                <!-- Single Blog Area -->
                <div class="col-md-12 text-center mb-5">
                    <a href="<?= base_url('agenda') ?>" class="btn btn-primary">LIHAT SEMUA AGENDA</a>
                </div>    
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- ##### Agenda ##### -->
    <?php endif; ?>


    <?php if ($check_blog>0): ?>
    <!-- ##### Blog Area ##### -->
    <section class="blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Artikel Terbaru</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Area -->
                
                    <?php foreach ($new_blogs as $blog): ?>
                    <?php 
                    $get_kategori_blog = $this->db->get_where("tbl_kategori_blog",["id_kategori_blog" => $blog['blog_kategori_id']])->row_array();
                    ?>
                    <div class="col-12 col-md-6">
                        <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                            <img src="<?= base_url('asset/img/blog/').$blog['blog_thumb'] ?>" alt="">
                            <!-- Blog Content -->
                            <div class="blog-content">
                                <a href="<?= base_url('blog/').$blog['blog_slug']; ?>" class="blog-headline">
                                    <h4><?= $blog['blog_title'] ?></h4>
                                </a>
                                <div class="meta d-flex align-items-center">
                                    <a href="#"><?= $blog['blog_author'] ?></a>
                                    <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                    <a href="<?= base_url('blog/kategori/').$get_kategori_blog['nama_kategori'] ?>"><?= $get_kategori_blog['nama_kategori'] ?></a>
                                </div>
                                    <p><?= substr($blog['blog_isi'], 0,100)."..." ?></p> 
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <?php if ($check_blog>2): ?>
                <!-- Single Blog Area -->
                <div class="col-md-12 text-center mb-5">
                    <a href="<?= base_url('blog') ?>" class="btn btn-primary">LIHAT ARTIKEL LAINYA</a>
                </div>    
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->
    <?php endif;  ?>  