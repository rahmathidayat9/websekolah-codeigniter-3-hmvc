<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/vendor/Login_v2/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/vendor/Login_v2/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/vendor/Login_v2/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url() ?>asset/vendor/Login_v2/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/vendor/Login_v2/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/vendor/Login_v2/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url() ?>asset/vendor/Login_v2/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/vendor/Login_v2/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>asset/vendor/Login_v2/js/main.js"></script>
	<script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/toastr/toastr.min.js"></script>
	<!-- <script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/sweetalert2/sweetalert2.min.js"></script> -->

<!-- toast flashdata -->
<?php if ($this->session->flashdata('success')): ?>
<div class="success-message"><?= $this->session->flashdata('success') ?></div>
<script type="text/javascript">
	toastr.success($(".success-message"))
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('info')): ?>
<div class="info-message"><?= $this->session->flashdata('info') ?></div>
<script type="text/javascript">
	toastr.info($(".info-message"))
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('warning')): ?>
<div class="warning-message"><?= $this->session->flashdata('warning') ?></div>
<script type="text/javascript">
	toastr.warning($(".warning-message"))
</script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
<div class="error-message"><?= $this->session->flashdata('error') ?></div>
<script type="text/javascript">
	toastr.error($(".error-message"))
</script>
<?php endif; ?>
</body>
</html>