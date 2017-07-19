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
      <form class="" action="index.html" method="post">
        <label for="">Judul iklan<em class="required">*</em></label>
        <input class="form-control" type="text" name="" placeholder="Iklan apa yang kamu input" required>
        <label for="">Kategori iklan<em class="required">*</em></label>
        <select class="form-control" name="" required>
          <option value="">Mobil</option>
          <option value="">Motor</option>
          <option value="">Properti</option>
        </select>
        <br>
        <label for="baru">Jenis Barang <em class="required">*</em></label>
        <input id="baru" type="radio" name="ji" value="Baru" checked>
        <label for="baru"> Baru</label>
        <input id="bekas" type="radio" name="ji" value="Bekas">
        <label for="bekas" >Bekas</label>
        <label for="" style="display:block;"><input type="checkbox" name="nego" value="Nego"> Nego</label>

        <label for="">Deskripsi <em class="required">*</em></label>
        <textarea class="form-control" name="name" rows="7" cols="80"></textarea>
        <label for="">Alamat</label>
        <input class="form-control" type="text" name="" placeholder="Alamat barang yang di iklan">

        <label for="">Foto iklan 1<em class="required">*</em></label>
        <input type="file" name="foto_fitur" required>
        <label for="">Foto iklan 2</label>
        <input type="file" name="image[]">
        <label for="">Foto iklan 3</label>
        <input type="file" name="image[]">
        <label for="">Foto iklan 4</label>
        <input type="file" name="image[]">
        <label for="">Foto iklan 5</label>
        <input type="file" name="image[]">
        <label for="">Foto iklan 6</label>
        <input type="file" name="image[]">
        <label for="">Foto iklan 7</label>
        <input type="file" name="image[]">

        <label for="">Harga</label>
        <input class="form-control" type="text" name="" placeholder="Harga iklan">
        <br>
        <button class="btn btn-sm btn-primary" type="submit" name="button">Pasang</button>
      </form>
    </section>
    <br>
