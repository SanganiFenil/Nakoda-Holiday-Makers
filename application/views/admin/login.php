<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="RedstarHospital" />
	<title>Nakoda Holyday Makers-admin</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
		type="text/css" />
		<!-- icons -->
	<link href="<?=base_url('assets/admin/')?>fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('assets/admin/')?>fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/admin/')?>plugins/iconic/css/material-design-iconic-font.css">
	<link href="<?=base_url('assets/admin/')?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/admin/')?>css/pages/extra_pages.css">
	<link rel="shortcut icon" href="<?=base_url('assets/admin/')?>img/logo1.png" />

</head>

<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url(<?=base_url()?>assets/images/bus3.jpg);">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?=base_url('C_admin/loginCheck'); ?>">


					<div class="page-logo"style="margin-left: 80px; margin-top: 20px; margin-bottom: 20px; ">
					<div class="col-lg-12">
						<img class="col-lg-8 col-md-8 col-sm-8 col-8" src="<?=base_url('assets/admin/')?>img/logo1.png" alt="NHM"></div>
					</div>

					<span class="text-black"><?=$this->session->flashdata('passwordChanged')?></span>

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div>
						<span class="text-danger"><?= $this->session->flashdata('message'); ?></span>
						<span class="text-danger"><?= $this->session->flashdata('warning'); ?></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-30">
						<a class="txt1" href="<?=base_url('C_admin/forgotPasswordPage')?>">
							Forgot Password?
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<script src="<?=base_url('assets/admin/')?>plugins/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="<?=base_url('assets/admin/')?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url('assets/admin/')?>js/pages/extra-pages/pages.js"></script>
	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/smart/source/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Feb 2020 13:59:24 GMT -->
</html>