<!-- ##### Regular Page Area Start ##### -->
    <div class="regular-page-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
    <!-- ##### Pengumuman ##### -->
    <section class="popular-courses-area" style="background-image: url();">
        <div class="container">
            <?php 
            $check_pengumuman = count_data("tbl_pengumuman"); 
            if ($check_pengumuman>0) : 
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3><?= $title; ?></h3>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="row">
                <?php if ($check_pengumuman>0) : ?>
                <!-- Single Upcoming Events -->
                <?php foreach ($pengumuman as $pengumuman): ?>
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
                                <p><i class="fa fa-clock"></i> BY kesiswaan <?= date('d/m/Y',strtotime($pengumuman['created_at'])) ?></p>
                            </div>
                            <div class="events-fee">
                                <a href="#" id="<?= $pengumuman['id_pengumuman'] ?>" class="free detail-pengumuman">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-md-12 mb-5">
                        <div class="alert alert-danger" role="alert">
                          <h4 class="alert-heading"><?= $title; ?> Kosong</h4>
                          <p></p>
                          <hr>
                          <p>
                              Tidak Ada Pengumuman
                          </p>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Single Blog Area -->
                <div class="col-md-12 text-center mb-5">
                    <?= $this->pagination->create_links() ?>
                </div>    
            </div>
        </div>
    </section>
    <!-- ##### Pengumuman ##### -->
                    </div>
            </div>
        </div>
    </div>
    <!-- ##### Regular Page Area End ##### -->