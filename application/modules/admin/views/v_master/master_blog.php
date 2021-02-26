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
                  <th>Author</th>
                  <th>Tanggal Upload</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($blogs as $blog): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $blog['blog_title'] ?></td>
                  <td><?= $blog['blog_author'] ?></td>
                  <td><?= date('d-m-Y',strtotime($blog['created_at'])) ?></td>
                  <td>
                    <button id="<?= $blog['id_blog'] ?>" class="btn btn-primary btn-edit"><i class="fas fa-fw fa-edit"></i></button>
                    <a  onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_Blog/delete_blog/').$blog['id_blog']; ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a></td>
                </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <a onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_Blog/clear_blog') ?>" class="btn btn-danger">Kosongkan Data</a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Kategori <?= $title; ?></h3>
              <button class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#tambah-kategori">Tambah Kategori</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($kategori_blog as $kategori): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $kategori['nama_kategori'] ?></td>
                  <td>
                    <button id="<?= $kategori['id_kategori_blog'] ?>" class="btn btn-primary btn-edit-kategori"><i class="fas fa-fw fa-edit"></i></button>
                    <a  onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_Blog/delete_kategori_blog/').$kategori['id_kategori_blog']; ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a></td>
                </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <a onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_Blog/clear_kategori_blog') ?>" class="btn btn-danger">Kosongkan Data</a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



<!-- ######################################## Edit Data Blog Modal ################################### -->
<!-- ######################################## Edit Data Blog Modal ################################### -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('admin/Master_Blog/update_blog') ?>">
      <div class="modal-body">
        <div class="form-group">
          <input required="" id="id_blog" name="id_blog" type="hidden" readonly class="form-control"></input>
        </div>
        <div class="form-group">
          <label for="blog_author">Author</label>
          <input required="" id="blog_author" name="blog_author" placeholder="Author" class="form-control"></input>
        </div>
        <div class="form-group">
          <label for="blog_title">Title</label>
          <input required="" id="blog_title" name="blog_title"  placeholder="Title" class="form-control"></input>
        </div>
        <?php 
        $get_kategori = $this->db->get('tbl_kategori_blog')->result_array();
         ?>
        <div class="form-group">
          <label for="blog_kategori_id">Kategori</label>
          <select id="blog_kategori_id" name="blog_kategori_id"  class="form-control">
            <?php foreach ($get_kategori as $kategori): ?>
              <option value="<?= $kategori['id_kategori_blog'] ?>"><?= $kategori['nama_kategori'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
              
      </div>
      <?= get_csrf() ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- ######################################## Edit Data Blog Modal ################################### -->
<!-- ######################################## Edit Data Blog Modal ################################### -->


<!-- ######################################## Tambah Kategori Modal ################################### -->
<!-- ######################################## Tambah Kategori Modal ################################### -->
<div class="modal fade" id="tambah-kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('admin/Master_Blog/add_kategori_blog') ?>">
          <div class="form-group">
            <input class="form-control" placeholder="Nama kategori" name="nama_kategori"></input>
          </div>
      </div>
      <?= get_csrf(); ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ######################################## Tambah kategori ################################### -->
<!-- ######################################## Tambah Kategori Modal ################################### -->

<!-- ######################################## Edit Kategori Modal ################################### -->
<!-- ######################################## Edit Kategori Modal ################################### -->
<div class="modal fade" id="edit-kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('admin/Master_Blog/update_kategori_blog') ?>">
          
            <input class="form-control" type="hidden" placeholder="Nama kategori" id="id_kategori_blog" name="id_kategori_blog"></input>
          

          <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input class="form-control" placeholder="Nama kategori" id="nama_kategori" name="nama_kategori"></input>
          </div>
      </div>
      <?= get_csrf(); ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ######################################## Edit Kategori Modal ################################### -->
<!-- ######################################## Edit Kategori Modal ################################### -->

<script type="text/javascript">
  $(document).ready(function() {
    
    $(".btn-edit").click(function(){
      let id_blog = $(this).attr("id")
      $.get("<?= base_url('admin/Master_Blog/show_blog/') ?>"+id_blog,function(response){
        let result = JSON.parse(response)
        $("#modal-edit").modal("show")
        $("#id_blog").val(result.id_blog)
        $("#blog_author").val(result.blog_author)
        $("#blog_title").val(result.blog_title)
        $("#blog_isi").val(result.blog_isi)
        $("#blog_kategori_id").val(result.blog_kategori_id)
      })
    })

      $(".btn-edit-kategori").click(function(){
      let id_kategori_blog = $(this).attr("id")
      $.get("<?= base_url('admin/Master_Blog/show_kategori_blog/') ?>"+id_kategori_blog,function(response){
        let result = JSON.parse(response)
        $("#edit-kategori").modal("show")
        $("#id_kategori_blog").val(result.id_kategori_blog)
        $("#nama_kategori").val(result.nama_kategori)
      })
    })

  });

</script>