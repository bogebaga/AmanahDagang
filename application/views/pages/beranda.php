<section class="wrapper">
  <div class="iklan">
    <img src="images/tes.jpeg" class="img-responsive">
    <div class="login-background">
      <div class="kotak-daftar">
        <h3>Buat Akun Anda</h3>
        <div class="form-pendaftaran">
          <?php echo validation_errors();?>
          <?php echo form_open('register')?>
          <input type="text" name="nlengkap" placeholder="Nama Lengkap" size="35" autofocus>
          <input type="text" name="nama" placeholder="Username" size="35">
          <input type="email" name="email" placeholder="Alamat Email" size="35">
          <input type="password" name="sandi" placeholder="Kata Sandi" size="35">

          <button type="submit" name="submit" class="btn btn-primary">Mendaftar</button>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
    <div class="fanpage">
      <h3>Semua Ada disini</h3>
      <h1>AMANAH DAGANG</h1>
      <button type="button" onclick="window.location='https://www.facebook.com/harianamanah/?hc_ref=NEWSFEED'" class="sosmed-1">Facebook</button>
      <button type="button" onclick="window.location='https://twitter.com/harianamanah'" class="sosmed-2">Twitter</button>
    </div>
  </div>
</section>
<section class="wrapper">
  <div class="search-container">
    <form class="" action="index.html" method="post">
      <input class="form-control" type="text" name="" placeholder="Lokasi"  style="width:30%;display:inline-block;">
      <input class="form-control" type="text" name="" placeholder="Iklan yang sedang dicari" style="width:50%;display:inline-block;">
      <button class="btn btn-success" type="button" name="button">Cari</button>
    </form>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="col-xs-6">
          <div class="kategori-dagang">
            <ul>
              <li><a href="#">
                <span class="fa fa-car" aria-hidden="true"></span>
                Mobil
              </a></li>
              <li><a href="#">
                <span class="fa fa-motorcycle" aria-hidden="true"></span>
                Motor
              </a></li>
              <li><a href="#">
                <span class="fa fa-mobile" aria-hidden="true"></span>
                Mobile
              </a></li>
              <li><a href="#">
                <span class="fa fa-laptop" aria-hidden="true"></span>
                Komputer
              </a></li>
              <li><a href="#">
                <span class="fa fa-suitcase" aria-hidden="true"></span>
                Travel
              </a></li>
              <li><a href="#">
                <span class="fa fa-cutlery" aria-hidden="true"></span>
                Kitchen
              </a></li>
              <li><a href="#">
                <span class="fa fa-heart" aria-hidden="true"></span>
                Kesehatan
              </a></li>
              <li><a href="#">
                <span class="fa fa-handshake-o" aria-hidden="true"></span>
                Services
              </a></li>
            </ul>
          </div>
      </div>
    </div>
  </div>
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
      <ul class="foto-dagangan">
        <?php $path_fitur = "images/post_foto_feature/"; ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Mobil', 'publish') as $mobil) { ?>
          <li>
            <a href="<?php echo "barang/".$mobil['slug_nama_barang'] ?>">
              <img src=<?php echo ($path_fitur.$mobil['gambar_fitur'] == '' ? 'images/src_img_default/center.jpg' : (file_exists($path_fitur.$mobil['gambar_fitur']) ? $path_fitur.$mobil['gambar_fitur'] : 'images/src_img_default/center.jpg'));?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $mobil['nama_barang'] ?></h3>
                <h4><?php echo ($mobil['harga_barang'] == '' ? ucwords(str_replace('_', ' ', $mobil['jenis_iklan'])) : $mobil['harga_barang'])?></h4>
              </figcaption>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="iklan-lebar">
    <img src="images/iklan.jpg" alt="">
  </div>
</section>
