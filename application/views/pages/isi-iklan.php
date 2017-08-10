<div class="bungkus">
  <section class="detail-barang">
    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url(); ?>">Home</a>
      </li>
      <li class="active"><?php echo $iklan['nama_kategori'] ?></li>
    </ol>

    <div class="judul-barang">
      <h2><?php echo $iklan['nama_barang'] ?></h2>
      <h2 style="color:#ce6161;"><?php echo ($iklan['harga_barang']) ? "Rp. ".$iklan['harga_barang'] : ucwords(str_replace("_"," ", $iklan['jenis_iklan']))  ?></h2>
    </div>

    <div class="slide-barang">
      <div class="gambar-gambar" align="center">
        <?php $path_ff = base_url('images/post_foto_feature/'.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($iklan['barang_upload_tgl'])))); ?>
        <img src="<?php echo (empty($iklan['gambar_fitur'])) ? base_url('images/src_img_default/wide.jpg') : $path_ff.$iklan['gambar_fitur']; ?>" class="img-responsive" alt="foto">
      </div>
    <?php
      $path_bd = base_url().'images/post_foto_ikl/';
      $explode_string = explode(',',$iklan['gambar_barang']);
      rsort($explode_string);
      foreach ($explode_string as $slide_gambar): ?>
          <?php echo ($slide_gambar == '') ? '' : '<div class="gambar-gambar"><img src="'.$path_bd.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($iklan['barang_upload_tgl']))).$iklan['slug_nama_barang'].'/'.$slide_gambar.'"  class="img-responsive" alt="foto"></div>' ?>
      <?php endforeach; ?>
      <a class="arah-kiri" onclick="plusDivs(-1)">&#10094;</a>
      <a class="arah-kanan" onclick="plusDivs(1)">&#10095;</a>
    </div>
    <div class="sosmed-penjual dashed">
      <div class="btn btn-lg" style="border:0;">SHARE</div>
      <a href="#" class="btn btn-primary btn-lg" title="Twitter"><span class="fa fa-2x fa-twitter"></span></a>
      <a href="#" class="btn btn-danger btn-lg" title="Google+"><span class="fa fa-2x fa-google-plus"></span></a>
      <a href="#" class="btn btn-primary btn-lg" title="Facebook"><span class="fa fa-2x fa-facebook"></span></a>
    </div>
    <div class="deskripsi-barang">
      <h3 style="margin-top:7px;">Detail Barang</h3>
      <p><?php echo $iklan['deskripsi_barang'] ?></p>
      <p>
        Hati-hati dengan penipuan. Bertemu langsung dengan penjual adalah cara aman berbelanja.
      </p>
    </div>
  </section>
  <aside class="iklan-barang">
    <div class="bungkus-penjual">
      <div class="foto-penjual">
        <img src="<?php echo $iklan['user_picture'] == '' ? base_url().'images/gambar.jpg' : base_url().'images/user_iklan/'.$iklan['user_picture'] ?>" class="img-responsive" alt="foto">
      </div>
      <div class="identitas-penjual">
        <!-- <h3>IDENTITAS DIRI : </h3> -->
        <h4><?php echo $iklan['user_nama']; ?></h4>
        <h4><?php echo $iklan['alamat_barang'] ?></h4>
        <h4><?php echo $iklan['user_telpon'] ?></h4>
      </div>
      <!-- <div class="tombol-penjual">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pesan">Kirim Pesan</button>
      </div> -->
      <!-- <div class="sosmed-penjual">
        <a href="#" class="btn btn-success btn-lg" title="handphone"><span class="fa fa-phone"></span></a>
        <a href="#" class="btn btn-primary btn-lg" title="Twitter"><span class="fa fa-twitter"></span></a>
        <a href="#" class="btn btn-primary btn-lg" title="Facebook"><span class="fa fa-facebook"></span></a>
        <a href="#" class="btn btn-danger btn-lg" title="Google+"><span class="fa fa-google-plus"></span></a>
        <a href="#" class="btn btn-default btn-lg" title="shared"><span class="fa fa-share-alt"></span></a>
      </div> -->
      <div class="sosmed-penjual">
        <a href="#" class="btn btn-success btn-lg" title="handphone"><span class="fa fa-2x fa-phone"></span></a>
      </div>
    </div>
    <div class="bungkus-detail">
      <div class="detail-kategori">
        <i class="fa fa-tags" aria-hidden="true"></i>
        <div class="kata">
          <p>Kategori</p>
          <p><a href="#"><?php echo $iklan['nama_kategori'] ?></a></p>
        </div>
      </div>
      <div class="detail-waktu">
        <i class="fa fa-plus" aria-hidden="true"></i>
        <div class="kata">
          <p>Ditambahkan</p>
          <p><?php echo date('j M Y',strtotime($iklan['barang_upload_tgl'])) ?></p>
        </div>
      </div>
      <div class="detail-lokasi">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <div class="kata">
          <p>Lokasi</p>
          <p><?php echo $iklan['alamat_barang']?></p>
        </div>
      </div>
      <div class="detail-view">
        <i class="fa fa-eye" aria-hidden="true"></i>
        <div class="kata">
          <p>Views</p>
          <p><?php echo $viewer['view_barang'] ?></p>
        </div>
      </div>
      <!-- <div class="detail-rating">
        <i class="fa fa-star" aria-hidden="true"></i>
        <div class="kata">
          <p>Rating</p>
          <p>5</p>
        </div>
      </div> -->
    </div>
    <!-- <div class="bungkus-iklan">
      <img src="<?php echo base_url("images/gambar.jpg")?>" class="img-responsive" alt="iklan">
    </div> -->
  </aside>
</div>
