<section class="wrapper" style="margin-top:90px;">
  <!-- <h2 style="color:#ff9800;">IKLAN BARIS</h2> -->
  <img width="500px" src="<?php echo base_url('images/iklan_baris.png'); ?>" alt="">
  <div class="menu-bawah" style="margin-top:15px;">
    <ul class="nav nav-tabs">
      <?php foreach ($kategori as $data_kategori): ?>
        <li>
          <a data-toggle="tab" href="#<?php echo strtolower($data_kategori['nama_kategori']) ?>"><?php echo str_replace('-', ' ', $data_kategori['nama_kategori']) ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <div class="barang-dagang tab-content">
    <div id="load-first" class="tab-pane fade active in">
      <ul class="foto-dagangan">
        <?php $path_fitur = base_url('images/post_foto_feature/'); ?>
        <?php //$path_fitur = FCPATH.'images/post_foto_feature/'; ?>
        <?php foreach ($iklan as $iklan_baris) : ?>
            <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
              <figcaption>
                <?php echo $iklan_baris['deskripsi_barang'] ?>
              </figcaption>
              <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $iklan_baris['jenis_iklan']) ?></div>
            </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div id="mobil" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan_baris('Mobil') as $mobil) { ?>
          <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
            <figcaption>
              <?php echo $mobil['deskripsi_barang'] ?>
            </figcaption>
            <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $mobil['jenis_iklan']) ?></div>
          </li>
        <?php } ?>
      </ul>
    </div>

    <div id="motor" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan_baris('Motor') as $motor) { ?>
          <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
            <figcaption>
              <?php echo $motor['deskripsi_barang'] ?>
            </figcaption>
            <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $motor['jenis_iklan']) ?></div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="properti" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan_baris('Properti') as $properti) { ?>
          <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
            <figcaption>
              <?php echo $properti['deskripsi_barang'] ?>
            </figcaption>
            <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $properti['jenis_iklan']) ?></div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="fashion" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan_baris('Fashion') as $fashion) { ?>
          <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
            <figcaption>
              <?php echo $fashion['deskripsi_barang'] ?>
            </figcaption>
            <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $fashion['jenis_iklan']) ?></div>
          </li>
          <?php } ?>
      </ul>
    </div>
    <div id="handphone" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan_baris('Handphone') as $handphone) { ?>
          <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
            <figcaption>
              <?php echo $handphone['deskripsi_barang'] ?>
            </figcaption>
            <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $handphone['jenis_iklan']) ?></div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="komputer" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan_baris('Komputer') as $komputer) { ?>
          <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
            <figcaption>
              <?php echo $komputer['deskripsi_barang'] ?>
            </figcaption>
            <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $komputer['jenis_iklan']) ?></div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="travel" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan_baris('Travel') as $travel) { ?>
          <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
            <figcaption>
              <?php echo $travel['deskripsi_barang'] ?>
            </figcaption>
            <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $travel['jenis_iklan']) ?></div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="kitchen" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan_baris('Kitchen') as $kitchen) { ?>
          <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
            <figcaption>
              <?php echo $kitchen['deskripsi_barang'] ?>
            </figcaption>
            <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $kitchen['jenis_iklan']) ?></div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="kesehatan" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan_baris('Kesehatan') as $kesehatan) { ?>
          <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
            <figcaption>
              <?php echo $kesehatan['deskripsi_barang'] ?>
            </figcaption>
            <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $kesehatan['jenis_iklan']) ?></div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="makanan" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan_baris('Makanan') as $makanan) { ?>
          <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
            <figcaption>
              <?php echo $makanan['deskripsi_barang'] ?>
            </figcaption>
            <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $makanan['jenis_iklan']) ?></div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="lainnya" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan_baris('Lainnya') as $lainnya) { ?>
          <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
            <figcaption>
              <?php echo $lainnya['deskripsi_barang'] ?>
            </figcaption>
            <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $lainnya['jenis_iklan']) ?></div>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div id="lowongan-kerja" class="tab-pane fade">
      <ul class="foto-dagangan">
        <?php foreach ($this->iklan_model->get_all_iklan_baris('Lowongan-Kerja') as $lowongan_kerja) { ?>
          <li class="line" style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
            <figcaption>
              <?php echo $lowongan_kerja['deskripsi_barang'] ?>
            </figcaption>
            <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $lowongan_kerja['jenis_iklan']) ?></div>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="iklan-lebar">
    <img src="images/iklan.jpg" alt="">
  </div>
</section>
