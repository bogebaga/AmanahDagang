    <!-- <header>
      <img src="<?php echo base_url("images/footer-banner.jpg"); ?>" alt="banner iklan header">
    </header> -->
    <nav class="navbar navbar-default bgc-black border-none" role="navigation" style="margin:0;">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url(); ?>" style="display:table;">
            <!-- <img src="<?php echo base_url("images/logodepanamanah_crop.png") ?>" alt="amanahdagang.com website logo depan"> -->
            <img width="160px" src="<?php echo base_url("images/amanahstores_logo_FULL.png") ?>" alt="amanahstores.com website logo belakang">
          </a>
        </div>
      </div>
    </nav>
    <div class="container-fluid search-clr">
      <span>Semua Provinsi - <a href="<?php echo base_url("provinsi") ?>">Pilih Provinsi</a></span>
      <div style="margin-bottom:10px;">
      </div>
      <?php echo form_open(base_url("allresult_mobile")); ?>
        <input class="form-control" type="text" name="cari_barang" placeholder="Iklan disekitar kita" style="float:left;text-align:left;width:85%;">
        <button class="btn btn-primary" type="submit" style="float:right;background-color:#30e1cf;font-size:17px;width:14%;">Cari</button>
      <?php echo form_close(); ?>
    </div>
    <section class="container-fluid">
      <h4>List iklan</h4>
      <ul class="list-iklan">
        <?php $path_fitur = ONLINE_IMAGE.'images/post_foto_feature/'; ?>
        <?php //$path_fitur = FCPATH.'images/post_foto_feature/'; ?>
        <?php if ($iklan == NULL)
        {
          echo '<li class="item-iklan"><div style="width:100%;text-align:center">
            <img width="250px" src="'.base_url("images/not_found.png").'" alt="">
          </div></li>';
        } ?>
        <?php foreach ($iklan as $loadfirst) : ?>
          <li class="item-iklan">
            <a href="<?php echo "isiiklan/".$loadfirst['slug_nama_barang'] ?>"">
              <img src="<?php echo (empty($loadfirst['gambar_fitur'])) ? base_url("images/base.png") : $path_fitur.$this->welcome_mob->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($loadfirst['barang_upload_tgl']))).$loadfirst['gambar_fitur'] ?>" width="90px" height="90px" alt="">
              <div class="caption-iklan" style="width:70%;">
                <span class="jdl-iklan" ><?php echo $loadfirst['nama_barang'] ?></span>
                <span class="jam-iklan"><?php echo date('j M', strtotime($loadfirst['barang_upload_tgl'])) ?></span>
                <span class="harga-iklan" style="display:inline;"><?php echo (empty($loadfirst['harga_barang']) ? '' : "Rp. ".$loadfirst['harga_barang'])?></span>
                <span class="clearfix">
                <span class="kondisi" style="font-size:10px;margin-top:10px;float:right;"><span class="fa fa-archive"></span>
                  <?php echo ucwords($loadfirst['jenis_barang']); ?></span>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>
    <br>
