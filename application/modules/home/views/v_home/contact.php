    <!-- ##### Google Maps ##### -->
    <!-- <div class="map-area">
        <div id="googleMap"></div>
    </div> -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-12 col-lg-6">
                    <div class="contact--info mt-50">
                        <h4>Info Kontak</h4>
                        <ul class="contact-list">
                            <li>
                                <h6><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> Jam Masuk</h6>
                                <h6>9:00 WIB  - 17:00 WIB</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-phone fa-fw" aria-hidden="true"></i> No Telp</h6>
                                <h6>+44 300 303 0266</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-envelope fa-fw" aria-hidden="true"></i> Email</h6>
                                <h6>smkypc@sch.com</h6>
                            </li>
                            <li>
                                <h6><i class="fa fa-map-pin fa-fw" aria-hidden="true"></i> Alamat</h6>
                                <h6>Cikunten,Singaparna,Tasikmalaya</h6>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="contact--info mt-50 mb-50">
                        <h4>Tulis Pesan</h4>
                        <?php echo form_open('contact', '', 'hidden'); ?>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama" id="text" placeholder="Nama">
                                        <?= form_error('nama','<small class="text-danger">','</small>') ?>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                        <?= form_error('email','<small class="text-danger">','</small>') ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="isi" id="message" cols="30" rows="5" placeholder="Pesan"></textarea>
                                        <small id="emailHelp" class="form-text text-muted">Maksimal kirim 5 kali dengan email yang sama</small>
                                        <?= form_error('isi','<small class="text-danger">','</small>') ?>
                                    </div>
                                </div>
                                <!-- <?= get_csrf(); ?> -->
                                <div class="col-12">
                                    <button class="btn clever-btn w-100" type="submit">Kirim</button>
                                </div>
                            </div>
                        <!-- </form> -->
                        <?php echo form_close(); ?>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- Google Maps -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="js/google-map/map-active.js"></script> -->