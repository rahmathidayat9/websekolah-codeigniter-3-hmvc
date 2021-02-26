<?php 
    $nav_home_menu=$this->db->get_where("tbl_nav_home",["is_active" => 1])->result_array();
 ?>
            <!-- Navbar Area -->
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="cleverNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="" alt="">
                        <img src="<?= base_url('asset/img/background/logo-codeigniter.png') ?>" width="45">
                        SMK-TSM
                    </a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <?php foreach ($nav_home_menu as $nhm): ?>
                                <?php if ($nhm['title']==$title): ?>
                                <li><a class="text-primary" href="<?= base_url($nhm['url']) ?>"><?= $nhm['title']; ?></a></li>
                                <?php else: ?>
                                <li><a href="<?= base_url($nhm['url']) ?>"><?= $nhm['title']; ?></a></li>
                                <?php endif; ?>    
                                <?php endforeach; ?>
                                <!-- <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="courses.html">Courses</a></li>
                                        <li><a href="single-course.html">Single Courses</a></li>
                                        <li><a href="instructors.html">Instructors</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-details.html">Single Blog</a></li>
                                        <li><a href="regular-page.html">Regular Page</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                            <!-- Search Button -->
                            <div class="search-area">
                                <form action="<?= base_url('search-blog') ?>" method="post">
                                    <input type="text" class="text-dark" name="keyword" id="search" placeholder="Cari">
                                    <?= get_csrf() ?>
                                    <button type="submit" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <?php if ($this->session->userdata('id_user')): ?>
                            <!-- Register / Login -->
                            <div class="login-state d-flex align-items-center">
                                <div class="user-name mr-30">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $user_login_data['username'] ?></a>
                                        <?php if ($user_login_data["role_id"]==1): ?>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                            <a class="dropdown-item" href="<?= base_url('admin') ?>">Dashboard</a>
                                            <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
                                        </div>
                                        <?php else: ?>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                            <a class="dropdown-item" href="<?= base_url('user') ?>">Profil</a>
                                            <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="userthumb">
                                    <img src="<?= base_url('asset/img/profile/').$user_login_data['profile_image'] ?>" alt="">
                                </div>
                            </div>
                            <?php else: ?>
                            <!-- Register / Login -->
                            <div class="register-login-area">
                                <a href="<?= base_url('login') ?>" class="btn active"><i class="fa-fw fa fa-sign-in faa-horizontal animated"></i> LOGIN</a>
                                <!-- <a href="<?= base_url('register') ?>" class="btn active"><i class="fa-fw fa fa-user-plus faa-bounce animated"></i> Register</a> -->
                            </div>
                            <?php endif; ?>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->