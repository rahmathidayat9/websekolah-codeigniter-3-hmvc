  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy;<script>document.write(new Date().getFullYear());</script> SMK-YPC</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<!-- <script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/sparklines/sparkline.js"></script> -->
<!-- daterangepicker -->
<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<!-- Summernote -->
<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url().'asset/vendor/ckeditor/ckeditor.js'?>"></script>
<!-- Page script -->

<?php if ($this->session->flashdata("success")): ?>
<div class="msg-success"><?= $this->session->flashdata("success"); ?></div>
<script type="text/javascript">
      $(document).Toasts('create', {
        class: 'bg-success', 
        title: 'Selamat !',
        body: $(".msg-success")
      })
</script>  
<?php endif; ?>

<?php if ($this->session->flashdata("info")): ?>
<div class="msg-info"><?= $this->session->flashdata("info"); ?></div>
<script type="text/javascript">
      $(document).Toasts('create', {
        class: 'bg-info', 
        title: 'Info !',
        body: $(".msg-info")
      })
</script>  
<?php endif; ?>

<?php if ($this->session->flashdata("warning")): ?>
<div class="msg-warning"><?= $this->session->flashdata("warning"); ?></div>
<script type="text/javascript">
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Peringatan !',
        body: $(".msg-warning")
      })
</script>  
<?php endif; ?>

<?php if ($this->session->flashdata("danger")): ?>
<div class="msg-danger"><?= $this->session->flashdata("danger"); ?></div>
<script type="text/javascript">
      $(document).Toasts('create', {
        class: 'bg-danger', 
        title: 'Oops !',
        body: $(".msg-danger")
      })
</script>  
<?php endif; ?>

<script type="text/javascript">

    CKEDITOR.replace('ckeditor');

  $(".custom-file-input").on("change",function(){
    let filename = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(filename)
  })
</script>
</body>
</html>
