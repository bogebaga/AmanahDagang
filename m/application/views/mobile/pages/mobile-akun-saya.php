    <!-- <header>
      <img src="<?php echo base_url("images/footer-banner.jpg"); ?>" alt="banner iklan header">
    </header> -->
    <nav class="navbar navbar-default border-none bgc-black " role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('home/mobile-home'); ?>" style="display:table;">
            <!-- <img src="<?php echo base_url("images/logodepanamanah_crop.png") ?>" alt="amanahdagang.com website logo depan"> -->
            <img width="160px" src="<?php echo base_url("images/amanahstores_logo_FULL.png") ?>" alt="amanahstores.com website logo belakang">
          </a>
        </div>
      </div>
    </nav>
    <section class="container-fluid text-left" style="background-color:white;padding:20px 10px;">
      <h4><b>Iklan</b></h4>
      <a data-toggle="collapse" href="#iklan_collapse"><u>Non-aktif (<?php echo count($this->iklan_model->get_all_iklan('', '', 'iklan_baris', $this->session->userdata('user_kd'))) ?>)</u></a>
      <br>
      <div class="collapse" id="iklan_collapse">
        <ul class="list-iklan">
          <?php foreach ($this->iklan_model->get_all_iklan('', '', 'iklan_baris', $this->session->userdata('user_kd')) as $iklan): ?>
            <li class="item-iklan">
              <div class="caption-iklan text-left">
                <a href=<?php echo base_url("isiiklan/".$iklan['slug_nama_barang']) ?>>
                  <strong class="text-left" style="display:block;word-wrap:break-word;"><?php echo $iklan['nama_barang'] ?></strong>
                </a>
                <!-- <span class="jdl-iklan" >Jual mobil1 ferrari red </span> -->
                <span class="jam-iklan"><?php echo date('j M', strtotime($iklan['barang_upload_tgl']))?></span>
                <p class="text-left">
                  <small style="margin-right:6px">Dilihat : <?php echo $iklan['view_barang'] ?></small>
                  <small>Telepon : 0</small>
                </p>
                <p>
                  <small style="margin-right:6px;visibility:hidden;">Tidak ada pesan </small>
                  <small><a class="btn btn-xs btn-warning" href="#">Edit iklan</a></small>
                  <small><a class="btn btn-xs btn-danger" href="#">Hapus iklan</a></small>
                </p>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <p class="text-left">Anda tidak memiliki iklan aktif sekarang</p>
      <br>
      <a class="btn btn-sm btn-success" href="<?php echo base_url('home/mobile-pasang-iklan') ?>">Pasang Iklan</a>
    </section>
    <section style="height:calc(100vh - 471px);"></section>
    <br>
