<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Amanah</span>dagang</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<i class="glyphicon glyphicon-envelope"></i>  <span class="label label-danger">2</span>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="http://placehold.it/40/ccc/fff">
									</a>
									<div class="message-body">
										<small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
										<br />
										<small class="text-muted">1:24 pm - 25/03/2015</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="http://placehold.it/40/ccc/fff">
									</a>
									<div class="message-body">
										<small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
										<br />
										<small class="text-muted">12:27 pm - 25/03/2015</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>

							<li>
								<div class="all-button">
									<a href="#">
										<em class="glyphicon glyphicon-inbox"></em> <strong>All Messages</strong>
									</a>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<i class="glyphicon glyphicon-bell"></i>  <span class="label label-primary">18</span>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li>
								<a href="#">
									<div>
										<em class="glyphicon glyphicon-envelope"></em> 1 New Message
										<span class="pull-right text-muted small">3 mins ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<em class="glyphicon glyphicon-heart"></em> 12 New Likes
										<span class="pull-right text-muted small">4 mins ago</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<div>
										<em class="glyphicon glyphicon-user"></em> 5 New Followers
										<span class="pull-right text-muted small">4 mins ago</span>
									</div>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="<?php echo base_url("admin") ?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
			<li class="parent">
				<a data-toggle="collapse" href="#sub-item-1" >
					<span class="glyphicon glyphicon-list"></span> user information <span class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="<?php echo base_url('admin/iklan') ?>">
							<span class="glyphicon glyphicon-share-alt"></span> Iklan
						</a>
					</li>
					<li>
						<a class="" href="<?php echo base_url("admin/user") ?>">
							<span class="glyphicon glyphicon-share-alt"></span> Profil
						</a>
					</li>
				</ul>
			</li>
			<li class="parent">
				<a data-toggle="collapse" href="#sub-item-2">
					<span class="glyphicon glyphicon-pencil"></span> admin forms<span  class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li>
						<a class="" href="<?php echo base_url('admin/add_iklan') ?>">
							<span class="glyphicon glyphicon-share-alt"></span>Iklan
						</a>
					</li>
				</ul>
			</li>
			<!-- <li><a href="<?php echo base_url("admin/youtube_embed") ?>"><span class="glyphicon glyphicon-facetime-video"></span> Youtube Embed</a></li> -->
			<li class="parent">
				<a data-toggle="collapse" href="#sub-item-3">
					<span class="glyphicon glyphicon-facetime-video"></span> youtube embed<span class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li>
						<a class="" href="<?php echo base_url('admin/youtube_embed') ?>">
							<span class="glyphicon glyphicon-share-alt"></span> Tambah
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="<?php echo base_url('signout_admin')?>"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
