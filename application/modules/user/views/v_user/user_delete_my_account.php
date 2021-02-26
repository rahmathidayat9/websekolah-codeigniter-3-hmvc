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
          <button class="btn btn-danger" type="button" class="btn btn-primary" data-toggle="modal" data-target="#hapus-akun-modal"><i class="fas fa-ban"></i> KONFIRMASI</button> 
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          OUR-SCHOOL
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
<div class="modal fade" id="hapus-akun-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('user/delete-my-account') ?>">
        <div class="form-group">
          <input class="form-control" readonly="" value="<?= $user_login_data['username'] ?>" placeholder=""></input>
          <input class="form-control" type="hidden" name="id_user" readonly="" value="<?= $user_login_data['id_user'] ?>" placeholder=""></input>
        </div>
        <div class="form-group">
          <input class="form-control" name="mypassword" value="<?= $user_login_data['password'] ?>" type="hidden" placeholder="Masukan Password anda"></input>
          <input class="form-control" type="password" required="" name="password" placeholder="Masukan Password anda"></input>
        </div>
      </div>
      <?= get_csrf() ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATALKAN</button>
        <button type="submit" class="btn btn-danger">YAKIN</button>
      </form>
      </div>
    </div>
  </div>
</div>