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
  <div class="search-container">
    <div style="height:50px;width:100%;"> </div>
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
      <ul class="foto-dagangan" style="padding:20px 10px">
        <table class="table-search">
          <tbody>
            <?php $path_fitur = "images/post_foto_feature/"; ?>
            <?php foreach ($this->iklan_model->get_all_iklan('','publish','iklan_baris') as $value): ?>
              <tr>
                <td>
                  <table width="100%" cellspacing="0" cellpadding="0">
                    <td width="100" align="center">
                      <p><?php echo date('j M', strtotime($value['barang_upload_tgl'])) ?></p>
                    </td>
                    <td width="170" style="padding:5px 0;">
                      <div class="">
                        <a href="<?php echo base_url("barang/".$value['slug_nama_barang']) ?>">
                          <img width="85px" src="<?php echo (empty($value['gambar_fitur'])) ? base_url('images/base.png') : $path_fitur.$this->beranda->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($value['barang_upload_tgl']))).$value['gambar_fitur'] ?>" alt="<?php echo $value['nama_barang'] ?>" title="<?php echo $value['nama_barang'] ?>">
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
      </ul>
    </div>
  </div>
  <div class="iklan-lebar">
    <!-- <img src="<?php echo base_url('images/iklan.jpg'); ?>" alt=""> -->
    <img src="<?php echo base_url("images/footer-banner.jpg") ?>" alt="amanahstores.com - promo pasang iklan">
  </div>
</section>
