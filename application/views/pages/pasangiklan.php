<div class="bungkus">
  <section class="detail-form">
    <h1>Pasang Iklan</h1>
      <div class="df">
        <?php echo $this->session->flashdata('success') ?>
      </div>
    <?php echo form_open_multipart('pasangiklan/masukki');?>
      <div class="df" style="background-color: #eceff1;" ?>
        <h4 style="visibility:hidden;">Jenis Iklan</h4>
        <input type="radio" name="jenis_iklan" id="ji2" value="iklan" style="color:#F44336;" checked>
        <label for="ji2">IKLAN</label>
        <input type="radio" name="jenis_iklan" id="ji" value="iklan_baris">
        <label for="ji" style="color:#FFC107;">IKLAN BARIS</label>
        <input type="radio" name="jenis_iklan" id="ji1" value="iklan_foto">
        <label for="ji1" style="color:#4CAF50;">IKLAN FAVORIT</label>
      </div>
      <div id="ads-iklan" class="alert alert-info" role="alert">
        <b>Perhatian!</b> Isi field dengan informasi iklan yang menarik.
      </div>
      <div id="ads-iklan-baris" class="alert alert-warning none" role="alert">
        <b>Perhatian!</b> Hanya data dengan kotak berwarna <u>kuning</u> yang dapat di inputkan.
      </div>
      <div id="ads-iklan-fav" class="alert alert-success none" role="alert">
        <b>Perhatian!</b> Hanya data dengan kotak berwarna <u>hijau</u> yang dapat di inputkan.
      </div>
      <div class="df">
        <h4>Judul Iklan</h4>
        <input type="text" name="nama_iklan" placeholder="Jual cepat barang yang sudah tidak dipakai..." minlength="20" maxlength="70" required>
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
        <h4>Jenis Barang</h4>
        <input type="radio" name="jenis_barang" id="jb" value="baru" checked>
        <label for="jb">Baru</label>
        <input type="radio" name="jenis_barang" id="jb1" value="bekas">
        <label for="jb1">Bekas</label>
      </div>
      <div class="df" style="position:relative;">
        <h4 style="position:absolute;">Deskripsi</h4>
        <div rule="deskripsi-iklan" style="width:500px;margin-left:205px;">
          <textarea name="deskripsi_iklan"></textarea>
        </div>
      </div>
      <!-- <div class="df">
        <h4>Alamat Barang</h4>
        <input type="text" name="alamat" placeholder="Alamat" required>
      </div>
      <div class="df">
        <h4>Nomor HP</h4>
        <input type="text" name="telpon" placeholder="08xxxxxxx">
      </div> -->
      <div class="df">
        <h4>Harga</h4>
        <input type="text" name="harga_iklan" id="harga_barang" placeholder="Harga Rupiah">
      </div>
      <div class="df">
        <h4>Foto Fitur</h4>
        <label class="buf" id="gmbr-ftr1" style="position:relative;width:200px;height:100px;">
          <i class="fa fa-eye" aria-hidden="true" style="position:absolute;top:35px;left:80px;"></i>
          <img id="fitur_foto_name">
          <input type="file" name="fitur_foto_name" onchange="loadImage(this,'fitur_foto_name', 200, 100)" style="display:none;">
        </label>
      </div>
      <div class="df">
        <h4>Upload Foto</h4>
        <label class="buf" style="position:relative">
          <img id="image_1">
          <i class="fa fa-eye" aria-hidden="true" style="position:absolute"></i>
          <input type="file" name="image[]" onchange="loadImage(this, 'image_1', 83, 83 )" style="display:none;">
        </label>
        <label class="buf" style="position:relative">
          <i class="fa fa-eye" aria-hidden="true" style="position:absolute"></i>
          <img id="image_2">
          <input type="file" name="image[]" onchange="loadImage(this, 'image_2', 83, 83 )" style="display:none;">
        </label>
        <label class="buf" style="position:relative">
          <img id="image_3">
          <i class="fa fa-eye" aria-hidden="true" style="position:absolute"></i>
          <input type="file" name="image[]" onchange="loadImage(this, 'image_3', 83, 83 )" style="display:none;">
        </label>
        <label class="buf" style="position:relative">
          <img id="image_4">
          <i class="fa fa-eye" aria-hidden="true" style="position:absolute"></i>
          <input type="file" name="image[]" onchange="loadImage(this, 'image_4', 83, 83 )" style="display:none;">
        </label>
        <label class="buf" style="position:relative">
          <img id="image_5">
          <i class="fa fa-eye" aria-hidden="true" style="position:absolute"></i>
          <input type="file" name="image[]" onchange="loadImage(this, 'image_5', 83, 83 )" style="display:none;">
        </label>
        <label class="buf" style="position:relative">
          <img id="image_6">
          <i class="fa fa-eye" aria-hidden="true" style="position:absolute"></i>
          <input type="file" name="image[]" onchange="loadImage(this, 'image_6', 83, 83 )" style="display:none;">
        </label>
      </div>
      <h2>Identitas Diri</h2>
      <?php $data_user_pasang = $this->user_model->get_user_profil($this->session->userdata('user_kd')) ?>
        <div class="df">
          <h4>Nama</h4>
          <input type="text" name="identitas_nama" placeholder="Nama" value="<?php echo $data_user_pasang['user_nama'] ?>">
        </div>
        <div class="df">
          <h4>Email</h4>
          <input type="text" value="<?php echo $data_user_pasang['user_email'] ?>"disabled>
        </div>
        <div class="df">
          <h4>No Telp/HP</h4>
          <input type="text" name="identitas_telpon" placeholder="08xxxxxxx" value="<?php echo $data_user_pasang['user_telpon'] ?>">
        </div>
        <div class="df">
          <h4>Regional</h4>
          <select name="provinsi" id="provinsi" required>
            <option value="">Pilih Provinsi</option>
            <?php foreach ($this->iklan_model->get_data_provinsi() as $provinsi): ?>
              <?php if ($provinsi['id'] == $data_user_pasang['user_provinsi']): ?>
                  <option value="<?php echo $provinsi['id'] ?>" selected><?php echo $provinsi['nama'] ?></option>
              <?php else: ?>
                  <option value="<?php echo $provinsi['id'] ?>"><?php echo $provinsi['nama'] ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
          <h4 style="visibility:hidden;">Kategori</h4>
          <select name="kota" id="kabkota" required>
            <option>Pilih Kabupaten/Kota</option>
            <?php foreach ($this->iklan_model->get_data_kabkota($data_user_pasang['user_provinsi']) as $kota): ?>
              <?php if ($data_user_pasang['user_kota'] == $kota['id']): ?>
                <option value="<?php echo $kota['id'] ?>" selected><?php echo $kota['nama'] ?></option>
              <?php else: ?>
                <option value="<?php echo $kota['id'] ?>" ><?php echo $kota['nama'] ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
          <h4 style="visibility:hidden;">Kategori</h4>
          <select id="kecamatan" name="kecamatan" required>
            <option>Pilih Kecamatan</option>
            <?php foreach ($this->iklan_model->get_data_kecamatan($data_user_pasang['user_kota']) as $kecamatan): ?>
              <?php if ($kecamatan['id'] == $data_user_pasang['user_kecamatan']): ?>
                <option value="<?php echo $kecamatan['id'] ?>" selected><?php echo $kecamatan['nama'] ?></option>
              <?php else: ?>
                <option value="<?php echo $kecamatan['id'] ?>" ><?php echo $kecamatan['nama'] ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="df">
          <h4>Alamat</h4>
          <input type="text" name="identitas_alamat" placeholder="Alamat" value="<?php echo $data_user_pasang['user_alamat'] ?>" required>
        </div>
      <script>
        $("#ji").click(function(){
          $("#ads-iklan-baris").removeClass("none");
          $("#ads-iklan, #ads-iklan-fav").addClass("none");
          $("[name='nama_iklan'], [name='nama_kategori'], [name='nama_kategori'], [name='alamat'], [name='harga_iklan'], [rule='deskripsi-iklan'], #gmbr-ftr1").removeClass();
          $("[name='nama_iklan'], [name='nama_kategori'], [name='alamat'], [rule='deskripsi-iklan']").addClass('style-iklan-baris');
          $("#gmbr-ftr1").addClass("buf");
        });
        $("#ji1").click(function(){
          $("#ads-iklan-fav").removeClass("none");
          $("#ads-iklan, #ads-iklan-baris").addClass("none");
          $("[name='nama_iklan'], [name='nama_kategori'], [name='nama_kategori'], [name='alamat'], [rule='deskripsi-iklan'], #gmbr-ftr1").removeClass();
          $("#gmbr-ftr1").addClass("buf");
          $("[name='nama_iklan'], [name='harga_iklan'], [name='nama_kategori'], [name='alamat'], #gmbr-ftr1, [rule='deskripsi-iklan']").addClass('style-iklan-fav');
        });
        $("#ji2").click(function(){
          $("#ads-iklan").removeClass("none");
          $("#ads-iklan-fav, #ads-iklan-baris").addClass("none");
          $("[name='nama_iklan'], [name='harga_iklan'], [name='nama_kategori'], [name='alamat'], [rule='deskripsi-iklan'], #gmbr-ftr1").removeClass();
          $("#gmbr-ftr1").addClass("buf");
        });
      </script>
      <br>
      <button type="submit" name="submit" class="simpan btn btn-success btn-lg">Pasang Iklan</button>
      <?php echo form_close();?>
  </section>
  <!-- <aside class="iklan-barang">
    <div class="bungkus-info" style="display:none;">
      <h3>Tips Pasang Iklan</h3>
      <ol>
        <li>Buka <a href="#">AmanahDagang</a></li>
        <li>Pasang Iklannya</li>
        <li>Tunggu pembelinya</li>
      </ol>
    </div>
    <div class="bungkus-iklan1">
      <img src="<?php echo base_url("images/gambar.jpg");?>" class="img-responsive" alt="iklan">
    </div>
  </aside> -->
</div>
