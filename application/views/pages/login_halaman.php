<section class="wrapper" style="margin-top:65px;">
  <!-- <h2 style="color:#ff9800;">IKLAN BARIS</h2> -->
  <style type="text/css">
  	.wrapper-daftar{
  		border: 1px solid #d2d2d2;
  		padding: 20px;
  		margin-top: 20px;
  		overflow: hidden;
      background-color: #fafafa;
  	}

  	.wrapper-daftar h4{
  		text-align: center;
  		margin-bottom: 25px;
  	}

  	.wrapper-daftar .bkiri{
  		padding: 15px;
  	}

  	.wrapper-daftar .bkanan{
  		border-left:  1px solid #d2d2d2;
  		padding: 15px;
  		background: #fff3e0;
  		margin-bottom: 15px;
      text-align: left;
  	}

  	.wrapper-daftar button{
  		padding: 5px 25px;
  		margin-top: 20px;
  	}
  </style>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<form action="<?php echo base_url("login") ?>" class="wrapper-daftar" method="post">
						<h4>Login</h4>
            <div class="row">
              <div class="col-xs-8" style="float:none;margin:0 auto;">
                <?php echo $this->session->flashdata('login_term') ?>
                <?php echo $this->session->flashdata('pesan_akun_success') ?>
              </div>
            </div>
						<div class="col-lg-7">
							<div class="bkiri">
								<div class="form-horizontal">
									<div class="form-group">
										<label for="eml" class="col-sm-3 control-label">E-mail</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" required name="email" id="eml" placeholder="example@email.com">
										</div>
									</div>
									<div class="form-group">
										<label for="psw" class="col-sm-3 control-label">Password</label>
										<div class="col-sm-9">
											<input type="password" class="form-control" required name="password" id="psw" placeholder="******">
										</div>
									</div>
								</div>
								<div class="col-sm-offset-3 col-sm-9 text-left">
									<label class="checkbox-inline">
										<input type="checkbox" required>Biarkan saya tetap masuk
									</label>
                  <a href="<?php echo base_url("beranda/daftar") ?>" style="float:right;">Daftar</a>
								</div>
								<div style="margin:0 auto; text-align:center;">
									<button type="submit" class="btn btn-success">Masuk</button>
								</div>
							</div>
						</div>
						<div class="col-lg-5">
							<div class="bkanan">
								<div class="socfa">
									<p>Login dengan akun Facebook</p>
									<a href="#" title="" style="padding:5px 10px; background:#4867aa; display:inline-block; color:white; overflow:hidden;">Facebook</a>
								</div>
								<div class="soctw">
									<p>Login dengan akun Google Plus</p>
									<a href="#" title="" style="padding:5px 10px; background:#dc4a38; display:inline-block; color:white; overflow:hidden;">Google Plus</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
      <div class="row" style="min-height:calc(100vh - 715px)"></div>
		</div>
</section>
