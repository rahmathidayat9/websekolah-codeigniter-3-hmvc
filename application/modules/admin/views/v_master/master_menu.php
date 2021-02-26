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
                  <th>Title</th>
                  <th>Icon</th>
                  <th>Url</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($menu as $mn): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $mn['user_menu_title'] ?></td>
                  <td><i class="<?= trim($mn['user_menu_icon'],'nav-icon') ?>"></i></td>
                  <td><?= $mn['user_menu_url'] ?></td>
                  <td>
                    <?php if ($mn['user_menu_is_active']==1){
                        $status="checked=checked";
                      }else{
                        $status="";
                      }
                    ?>
                    <div class="custom-control custom-switch">
                      <input <?=  $status; ?> type="checkbox" value="<?= $mn['user_menu_is_active'] ?>" class="custom-control-input btn-switch-menu" id="<?= $mn['id_user_menu'] ?>">
                      <label class="custom-control-label" for="<?= $mn['id_user_menu'] ?>"></label>
                    </div>
                  </td>
                  <td>
                    <button id="<?= $mn['id_user_menu'] ?>" class="btn btn-primary btn-edit"><i class="fas fa-fw fa-edit"></i>
                    </button>
                    <a  onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_Menu/delete_menu/').$mn['id_user_menu']; ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i>
                    </a>
                  </td>
                </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <a class="btn btn-danger" onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_Menu/clear_menu') ?>">Kosongkan Data</a>
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
      <form method="post" action="<?= base_url('admin/Master_Menu/add_menu') ?>">
      <div class="modal-body">
        <div class="form-group">
          <input required="" name="user_menu_title" placeholder="menu title" class="form-control"></input>
        </div>
        <div class="form-group">
          <input required="" name="user_menu_icon" type="text" placeholder="icon" class="form-control"></input>
        </div>

        <div class="form-group">
          <input required="" name="user_menu_url" placeholder="url" class="form-control"></input>
        </div>
          
        <?php 
        $get_menu = $this->db->get('tbl_menu')->result_array();
         ?>
        <div class="form-group">
          <label for="menu_id">MENU</label>
          <select name="menu_id" class="form-control">
            <?php foreach ($get_menu as $menu): ?>
              <option value="<?= $menu['id_menu'] ?>"><?= $menu['menu'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        
        <div class="form-group">
          <label for="user_menu_is_active">Status</label>
          <select name="user_menu_is_active" class="form-control">
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
      <form method="post" action="<?= base_url('admin/Master_Menu/update_menu') ?>">
      <div class="modal-body">
        <div class="form-group">
          <input required="" type="hidden" id="id_user_menu" name="id_user_menu" type="text" readonly class="form-control"></input>
        </div>
        <div class="form-group">
          <input required="" id="user_menu_title" name="user_menu_title" placeholder="Menu Title" class="form-control"></input>
        </div>
        <div class="form-group">
          <input required="" id="user_menu_icon" name="user_menu_icon" type="text" placeholder="Menu Icon" class="form-control"></input>
        </div>

        <div class="form-group">
          <input required="" id="user_menu_url" name="user_menu_url" type="text" placeholder="Menu Url" class="form-control"></input>
        </div>
          
        <div class="form-group">
          <label for="user_menu_is_active">Status</label>
          <select id="user_menu_is_active" name="user_menu_is_active" class="form-control">
            <option value="1">Active</option>
            <option value="0">Non-Active</option>
          </select>
        </div>

        <?php 
        $get_menu = $this->db->get('tbl_menu')->result_array();
         ?>
        <div class="form-group">
          <label for="menu_id">MENU</label>
          <select id="menu_id" name="menu_id"  class="form-control">
            <?php foreach ($get_menu as $menu): ?>
              <option value="<?= $menu['id_menu'] ?>"><?= $menu['menu'] ?></option>
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


    <script type="text/javascript">
      $(document).ready(function() {
          $(".btn-edit").click(function(){
            let id_user_menu = $(this).attr("id")
            $.get("<?= base_url('admin/Master_Menu/show_menu/') ?>"+id_user_menu,function(response){
              let result = JSON.parse(response)
              $("#modal-edit").modal("show")
              $("#id_user_menu").val(result.id_user_menu)
              $("#user_menu_title").val(result.user_menu_title)
              $("#user_menu_icon").val(result.user_menu_icon)
              $("#user_menu_url").val(result.user_menu_url)
              $("#menu_id").val(result.menu_id)
              $("#user_menu_is_active").val(result.user_menu_is_active)
            })
          })

          $(".btn-switch-menu").click(function() {
            let id_user_menu = $(this).attr("id")
            let is_active = $(this).val()
            $.ajax({
              url: "<?= base_url('admin/Master_Menu/switch_access_menu/') ?>",
              type: "GET",
              data: {
                id_user_menu : id_user_menu,
                is_active : is_active
              },
              success:function(){
                document.location.href="<?= base_url('admin/master-menu') ?>";
              },
              error:function(){
                alert('ubah akses gagal')
              },
            })
          });
      });
    </script>