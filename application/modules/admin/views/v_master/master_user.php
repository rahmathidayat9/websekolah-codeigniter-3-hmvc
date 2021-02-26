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
              <div class="row">
                <div class="col-md-5 float-right">
              </div>
              </div>  
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Img</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Is Active</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                  <?php $no=1; foreach ($all_user as $user): ?>
                    <tr>
                  <th><?= $no++ ?></th>
                  <td><img src="<?= base_url('asset/img/profile/').$user['profile_image'] ?>" width="40"></td>
                  <td><?= $user['username'] ?></td>
                  <td><?= $user['email'] ?></td>
                  <td>
                    <?php if ($user['is_active']==1){
                        $status="checked=checked";
                      }else{
                        $status="";
                      }
                    ?>
                    <div class="custom-control custom-switch">
                      <input <?=  $status; ?> type="checkbox" value="<?= $user['is_active'] ?>" class="custom-control-input btn-switch-user" id="<?= $user['id_user'] ?>">
                      <label class="custom-control-label" for="<?= $user['id_user'] ?>"></label>
                    </div>
                  </td>
                  <td><?= $user['role_id'] ?></td>
                  <td>
                    <button id="<?= $user['id_user'] ?>" class="btn btn-primary btn-edit"><i class="fas fa-fw fa-edit"></i></button>
                    <a href="<?= base_url('admin/Master_User/delete_user/').$user['id_user'] ?>" class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i class="fas fa-fw fa-ban"></i></a>
                  </td>
                </tr>  

                  <?php endforeach; ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Img</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Is Active</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              </div>
              <a onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_User/clear_user') ?>" class="btn btn-danger">Kosongkan Data</a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<!-- Tambah Data Modal -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('admin/Master_User/add_user') ?>">
      <div class="modal-body">
        <div class="form-group">
          <input required="" name="username" placeholder="username" class="form-control"></input>
        </div>
        <div class="form-group">
          <input required="" name="email" type="email" placeholder="email" class="form-control"></input>
        </div>

        <div class="form-group">
          <input required="" name="password" placeholder="password" class="form-control"></input>
        </div>
          
        <?php 
        $get_role = $this->db->get('tbl_role')->result_array();
         ?>
        <div class="form-group">
          <label for="role_id">Level</label>
          <select name="role_id" class="form-control">
            <?php foreach ($get_role as $role): ?>
              <option value="<?= $role['id_role'] ?>"><?= $role['role'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        
        <div class="form-group">
          <label for="is_active">Aktivasi</label>
          <select name="is_active" class="form-control">
            <option value="1">Active</option>
            <option value="0">Non-Active</option>
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



<!-- Edit Data Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url('admin/Master_User/update_user') ?>">
      <div class="modal-body">
        <div class="form-group">
          <input required="" id="id_user" name="id_user" type="text" readonly class="form-control"></input>
        </div>
        <div class="form-group">
          <input required="" id="username" name="username" placeholder="username" class="form-control"></input>
        </div>
        <div class="form-group">
          <input required="" id="email" name="email" type="email" placeholder="email" class="form-control"></input>
        </div>

        <div class="form-group">
          <input id="oldpassword" type="hidden" name="oldpassword" placeholder="password" class="form-control"></input>
          <input id="password" name="newpassword" placeholder="password" class="form-control"></input>
          <small class="text-danger text-italic">Kosongkan jika tidak akan di ubah</small>
        </div>
          
        <?php 
        $get_role = $this->db->get('tbl_role')->result_array();
         ?>
        <div class="form-group">
          <label for="role_id">Level</label>
          <select id="role_id" name="role_id"  class="form-control">
            <?php foreach ($get_role as $role): ?>
              <option value="<?= $role['id_role'] ?>"><?= $role['role'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        
        <div class="form-group">
          <label for="is_active">Aktivasi</label>
          <select id="is_active" name="is_active" class="form-control">
            <option value="1">Active</option>
            <option value="0">Non-Active</option>
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




<script type="text/javascript">
  $(document).ready(function() {
    
    $(".btn-edit").click(function(){
      let id_user = $(this).attr("id")
      $.get("<?= base_url('admin/Master_User/show_user/') ?>"+id_user,function(response){
        let result = JSON.parse(response)
        $("#modal-edit").modal("show")
        $("#id_user").val(result.id_user)
        $("#username").val(result.username)
        $("#email").val(result.email)
        $("#oldpassword").val(result.password)
        $("#role_id").val(result.role_id)
        $("#is_active").val(result.is_active)
      })
    })


  $(".btn-switch-user").click(function() {
    let id_user = $(this).attr("id")
    let is_active = $(this).val()
    $.ajax({
      url: "<?= base_url('admin/Master_User/switch_access_user/') ?>",
      type: "GET",
      data: {
        id_user : id_user,
        is_active : is_active
      },
      success:function(){
        document.location.href="<?= base_url('admin/master-user') ?>";
      },
      error:function(){
        alert('ubah akses gagal')
      },
    })
  });

  });

</script>