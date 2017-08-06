<section class="wrapper" style="margin-top:65px;">
	<style type="text/css">
		.wrapper-daftar{
			border: 1px solid #d2d2d2;
			padding: 20px;
			margin-top: 20px;
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
		ol > li
		{
			list-style: decimal outside none;
			margin-left: 40px;
		}
		.wrapper-daftar button{
			padding: 5px 25px;
			margin-top: 20px;
		}
	</style>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<form class="wrapper-daftar" action="<?php echo base_url("register") ?>" method="post">
						<h4>DAFTAR</h4>
						<div class="row">
							<div class="col-xs-8" style="float:none;margin:0 auto;">
								<?php echo $this->session->flashdata('pesan_akun') ?>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="bkiri">
								<div class="form-horizontal">
									<div class="form-group">
										<label for="rpsw" class="col-sm-3 control-label">Username</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" required name="user_nama" id="rpsw" placeholder="Username">
										</div>
									</div>
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
							</div>
						</div>
						<div class="col-lg-5">
							<div class="bkanan">
								<div class="">
									<p>Dengan password yang Anda miliki, Anda bisa mengakses <b>Iklan Saya</b>, dimana Anda dapat:</p>
									<ol>
										<li>Edit atau hapus iklan Anda</li>
										<li>Melihat tanggapan terhadap iklan Anda</li>
										<li>Melihat iklan yang tersimpan</li>
									</ol>
									<p>Masukkan alamat e-mail dan password, kami akan mengirimkan email konfirmasi.</p>
								</div>
							</div>
						</div>
						<div style="text-align:center;">
							<label class="checkbox-inline">
								<input type="checkbox" required >Dengan mendaftar di AmanahStores.com, saya menyetujui <a href="#" title=""> Syarat & Ketentuan</a> AmanahStores.com.
							</label>
						</div>
						<div style="margin:0 auto; text-align:center;">
							<button type="submit" class="btn btn-primary">Daftar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
