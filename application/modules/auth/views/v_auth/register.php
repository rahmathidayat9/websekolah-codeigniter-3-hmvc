		<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?= base_url('register') ?>">
					<span class="login100-form-title p-b-26 text-primary">
						OUR-SCHOOL
					</span>
					<span class="login100-form-title p-b-38">
						<img src="<?= base_url() ?>asset/img/logo/logo.png" width="100">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Masukan username ">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
						<?= form_error('username','<small class="text-danger">','</small>') ?>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Email valid : a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
						<?= form_error('email','<small class="text-danger">','</small>') ?>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Masukan password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
						<?= form_error('password','<small class="text-danger">','</small>') ?>
					</div>
					<?= get_csrf(); ?>	
					<div class="">
						<button class="btn btn-primary col-lg" type="submit">REGISTER</button>
					</div>

					<div class="text-center p-t-15">
						<span class="txt1">
							Sudah punya akun ?
						</span>

						<a class="txt2" href="<?= base_url('login'); ?>">
							Login
						</a>
						<br>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>