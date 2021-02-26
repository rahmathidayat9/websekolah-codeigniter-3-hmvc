		<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?= base_url('login') ?>">

					<span class="login100-form-title p-b-26 text-primary">
						LUPA KATASANDI
					</span>
					<span class="login100-form-title p-b-48">
						<img src="<?= base_url() ?>asset/img/logo/logo.png" width="100">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Email valid : a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
						<?= form_error('email','<small class="text-danger">','</small>') ?>
					</div>
					<?= get_csrf(); ?>
					<div class="">
						<button class="btn btn-primary col-lg" type="submit">KIRIM</button>
					</div>

					<div class="text-center p-t-15">
						<a class="txt2" href="<?= base_url('login') ?>">
							Kembali Ke Halaman Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>