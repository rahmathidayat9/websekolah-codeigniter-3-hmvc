<?php 

      //configure menu sidebar to display
      $role_id=$this->session->userdata('role_id');
      $menu = $this->db->select('tbl_menu.*,tbl_access_menu.*')
                            ->from('tbl_menu')
                            ->join('tbl_access_menu','tbl_menu.id_menu=tbl_access_menu.menu_id')
                            ->where('tbl_access_menu.role_id',$role_id)
                            ->order_by('tbl_menu.id_menu','ASC')
                            ->get()->result_array();
 ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?= base_url() ?>asset/img/logo/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">OUR-SCHOOL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('asset/img/profile/').$user_login_data['profile_image'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('user-profile') ?>" class="d-block"><?= $user_login_data['username'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Collapsed Sidebar</p>
                  </a>
                </li>  

            </ul>
          </li> -->
          
          <?php foreach ($menu as $m): ?>
            <li class="nav-header"><?= $m['menu'] ?></li>
              <?php 
              $menu_id = $m['menu_id'];
              $user_menu = $this->db->select('tbl_user_menu.*')
                                    ->from('tbl_user_menu')
                                    ->join('tbl_menu','tbl_user_menu.menu_id=tbl_menu.id_menu')
                                    ->where('tbl_user_menu.menu_id',$menu_id)
                                    ->where('tbl_user_menu.user_menu_is_active',1)
                                    ->get()->result_array();
               ?>
              <?php foreach ($user_menu as $u_m): ?>
              <li class="nav-item">
                <?php if ($u_m['user_menu_title']==$title): ?>
                  <a href="<?= base_url($u_m['user_menu_url']) ?>" class="nav-link active">
                    <i class="<?= $u_m['user_menu_icon'] ?>"></i>
                    <p>
                      <?= $u_m['user_menu_title'] ?>
                    </p>
                  </a>
                <?php else: ?>
                  <a href="<?= base_url($u_m['user_menu_url']) ?>" class="nav-link">
                    <i class="<?= $u_m['user_menu_icon'] ?>"></i>
                    <p>
                      <?= $u_m['user_menu_title'] ?>
                    </p>
                  </a>
                <?php endif; ?>
              </li>  
          <?php endforeach; ?>
          <?php endforeach; ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>