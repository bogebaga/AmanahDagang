<section class="wrapper">
  <div class="iklan">
    <img src="<?php echo base_url('images/tes.jpeg'); ?>" class="img-responsive">
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
    <form action="index.html" method="post">
      <div class="form-control" style="width:40%;display:inline-block;font-size:20px;height:40px;text-align:left;">
        <span class="fa fa-location-arrow"></span>
        <input name="lokasi" type="text" placeholder="Lokasi" style="border:none;width:90%;margin-left:10px;">
      </div>
      <div class="form-control" style="width:50%;display:inline-block;font-size:20px;height:40px;text-align:left;">
        <span class="fa fa-file-text-o"></span>
        <input type="text" placeholder="Iklan yang sedang dicari" style="border:none;width:90%;margin-left:10px;">
      </div>
      <button class="btn btn-success" type="button" name="button" style="font-size:20px;"><span class="fa fa-search"></span></button>
    </form>
  </div>
  <div class="menu-bawah">
    <ul class="nav nav-tabs">
      <?php foreach ($kategori as $data_kategori): ?>
        <li class="<?php echo (strtolower($data_kategori['nama_kategori']) == $active_kategori) ? 'active' : '' ?>">
          <a data-toggle="tab" href="#<?php echo strtolower($data_kategori['nama_kategori']) ?>"><?php echo str_replace('-', ' ', $data_kategori['nama_kategori']) ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
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
  <div class="barang-dagang tab-content">
    <div id="load-first" class="tab-pane fade active in">
      <ul class="foto-dagangan">
        <?php $path_fitur = base_url('images/post_foto_feature/'); ?>
        <?php //$path_fitur = FCPATH.'images/post_foto_feature/'; ?>
        <?php if ($iklan == NULL)
        {
          echo '<div style="width:100%;text-align:center">
            <img width="250px" src="'.base_url("images/not_found.png").'" alt="">
          </div>';
        } ?>
        <?php foreach ($iklan as $loadfirst) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$loadfirst['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($loadfirst['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$loadfirst['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $loadfirst['nama_barang'] ?></h3>
                <h4><?php echo (empty($loadfirst['harga_barang']) ? '<div></div>' : "Rp. ".$loadfirst['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($loadfirst['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($loadfirst['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>

    <div id="mobil" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Mobil', 'publish', 'iklan_baris') as $mobil) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$mobil['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($mobil['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$mobil['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $mobil['nama_barang'] ?></h3>
                <h4><?php echo (empty($mobil['harga_barang']) ? '<div></div>' : "Rp. ".$mobil['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($mobil['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($mobil['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>

    <div id="motor" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Motor', 'publish', 'iklan_baris') as $motor) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$motor['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($motor['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$motor['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $motor['nama_barang'] ?></h3>
                <h4><?php echo (empty($motor['harga_barang']) ? '<div></div>' : "Rp. ".$motor['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($motor['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($motor['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
          <?php } ?>
      </ul>
    </div>
    <div id="properti" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Properti', 'publish', 'iklan_baris') as $properti) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$properti['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($properti['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$properti['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $properti['nama_barang'] ?></h3>
                <h4><?php echo (empty($properti['harga_barang']) ? '<div></div>' : "Rp. ".$properti['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($properti['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span clas="fa fa-eye"></span> <?php echo ucwords($properti['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="fashion" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Fashion', 'publish', 'iklan_baris') as $fashion) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$fashion['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($fashion['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$fashion['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $fashion['nama_barang'] ?></h3>
                <h4><?php echo (empty($fashion['harga_barang']) ? '<div></div>' : "Rp. ".$fashion['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($fashion['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($fashion['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
          <?php } ?>
      </ul>
    </div>
    <div id="handphone" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Handphone', 'publish', 'iklan_baris') as $handphone) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$handphone['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($handphone['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$handphone['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $handphone['nama_barang'] ?></h3>
                <h4><?php echo (empty($handphone['harga_barang']) ? '<div></div>' : "Rp. ".$handphone['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($handphone['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($handphone['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
          <?php } ?>
      </ul>
    </div>
    <div id="komputer" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Komputer', 'publish', 'iklan_baris') as $komputer) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$komputer['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($komputer['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$komputer['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $komputer['nama_barang'] ?></h3>
                <h4><?php echo (empty($komputer['harga_barang']) ? '<div></div>' : "Rp. ".$komputer['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($komputer['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($komputer['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
          <?php } ?>
        </ul>
    </div>
    <div id="travel" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Travel', 'publish', 'iklan_baris') as $travel) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$travel['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($travel['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$travel['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $travel['nama_barang'] ?></h3>
                <h4><?php echo (empty($travel['harga_barang']) ? '<div></div>' : "Rp. ".$travel['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($travel['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($travel['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
        <?php } ?>
        </ul>
    </div>
    <div id="kitchen" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Kitchen', 'publish', 'iklan_baris') as $kitchen) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$kitchen['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($kitchen['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$kitchen['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $kitchen['nama_barang'] ?></h3>
                <h4><?php echo (empty($kitchen['harga_barang']) ? '<div></div>' : "Rp. ".$kitchen['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($kitchen['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($kitchen['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
        <?php } ?>
        </ul>
    </div>
    <div id="kesehatan" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Kesehatan', 'publish', 'iklan_baris') as $kesehatan) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$kesehatan['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($kesehatan['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$kesehatan['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $kesehatan['nama_barang'] ?></h3>
                <h4><?php echo (empty($kesehatan['harga_barang']) ? '<div></div>' : "Rp. ".$kesehatan['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($kesehatan['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($kesehatan['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
        <?php } ?>
        </ul>
    </div>
    <div id="makanan" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Makanan', 'publish', 'iklan_baris') as $makanan) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$makanan['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($makanan['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$makanan['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $makanan['nama_barang'] ?></h3>
                <h4><?php echo (empty($makanan['harga_barang']) ? '<div></div>' : "Rp. ".$makanan['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($makanan['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($makanan['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
        <?php } ?>
        </ul>
    </div>
    <div id="lainnya" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Lainnya', 'publish', 'iklan_baris') as $lainnya) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$lainnya['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($lainnya['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$lainnya['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $lainnya['nama_barang'] ?></h3>
                <h4><?php echo (empty($lainnya['harga_barang']) ? '<div></div>' : "Rp. ".$lainnya['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($lainnya['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($lainnya['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
        <?php } ?>
        </ul>
    </div>
    <div id="lowongan-kerja" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan('Lowongan-Kerja', 'publish', 'iklan_baris') as $lowongan_kerja) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$lowongan_kerja['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($lowongan_kerja['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$lowongan_kerja['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
              <figcaption>
                <h3><?php echo $lowongan_kerja['nama_barang'] ?></h3>
                <h4><?php echo (empty($lowongan_kerja['harga_barang']) ? '<div></div>' : "Rp. ".$lowongan_kerja['harga_barang'])?></h4>
                <div class="icon-btm-left" style="color:#2c3e50;">
                  <span class="fa fa-archive"></span> <?php echo ucwords($lowongan_kerja['jenis_barang']); ?>
                </div>
                <div class="icon-btm-right" style="color:#757575;">
                  <span class="fa fa-eye"></span> <?php echo ucwords($lowongan_kerja['view_barang']); ?>
                </div>
              </figcaption>
            </a>
          </li>
        <?php } ?>
        </ul>
    </div>
  </div>
  <div class="iklan-lebar">
    <!-- <img src="<?php echo base_url('images/iklan.jpg'); ?>" alt=""> -->
    <img src="<?php echo base_url("images/footer-banner.jpg") ?>" width="1150px" height="200px"  alt="amanahdagang pasang iklan">
  </div>
</section>
