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
        <img src="<?php echo (empty($iklan['gambar_fitur'])) ? base_url('images/src_img_default/wide.jpg') : $path_ff.$iklan['gambar_fitur']; ?>" class="img-responsive" alt="<?php echo $iklan['nama_barang'] ?>" title="<?php echo $iklan['nama_barang'] ?>">
      </div>
    <?php
      $path_bd = base_url().'images/post_foto_ikl/';
      $explode_string = explode(',',$iklan['gambar_barang']);
      // rsort($explode_string);
      foreach ($explode_string as $slide_gambar): ?>
          <?php echo ($slide_gambar == '') ? '' : '<div class="gambar-gambar" align="center"><img src="'.$path_bd.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($iklan['barang_upload_tgl']))).$iklan['slug_nama_barang'].'/'.$slide_gambar.'"  class="img-responsive" alt="'.$iklan['nama_barang'].'" title="'.$iklan['nama_barang'].'"></div>' ?>
      <?php endforeach; ?>
      <a class="arah-kiri" onclick="plusDivs(-1)"><i class="fa fa-3x fa-angle-left"></i></a>
      <a class="arah-kanan" onclick="plusDivs(1)"><i class="fa fa-3x fa-angle-right"></i></a>
    </div>
    <div class="sosmed-penjual dashed">
      <div style="border:0;font-size:18px;padding:16px;display:inline-block">SHARE</div>
      <a class="btn btn-primary btn-lg" href="http://www.facebook.com/share.php?u=<?php echo base_url('barang/'.$iklan['slug_nama_barang']) ?>&amp;title=<?php $iklan['nama_barang']?>" onclick="window.open(this.href,'amanahstores.com share on Facebook','width=620px, height=480px')" target="_blank" title="Facebook"><span class="fa fa-facebook"></span></a>
      <a href="http://plus.google.com/share?url=<?php echo base_url('barang/'.$iklan['slug_nama_barang']) ?>" class="btn btn-danger btn-lg" title="Google+" onclick="window.open(this.href,'amanahstores.com share on Google+','width=620px, height=480px')" target="_blank"><span class="fa fa-google-plus"></span></a>
      <a href="https://twitter.com/intent/tweet?text=<?php echo $iklan['nama_barang']?>&amp;url=<?php echo base_url('barang/'.$iklan['slug_nama_barang']) ?>" class="btn btn-primary btn-lg" title="Twitter"><span class="fa fa-twitter"></span></a>
    </div>
    <div class="deskripsi-barang">
      <h3 style="margin-top:7px;">Detail Barang</h3>
      <p><?php echo $iklan['deskripsi_barang'] ?></p>
      <div class="belanja-aman">
        Hati-hati dengan penipuan. Bertemu langsung dengan penjual adalah cara aman berbelanja.
      </div>
    </div>
    <br>
    <ol class="breadcrumb" style="margin:auto;">
      <div style="display:inline-block">
        <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Sebelumya
      </div>
      <div class="pull-right" style="display:inline-block">
        Selanjutnya&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
      </div>
    </ol>
  </section>
  <aside class="iklan-barang">
    <div class="bungkus-penjual">
      <div class="foto-penjual">
        <img src="<?php echo $iklan['user_picture'] == '' ? base_url().'images/gambar.jpg' : base_url('images/user_iklan/'.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($user['user_add']))).$iklan['user_picture']) ?>" class="img-responsive" alt="foto">
      </div>
      <div class="identitas-penjual">
        <!-- <h3>IDENTITAS DIRI : </h3> -->
        <h4><?php echo $iklan['user_nama']; ?></h4>
        <h4><?php echo $iklan['alamat_barang'] ?></h4>
        <!-- <h4><?php echo $iklan['user_telpon'] ?></h4> -->
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
        <a href="#" data-toggle="popover" data-content="<?php echo $iklan['user_telpon'] ?>" data-placement="bottom" title="Nomor Handphone" class="btn btn-success btn-lg" title="handphone"><span class="fa fa-2x fa-phone"></span></a>
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
      <!-- <div class="detail-lokasi">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <div class="kata">
          <p>Lokasi</p>
          <p><?php echo $iklan['alamat_barang']?></p>
        </div>
      </div> -->
      <div class="detail-waktu">
        <i class="fa fa-plus" aria-hidden="true"></i>
        <div class="kata">
          <p>Ditambahkan</p>
          <p><?php echo date('j M Y',strtotime($iklan['barang_upload_tgl'])) ?></p>
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
    <!-- <div class="bungkus-detail">
      tes aja
    </div> -->
    <!-- <div class="bungkus-iklan">
      <img src="<?php echo base_url("images/gambar.jpg")?>" class="img-responsive" alt="iklan">
    </div> -->
  </aside>
  <section class="detail-barang" style="margin-top:0;">
    <div class="detail-lokasi" style="display:flex;align-items:center;flex-direction:row;justify-content:space-between;">
      <div class="kata">
        <i class="fa fa-map-marker fa-2x" aria-hidden="true" style="color:#CE6161"></i>
        <span style="font-size:3ex;margin-left:10px;">Lokasi</span>
      </div>
      <div class="kata">
        <p style="font-size:2ex;max-width:500px;word-wrap:break-word;"><?php echo $iklan['alamat_barang']?></p>
      </div>
    </div>
  </section>
  <?php $user_data = $this->user_model->get_user_profil($iklan['user_kode']); ?>
  <?php if ($this->iklan_model->get_all_iklan_limit('publish', $iklan['user_kode'])): ?>
    <section class="detail-barang" style="margin-top:0;padding:0;background-color:transparent;box-shadow:none;">
      <div class="panel panel-default" style="margin-bottom:0;">
        <div class="panel-heading">
          <h4 class="pull-left">Lihat lagi dari <?php echo $user_data['user_nama'] ?> </h4>
          <h5 class="pull-right"><a href="#">Semua iklan dari pedagang ini</a></h5>
        <div class="clearfix"></div>
        </div>
        <div class="panel-body">
          <table class="table-search">
            <tbody>
              <?php $path_fitur = "images/post_foto_feature/"; ?>
              <?php foreach ($this->iklan_model->get_all_iklan_limit('publish',$iklan['user_kode'],'3') as $value): ?>
                <tr>
                  <td>
                    <table width="100%" cellspacing="0" cellpadding="0">
                      <td width="100" align="center">
                        <p><?php echo date('j M', strtotime($value['barang_upload_tgl'])) ?></p>
                      </td>
                      <td width="170" style="padding:5px 0;">
                        <div class="">
                          <a href="<?php echo base_url("barang/".$value['slug_nama_barang']) ?>">
                            <img width="85px" src="<?php echo (empty($value['gambar_fitur'])) ? base_url('images/base.png') : base_url($path_fitur.$this->proses->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($value['barang_upload_tgl']))).$value['gambar_fitur']) ?>" alt="<?php echo $value['nama_barang'] ?>" title="<?php echo $value["nama_barang"]; ?>">
                          </a>
                        </div>
                      </td>
                      <td width="600">
                        <h4 style="text-align:left;margin-top:10px"><a href="<?php echo base_url("barang/".$value['slug_nama_barang']) ?>"><?php echo $value['nama_barang'] ?></a></h4>
                        <small><?php echo $value['jenis_barang'] ?></small>
                        <p> Kota Makassar </p>
                      </td>
                      <td align="right" width="170" style="padding-right:10px;">
                        <p><?php echo (empty($value['harga_barang']) ? '<div></div>' : "Rp. ".$value['harga_barang'])?></p>
                        <small><b>Nego</b></small>
                      </td>
                    </table>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="panel-footer"><h3 style="text-align:center;">Tampilkan Iklan <a href="#"><?php echo $iklan['user_nama'] ?></a></h3></div>
      </div>
    </section>
  <?php endif; ?>
  <section class="detail-barang" style="margin-top:0;">
    <div class="fb-comments" data-href="<?php echo current_url(); ?>" data-width="100%" data-numposts="10"></div>
  </section>
</div>
