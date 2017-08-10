    <!-- <header>
      <img src="<?php echo base_url("images/footer-banner.jpg"); ?>" alt="banner iklan header">
    </header> -->
    <nav class="navbar navbar-default bgc-black border-none" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('tron/home/mobile-home'); ?> " style="display:table;">
            <!-- <img src="<?php echo base_url("images/logodepanamanah_crop.png") ?>" alt="amanahdagang.com website logo depan"> -->
            <img width="160px" src="<?php echo base_url("images/amanahstores logo FULL.png") ?>" alt="amanahstores.com website logo belakang">
          </a>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <span>Semua Provinsi - <a href="#">Pilih Provinsi</a></span>
    </div>
    <div class="container-fluid" style="margin-top:10px">
      <?php echo form_open(base_url("tron/allresult_mobile")); ?>
        <input class="form-control" type="text" name="sedang-mencari-barang" placeholder="Iklan disekitar kita" style="float:left;text-align:left;width:85%;">
        <button class="btn btn-primary" type="submit" style="float:right;background-color:#30e1cf;">Cari</button>
      <?php echo form_close(); ?>
      <a href="<?php echo base_url('tron/home/mobile-pasang-iklan'); ?>" class="btn btn-primary" style="margin-top:10px;width:100%;background-color:#30e1cf;">Pasang Iklan</a>
    </div>
    <br>
    <section class="container-fluid">
      <ul class="container-sidenav">
        <li>
          <ul class="left-navigation">
            <li><a href="../mkategori/">Semua Kategori</a></li>
            <li><a href="../mkategori/properti">
              <span class="fa fa-home material-red" aria-hidden="true"></span>
              Properti
            </a></li>
            <li><a href="../mkategori/mobil">
              <span class="fa fa-car material-blue" aria-hidden="true"></span>
              Mobil
            </a></li>
            <li><a href="../mkategori/motor">
              <span class="fa fa-motorcycle material-violet" aria-hidden="true"></span>
              Motor
            </a></li>
            <li><a href="../mkategori/fashion">
              <span class="fa fa-shopping-bag material-blue" aria-hidden="true"></span>
              Fashion
            </a></li>
            <li><a href="../mkategori/handphone">
              <span class="fa fa-mobile material-green-grass" aria-hidden="true"></span>
              Mobile
            </a></li>
            <li><a href="../mkategori/komputer">
              <span class="fa fa-laptop material-blue" aria-hidden="true"></span>
              Komputer
            </a></li>
            <li><a href="../mkategori/travel">
              <span class="fa fa-suitcase material-orange" aria-hidden="true"></span>
              Travel
            </a></li>
            <li><a href="../mkategori/kitchen">
              <span class="fa fa-cutlery material-blue" aria-hidden="true"></span>
              Kitchen
            </a></li>
            <li><a href="../mkategori/kesehatan">
              <span class="fa fa-heart material-pink" aria-hidden="true"></span>
              Kesehatan
            </a></li>
            <li><a href="../mkategori/service">
              <span class="fa fa-handshake-o material-tea" aria-hidden="true"></span>
              Services
            </a></li>
            <li><a href="../mkategori/lowongan-kerja">
              <span class="fa fa-user material-green-old" aria-hidden="true"></span>
              Lowongan Kerja
            </a></li>
            <li><a href="../mkategori/lainnya">
              <span class="fa fa-ellipsis-h material-grey" aria-hidden="true"></span>
              Lainnya
            </a></li>
          </ul>
        </li>
        <li style="width:52%;">
          <ul class="right-navigation" style="padding:5px 3px">
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</li>
            <li>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
            <li>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
            <li>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
            <li style="margin-top:5px;"><a href="../mkategori/" class="btn btn-success" style="width:100%;">Lainnya</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <br>
