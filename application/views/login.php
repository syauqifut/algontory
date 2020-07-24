<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Algontory</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/admin/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/admin/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>assetsadmin//css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/admin/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/admin/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?=base_url()?>assets/admin/img/logo.jpg" alt="Klorofil Logo" width="100px"></div>
								<p class="lead">Al-Gontory Tulungagung</p>
							</div>
							<form class="form-auth-small" action="<?=base_url()?>index.php/login/proses_login" method="POST" id="login">
								 <?php if ($this->session->flashdata('pesan')!=null):?><div class="alert alert-danger"><?=$this->session->flashdata('pesan');?></div> <?php endif?>
								<div class="form-group">
									<input type="text" name="username" class="form-control" placeholder="Username" autofocus>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password"  placeholder="Password">
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Login to your Algontory account</h1>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
