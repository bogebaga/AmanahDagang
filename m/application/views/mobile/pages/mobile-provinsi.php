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
    <section class="container-fluid" style="background-color:white;padding:10px;min-height:calc(100vh - 280px)">
      <div class="container-provinsi">
        <ul class="mobile-provinsi">
          <?php foreach ($provinsi as $value): ?>
            <li><a href="#" provinsi-id="<?php echo $value['id'] ?>"><?php echo $value['nama'] ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>
    <br>
