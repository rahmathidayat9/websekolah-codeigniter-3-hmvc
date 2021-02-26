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
              <a href="<?= base_url('admin/access-manager') ?>" class="float-sm-right btn btn-danger">Kembali</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Menu Role</th>
                  <th>Akses</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($all_menu as $menu): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $menu['menu'] ?></td>
                  <td>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" data-role="<?= $role['id_role']; ?>" <?= role_active($role['id_role'],$menu['id_menu']) ?> class="custom-control-input switch-access" id="<?= $menu['id_menu'] ?>">
                        <label class="custom-control-label" for="<?= $menu['id_menu'] ?>"></label>
                     </div>
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


<script type="text/javascript">
  $(document).ready(function() {
    $(document).on("click",".switch-access",function(){
      let role_id = $(this).data("role")
      let menu_id = $(this).attr("id")
      $.ajax({
        url: "<?= base_url('admin/Access_Manager/change_access?role_id=') ?>"+role_id+"&menu_id="+menu_id,
        type: "GET",
        success:function(response){
          document.location.href = "<?= base_url("admin/Access_Manager/role_access/") ?>"+role_id;
        },
        error:function(){
          console.log('gagal ubah akses')
        }
      })
    })
  });
</script>