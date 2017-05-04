<div class="bungkus">
  <section class="detail-form">
    <h1>Edit Iklan</h1>

    <?php echo form_open_multipart('iklan/edit');?>
    <input type="hidden" name="kd_barang" value="<?php echo $slug_data->barang_kode; ?>">
      <div class="df">
        <h4>Judul Iklan</h4>
        <input type="text" name="nama_iklan" placeholder="Jual cepat barang yang sudah tidak dipakai..." value="<?php echo $slug_data->nama_barang ?>" required>
      </div>
      <div class="df">
        <h4>Kategori</h4>
        <select name="nama_kategori" id="kategori" required>
        <?php foreach ($kategori as $kategori_iklan) : ?>
          <?php if ($slug_data->id_kategori == $kategori_iklan['id_kategori']): ?>
            <option value="<?php echo $kategori_iklan['id_kategori']?>" selected><?php echo $kategori_iklan['nama_kategori'] ?></option>
          <?php else: ?>
            <option value="<?php echo $kategori_iklan['id_kategori']?>"><?php echo $kategori_iklan['nama_kategori'] ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
        </select>
      </div>
      <div class="df">
        <h4>Jenis Iklan</h4>
        <input type="radio" name="jenis_iklan" id="ji" value="iklan_baris" <?php echo ($slug_data->jenis_iklan == 'iklan_baris') ? 'checked' : '' ?>>
        <label for="ji">Iklan Baris</label>
        <input type="radio" name="jenis_iklan" id="ji1" value="iklan_foto" <?php echo ($slug_data->jenis_iklan == 'iklan_foto') ? 'checked' : '' ?>>
        <label for="ji1">Iklan Favorit</label>
      </div>
      <div class="df">
        <h4>Jenis Barang</h4>
        <input type="radio" name="jenis_barang" id="jb" value="baru" <?php echo ($slug_data->jenis_barang == 'baru') ? 'checked' : '' ?>>
        <label for="jb">Baru</label>
        <input type="radio" name="jenis_barang" id="jb1" value="bekas" <?php echo ($slug_data->jenis_barang == 'bekas') ? 'checked' : '' ?>>
        <label for="jb1">Bekas</label>
      </div>
      <div class="df">
        <h4>Harga</h4>
        <input type="text" name="harga_iklan" id="harga_barang" placeholder="Harga Rupiah" value="<?php echo $slug_data->harga_barang ?>" required>
      </div>
      <script>
        $('#harga_barang').maskMoney({thousands:'.', decimal: ',', precision:0});
      </script>
      <div class="df" style="position:relative;">
        <h4 style="position:absolute">Deskripsi</h4>
        <div style="width:500px;margin-left:205px;">
          <textarea name="deskripsi_iklan" placeholder="Deskripsi" data-mintext="10" data-maxtext="4000" required><?php echo $slug_data->deskripsi_barang ?></textarea>
        </div>
      </div>
      <!-- <div class="df">
        <h4>No Telp/HP</h4>
        <input type="tel" name="telpon" placeholder="08xxxxxxx">
      </div> -->
      <div class="df">
        <h4>Alamat</h4>
        <input type="text" name="alamat" placeholder="Tinggal dimana....." value="<?php echo $slug_data->alamat_barang ?>" required>
      </div>
      <div class="df">
        <h4>Foto Fitur</h4>
        <label class="buf" style="position:relative;width:200px;height:100px;">
          <i class="fa fa-camera" aria-hidden="true" style="position:absolute;top:35px;left:80px;"></i>
          <img id="fitur_foto_name" src="<?php echo base_url().'images/post_foto_feature/'.$slug_data->gambar_fitur?>" width="200" height="100">
          <input type="file" name="fitur_foto_name" onchange='loadImage(this, this.name, 200, 100)' style="display:none;">
        </label>
      </div>
      <div class="df">
        <h4>Upload Foto</h4>
        <?php $data_hasil_explode = explode(",", $slug_data->gambar_barang) ?>
        <?php foreach ($data_hasil_explode as $key => $value): ?>
          <label class="buf" style="position:relative">
            <img id="image_<?php echo $key+1 ?>" <?php echo ($value == '') ? '' : "src='".base_url('images/post_foto_ikl/'.$value)."'" ?> width="85" height="85">
            <i class="fa fa-camera" aria-hidden="true" style="position:absolute"></i>
            <input type="file" name="image[]" onchange="loadImage(this,'image_<?php echo $key+1?>', 85, 85)" image-role="<?php echo $key ?>" style="display:none;">
          </label>
        <?php endforeach; ?>
      <script>
      function loadImage(i, addr, w, h)
      {
        if (i.files && i.files[0])
        {
          var reader = new FileReader();

          reader.onload = function(e)
          {
            $('#'+addr).attr('src', e.target.result).width(w).height(h);
          }

          reader.readAsDataURL(i.files[0]);
        }
      }
      // function saveImage(e)
      // {
      //   var kd_img = $(e).attr('image-role');
      //   var nm_arr = $(e).val().split('\\');
      //   var path_nama = window.location.pathname.split('/');
      //   $.post('/path/to/file', {kd_img: kd_image, name : nm_arr, sl: path_nama});
      //   // console.log(kd_img);
      //   // console.log(nm_arr[2]);
      //   // console.log(path_nama[4]);
      // }
      </script>
      </div>
      <br>
      <button type="submit" name="submit" class="simpan btn btn-primary btn-lg">Simpan Iklan</button>
      <?php echo form_close();?>
      <br><br>
    <h1>Identitas Diri Anda | <a href="<?php echo base_url() ?>profil">Profil</a></h1>
    <form>
      <div class="df">
        <h4>Nama</h4>
        <input type="text" name="nama" placeholder="Nama" value="<?php echo $this->session->userdata('user_name') ?>">
      </div>

      <div class="df">
        <h4>Email</h4>
        <input type="email" name="email" placeholder="Email" value="<?php echo $this->session->userdata('user_email') ?>">
      </div>

      <div class="df">
        <h4>No. Handphone/Telp</h4>
        <input type="text" name="nomor" placeholder="08xxxx" value="<?php echo $this->session->userdata('user_telpon') ?>">
      </div>
    </form>

  </section>
  <aside class="iklan-barang">
    <div class="bungkus-info">
      <h3>Tips Pasang Iklan</h3>
      <ol>
        <li>Buka <a href="#">AmanahDagang</a></li>
        <li>Pasang Iklannya</li>
        <li>Tunggu pembelinya</li>
      </ol>
    </div>

    <div class="bungkus-iklan">
      <img src="<?php echo base_url(); ?>images/gambar.jpg" class="img-responsive" alt="iklan">
    </div>
  </aside>
</div>