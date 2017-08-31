    <!-- <header>
      <img src="<?php echo base_url("images/footer-banner.jpg"); ?>" alt="banner iklan header">
    </header> -->
    <nav class="navbar navbar-default bgc-black border-none" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('home/mobile-home'); ?>" style="display:table;">
            <!-- <img src="<?php echo base_url("images/logodepanamanah_crop.png") ?>" alt="amanahdagang.com website logo depan"> -->
            <img width="160px" src="<?php echo base_url("images/amanahstores_logo_FULL.png") ?>" alt="amanahstores.com website logo belakang">
          </a>
        </div>
      </div>
    </nav>
    <section class="container-fluid" style="background-color:white;padding:20px 10px;">
      <h4>Pasang Iklan</h4>
      <?php echo form_open_multipart(base_url('iklan')); ?>
        <label for="">Judul iklan<em class="required">*</em></label>
        <input class="form-control" type="text" name="nama_iklan" placeholder="Iklan apa yang kamu input" minlength="20" maxlength="70" required>
        <label for="">Kategori iklan<em class="required">*</em></label>
        <select class="form-control" name="nama_kategori" required>
          <?php foreach ($kategori as $key => $kategori_iklan): ?>
            <option value="<?php echo $kategori_iklan['id_kategori'] ?>"><?php echo $kategori_iklan['nama_kategori'] ?></option>
          <?php endforeach; ?>
        </select>
        <br>
        <label for="baru">Jenis Barang</label>
        <input id="baru" type="radio" name="ji" value="baru" checked>
        <label for="baru"> Baru</label>
        <input id="bekas" type="radio" name="ji" value="bekas">
        <label for="bekas" >Bekas</label>
        <!-- <label for="" style="display:block;"><input type="checkbox" name="nego" value="Nego"> Nego</label> -->
        <br>
        <label>Deskripsi <em class="required">*</em></label>
        <textarea class="form-control" name="deskripsi_iklan" rows="7" cols="80" style="text-align:left;" required></textarea>
        <label for="">Harga</label>
        <input id="harga_iklan" class="form-control" type="text" name="harga_iklan" placeholder="Harga iklan disini">
        <label>Nomor HP</label>
        <input class="form-control" type="tel" name="telpon" placeholder="08xxxxxxxxx">
        <label>Alamat</label>
        <input class="form-control" type="text" name="alamat" placeholder="Alamat barang">
        <label>Foto iklan 1<em class="required">*</em></label>
        <input type="file" name="foto_fitur_name" required>
        <label>Foto iklan 2</label>
        <input type="file" name="image[]">
        <label>Foto iklan 3</label>
        <input type="file" name="image[]">
        <label>Foto iklan 4</label>
        <input type="file" name="image[]">
        <label>Foto iklan 5</label>
        <input type="file" name="image[]">
        <label>Foto iklan 6</label>
        <input type="file" name="image[]">
        <label>Foto iklan 7</label>
        <input type="file" name="image[]">
        <?php $user = $this->user_model->get_user_profil($this->session->userdata('user_kd'))?>
        <h3 style="text-align:left;">Identitas Diri</h3>
        <label>Nama</label>
        <input class="form-control" type="text" name="name_sy" placeholder="Nama Lengkap" value="<?php echo $user['user_nama'] ?>">
        <label>Telepon</label>
        <input class="form-control" type="tel" name="telpon_sy" placeholder="08xxxxxxxxx" value="<?php echo $user['user_telpon'] ?>">
        <label>Alamat</label>
        <input class="form-control" type="text" name="alamat_sy" placeholder="Alamat Saya" value="<?php echo $user['user_alamat'] ?>">
        <div class="form-group">
  				<label class="pull-left">Regional </label>
  				<select class="form-control" name="provinsi" id="provinsi" style="margin-bottom:5px">
  					<option>Pilih Provinsi</option>
            <?php foreach ($this->iklan_model->get_data_provinsi() as $provinsi): ?>
              <?php if ($user['user_provinsi'] == $provinsi['id']): ?>
                <option value="<?php echo $provinsi['id'] ?>" selected><?php echo $provinsi['nama']; ?></option>
              <?php else: ?>
                <option value="<?php echo $provinsi['id'] ?>"><?php echo $provinsi['nama']; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
  				</select>
  				<select class="form-control" name="kabkota" id="kabkota" style="margin-bottom:5px">
  					<option>Pilih Kabupaten/Kota</option>
            <?php foreach ($this->iklan_model->get_data_kabkota($user['user_provinsi']) as $kota): ?>
              <?php if ($user['user_kota'] == $kota['id']): ?>
                <option value="<?php echo $kota['id'] ?>" selected><?php echo $kota['nama']; ?></option>
              <?php else: ?>
                <option value="<?php echo $kota['id'] ?>"><?php echo $kota['nama']; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
  				</select>
  				<select class="form-control" name="kecamatan" id="kecamatan">
  					<option>Pilih Kecamatan</option>
            <?php foreach ($this->iklan_model->get_data_kecamatan($user['user_kota']) as $kecamatan): ?>
              <?php if ($user['user_kecamatan'] == $kecamatan['id']): ?>
                <option value="<?php echo $kota['id'] ?>" selected><?php echo $kota['nama']; ?></option>
              <?php else: ?>
                <option value="<?php echo $kota['id'] ?>"><?php echo $kota['nama']; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
					</select>
				</div>
        <br>
        <button class="btn btn-success" type="submit" name="submit">Pasang</button>
        <?php echo form_close() ?>
    </section>
    <br>
