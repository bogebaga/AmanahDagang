    <header>
      <img src="<?php echo base_url("images/footer-banner.jpg"); ?>" alt="banner iklan header">
    </header>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid" style="padding-left:0;margin-left:-10px;">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('tron/home/mobile-home'); ?>">
            <img src="<?php echo base_url("images/logodepanamanah_crop.png") ?>" alt="amanahdagang.com website logo depan">
            <img src="<?php echo base_url("images/logoamanah.png") ?>" alt="amanahdagang.com website logo belakang">
          </a>
        </div>
      </div>
    </nav>
    <section class="container-fluid" style="background-color:white;padding:20px 10px;">
      <div class="container-login">
        <form class="" action="index.html" method="post">
          <label for="">Email<em class="required">*</em></label>
          <input type="email" class="form-control" name="" placeholder="email" required>
          <label for="">Passworde<em class="required">*</em></label>
          <input type="password" class="form-control" name="" placeholder="password" required>
          <label for="">Ulangi Password<em class="required">*</em></label>
          <input type="password" class="form-control" name="" placeholder="ulangi password" required>
          <br>
          <!-- <input type="checkbox" name="" value=""> -->
          <button class="btn btn-success" type="submit" name="button">Daftar</button>
        </form>
        <hr>
        <a href="<?php echo base_url('tron/home/mobile-login') ?>">Login</a>
        <span>Dengan log in anda menerima <a href="#">Syarat & Ketententuan</a> di amanahdagang.com</span>
      </div>
    </section>
    <br>
