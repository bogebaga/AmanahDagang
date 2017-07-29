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
    <section class="container-fluid">
      <div class="container-isi-iklan">
        <div class="judul-iklan">
          <span><?php echo $iklan[0]['nama_barang'] ?></span>
        </div>
        <div class="gambar-iklan" style="padding-top:10px">
          <?php $path_ff = base_url('images/post_foto_feature/'); ?>
          <img src="<?php echo (empty($iklan[0]['gambar_fitur'])) ? base_url('images/base.png') : $path_ff.$iklan[0]['gambar_fitur']; ?>" alt="">
          <span><a href="#">Sebelumnya</a> | <a href="#">Selanjutnya</a></span>
          <div style="padding:10px;font-size:25px;background-color:#ede7f6;display:inline-block;margin-bottom:5px;border-radius:5px;">
            <?php echo ($iklan[0]['harga_barang']) ? "Rp. ".$iklan[0]['harga_barang'] : ucwords(str_replace("_"," ", $iklan[0]['jenis_iklan']))  ?>
          </div>
        </div>
        <div class="informasi-iklan">
          <ul style="margin-bottom:0px;">
            <li>
              <label>Kategori iklan</label>
              <span>
                <a href=""><?php echo $iklan[0]['nama_kategori'] ?></a>
              </span>
            </li>
            <li>
              <label>Kondisi iklan</label>
              <span>
                <?php echo ucwords($iklan[0]['jenis_barang']); ?>
              </span>
            </li>
            <li>
              <label>Alamat barang</label>
              <span>
                <a href=""><?php echo $iklan[0]['alamat_barang'] ?></a>
              </span>
            </li>
            <li data-base="paragraf-deskripsi" style="color:#424242;">
              <h4 style="text-align:left;"><b>Detil</b></h4>
              <?php echo $iklan[0]['deskripsi_barang'] ?>
            </li>
          </ul>
        </div>
        <div class="contact-item">
          <a href="#">
            <button class="btn btn-lg btn-success" type="button" name="button"><span class="fa fa-2x fa-phone"></span></button>
          </a>
        </div>
        <div class="informasi-pemasang">
          <ul style="margin-bottom:0px;">
            <li>
              <label>Pengiklan</label>
              <span>
                <a href=""><?php echo $iklan[0]['user_nama'] ?></a>
              </span>
            </li>
            <li>
              <label>Upload</label>
              <span>
                <a href=""><?php echo date('j M Y', strtotime($iklan[0]['barang_upload_tgl'])) ?></a>
              </span>
            </li>
            <li>
              <label>Dilihat</label>
              <span>
                <a href=""><?php echo $viewer[0]['view_barang'] ?></a>
              </span>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <br>
