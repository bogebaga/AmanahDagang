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
        <input type="text" name="nlengkap" placeholder="Nama Lengkap" size="40" autofocus>
        <input type="text" name="nama" placeholder="Username" size="40">
        <input type="email" name="email" placeholder="Alamat Email" size="40">
        <input type="password" name="sandi" placeholder="Kata Sandi" size="40">

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
        <?php foreach ($this->iklan_model->get_all_iklan('Mobil') as $mobil) { ?>
          <li>
            <a href="<?php echo "barang/".$mobil['slug_nama_barang'] ?>">
              <img src=<?php echo $mobil['gambar_fitur'] == '' ? 'images/src_img_default/center.jpg' : 'images/post_foto_feature/'.$mobil['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $mobil['nama_barang'] ?></h3>
                <h4><?php echo $mobil['harga_barang'] ?></h4>
              </figcaption>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="motor" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Motor') as $motor) { ?>
          <li>
            <a href="<?php echo "barang/".$motor['slug_nama_barang'] ?>">
              <img src=<?php echo $motor['gambar_fitur'] == '' ? 'images/src_img_default/center.jpg' : 'images/post_foto_feature/'.$motor['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $motor['nama_barang'] ?></h3>
                <h4><?php echo $motor['harga_barang'] ?></h4>
              </figcaption>
            </a>
          </li>
          <?php } ?>
      </ul>
    </div>
    <div id="properti" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Properti') as $properti) { ?>
          <li>
            <a href="<?php echo "barang/".$properti['slug_nama_barang'] ?>">
              <img src=<?php echo $properti['gambar_fitur'] == '' ? 'images/src_img_default/center.jpg' : 'images/post_foto_feature/'.$properti['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $properti['nama_barang'] ?></h3>
                <h4><?php echo $properti['harga_barang'] ?></h4>
              </figcaption>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="fashion" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Fashion') as $fashion) { ?>
          <li>
            <a href="<?php echo "barang/".$fashion['slug_nama_barang'] ?>">
              <img src=<?php echo $fashion['gambar_fitur'] == '' ? 'images/src_img_default/center.jpg' : 'images/post_foto_feature/'.$fashion['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $fashion['nama_barang'] ?></h3>
                <h4><?php echo $fashion['harga_barang'] ?></h4>
              </figcaption>
            </a>
          </li>
          <?php } ?>
      </ul>
    </div>
    <div id="handphone" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Handphone') as $handphone) { ?>
          <li>
            <a href="<?php echo "barang/".$handphone['slug_nama_barang'] ?>">
              <img src=<?php echo $handphone['gambar_fitur'] == '' ? 'images/src_img_default/center.jpg' : 'images/post_foto_feature/'.$handphone['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $handphone['nama_barang'] ?></h3>
                <h4><?php echo $handphone['harga_barang'] ?></h4>
              </figcaption>
            </a>
          </li>
          <?php } ?>
      </ul>
    </div>
    <div id="komputer" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Komputer') as $komputer) { ?>
          <li>
            <a href="<?php echo "barang/".$komputer['slug_nama_barang'] ?>">
              <img src=<?php echo $komputer['gambar_fitur'] == '' ? 'images/src_img_default/center.jpg' : 'images/post_foto_feature/'.$komputer['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $komputer['nama_barang'] ?></h3>
                <h4><?php echo $komputer['harga_barang'] ?></h4>
              </figcaption>
            </a>
          </li>
          <?php } ?>
        </ul>
    </div>
    <div id="outdoor" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Travel') as $travel) { ?>
          <li>
            <a href="<?php echo "barang/".$travel['slug_nama_barang'] ?>">
              <img src=<?php echo $travel['gambar_fitur'] == '' ? 'images/src_img_default/center.jpg' : 'images/post_foto_feature/'.$travel['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $travel['nama_barang'] ?></h3>
                <h4><?php echo $travel['harga_barang'] ?></h4>
              </figcaption>
            </a>
          </li>
          <?php } ?>
        </ul>
    </div>
    <div id="dapur" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Kitchen') as $kitchen) { ?>
          <li>
            <a href="<?php echo "barang/".$kitchen['slug_nama_barang'] ?>">
              <img src=<?php echo $kitchen['gambar_fitur'] == '' ? 'images/src_img_default/center.jpg' : 'images/post_foto_feature/'.$kitchen['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $kitchen['nama_barang'] ?></h3>
                <h4><?php echo $kitchen['harga_barang'] ?></h4>
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
