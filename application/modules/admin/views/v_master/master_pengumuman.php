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
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Deskripsi</th>
                  <th>Tanggal Upload</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($pengumuman as $pg): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $pg['pengumuman_nama'] ?></td>
                  <td><?= $pg['pengumuman_deskripsi'] ?></td>
                  <td><?=  date('d-m-Y',strtotime($pg['created_at'])) ?></td>
                  <td><a  onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_Pengumuman/delete_pengumuman/').$pg['id_pengumuman']; ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a></td>
                </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <a onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_Pengumuman/clear_pengumuman') ?>" class="btn btn-danger">Kosongkan Data</a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->