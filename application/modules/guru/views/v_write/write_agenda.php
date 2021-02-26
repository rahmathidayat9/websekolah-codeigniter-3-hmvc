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
              <li class="breadcrumb-item"><a href="<?= base_url('guru') ?>">Home</a></li>
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

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <form action="<?= base_url('guru/Write/write_agenda') ?>" method="post">
          
          <div class="row">
            
            <div class="col-md-4">  

              <div class="card">
                <div class="card-header bg-primary"><?= trim($title,'Tulis') ?></div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="n">Nama Agenda</label>
                      <input required="" id="n" placeholder="Nama agenda" name="agenda_nama" class="form-control"></input>
                      <?= form_error('agenda_nama','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group">
                      <label for="m">Mulai</label>
                      <input required="" id="m" type="date" name="agenda_mulai" class="form-control"></input>
                      <?= form_error('agenda_mulai','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group">
                      <label for="s">Selesai</label>
                      <input required="" id="s" type="date" name="agenda_selesai" class="form-control"></input>
                      <?= form_error('agenda_selesai','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group">
                      <label for="w">Waktu</label>
                      <input id="w" name="agenda_waktu" placeholder="Contoh: 10.00-12.30 WIB" class="form-control"></input>
                      <small class="text-muted">Kosongkan Jika tidak akan mencantumkan Waktu</small>
                      <?= form_error('agenda_waktu','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group">
                      <label for="w">Tempat</label>
                      <input required="" id="w" name="agenda_tempat" placeholder="Tempat" class="form-control"></input>
                      <?= form_error('agenda_tempat','<small class="text-danger">','</small>') ?>
                    </div>
                    <div class="form-group">
                      <label for="">Keterangan</label>
                      <textarea id="" required=""  name="agenda_keterangan" placeholder="keterangan" class="form-control"></textarea>
                      <?= form_error('agenda_keterangan','<small class="text-danger">','</small>') ?>
                    </div>
                  </div>
              </div>
            
            </div>

            
            <div class="col-md-8">
              <div class="card">
                <div class="card-header bg-danger">Deskripsi</div>
                <div class="card-body">
                  <div class="form-group">
                      <textarea required="" rows="" id="ckeditor" name="agenda_deskripsi" placeholder="deskripsi agenda" class="form-control"></textarea>
                      <?= form_error('agenda_deskripsi','<small class="text-danger">','</small>') ?>
                </div>
                </div>
              </div>
              <button type="submit" class="btn btn-danger col-md-4"><i class="fa fa-paper-plane"></i> KIRIM</button>
            </div>
            
          </div>
          <?= get_csrf(); ?>
          </div>
          </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          -OUR-SCHOOL-
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->