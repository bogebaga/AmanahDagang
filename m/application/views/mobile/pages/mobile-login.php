    <!-- <header>
      <img src="<?php echo base_url("images/footer-banner.jpg"); ?>" alt="banner iklan header">
    </header> -->
    <nav class="navbar navbar-default bgc-black border-none" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('home/mobile-home'); ?>" style="display:table;">
            <!-- <img src="<?php echo base_url("images/logodepanamanah_crop.png") ?>" alt="amanahdagang.com website logo depan"> -->
            <img width="160px" src="<?php echo base_url("images/amanahstores_logo_FULL.png") ?>" alt="amanahstores.com website logo belakang">
          </a>
        </div>
      </div>
    </nav>
    <section class="container-fluid" style="background-color:white;padding:20px 10px;">
      <div class="container-login">
        <?php echo form_open(base_url('masuk')) ?>
        <div class="row">
          <div class="col-xs-12">
            <?php echo $this->session->flashdata('login-term') ?>
            <?php echo $this->session->flashdata('pesan_akun_success') ?>
          </div>
        </div>
          <label for="">Email<em class="required">*</em></label>
          <input type="email" class="form-control" name="email" placeholder="example@email.com"  required>
          <label for="">Password<em class="required">*</em></label>
          <input type="password" class="form-control" name="password"  placeholder="********" required>
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
    <section style="min-height:calc(100vh - 572px)"></section>
    <br>
