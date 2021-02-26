<!-- ##### Regular Page Area Start ##### -->
    <div class="regular-page-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
    <!-- ##### Agenda ##### -->
    <section class="upcoming-events">
        <div class="container"> 
            <?php if ($check_agenda>0): ?>
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3><?= $title; ?></h3>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="row">
                <?php if ($check_agenda>0) : ?>
                <!-- Single Upcoming Events -->
                <?php foreach ($all_agenda as $agenda): ?>
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
                                <p><i class="fa fa-map-pin"></i> <?= $agenda['agenda_tempat'] ?></p>
                            </div>
                            <div class="events-fee">
                                <a href="#" id="<?= $agenda['id_agenda'] ?>" class="free detail-agenda">Detail</a>
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
                          <p class="mb-0">
                              Tidak Ada <?= $title; ?>
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
    <!-- ##### Agenda ##### -->
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Regular Page Area End ##### -->