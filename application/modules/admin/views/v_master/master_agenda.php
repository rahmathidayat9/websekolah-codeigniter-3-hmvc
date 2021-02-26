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
                  <?php $no=1; foreach ($all_agenda as $agenda): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $agenda['agenda_nama'] ?></td>
                  <td><?= $agenda['agenda_author'] ?></td>
                  <td><?=  date('d-m-Y',strtotime($agenda['created_at'])) ?></td>
                  <td>
                    <button id="<?= $agenda['id_agenda'] ?>" class="btn btn-primary btn-edit"><i class="fas fa-fw fa-edit"></i></button>
                    <a  onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_Agenda/delete_agenda/').$agenda['id_agenda']; ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a></td>
                </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <a onclick="return confirm('Yakin ?')" href="<?= base_url('admin/Master_Agenda/clear_agenda') ?>" class="btn btn-danger">Kosongkan Data</a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->









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
      <form method="post" action="<?= base_url('admin/Master_Agenda/update_agenda') ?>">
      <div class="modal-body">
        
        
          <input required="" id="id_agenda" type="hidden" name="id_agenda" type="text" readonly class="form-control"></input>
        
          
        <div class="form-group">
          <label for="agenda_nama">Nama Agenda</label>
          <input required="" id="agenda_nama" name="agenda_nama"  placeholder="" class="form-control"></input>
        </div>          

        <div class="form-group">
          <label for="agenda_tempat">Tempat</label>
          <input required=""  id="agenda_tempat" name="agenda_tempat"  class="form-control"></input>
        </div>

        <div class="form-group">
          <label for="agenda_mulai">Mulai</label>
          <input required=""  id="agenda_mulai" type="date" name="agenda_mulai"  class="form-control"></input>
        </div>

        <div class="form-group">
          <label for="agenda_selesai">Selesai</label>
          <input  required="" id="agenda_selesai" type="date" name="agenda_selesai"  class="form-control"></input>
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
      let id_agenda = $(this).attr("id")
      $.get("<?= base_url('admin/Master_Agenda/show_agenda/') ?>"+id_agenda,function(response){
        let result = JSON.parse(response)
        $("#modal-edit").modal("show")
        $("#id_agenda").val(result.id_agenda)
        $("#agenda_nama").val(result.agenda_nama)
        $("#agenda_tempat").val(result.agenda_tempat)
        $("#agenda_mulai").val(result.agenda_mulai)
        $("#agenda_selesai").val(result.agenda_selesai)
        // $("#agenda_deskripsi").html(result.agenda_deskripsi)
      })
    })

  });

</script>