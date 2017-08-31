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
        <form action="<?php echo base_url("daftar") ?>" method="post">
          <div class="row">
            <div class="col-xs-12">
              <?php echo $this->session->flashdata('mobile_info_akun'); ?>
            </div>
          </div>
          <label for="">Username<em class="required">*</em></label>
          <input type="text" class="form-control" name="user_nama" placeholder="Username" required>
          <label for="">Nama Lengkap<em class="required">*</em></label>
          <input type="text" class="form-control" name="nlengkap" placeholder="Nama Lengkap" required>
          <label for="">Email<em class="required">*</em></label>
          <input type="email" class="form-control" name="email" placeholder="example@email.com" required>
          <label for="">Password<em class="required">*</em></label>
          <input type="password" class="form-control" name="password" placeholder="********" required>
          <input type="checkbox" required>Dengan mendaftar di AmanahStores.com, saya menyetujui <a href="#" title=""> Syarat & Ketentuan</a> AmanahStores.com.
          <br>
          <br>
          <!-- <input type="checkbox" name="" value=""> -->
          <button class="btn btn-success" type="submit" name="button">Daftar</button>
        </form>
        <hr>
        <a href="<?php echo base_url('home/mobile-login') ?>">Login</a>
        <span>Dengan log in anda menerima <a href="#">Syarat & Ketententuan</a> di amanahstores.com.</span>
      </div>
    </section>
    <br>
