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
          <form action="<?= base_url('guru/Write/write_blog') ?>" enctype="multipart/form-data" method="post">
          
          <div class="row">
            <div class="col-md-8">  
              <div class="form-group">
                <textarea required="" id="ckeditor" name="blog_isi" required></textarea>
                <?= form_error('blog_isi','<small class="text-danger">','</small>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="judul">Judul Blog</label>
                <input required="" name="blog_title" id="judul" class="form-control" placeholder="Judul Blog"></input> 
                <?= form_error('blog_title','<small class="text-danger">','</small>'); ?>
              </div>
              <div class="form-group">
                <label for="author">Penulis / Author</label>
                <input required="" name="blog_author" value="<?= $user_login_data['username'] ?>" id="author" class="form-control" placeholder="Penulis"></input> 
                <small id="" class="form-text text-muted">Nama penulis / author sesuai keinginan anda.</small>
                <?= form_error('blog_author','<small class="text-danger">','</small>'); ?>
              </div>
              <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="blog_kategori_id" id="kategori" class="form-control">
                <?php 
                $kategori_blog = $this->db->get('tbl_kategori_blog')->result_array();
                foreach($kategori_blog as $kategori): 
                ?>
                  <option value="<?= $kategori['id_kategori_blog'] ?>"><?= $kategori['nama_kategori'] ?></option>
                <?php endforeach; ?>
                </select> 
              </div>
              <div class="custom-file mb-3">
                <input required type="file" name="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Pilih gambar</label>
              </div>
            </div>
          
          </div>
          <?= get_csrf(); ?>
          <button type="submit" class="btn btn-primary col-md-4"><i class="fa fa-paper-plane"></i> KIRIM</button>
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