  <!-- <h2 style="color:#ff9800;">IKLAN BARIS</h2> -->
  <div class="barang-dagang tab-content">
    <div id="load-first" class="tab-pane fade active in">
      <ul class="foto-dagangan" style="justify-content:center;">
        <?php $path_fitur = base_url('images/post_foto_feature/'); ?>
        <?php //$path_fitur = FCPATH.'images/post_foto_feature/'; ?>
        <?php foreach ($iklan as $iklan_baris) : ?>
            <li style="margin:0;margin-left:-1px;border-right:1px solid black;border-left:1px solid black;background:#d8d8d8;">
              <figcaption>
                <?php echo $iklan_baris['deskripsi_barang'] ?>
              </figcaption>
              <div class="label label-warning" style="bottom:15px;left:12px;position:absolute;" ><?php echo str_replace('_', ' ', $iklan_baris['jenis_iklan']) ?></div>
            </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
