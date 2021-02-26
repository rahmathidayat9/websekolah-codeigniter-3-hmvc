  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Home</a></li>
              <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
          <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $title; ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          
          <div class="row">
            
            <div class="col-md-5">
              <div style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="<?= base_url('asset/img/profile/').$user_login_data['profile_image'] ?>" class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><i class="fas fa-user"></i> <?= $user_login_data['username'] ?></h5>
                      <p class="card-text"><i class="fas fa-envelope"></i> <?= $user_login_data['email'] ?></p>
                      <p class="card-text"><small class="text-muted">Member since <?= date('d-M-Y',strtotime($user_login_data['date_created'])) ?></small></p>
                    </div>
                  </div>
                </div>
              </div>  
            </div>

            <div class="col-md-5">
              <form method="post" enctype="multipart/form-data" action="<?= base_url('user/User/edit_profile') ?>">
                <div class="form-group">
                  <input type="hidden" class="form-control" readonly="" value="<?= $user_login_data['id_user'] ?>" name="id_user">
                </div>
                <div class="form-group">
                  <input type="" class="form-control" readonly="" value="<?= $user_login_data['email'] ?>" name="email">
                </div>
                <div class="form-group">
                  <input required="" type="" class="form-control" value="<?= $user_login_data['username'] ?>" name="username">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" value="<?= $user_login_data['profile_image'] ?>" name="old_img">
                </div>
                <div class="custom-file">
                  <input type="file" name="file" class="custom-file-input" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                  <small class="text-muted">masukan gambar jika akan merubah foto profil</small>
                </div>
                <?= get_csrf(); ?>
                <button type="submit" class="btn btn-primary">KONFIRMASI</button>
              </form>
            </div>

          </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <?= $title; ?>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->