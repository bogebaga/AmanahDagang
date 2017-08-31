    <!-- <header>
    <img src="<?php echo base_url("images/footer-banner.jpg"); ?>" alt="banner iklan header">
    </header> -->
    <nav class="navbar navbar-default bgc-black border-none" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('home/mobile-home'); ?>" style="display:table;">
            <!-- <img src="<?php echo base_url("images/logodepanamanah_crop.png") ?>" alt="amanahdagang.com website logo depan"> -->
            <img width="160px" src="<?php echo base_url("images/amanahstores_logo_FULL.png") ?>" alt="amanahstores.com website logo belakang">
          </a>
        </div>
      </div>
    </nav>
    <div class="social-container">
      <a href="https://twitter.com/intent/tweet?url=<?php echo base_url('isiiklan/'.$iklan['slug_nama_barang']) ?>&text=<?php echo $iklan['nama_barang'] ?>&via=amanahstores" class="social-share" title="Twitter" style="background-color:#1DA1F2;" target="_blank" onclick="window.open(this.href,'amanahstores.com share on Twitter','width=620px, height=480px')"><span class="fa fa-2x fa-twitter"></span></a>
      <a href="https://www.facebook.com/dialog/share?app_id=1333366313378639&display=page&href=<?php echo base_url('isiiklan/'.$iklan['slug_nama_barang']) ?>" class="social-share" title="Facebook" style="background-color:#3B5998;" target="_blank" onclick="window.open(this.href,'amanahstores.com share on Facebook','width=620px, height=480px')"><span class="fa fa-2x fa-facebook"></span></a>
      <a href="https://lineit.line.me/share/ui?url=<?php echo base_url('isiiklan/'.$iklan['slug_nama_barang']) ?>" class="social-share" title="Line" style="background-image:url('<?php echo base_url('images/social_media/linebutton.png') ?>');background-position:center;background-color:#00B900;background-repeat:no-repeat;" target="_blank"  onclick="window.open(this.href,'amanahstores.com share on Line','width=620px, height=480px')"><span style="background-image:url('<?php echo base_url('images/social_media/linebutton.png') ?>');background-position:center;"></span></a>
      <a href="whatsapp://send?text=<?php echo base_url('isiiklan/'.$iklan['slug_nama_barang']) ?>" class="social-share" title="Whatsapp" style="background-color:#00E676;"><span class="fa fa-2x fa-whatsapp"></span></a>
      <a href="https://telegram.me/share/url?url=<?php echo base_url('isiiklan/'.$iklan['slug_nama_barang']) ?>&text=<?php echo $iklan['nama_barang'] ?>" class="social-share" title="Telegram" style="background-color:#35ACE1;" target="_blank" onclick="window.open(this.href,'amanahstores.com share on Telegram','width=620px, height=480px')"><span class="fa fa-2x fa-telegram"></span></a>
      <a href="http://plus.google.com/share?url=<?php echo base_url('isiiklan/'.$iklan['slug_nama_barang']) ?>" class="social-share" title="Google+" style="background-color:#DB4437;" target="_blank" onclick="window.open(this.href,'amanahstores.com share on Google+','width=620px, height=480px')"><span class="fa fa-2x fa-google-plus"></span></a>
    </div>
    <section class="container-fluid">
      <div class="container-isi-iklan">
        <div class="judul-iklan">
          <span><?php echo $iklan['nama_barang'] ?></span>
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
        <!-- <div class="contact-item same-size width15">
          <div style="border:0;font-size:18px;padding:15px;display:inline-block;">SHARE</div>
          <a href="http://www.facebook.com/share.php?u=<?php echo base_url('isiiklan/'.$iklan['slug_nama_barang']) ?>&amp;title=<?php $iklan['nama_barang']?>" onclick="window.open(this.href,'amanahstores.com share on Facebook','width=620px, height=480px')" target="_blank" class="btn btn-primary btn-lg" title="Facebook"><span class="fa fa-facebook"></span></a>
          <a href="http://plus.google.com/share?url=<?php echo base_url('isiiklan/'.$iklan['slug_nama_barang']) ?>" class="btn btn-danger btn-lg" title="Google+" onclick="window.open(this.href,'amanahstores.com share on Google+','width=620px, height=480px')" target="_blank"><span class="fa fa-google-plus"></span></a>
          <a href="https://twitter.com/intent/tweet?text=<?php echo $iklan['nama_barang']?>&amp;url=<?php echo base_url('isiiklan/'.$iklan['slug_nama_barang']) ?>" class="btn btn-primary btn-lg" title="Twitter" target="_blank"><span class="fa fa-twitter"></span></a>
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
