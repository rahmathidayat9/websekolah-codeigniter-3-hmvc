<?php 
	is_auth_protect("logout");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>OUR-SCHOOL | <?= $title; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" href="<?= base_url() ?>asset/img/favicon/favicon.ico">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/Login_v2/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/Login_v2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/Login_v2/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/Login_v2/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/Login_v2/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/Login_v2/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/Login_v2/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/Login_v2/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/Login_v2/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/Login_v2/css/main.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/toastr/toastr.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/sweetalert2/sweetalert2.min.css"> -->
<!--===============================================================================================-->
</head>
<body>