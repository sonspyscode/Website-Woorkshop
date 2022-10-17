<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= APP_NAME ?> - Login</title>
	<link href="<?= base_url('sb-admin-2/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('sb-admin-2/') ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

	<div class="container">
	<div class="text-center">
	<p> </p>
	<h1 class="h1 text-gray-300 mb-4"> Welcome in Govice</h1>
	</div>
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Log In</h1>
									</div>
									<?php if(checkSession('success')): ?>
										<div class="alert alert-success alert-dismissible fade show" role="alert">
								  			<?= getSession('success', true) ?>
								  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    			<span aria-hidden="true">&times;</span>
								  			</button>
										</div>
									<?php elseif(checkSession('error')): ?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  			<?= getSession('error', true) ?>
								  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    			<span aria-hidden="true">&times;</span>
								  			</button>
										</div>
									<?php endif ?>
									<form class="user" method="POST" action="<?= base_url('auth/login') ?>">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="username" placeholder="username" autocomplete="off" required="required" autofocus>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" name="password" placeholder="password" required="required">
										</div>
										<button class="btn btn-primary btn-user btn-block" name="login">Login</button>
									</form>
									<br></br>
								</div>
							</div>
						</div>
					</div>
				</div>
					<!-- registrasi -->
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row">
						<div class="col">
								<div class="p-5">
							<div class="text-center">
								<h6 class="h4 text-gray-900 mb-4">Sign Up</h6>
							</div>
							<div class="card-body">
								<form class="user" method="POST" action="<?= base_url('auth/tambah') ?>" enctype="multipart/form-data">
								  	<div class="form-group">
								  		<!-- <label for="nama">Name</label> -->
								  		<input type="text" class="form-control form-control-user" name="nama" id="nama" required="required" placeholder="your bussines name" autocomplete="off" class="form-control">
								  	</div>
									<div class="form-group">
								  		<!-- <label for="nohp">nohp</label> -->
								  		<input type="text" class="form-control form-control-user" name="nohp" id="nohp" required="required" placeholder="your phone number" autocomplete="off" class="form-control">
								  	</div>
								  	<div class="form-group">
								  		<!-- <label for="username">Username</label> -->
								  		<input type="text" class="form-control form-control-user" name="username" id="username" required="required" placeholder="username" autocomplete="off" class="form-control">
								  	</div>
								  	<div class="form-group">
								  		<!-- <label for="password">Password</label> -->
								  		<input type="password" class="form-control form-control-user"  name="password" id="password" required="required" placeholder="password" autocomplete="off" class="form-control">
								  	</div>
								  	<div class="form-group">
								  		<!-- <label for="password2">Password</label> -->
								  		<input type="password" class="form-control form-control-user" name="password2" id="password2" required="required" placeholder="confirm your password" autocomplete="off" class="form-control">
								  	</div>
								  	<div class="form-group">
								  		<label for="foto">Profile Picture</label>
								  		<input type="file" name="foto" id="foto" required="required" autocomplete="off" class="form-control-file">
								  	</div>
									<br> </br>
									<div class="form-group">
										<button class="btn btn-primary btn-user btn-block" name="tambah">Sign up</button>
										<button type="reset" class="btn btn-danger btn-user btn-block" name="cancel">Cancel</button>
									</div>
								</form>
							</div>
						</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/js/sb-admin-2.min.js"></script>

</body>

</html>
