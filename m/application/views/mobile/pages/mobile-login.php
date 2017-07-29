    <header>
      <img src="<?php echo base_url("images/footer-banner.jpg"); ?>" alt="banner iklan header">
    </header>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid" style="padding-left:0;margin-left:-10px;">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('home/mobile-home'); ?>">
            <img src="<?php echo base_url("images/logodepanamanah_crop.png") ?>" alt="amanahdagang.com website logo depan">
            <img src="<?php echo base_url("images/logoamanah.png") ?>" alt="amanahdagang.com website logo belakang">
          </a>
        </div>
      </div>
    </nav>
    <section class="container-fluid" style="background-color:white;padding:20px 10px;min-height:calc(100vh - 280px)">
      <div class="container-login">
        <?php echo form_open(base_url('masuk')) ?>
          <label for="">Email<em class="required">*</em></label>
          <input type="email" class="form-control" name="email" placeholder="email"  required>
          <label for="">Password<em class="required">*</em></label>
          <input type="password" class="form-control" name="password"  placeholder="password" required>
          <input type="checkbox" required> Biarkan saya tetap masuk

          <!-- <input type="checkbox" name="" > -->
          <br>
          <br>
          <button class="btn btn-success" type="submit" name="button">Masuk</button>
        </form>
        <br>
        <a href="<?php echo base_url('home/mobile-signup') ?>">Daftar</a>
        <span>Dengan log in anda menerima <a href="#">Syarat & Ketententuan</a> di amanahdagang.com</span>
      </div>
    </section>
    <br>
