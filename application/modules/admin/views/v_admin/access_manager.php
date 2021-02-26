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
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
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
        
        

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?= $title; ?></h3>
              <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#tambah-data">
                Tambah Data
              </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($all_role as $role): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $role['role'] ?></td>
                  <td>
                    <a href="<?= base_url('admin/Access_Manager/role_access/').$role['id_role'] ?>" class="badge badge-success">
                      ubah akses
                    </a>

                    <a onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Access_Manager/delete_access/').$role['id_role'] ?>" class="badge badge-danger">
                      hapus
                    </a>
                  </td>
                </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<!-- Modal -->
<div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('admin/Access_Manager/add_role') ?>">
          <div class="form-group">
            <input class="form-control" name="role" placeholder="Role"></input>
          </div>
          <?= get_csrf() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>