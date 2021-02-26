<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('theme/clever/css/bootstrap.min.css') ?>">
</head>
<body>

<div class="container-fluid mt-5">	
<div class="jumbotron bg-dark text-light">
  <h1 class="display-4">Page Not Found</h1>
  <p class="lead">oops ! , halaman yang anda tuju tidak ditemukan , coba pencarian halaman dibawah ini.</p>

  <form method="post" action="<?= base_url('Pagenotfound/search_page') ?>">	
  <div class="input-group mb-3">
		<input type="text" class="form-control" name="page" placeholder="Pencarian Halaman" aria-label="Recipient's username" aria-describedby="button-addon2">
		<div class="input-group-append">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" >
		<button class="btn btn-outline-light" type="submit" id="button-addon2">Cari</button>
  </div>
  </form>

</div>
  <hr class="my-4 bg-light">
  <a class="btn btn-danger btn-lg" href="<?= base_url('home') ?>" role="button">-HOME-</a>
</div>

<script src="<?= base_url('theme/clever/') ?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url('theme/clever/') ?>js/bootstrap/bootstrap.min.js"></script>
</body>
</html>