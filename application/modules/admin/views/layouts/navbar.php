  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <?php if ($count_unread_pesan): ?>
            <i class="fas fa-envelope faa-shake animated"></i>
            <span class="badge badge-danger navbar-badge"><?= $count_unread_pesan; ?></span>
          <?php else: ?>
            <i class="fas fa-envelope"></i>
          <?php endif ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <?php foreach ($all_unread_pesan as $unread_pesan): ?>
              <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url() ?>asset/img/profile/user.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    <?= $unread_pesan["nama"] ?>
                  </h3>

                  <?php if (strlen($unread_pesan['isi']) > 25): ?>
                    <p class="text-sm"><?= substr($unread_pesan['isi'],0,25) ?>...</p>
                  <?php else: ?>
                    <p class="text-sm"><?= $unread_pesan['isi'] ?></p>
                  <?php endif; ?>
                  
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= date('d-M-Y | H:i',strtotime($unread_pesan['created_at'])) ?></p>
                
                </div>
              </div>
              <!-- Message End -->
            </a>
          <div class="dropdown-divider"></div>
          <?php endforeach; ?>
          <?php if ($count_unread_pesan): ?>
            <a href="<?= base_url('admin/Master_Pesan/read_all_message') ?>" class="dropdown-item dropdown-footer">Lihat semua pesan <strong>(<?= $count_unread_pesan; ?>)</strong></a>
          <?php else: ?>
            <a href="#" class="dropdown-item dropdown-footer">Tidak ada pesan masuk</a>
          <?php endif ?>
        </div>
      </li>

      
      <!-- Notifications Dropdown Menu -->
<!--       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-bell faa-ring animated"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->

      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <i class="fas fa-fw fa-user mr-2"></i> <?= $user_login_data["username"] ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('home') ?>" class="dropdown-item">
            <i class="fas fa-fw fa-home mr-2"></i> Home
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('logout') ?>" class="dropdown-item">
            <i class="fas fa-fw fa-sign-out-alt mr-2"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->