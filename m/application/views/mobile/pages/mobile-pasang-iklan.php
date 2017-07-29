    <header>
      <img src="<?php echo base_url("images/footer-banner.jpg"); ?>" alt="banner iklan header">
    </header>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid" style="padding-left:0;margin-left:-10px;">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('tron/home/mobile-home'); ?>">
            <img src="<?php echo base_url("images/logodepanamanah_crop.png") ?>" alt="amanahdagang.com website logo depan">
            <img src="<?php echo base_url("images/logoamanah.png") ?>" alt="amanahdagang.com website logo belakang">
          </a>
        </div>
      </div>
    </nav>
    <section class="container-fluid" style="background-color:white;padding:20px 10px;">
      <h4>Pasang Iklan</h4>
      <?php echo form_open('pasangiklan/masukki'); ?>
        <label for="">Judul iklan<em class="required">*</em></label>
        <input class="form-control" type="text" name="nama_iklan" placeholder="Iklan apa yang kamu input" required minlenght="20">
        <label for="">Kategori iklan<em class="required">*</em></label>
        <select class="form-control" name="nama_kategori" required>
          <?php foreach ($kategori as $key => $kategori_iklan): ?>
            <option value="<?php echo $kategori_iklan['id_kategori'] ?>"><?php echo $kategori_iklan['nama_kategori'] ?></option>
          <?php endforeach; ?>
        </select>
        <br>
        <label for="baru">Jenis Barang</label>
        <input id="baru" type="radio" name="ji" value="Baru" checked>
        <label for="baru"> Baru</label>
        <input id="bekas" type="radio" name="ji" value="Bekas">
        <label for="bekas" >Bekas</label>
        <!-- <label for="" style="display:block;"><input type="checkbox" name="nego" value="Nego"> Nego</label> -->
        <br>
        <label>Deskripsi <em class="required">*</em></label>
        <textarea class="form-control" name="deskripsi_iklan" rows="7" cols="80" required></textarea>
        <label>Alamat</label>
        <input class="form-control" type="text" name="alamat" placeholder="Alamat barang yang di iklan">
        <label>Telepon</label>
        <input class="form-control" type="tel" name="telpon" placeholder="08xxxxxxxxx">

        <label>Foto iklan 1<em class="required">*</em></label>
        <input type="file" name="fitur_foto_name" required>
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

        <label for="">Harga</label>
        <input class="form-control" type="text" name="harga_iklan" placeholder="Harga iklan">
        <br>
        <button class="btn btn-sm btn-primary" type="submit" name="button">Pasang</button>
      </form>
    </section>
    <br>
