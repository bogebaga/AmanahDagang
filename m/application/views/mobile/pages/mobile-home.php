    <header>
      <img src="<?php echo base_url("images/footer-banner.jpg"); ?>" alt="banner iklan header">
    </header>
    <nav class="navbar navbar-default" role="navigation" style="margin:0;">
      <div class="container-fluid" style="padding-left:0;margin-left:-10px;">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url("images/logodepanamanah_crop.png") ?>" alt="amanahdagang.com website logo depan">
            <img src="<?php echo base_url("images/logoamanah.png") ?>" alt="amanahdagang.com website logo belakang">
          </a>
        </div>
      </div>
    </nav>
    <div class="container-fluid search-clr" >
      <span style="color:white;">Semua Provinsi - <a href="<?php echo base_url("provinsi") ?>" style="color:#d68b3e">Pilih Provinsi</a></span>
      <div style="margin-bottom:10px;"></div>
      <?php echo form_open(base_url("allresult_mobile")); ?>
        <input class="form-control" type="text" name="sedang-mencari-barang" placeholder="Iklan disekitar kita" style="float:left;text-align:left;width:85%;">
        <button class="btn btn-primary" type="submit" style="float:right;background-color:#30e1cf;">Cari</button>
      <?php echo form_close(); ?>
      <a href="<?php echo base_url('home/mobile-pasang-iklan'); ?>" class="btn btn-primary" style="font-size:23px;box-sizing:border-box;margin-top:10px;width:100%;background-color:#30e1cf;">Pasang Iklan</a>
    </div>
    <section class="container-fluid menu-container">
      <?php //print_r($_SERVER);?>
      <ul class="container-sidenav">
        <li>
          <ul class="left-navigation">
            <li><a href="<?php echo base_url() ?>mkategori/">Semua Kategori</a></li>
            <li><a href="<?php echo base_url() ?>mkategori/properti">
              <span class="fa fa-home material-red" aria-hidden="true"></span>
              Properti
            </a></li>
            <li><a href="<?php echo base_url() ?>mkategori/mobil">
              <span class="fa fa-car material-blue" aria-hidden="true"></span>
              Mobil
            </a></li>
            <li><a href="<?php echo base_url() ?>mkategori/motor">
              <span class="fa fa-motorcycle material-violet" aria-hidden="true"></span>
              Motor
            </a></li>
            <li><a href="<?php echo base_url() ?>mkategori/fashion">
              <span class="fa fa-shopping-bag material-blue" aria-hidden="true"></span>
              Fashion
            </a></li>
            <li><a href="<?php echo base_url() ?>mkategori/handphone">
              <span class="fa fa-mobile material-green-grass" aria-hidden="true"></span>
              Mobile
            </a></li>
            <li><a href="<?php echo base_url() ?>mkategori/komputer">
              <span class="fa fa-laptop material-blue" aria-hidden="true"></span>
              Komputer
            </a></li>
            <li><a href="<?php echo base_url() ?>mkategori/travel">
              <span class="fa fa-suitcase material-orange" aria-hidden="true"></span>
              Travel
            </a></li>
            <li><a href="<?php echo base_url() ?>mkategori/kitchen">
              <span class="fa fa-cutlery material-blue" aria-hidden="true"></span>
              Kitchen
            </a></li>
            <li><a href="<?php echo base_url() ?>mkategori/kesehatan">
              <span class="fa fa-heart material-pink" aria-hidden="true"></span>
              Kesehatan
            </a></li>
            <li><a href="<?php echo base_url() ?>mkategori/service">
              <span class="fa fa-handshake-o material-tea" aria-hidden="true"></span>
              Services
            </a></li>
            <li><a href="<?php echo base_url() ?>mkategori/lowongan-kerja">
              <span class="fa fa-user material-green-old" aria-hidden="true"></span>
              Lowongan Kerja
            </a></li>
            <li><a href="<?php echo base_url() ?>mkategori/lainnya">
              <span class="fa fa-ellipsis-h material-grey" aria-hidden="true"></span>
              Lainnya
            </a></li>
          </ul>
        </li>
      </ul>
    </section>
    <section class="container-fluid">
      <h3 style="color:#f57c00;">#JualBekasBisaJadiDuit</h3>
      <ul class="iklanku">
        <?php $path_fitur = base_url("../images/post_foto_feature/"); ?>
        <?php foreach ($this->iklan_model->get_all_iklan_limit('6') as $new_ads) : ?>
          <li>
            <a href="<?php echo base_url("isiiklan/".$new_ads['slug_nama_barang']) ?>">
              <img src="<?php echo (empty($new_ads['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->welcome_mob->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($new_ads['barang_upload_tgl']))).$new_ads['gambar_fitur'] ?>" alt="">
              <div style="padding:12px;">
                <div class="judul-iklan" style="font-weight:bold;">
                  <?php echo $new_ads['nama_barang'] ?>
                </div>
                <div class="harga-iklan">
                  <?php echo (empty($new_ads['harga_barang']) ? '<div></div>' : "Rp. ".$new_ads['harga_barang'])?>
                </div>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>
    <br>
