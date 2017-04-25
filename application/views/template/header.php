<!DOCTYPE html>
<html>
<head>
	<!-- META -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- TITLE -->
	<title>Amanah Dagang</title>

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>web/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>web/css/font-awesome/css/font-awesome.min.css">

	<!-- FONT -->
	<link href="https://fonts.googleapis.com/css?family=Oswald:700|Roboto" rel="stylesheet">

	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>web/js/jquery.maskMoney.min.js"></script>
	<script src="<?php echo base_url(); ?>web/js/tinymce/tinymce.min.js"></script>
</head>

<body>
	<header>
		<nav id="menu" class="navbar-fixed-top">
			<div class="row">
				<div class="tengah">
					<div class="navbar-header">
						<a class="navbar-brand" href="<?php echo $home?>">
							<div class="logo">
								<img src="<?php echo base_url(); ?>images/AMANAH.png">
							</div>
						</a>
					</div>

					<div class="menu-header">
						<ul class="nav navbar-nav">
							<li>
								<form>
									<input type="text" name="" placeholder="Cari" maxlength="20" size="35">
									<button type="button">Cari</button>
								</form>
							</li>

							<li>
								<?php if (! empty($this->session->userdata('user_login'))):?>
									<a href="<?php echo base_url() ?>pasangiklan" >Pasang Iklan</a>
								<?php else: ?>
									<a data-toggle="modal" data-target="#masuk">Pasang Iklan</a>
								<?php endif; ?>
							</li>
							<li>
								<a href="<?php echo $bantuan;?>">Bantuan</a>
							</li>

							<li>
								<a href="<?php echo $network;?>">Network</a>
							</li>

							<?php if (! empty($this->session->userdata('user_login'))): ?>
								<li class="dropdown">
									<a>
										<i class="fa fa-user-circle-o" aria-hidden="true"></i>
										<?php echo $this->session->userdata('user_name') ?>
									</a>
									<div class="dropdown-content">
										<a href="<?php echo base_url() ?>profil" >Profil</a>
										<a href="<?php echo base_url() ?>signout" >
											<i class="fa fa-sign-out" aria-hidden="true"></i>Keluar
										</a>
									</div>
								</li>
							<?php else: ?>
								<li>
									<a data-toggle="modal" data-target="#masuk">Login</a>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</header>
