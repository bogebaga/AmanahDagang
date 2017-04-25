<div class="iklan">
  <img src="images/tes.jpeg" class="img-responsive" alt="">
  <div class="fanpage">
    <h3>Semua Ada disini</h3>
    <h1>AMANAH DAGANG</h1>
    <button type="button" onclick="window.location='https://www.facebook.com/harianamanah/?hc_ref=NEWSFEED'" class="sosmed-1">Facebook</button>
    <button type="button" onclick="window.location='https://twitter.com/harianamanah'" class="sosmed-2">Twitter</button>
  </div>
  <div class="login-background">
    <div class="kotak-daftar">
      <h3>Buat Akun Anda</h3>
      <div class="form-pendaftaran">
        <?php echo validation_errors();?>
        <?php echo form_open('register')?>
        <input type="text" name="nlengkap" placeholder="Nama Lengkap" maxlength="25" size="30" autofocus>
        <input type="text" name="nama" placeholder="Username" maxlength="20" size="30">
        <input type="email" name="email" placeholder="Alamat Email" maxlength="25" size="30">
        <input type="password" name="sandi" placeholder="Kata Sandi" maxlength="20" size="30">

        <button type="submit" name="submit" class="btn btn-primary">Mendaftar</button>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>

<section class="wrapper">
  <div class="daerah-dagang">

  </div>
  <div class="menu-bawah">
    <ul class="nav nav-tabs">
      <li class="active">
        <a data-toggle="tab" href="#mobil">Mobil</a>
      </li>
      <li>
        <a data-toggle="tab" href="#motor">Motor</a>
      </li>
      <li>
        <a data-toggle="tab" href="#properti">Properti</a>
      </li>
      <li>
        <a data-toggle="tab" href="#fashion">Fashion</a>
      </li>
      <li>
        <a data-toggle="tab" href="#handphone">Handphone</a>
      </li>
      <li>
        <a data-toggle="tab" href="#komputer">Komputer</a>
      </li>
      <li>
        <a data-toggle="tab" href="#outdoor">Travel</a>
      </li>
      <li>
        <a data-toggle="tab" href="#dapur">Kitchen</a>
      </li>
    </ul>
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
        <?php foreach ($all_iklan as $iklan) { ?>
          <li>
            <a href="<?php echo "barang/".$iklan['slug_nama_barang'] ?>">
              <img src="images/post_foto_feature/<?php echo $iklan['gambar_fitur'] ?>" alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $iklan['nama_barang'] ?></h3>
                <h4><?php echo $iklan['harga_barang'] ?></h4>
              </figcaption>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="motor" class="tab-pane fade">
      <ul class="foto-dagangan">
        <li>
          <a href="#">
            <img src="images/gambar.jpg" alt="">
            <figcaption>
              <h4>Rp 5.000.000</h4>
              <h3>Satria FU 150 CC</h3>
              <!-- <p>17 Jan 2017, 16:30</p> -->
            </figcaption>
          </a>
        </li>
      </ul>

    </div>
    <div id="properti" class="tab-pane fade">

    </div>
    <div id="fashion" class="tab-pane fade">

    </div>
    <div id="handphone" class="tab-pane fade">

    </div>
    <div id="komputer" class="tab-pane fade">

    </div>
    <div id="outdoor" class="tab-pane fade">

    </div>
    <div id="dapur" class="tab-pane fade">

    </div>
  </div>
  <div class="iklan-lebar">
    <img src="images/iklan.jpg" alt="">
  </div>
</section>
