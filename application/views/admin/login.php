<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<?php echo form_open('admin/login/masuk') ?>
					<!-- <form role="form"> -->
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="example@email.com" name="email" type="email" autofocus required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="*******" name="password" type="password" required>
							</div>
							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div> -->
							<!-- <a href="index.html" class="btn btn-primary">Login</a> -->
							<button type="submit" name="submit" class="btn btn-primary">Login</button>
						</fieldset>
					<!-- </form> -->
					<?php echo form_close() ?>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
