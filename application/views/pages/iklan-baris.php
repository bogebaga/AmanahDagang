<section class="wrapper" style="margin-top:80px;">
  <!-- <h2 style="color:#ff9800;">IKLAN BARIS</h2> -->
  <img width="100%" src="<?php echo base_url('images/iklan baris fix.jpg'); ?>">
  <div class="menu-bawah" style="margin-top:15px;">
    <ul class="nav nav-tabs">
      <?php foreach ($kategori as $data_kategori): ?>
        <li class="<?php echo strtolower(url_title($data_kategori['nama_kategori']), '-', TRUE) == $args ? 'active' : '' ?>">
          <!-- <a data-toggle="tab" href="#<?php echo strtolower($data_kategori['nama_kategori']) ?>"><?php echo str_replace('-', ' ', $data_kategori['nama_kategori']) ?></a> -->
          <a href="<?php echo '../'.strtolower(url_title($data_kategori['nama_kategori']), '-', TRUE).'/iklanbaris' ?>"><?php echo str_replace('-', ' ', $data_kategori['nama_kategori']) ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="barang-dagang tab-content">
    <div id="load-first" class="tab-pane fade active in">
      <ul class="foto-dagangan grid" data-layout="iklan_baris">
        <?php $path_fitur = base_url('images/post_foto_feature/'); ?>
        <?php if ($iklan == NULL):
          echo '<div class="grid-item" style="width:100%;text-align:center">
                  <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
                </div>';
          endif;
        ?>
        <?php //$path_fitur = FCPATH.'images/post_foto_feature/'; ?>
        <?php foreach ($iklan as $iklan_baris) : ?>
            <li class="line grid-item">
              <figcaption>
                <?php echo $iklan_baris['deskripsi_barang'] ?>
              </figcaption>
              <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $iklan_baris['jenis_iklan']) ?></div>
            </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <!-- <?php foreach ($this->iklan_model->get_kategori() as $kategori): ?>
      <div id="<?php echo lcfirst($kategori['nama_kategori']) ?>" class="tab-pane fade">
        <ul class="foto-dagangan grid" data-layout="iklan_baris">
          <?php if ($this->iklan_model->get_all_iklan_baris($kategori['nama_kategori']) == NULL):
            # code...
            echo '<div style="width:100%;text-align:center">
            <img width="480px" src="'.base_url("images/not_found.png").'" alt="">
            </div>';
          endif;
          foreach ($this->iklan_model->get_all_iklan_baris($kategori['nama_kategori']) as $value) : ?>
            <li class="line grid-item">
              <figcaption>
                <?php echo $value['deskripsi_barang'] ?>
              </figcaption>
              <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $value['jenis_iklan']) ?></div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?> -->
  </div>
  <div class="iklan-lebar">
    <img src="<?php echo base_url('images/footer-banner.jpg') ?>" alt="">
  </div>
</section>
