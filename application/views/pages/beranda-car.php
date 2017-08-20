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
                <h4 class="price-tag"><?php echo (empty($loadfirst['harga_barang']) ? '<div></div>' : "Rp. ".$loadfirst['harga_barang'])?></h4>
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
    <?php $data = $this->iklan_model->get_kategori(); ?>
    <?php $class = [
        'properti' => 'fa-home material-red',
        'mobil' => 'fa-car material-blue',
        'motor' => 'fa-motorcycle material-violet',
        'fashion' => 'fa-shopping-bag material-blue',
        'mobile' => 'fa-mobile material-green-grass',
        'komputer' => 'fa-laptop material-blue',
        'travel' => 'fa-suitcase material-orange',
        'kitchen' => 'fa-cutlery material-blue',
        'makanan' => 'fa-lemon-o material-orange',
        'kesehatan' => 'fa-heart material-red',
        'service' => 'fa-handshake-o material-tea',
        'lowongan-kerja' => 'fa-user material-green-old',
        'lainnya' => 'fa-ellipsis-h material-grey'];  ?>
    <?php foreach ($data as $value): ?>
      <div id="<?php echo lcfirst($value['nama_kategori']) ?>" class="tab-pane fade">
        <div class="row">
          <img src="<?php echo base_url("images/banner_kategori/".lcfirst($value['nama_kategori'])."jpg") ?>">
        </div>
        <ul class="foto-dagangan">
          <?php if ($this->iklan_model->get_all_iklan($value['nama_kategori'], 'publish', 'iklan_baris') == NULL) {
            echo '<div style="width:100%;text-align:center">
            <img width="480px" src="'.base_url("images/not_found.png").'">
            </div>';
          } ?>
          <?php foreach ($this->iklan_model->get_all_iklan($value['nama_kategori'], 'publish', 'iklan_baris') as $data) { ?>
            <li style="background:white;">
              <a href="<?php echo base_url("barang/".$data['slug_nama_barang']) ?>">
                <img src=<?php echo (empty($data['gambar_fitur'])) ? base_url('images/src_img_default/center.jpg') : $path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($data['barang_upload_tgl']))).$data['gambar_fitur'] ?> alt="fitur foto iklan amanah dagang">
                <figcaption>
                  <h3><?php echo $data['nama_barang'] ?></h3>
                  <h4 class="price-tag"><?php echo (empty($data['harga_barang']) ? '<div></div>' : "Rp. ".$data['harga_barang'])?></h4>
                  <div class="icon-btm-left" style="color:#2c3e50;">
                    <span class="fa fa-archive"></span> <?php echo ucwords($data['jenis_barang']); ?>
                  </div>
                  <div class="icon-btm-right" style="color:#757575;">
                    <span class="fa fa-eye"></span> <?php echo ucwords($data['view_barang']); ?>
                  </div>
                </figcaption>
              </a>
            </li>
            <?php } ?>
          </ul>
        </div>
    <?php endforeach; ?>
  </div>
  <div class="iklan-lebar">
    <!-- <img src="<?php echo base_url('images/iklan.jpg'); ?>" alt=""> -->
    <img src="<?php echo base_url("images/footer-banner.jpg") ?>" alt="amanahdagang pasang iklan">
  </div>
</section>
