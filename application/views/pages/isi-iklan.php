<div class="bungkus">
  <section class="detail-barang">
    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url(); ?>">Home</a>
      </li>
      <li class="active"><?php echo $iklan[0]['nama_kategori'] ?></li>
    </ol>

    <div class="judul-barang">
      <h2><?php echo $iklan[0]['nama_barang'] ?></h2>
      <h2 style="color:#ce6161;"><?php echo ($iklan[0]['harga_barang']) ? "Rp. ".$iklan[0]['harga_barang'] : ucwords(str_replace("_"," ", $iklan[0]['jenis_iklan']))  ?></h2>
    </div>

    <div class="slide-barang">
      <div class="gambar-gambar" align="center">
        <?php $path_ff = base_url('images/post_foto_feature/'); ?>
        <img src="<?php echo (empty($iklan[0]['gambar_fitur'])) ? base_url('images/src_img_default/wide.jpg') : $path_ff.$iklan[0]['gambar_fitur']; ?>" class="img-responsive" alt="foto">
      </div>
    <?php
      $path_bd = base_url().'images/post_foto_ikl/';
      $explode_string = explode(',',$iklan[0]['gambar_barang']);
      rsort($explode_string);

      foreach ($explode_string as $slide_gambar): ?>
          <?php echo ($slide_gambar == '') ? '' : '<div class="gambar-gambar"><img src="'.$path_bd.$slide_gambar.'"  class="img-responsive" alt="foto"></div>' ?>
      <?php endforeach; ?>
      <a class="arah-kiri" onclick="plusDivs(-1)">&#10094;</a>
      <a class="arah-kanan" onclick="plusDivs(1)">&#10095;</a>
    </div>
    <div class="deskripsi-barang">
      <h3>Detail Barang</h3>
      <p><?php echo $iklan[0]['deskripsi_barang'] ?></p>
      <p>
        Hati-hati dengan penipuan. Bertemu langsung dengan penjual adalah cara aman berbelanja.
      </p>
    </div>
  </section>
  <aside class="iklan-barang">
    <div class="bungkus-penjual">
      <div class="foto-penjual">
        <img src="<?php echo $iklan[0]['user_picture'] == '' ? base_url().'images/gambar.jpg' : base_url().'images/user_iklan/'.$iklan[0]['user_picture'] ?>" class="img-responsive" alt="foto">
      </div>
      <div class="identitas-penjual">
        <!-- <h3>IDENTITAS DIRI : </h3> -->
        <h4><?php echo $iklan[0]['user_nama']; ?></h4>
        <h4><?php echo $iklan[0]['alamat_barang'] ?></h4>
        <h4><?php echo $iklan[0]['user_telpon'] ?></h4>
      </div>
      <!-- <div class="tombol-penjual">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pesan">Kirim Pesan</button>
      </div> -->
      <div class="modal fade" id="pesan" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Login</h4>
              </div>
              <div class="modal-body">
                  <input type="text" name="email" placeholder="Email">
                  <input type="text" name="password" placeholder="Password">
                  <button type="button" class="btn btn-primary">Masuk</button>
              </div>
              <div class="modal-footer">
                <h4>Belum Punya Akun ? Silahkan <a href="#">Mendaftar</a></h4>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
      </div>
      <div class="sosmed-penjual">
        <!-- <p>Bagikan :</p>
        <a href="#" title="Twitter">
          <img src="<?php echo base_url() ?>images/twitter.svg" alt="">
        </a>
        <a href="#" title="Facebook">
          <img src="<?php echo base_url() ?>images/facebook.svg" alt="">
        </a>
        <a href="#" title="Google+">
          <img src="<?php echo base_url() ?>images/google-plus.svg" alt="">
        </a> -->
        <p>Lihat Iklan lainnya <a href="#">disini</a></p>
      </div>
    </div>
    <div class="bungkus-detail">
      <div class="detail-kategori">
        <i class="fa fa-tags" aria-hidden="true"></i>
        <div class="kata">
          <p>Kategori</p>
          <p><a href="#"><?php echo $iklan[0]['nama_kategori'] ?></a></p>
        </div>
      </div>
      <div class="detail-waktu">
        <i class="fa fa-plus" aria-hidden="true"></i>
        <div class="kata">
          <p>Ditambahkan</p>
          <p><?php echo date('j M Y',strtotime($iklan[0]['barang_upload_tgl'])) ?></p>
        </div>
      </div>
      <div class="detail-lokasi">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <div class="kata">
          <p>Lokasi</p>
          <p><?php echo $iklan[0]['alamat_barang']?></p>
        </div>
      </div>
      <div class="detail-view">
        <i class="fa fa-eye" aria-hidden="true"></i>
        <div class="kata">
          <p>Views</p>
          <p><?php echo $viewer[0]['view_barang'] ?></p>
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
