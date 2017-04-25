<div class="bungkus">
  <section class="detail-form">
    <h1>Pasang Iklan</h1>

    <?php echo form_open_multipart('pasangiklan/masuk');?>
      <div class="df">
        <h4>Judul Iklan</h4>
        <input type="text" name="nama_iklan" placeholder="Jual cepat barang yang sudah tidak dipakai..." required>
      </div>
      <div class="df">
        <h4>Kategori</h4>
        <select name="nama_kategori" id="kategori" required>
        <?php foreach ($kategori as $kategori_iklan) { ?>
          <option value="<?php echo $kategori_iklan['id_kategori']?>"><?php echo $kategori_iklan['nama_kategori'] ?></option>
        <?php } ?>
        </select>
      </div>
      <div class="df">
        <h4>Jenis Iklan</h4>
        <input type="radio" name="jenis_iklan" id="ji" value="iklan_baris" checked>
        <label for="ji">Iklan Baris</label>
        <input type="radio" name="jenis_iklan" id="ji1" value="iklan_foto">
        <label for="ji1">Iklan Favorit</label>
      </div>
      <div class="df">
        <h4>Jenis Barang</h4>
        <input type="radio" name="jenis_barang" id="jb" value="baru" checked>
        <label for="jb">Baru</label>
        <input type="radio" name="jenis_barang" id="jb1" value="bekas">
        <label for="jb1">Bekas</label>
      </div>
      <div class="df">
        <h4>Harga</h4>
        <input type="text" name="harga_iklan" id="harga_barang" placeholder="Harga Rupiah" required>
      </div>
      <script>
      $('#harga_barang').maskMoney({thousands:'.', decimal:',', precision:0});
      </script>
      <div class="df" style="position:relative;">
        <h4 style="position:absolute;">Deskripsi</h4>
        <div style="width:500px;margin-left:205px;">
          <textarea name="deskripsi_iklan" placeholder="Deskripsi" required></textarea>
        </div>
      </div>
      <!-- <div class="df">
        <h4>No Telp/HP</h4>
        <input type="tel" name="telpon" placeholder="08xxxxxxx">
      </div> -->
      <div class="df">
        <h4>Alamat</h4>
        <input type="text" name="alamat" placeholder="Tinggal dimana....." required>
      </div>
      <div class="df">
        <h4>Foto Fitur</h4>
        <label class="buf" style="position:relative;width:200px;height:100px;">
          <i class="fa fa-camera" aria-hidden="true" style="position:absolute;top:35px;left:80px;"></i>
          <img id="fitur_foto_name">
          <input type="file" name="fitur_foto_name" onchange='loadImage(this, this.name, 200, 100)' style="display:none;">
        </label>
      </div>
      <div class="df">
        <h4>Upload Foto</h4>
        <label class="buf" style="position:relative">
          <img id="image_1">
          <i class="fa fa-camera" aria-hidden="true" style="position:absolute"></i>
          <input type="file" name="image[]" onchange="loadImage(this, 'image_1', 83, 83 )" style="display:none;">
        </label>
        <label class="buf" style="position:relative">
          <i class="fa fa-camera" aria-hidden="true" style="position:absolute"></i>
          <img id="image_2">
          <input type="file" name="image[]" onchange="loadImage(this, 'image_2', 83, 83 )" style="display:none;">
        </label>
        <label class="buf" style="position:relative">
          <img id="image_3">
          <i class="fa fa-camera" aria-hidden="true" style="position:absolute"></i>
          <input type="file" name="image[]" onchange="loadImage(this, 'image_3', 83, 83 )" style="display:none;">
        </label>
        <label class="buf" style="position:relative">
          <img id="image_4">
          <i class="fa fa-camera" aria-hidden="true" style="position:absolute"></i>
          <input type="file" name="image[]" onchange="loadImage(this, 'image_4', 83, 83 )" style="display:none;">
        </label>
        <label class="buf" style="position:relative">
          <img id="image_5">
          <i class="fa fa-camera" aria-hidden="true" style="position:absolute"></i>
          <input type="file" name="image[]" onchange="loadImage(this, 'image_5', 83, 83 )" style="display:none;">
        </label>
        <label class="buf" style="position:relative">
          <img id="image_6">
          <i class="fa fa-camera" aria-hidden="true" style="position:absolute"></i>
          <input type="file" name="image[]" onchange="loadImage(this, 'image_6', 83, 83 )" style="display:none;">
        </label>
      </div>
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
      </script>
      <br>
      <button type="submit" name="submit" class="simpan btn btn-primary btn-lg">Pasang Iklan</button>
      <?php echo form_close();?>

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
