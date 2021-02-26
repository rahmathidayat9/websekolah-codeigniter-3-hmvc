<!-- ##### Regular Page Area Start ##### -->
    <div class="regular-page-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
    <!-- ##### Agenda ##### -->
    <section class="upcoming-events">
        <div class="container">

            <?php if ($check_files>0): ?>
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3><?= $title; ?></h3>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="row">
                <?php if ($check_files>0) : ?>
                <!-- Single Upcoming Events -->
                <?php foreach ($all_files as $file): ?>
                <?php 
                    $file_author = $this->db->get_where("tbl_user",["id_user" => $file["user_id"]])->row_array();
                 ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="<?= base_url() ?>asset/img/background/download.png" alt="">
                            <h6 class="event-date">UPLOAD AT <?= date('d/m/Y',strtotime($file['created_at'])) ?>
                            </h6>
                            <h4 class="event-title text-light"><?= $file['file_title'] ?></h4>
                        </div>
                        <!-- Date & Fee -->
                        <div class="date-fee d-flex justify-content-between">
                            <div class="date">
                                <p><i class="fa fa-clock"></i> UPLOAD BY : <?= $file_author['username'] ?></p>
                            </div>
                            <div class="events-fee">
                                <a href="<?= base_url('download/').$file['file_name'] ?>" id="<?= $file['id_file'] ?>" class="free fa fa-download"></a>
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