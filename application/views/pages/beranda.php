<script type="text/javascript">
  $('#slider-home-1').carousel();
</script>
<section class="wrapper">
  <div class="iklan">
    <div id="slider-home-1" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#slider-home-1" data-slide-to="0" class="active"></li>
        <li data-target="#slider-home-1" data-slide-to="1"></li>
        <li data-target="#slider-home-1" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?php echo base_url("images/slider/baru.jpg") ?>" class="img-responsive">
        </div>
        <div class="item">
          <img src="<?php echo base_url("images/slider/sudah.jpg") ?>" class="img-responsive">
        </div>
        <div class="item">
          <img src="<?php echo base_url("images/aset/3.jpg") ?>" class="img-responsive">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- <a class="sosmed-1" href="https://www.facebook.com/harianamanah/?hc_ref=NEWSFEED" target="_blank">Facebook</a> -->
<!-- <a class="sosmed-2" href="https://twitter.com/harianamanah" target="_blank">Twitter</a> -->
<section class="wrapper">
  <div class="search-container">
    <!-- <?php echo form_open(base_url("all-result")); ?> -->
    <form action="<?php echo base_url("all-result") ?>" method="get">
      <div class="form-control" style="width:43%;display:inline-block;font-size:20px;height:40px;text-align:left;">
        <span class="fa fa-location-arrow"></span>
        <input name="lokasi" type="text" placeholder="Lokasi" style="border:none;width:90%;margin-left:10px;">
      </div>
      <div class="form-control" style="width:50%;display:inline-block;font-size:20px;height:40px;text-align:left;">
        <span class="fa fa-file-text-o"></span>
        <input name="iklan" type="text" placeholder="Iklan yang sedang dicari" style="border:none;width:90%;margin-left:10px;">
      </div>
      <button class="btn btn-success" type="submit" style="font-size:20px;"><span class="fa fa-search"></span></button>
    <?php echo form_close(); ?>
  </div>
  <div class="dropdown" data-style="triangle" style="width:95%;display:none;">
    <div class="kabkota-container">
      <ul class="text-left width25 colom list-unstyled">
        <li><a href="#">menu-1</a></li>
        <li><a href="#">menu-2</a></li>
        <li><a href="#">menu-3</a></li>
        <li><a href="#">menu-4</a></li>
        <li><a href="#">menu-5</a></li>
        <li><a href="#">menu-6</a></li>
        <li><a href="#">menu-7</a></li>
        <li><a href="#">menu-8</a></li>
      </ul>
      <ul class="text-left width25 colom list-unstyled">
        <li><a href="#">menu-1</a></li>
        <li><a href="#">menu-2</a></li>
        <li><a href="#">menu-3</a></li>
        <li><a href="#">menu-4</a></li>
        <li><a href="#">menu-5</a></li>
        <li><a href="#">menu-6</a></li>
        <li><a href="#">menu-7</a></li>
        <li><a href="#">menu-8</a></li>
      </ul>
      <ul class="text-left width25 colom list-unstyled">
        <li><a href="#">menu-1</a></li>
        <li><a href="#">menu-2</a></li>
        <li><a href="#">menu-3</a></li>
        <li><a href="#">menu-4</a></li>
        <li><a href="#">menu-5</a></li>
        <li><a href="#">menu-6</a></li>
        <li><a href="#">menu-7</a></li>
        <li><a href="#">menu-8</a></li>
      </ul>
      <ul class="text-left width25 colom list-unstyled">
        <li><a href="#">menu-1</a></li>
        <li><a href="#">menu-2</a></li>
        <li><a href="#">menu-3</a></li>
        <li><a href="#">menu-4</a></li>
        <li><a href="#">menu-5</a></li>
        <li><a href="#">menu-6</a></li>
        <li><a href="#">menu-7</a></li>
        <li><a href="#">menu-8</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="col-xs-5">
          <div class="kategori-dagang">
            <ul>
              <li><a href="properti/kategori">
                <span class="fa fa-home material-red" aria-hidden="true"></span>
                Properti
              </a></li>
              <li><a href="mobil/kategori">
                <span class="fa fa-car material-blue" aria-hidden="true"></span>
                Mobil
              </a></li>
              <li><a href="motor/kategori">
                <span class="fa fa-motorcycle material-violet" aria-hidden="true"></span>
                Motor
              </a></li>
              <li><a href="fashion/kategori">
                <span class="fa fa-shopping-bag material-blue" aria-hidden="true"></span>
                Fashion
              </a></li>
              <li><a href="handphone/kategori">
                <span class="fa fa-mobile material-green-grass" aria-hidden="true"></span>
                Mobile
              </a></li>
              <li><a href="komputer/kategori">
                <span class="fa fa-laptop material-blue" aria-hidden="true"></span>
                Komputer
              </a></li>
              <li><a href="travel/kategori">
                <span class="fa fa-suitcase material-orange" aria-hidden="true"></span>
                Travel
              </a></li>
              <li><a href="kitchen/kategori">
                <span class="fa fa-cutlery material-blue" aria-hidden="true"></span>
                Kitchen
              </a></li>
              <li><a href="kesehatan/kategori">
                <span class="fa fa-heart material-pink" aria-hidden="true"></span>
                Kesehatan
              </a></li>
              <li><a href="service/kategori">
                <span class="fa fa-handshake-o material-tea" aria-hidden="true"></span>
                Services
              </a></li>
              <li><a href="lowongan-kerja/kategori">
                <span class="fa fa-user material-green-old" aria-hidden="true"></span>
                Lowongan Kerja
              </a></li>
              <li><a href="lainnya/kategori">
                <span class="fa fa-ellipsis-h material-grey" aria-hidden="true"></span>
                Lainnya
              </a></li>
            </ul>
          </div>
      </div>
      <div class="col-xs-7">
        <img width="80%" src="<?php echo base_url("images/apa save me.jpg"); ?>" alt="banner amanahdagang.com samping">
      </div>
    </div>
  </div>
  <hr style="border-color:rgba(44, 62, 80, 0.27);">
  <h3 style="color:#ff9800;">#JualBekasBisaJadiDuit</h3>
  <br>
  <div class="barang-dagang tab-content">
    <div id="mobil" class="tab-pane fade in active">
      <!-- <div class="form-detail">
        <div class="input-harga">
          <input type="text" name="harga-rendah" placeholder="Harga Terendah" onkeyup="FormatCurrency(this)">
          -
          <input type="text" name="harga-tinggi" placeholder="Harga Tertinggi" onkeyup="FormatCurrency(this)">

          <select name="urutkan_harga">
            <option>Kondisi</option>
            <option value="baru">Baru</option>
            <option value="bekas">Bekas</option>}
          </select>
        </div>
        <button type="button" class="btn btn-primary">Cari</button>
        <select name="urutkan_harga">
          <option value="harga_termahal">Harga Termahal</option>
          <option value="harga_termurah">Harga Termurah</option>
          <option value="judul_az">Judul A-Z</option>
          <option value="judul_za">Judul Z-A</option>
        </select>
        <p>Atur Berdasarkan :</p>
      </div> -->
      <ul class="foto-dagangan" style="padding-top:0;background:rgba(255,255,255,0);border:none;">
        <?php $path_fitur = "images/post_foto_feature/"; ?>
        <?php foreach ($this->iklan_model->get_all_iklan_limit('5') as $new_ads) { ?>
          <li style="background:white;">
            <a href="<?php echo "barang/".$new_ads['slug_nama_barang'] ?>">
              <img src=<?php echo (empty($new_ads['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->beranda->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($new_ads['barang_upload_tgl']))).$new_ads['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $new_ads['nama_barang'] ?></h3>
                <h4><?php echo (empty($new_ads['harga_barang']) ? '<div></div>' : "Rp. ".$new_ads['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($new_ads['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($new_ads['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="iklan-lebar">
    <img src="<?php echo base_url("images/footer-banner.jpg") ?>" alt="amanahdagang pasang iklan">
  </div>
</section>
