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
              <div class="float-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-fw fa-plus"></i> Tambah Data</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama File</th>
                  <th>Url File</th>
                  <th>Created At</th>
                  <th>Upload By</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($all_file as $file): ?>
                  <?php $kategori_file=$this->db->get_where("tbl_kategori_file",["id_kategori_file" => $file['file_kategori_id']])->row_array(); ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $file['file_title'] ?></td>
                  <td><?= $file['file_url'] ?></td>
                  <td><?= date('d-m-Y',strtotime($file['created_at'])); ?></td>
                  <td><?= $user_login_data['username'] ?></td>
                  <td><?= $kategori_file['kategori_nama'] ?></td>
                  <td>
                    <button id="<?= $file['id_file'] ?>" class="btn btn-primary btn-edit"><i class="fas fa-fw fa-edit"></i>
                    </button>
                    <a  onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_File/delete_file/').$file['id_file']; ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i>
                    </a>
                  </td>
                </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <a onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_File/clear_file') ?>" class="btn btn-danger">Kosongkan Data</a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- Tabel kategori file -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Kategori <?= $title; ?></h3>
              <div class="float-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-kategori-file"><i class="fas fa-fw fa-plus"></i> Tambah Data</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($all_kategori_file as $kategori): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $kategori['kategori_nama'] ?></td>
                  <td>
                    <button id="<?= $kategori['id_kategori_file'] ?>" class="btn btn-primary btn-edit-kategori-file"><i class="fas fa-fw fa-edit"></i>
                    </button>
                    <a  onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_File/delete_kategori_file/').$kategori['id_kategori_file']; ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i>
                    </a>
                  </td>
                </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <a onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_File/clear_kategori_file') ?>" class="btn btn-danger">Kosongkan Data</a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->





<!-- ###################################   MODAL FILE   ################################ -->

<!-- Tambah Data FILE Modal -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/Master_File/add_file') ?>">
      <div class="modal-body">
        
        <div class="form-group">
          <label>Judul File</label>
          <input required="" name="file_title" placeholder="Judul File" class="form-control"></input>
          <small class="text-muted">contoh : ebook dasar bla bla bla</small>
        </div>

        <div class="form-group">
          <label>File</label>
          <div class="custom-file">
            <input required="" type="file" name="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>

        <div class="form-group">
          <label>Url</label>
          <input required="" value="./asset/download/" name="file_url" placeholder="Url" class="form-control"></input>
          <small class="text-muted">url  (direktori web)</small>
        </div>
          
        <?php 
        $get_kategori_file = $this->db->get('tbl_kategori_file')->result_array();
         ?>
        <div class="form-group">
          <label for="file_kategori_id">Kategori File</label>
          <select name="file_kategori_id" class="form-control">
            <?php foreach ($get_kategori_file as $kategori): ?>
              <option value="<?= $kategori['id_kategori_file'] ?>"><?= $kategori['kategori_nama'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      
      </div>
      <?= get_csrf() ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>



<!-- Edit Data FILE Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/Master_File/update_file') ?>">
      <div class="modal-body">
       
       <input required="" type="hidden" id="id_file" name="id_file" type="text" readonly class="form-control"></input>
        
        <div class="form-group">
          <label>File Saat ini</label>
          <input type="" readonly="" id="file_name" name="file_name" class="form-control">   
        </div>

        <div class="form-group">
          <label for="file_title">Nama</label>
          <input required="" id="file_title" name="file_title" placeholder="File Title" class="form-control"></input>
        </div>

        <?php 
        $get_kategori = $this->db->get('tbl_kategori_file')->result_array();
         ?>
        <div class="form-group">
          <label for="file_kategori_id">Kategori</label>
          <select id="file_kategori_id" name="file_kategori_id"  class="form-control">
            <?php foreach ($get_kategori as $role): ?>
              <option value="<?= $role['id_kategori_file'] ?>"><?= $role['kategori_nama'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label for="customFile">File</label>
          <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
            <small class="text-muted">Kosongkan jika konten file tidak akan dirubah</small>
          </div>
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
<!-- ###################################   MODAL FILE   ################################ -->




<!-- ###################################  KATEGORI MODAL FILE   ################################ -->

<!-- Tambah Data KATEGORI FILE Modal -->
<div class="modal fade" id="modal-tambah-kategori-file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('admin/Master_File/add_kategori_file') ?>">

        <div class="form-group">
          <label>Nama Kategori</label>
          <input required="" name="kategori_nama" placeholder="Nama Kategori" class="form-control"></input>
        </div>
      
      </div>
      <?= get_csrf() ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>



<!-- Edit Data KATEGORI FILE Modal -->
<div class="modal fade" id="modal-edit-kategori-file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('admin/Master_File/update_kategori_file') ?>">

          <input required="" type="hidden" name="id_kategori_file" id="id_kategori_file" placeholder="Nama Kategori" class="form-control"></input>

        <div class="form-group">
          <label>Nama Kategori</label>
          <input required="" name="kategori_nama" id="kategori_nama" placeholder="Nama Kategori" class="form-control"></input>
        </div>
      
      </div>
      <?= get_csrf() ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>


<!-- ###################################  KATEGORI MODAL FILE   ################################ -->


    <script type="text/javascript">
      $(document).ready(function() {
          
          $(".btn-edit").click(function(){
            let id_file = $(this).attr("id")
            $.get("<?= base_url('admin/Master_File/show_file/') ?>"+id_file,function(response){
              let result = JSON.parse(response)
              $("#modal-edit").modal("show")
              $("#id_file").val(result.id_file)
              $("#file_title").val(result.file_title)
              $("#file_kategori_id").val(result.file_kategori_id)
              $("#file_name").val(result.file_name)
            })
          })

          $(".btn-edit-kategori-file").click(function(){
            let id_kategori_file = $(this).attr("id")
            $.get("<?= base_url('admin/Master_File/show_kategori_file/') ?>"+id_kategori_file,function(response){
              let result = JSON.parse(response)
              $("#modal-edit-kategori-file").modal("show")
              $("#id_kategori_file").val(result.id_kategori_file)
              $("#kategori_nama").val(result.kategori_nama)
            })
          })

      });
    </script>