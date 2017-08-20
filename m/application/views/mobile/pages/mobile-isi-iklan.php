    <!-- <header>
    <img src="<?php echo base_url("images/footer-banner.jpg"); ?>" alt="banner iklan header">
    </header> -->
    <nav class="navbar navbar-default bgc-black border-none" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('home/mobile-home'); ?>" style="display:table;">
            <!-- <img src="<?php echo base_url("images/logodepanamanah_crop.png") ?>" alt="amanahdagang.com website logo depan"> -->
            <img width="160px" src="<?php echo base_url("images/amanahstores logo FULL.png") ?>" alt="amanahstores.com website logo belakang">
          </a>
        </div>
      </div>
    </nav>
    <section class="container-fluid">
      <div class="container-isi-iklan">
        <div class="judul-iklan">
          <span><?php echo $iklan['nama_barang'] ?></span>
        </div>
        <div class="contact-item same-size width15 circle" style="text-align:center;">
          <a href="#" class="btn btn-primary btn-lg" title="Facebook"><span class="fa fa-facebook"></span></a>
          <a href="#" class="btn btn-danger btn-lg" title="Google+"><span class="fa fa-google-plus"></span></a>
          <a href="#" class="btn btn-primary btn-lg" title="Twitter"><span class="fa fa-twitter"></span></a>
        </div>
        <div class="gambar-iklan" style="padding-top:10px">
          <?php $path_ff = ONLINE_IMAGE.'images/post_foto_feature/'.$this->welcome_mob->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($iklan['barang_upload_tgl']))); ?>
          <img src="<?php echo (empty($iklan['gambar_fitur'])) ? base_url('images/base.png') : $path_ff.$iklan['gambar_fitur']; ?>" alt="">
          <span><a href="#">Sebelumnya</a> | <a href="#">Selanjutnya</a></span>
          <div style="padding:10px;font-size:25px;background-color:#ede7f6;display:inline-block;margin-bottom:5px;border-radius:5px;">
            <?php echo ($iklan['harga_barang']) ? "Rp. ".$iklan['harga_barang'] : ucwords(str_replace("_"," ", $iklan['jenis_iklan']))  ?>
          </div>
        </div>
        <div class="informasi-iklan">
          <ul style="margin-bottom:0px;">
            <li>
              <label>Kategori iklan</label>
              <span>
                <a><?php echo $iklan['nama_kategori'] ?></a>
              </span>
            </li>
            <li>
              <label>Kondisi iklan</label>
              <span>
                <?php echo ucwords($iklan['jenis_barang']); ?>
              </span>
            </li>
            <li>
              <label>Alamat barang</label>
              <span>
                <a href=""><?php echo $iklan['alamat_barang'] ?></a>
              </span>
            </li>
            <li data-base="paragraf-deskripsi" style="color:#424242;">
              <h4 style="text-align:left;"><b>Detil</b></h4>
              <?php echo $iklan['deskripsi_barang'] ?>
            </li>
          </ul>
        </div>
        <div class="contact-item same-size width15">
          <div href="#" class="btn btn-default btn-lg" title="shared" style="border:0;">SHARE</div>
          <a href="#" class="btn btn-primary btn-lg" title="Facebook"><span class="fa fa-facebook"></span></a>
          <a href="#" class="btn btn-danger btn-lg" title="Google+"><span class="fa fa-google-plus"></span></a>
          <a href="#" class="btn btn-primary btn-lg" title="Twitter"><span class="fa fa-twitter"></span></a>
        </div>
        <!-- <div class="contact-item same-size">
          <a href="#" class="btn btn-success btn-lg" title="handphone"><span class="fa fa-2x fa-phone"></span></a>
          <a href="#" class="btn btn-primary btn-lg" title="Twitter"><span class="fa fa-2x fa-twitter"></span></a>
          <a href="#" class="btn btn-primary btn-lg" title="Facebook"><span class="fa fa-2x fa-facebook"></span></a>
          <a href="#" class="btn btn-danger btn-lg" title="Google+"><span class="fa fa-2x fa-google-plus"></span></a>
          <a href="#" class="btn btn-default btn-lg" title="shared"><span class="fa fa-2x fa-share-alt"></span></a>
        </div> -->
        <div class="informasi-pemasang">
          <ul style="margin-bottom:0px;">
            <li>
              <label>Pengiklan</label>
              <span>
                <a href=""><?php echo $iklan['user_nama'] ?></a>
              </span>
            </li>
            <li>
              <label>Upload</label>
              <span>
                <a href=""><?php echo date('j M Y', strtotime($iklan['barang_upload_tgl'])) ?></a>
              </span>
            </li>
            <li>
              <label>Dilihat</label>
              <span>
                <a href=""><?php echo $viewer['view_barang'] ?></a>
              </span>
            </li>
          </ul>
        </div>
        <div class="contact-item same-size" style="text-align:center;">
          <a href="#" class="btn btn-success btn-lg" title="handphone"><span class="fa fa-2x fa-phone"></span></a>
        </div>
        <div class="contact-item same-size">
          <div class="fb-comments" data-href="<?php echo current_url(); ?>" data-width="100%" data-numposts="10"></div>
        </div>
      </div>
    </section>
    <br>
