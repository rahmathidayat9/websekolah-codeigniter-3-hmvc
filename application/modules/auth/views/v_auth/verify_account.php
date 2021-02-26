		<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?= base_url('login') ?>">

					<span class="login100-form-title p-b-26 text-primary">
						VERIFIKASI AKUN
					</span>
					<span class="login100-form-title p-b-48">
						<img src="<?= base_url() ?>asset/img/logo/logo.png" width="100">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Email valid : a@b.c">
						<input v class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
						<?= form_error('email','<small class="text-danger">','</small>') ?>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Masukan password">
						<input class="input100" type="text" name="token">
						<span class="focus-input100" data-placeholder="Kode Verifikasi"></span>
						<?= form_error('password','<small class="text-danger">','</small>') ?>
					</div>
					<?= get_csrf(); ?>
					<div class="">
						<button class="btn btn-primary col-lg" type="submit">LOGIN</button>
					</div>

					<div class="text-center p-t-15">
						<span class="txt1">
							Belum punya akun ?
						</span>

						<a class="txt2" href="<?= base_url('register') ?>">
							Registrasi
						</a>
						<br>
						<a class="txt2" href="<?= base_url('forgot-password') ?>">
							Lupa Password ?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>