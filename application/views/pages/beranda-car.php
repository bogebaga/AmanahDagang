<section class="wrapper" style="margin-top:80px;">
  <div class="search-container">
      <!-- <?php echo form_open(base_url("all-result")); ?> -->
      <form action=<?php echo base_url("all-result") ?> method="get">
      <div class="form-control" style="width:30%;display:inline-block;font-size:20px;height:40px;text-align:left;box-sizing:border-box;">
        <span class="fa fa-location-arrow"></span>
        <input name="lokasi" name="lokasi" type="text" placeholder="Lokasi" style="border:none;width:80%;margin-left:10px;">
      </div>
      <div class="form-control" style="width:27%;display:inline-block;font-size:20px;height:40px;text-align:left;">
        <span class="fa fa-list"></span>
        <input type="text" name="kategori" placeholder="kategori" style="border:none;width:80%;margin-left:10px;">
      </div>
      <div class="form-control" style="width:36%;display:inline-block;font-size:20px;height:40px;text-align:left;">
        <span class="fa fa-file-text-o"></span>
        <input type="text" name="iklan-cari" placeholder="Iklan yang sedang dicari" style="border:none;width:90%;margin-left:10px;">
      </div>
      <button class="btn btn-success" type="submit" style="font-size:20px;"><span class="fa fa-search"></span></button>
      <?php echo form_close(); ?>
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
        <?php if ($iklan == NULL) {
          echo '<div style="width:100%;text-align:center">
            <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
          </div>';
        } ?>
        <?php foreach ($iklan as $loadfirst) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$loadfirst['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($loadfirst['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($loadfirst['barang_upload_tgl']))).$loadfirst['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
      <div class="row">
        <img src="<?php echo base_url("images/banner_kategori/mobil.jpg") ?>" alt="Mobil bekas dan baru ada disini">
      </div>
      <ul class="foto-dagangan">
        <?php if ($this->iklan_model->get_all_iklan('Mobil', 'publish', 'iklan_baris') == NULL) {
        echo '<div style="width:100%;text-align:center">
          <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
        </div>';
      } ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Mobil', 'publish', 'iklan_baris') as $mobil) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$mobil['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($mobil['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($mobil['barang_upload_tgl']))).$mobil['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
        <?php if ($this->iklan_model->get_all_iklan('Motor', 'publish', 'iklan_baris') == NULL) {
      echo '<div style="width:100%;text-align:center">
        <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
      </div>';
      } ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Motor', 'publish', 'iklan_baris') as $motor) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$motor['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($motor['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($motor['barang_upload_tgl']))).$motor['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
      <div class="row">
        <img src="<?php echo base_url("images/banner_kategori/properti toska.jpg") ?>" alt="Temukan properti yang cocok dengan kantong kamu">
      </div>
      <ul class="foto-dagangan">
        <?php if ($this->iklan_model->get_all_iklan('Properti', 'publish', 'iklan_baris') == NULL) {
          echo '<div style="width:100%;text-align:center">
          <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
          </div>';
        } ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Properti', 'publish', 'iklan_baris') as $properti) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$properti['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($properti['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($properti['barang_upload_tgl']))).$properti['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
        <?php if ($this->iklan_model->get_all_iklan('Fashion', 'publish', 'iklan_baris') == NULL) {
        echo '<div style="width:100%;text-align:center">
          <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
        </div>';
        } ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Fashion', 'publish', 'iklan_baris') as $fashion) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$fashion['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($fashion['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($fashion['barang_upload_tgl']))).$fashion['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
        <?php if ($this->iklan_model->get_all_iklan('Handphone', 'publish', 'iklan_baris') == NULL) {
          echo '<div style="width:100%;text-align:center">
            <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
          </div>';
          } ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Handphone', 'publish', 'iklan_baris') as $handphone) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$handphone['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($handphone['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($handphone['barang_upload_tgl']))).$handphone['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
        <?php if ($this->iklan_model->get_all_iklan('Komputer', 'publish', 'iklan_baris') == NULL) {
        echo '<div style="width:100%;text-align:center">
          <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
        </div>';
        } ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Komputer', 'publish', 'iklan_baris') as $komputer) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$komputer['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($komputer['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($komputer['barang_upload_tgl']))).$komputer['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
        <?php if ($this->iklan_model->get_all_iklan('Travel', 'publish', 'iklan_baris') == NULL) {
          echo '<div style="width:100%;text-align:center">
            <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
          </div>';
          } ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Travel', 'publish', 'iklan_baris') as $travel) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$travel['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($travel['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($travel['barang_upload_tgl']))).$travel['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
    <?php if ($this->iklan_model->get_all_iklan('Kitchen', 'publish', 'iklan_baris') == NULL) {
        echo '<div style="width:100%;text-align:center">
          <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
        </div>';
        } ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Kitchen', 'publish', 'iklan_baris') as $kitchen) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$kitchen['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($kitchen['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($kitchen['barang_upload_tgl']))).$kitchen['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
      <div class="row">
        <img src="<?php echo base_url("images/banner_kategori/banner kesehatan dan kecantikan.jpg") ?>" alt="produk kecantikan banyak tersedia dengan harga terjangkau">
      </div>
      <ul class="foto-dagangan">
        <?php if ($this->iklan_model->get_all_iklan('Kesehatan', 'publish', 'iklan_baris') == NULL) {
          echo '<div style="width:100%;text-align:center">
            <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
          </div>';
          } ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Kesehatan', 'publish', 'iklan_baris') as $kesehatan) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$kesehatan['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($kesehatan['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($kesehatan['barang_upload_tgl']))).$kesehatan['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
        <?php if ($this->iklan_model->get_all_iklan('Makanan', 'publish', 'iklan_baris') == NULL) {
          echo '<div style="width:100%;text-align:center">
            <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
          </div>';
          } ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Makanan', 'publish', 'iklan_baris') as $makanan) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$makanan['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($makanan['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($makanan['barang_upload_tgl']))).$makanan['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
        <?php if ($this->iklan_model->get_all_iklan('Lainnya', 'publish', 'iklan_baris') == NULL) {
          echo '<div style="width:100%;text-align:center">
            <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
          </div>';
          } ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Lainnya', 'publish', 'iklan_baris') as $lainnya) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$lainnya['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($lainnya['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($lainnya['barang_upload_tgl']))).$lainnya['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
        <?php if ($this->iklan_model->get_all_iklan('Lowongan-Kerja', 'publish', 'iklan_baris') == NULL) {
        echo '<div style="width:100%;text-align:center">
          <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
        </div>';
        } ?>
        <?php foreach ($this->iklan_model->get_all_iklan('Lowongan-Kerja', 'publish', 'iklan_baris') as $lowongan_kerja) { ?>
          <li style="background:white;">
            <a href="<?php echo base_url("barang/".$lowongan_kerja['slug_nama_barang']) ?>">
              <img src=<?php echo (empty($lowongan_kerja['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($lowongan_kerja['barang_upload_tgl']))).$lowongan_kerja['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
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
    <img src="<?php echo base_url("images/footer-banner.jpg") ?>" alt="amanahdagang pasang iklan">
  </div>
</section>
