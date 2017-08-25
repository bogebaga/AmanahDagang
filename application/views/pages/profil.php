<section>
  <?php echo form_open_multipart('edit', '', ['uplusr' => $data_user['user_add']]); ?>
  <div  class="detail-biodata">
    <div class="dua">
      <?php echo $this->session->flashdata('success_user') ?>
    </div>
    <div class="dua">
      <div class="user-container" style="margin-bottom:30px;text-align:center;">
        <label for="foto_user">
          <?php if (empty($data_user['user_picture'])): ?>
            <img id="user_picture_0" src="images/gambar.jpg" width="200px">
          <?php else: ?>
            <?php if (!file_exists(FCPATH."images/user_iklan/".$this->beranda->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($data_user['user_add']))).$data_user['user_picture'])): ?>
              <img id="user_picture_0" src="images/gambar.jpg" width="200px">
            <?php endif; ?>
            <img id="user_picture_0" src="<?php echo base_url("images/user_iklan/".$this->beranda->tanggal_indonesia_convert(date('Y-m-d-N', strtotime($data_user['user_add']))).$data_user['user_picture']) ?>" width="200px">
          <?php endif; ?>
        </label>
        <h4><?php echo $data_user['user_nama'] ?></h4>
        <h4>Makassar</h4>
      </div>
      <div class="col-xs-6">
        <label for="" class="label-control">Provinsi</label>
        <select class="form-control" name="provinsi" id="provinsi">
          <?php foreach ($data_provinsi as $provinsi): ?>
            <?php if ($data_user['user_provinsi'] == $provinsi['id']): ?>
              <option value="<?php echo $provinsi['id'] ?>" selected><?php echo $provinsi['nama'] ?></option>
            <?php continue; ?>
            <?php endif; ?>
              <option value="<?php echo $provinsi['id'] ?>"><?php echo $provinsi['nama']  ?></option>
          <?php endforeach; ?>
        </select>
        <label for="" class="label-control">Kabupaten/Kota</label>
        <select class="form-control" name="kota" id="kabkota">
        <?php $data_kabkota = $this->iklan_model->get_data_kabkota($data_user['user_provinsi']) ?>
        <?php foreach ($data_kabkota as $kota): ?>
          <?php if ($data_user['user_kota'] == $kota['id']): ?>
            <option value="<?php echo $kota['id'] ?>" selected><?php echo $kota['nama'] ?></option>
          <?php continue; ?>
          <?php endif; ?>
            <option value="<?php echo $kota['id'] ?>"><?php echo $kota['nama'] ?></option>
        <?php endforeach; ?>
        </select>
        <label for="" class="label-control">Kecamatan</label>
        <select class="form-control" name="kecamatan" id="kecamatan">
        <?php $data_kecamatan= $this->iklan_model->get_data_kecamatan($data_user['user_kota']) ?>
        <?php foreach ($data_kecamatan as $kecamatan): ?>
          <?php if ($data_user['user_kecamatan'] == $kecamatan['id']): ?>
            <option value="<?php echo $kecamatan['id'] ?>" selected><?php echo $kecamatan['nama'] ?></option>
          <?php continue; ?>
          <?php endif; ?>
            <option value="<?php echo $kecamatan['id'] ?>"><?php echo $kecamatan['nama'] ?></option>
        <?php endforeach; ?>
        </select>
        <label class="label-control">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama lengkap" value="<?php echo $data_user['user_nama'] ?>" required>
        <label class="label-control">Telepon</label>
        <input type="text" class="form-control" name="telpon" placeholder="08xxxxx" value="<?php echo $data_user['user_telpon'] ?>">
        <label class="label-control">Alamat</label>
        <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $data_user['user_alamat'] ?>">
      </div>
      <div class="col-xs-6">
        <label class="label-control">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="7"><?php echo $data_user['user_deskripsi'] ?></textarea>
        <br>
        <input type="file" onchange="loadImage(this, 'user_picture_0', '200', '200')" name="foto_user" id="foto_user" style="display:none;">
        <button type="submit" name="submit" class="btn btn-lg btn-success pull-right">Simpan</button>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="tiga">
      <ul class="nav nav-pills">
        <li class="active">
          <a href="#iklan" data-toggle="pill">Iklan General</a>
        </li>
        <li>
          <a href="#iklanBaris" data-toggle="pill">Iklan Baris</a>
        </li>
        <li>
          <a href="#iklanBiasa" data-toggle="pill">Iklan Favorit</a>
        </li>
      </ul>
      <?php $data_iklan = [
        '0' => ['jenis_iklan' => 'iklan',
                'iklan_heading' => 'IKLAN GENERAL',
                'status' => 'active in'],
        '1' => ['jenis_iklan' => 'iklanBaris',
                'iklan_heading' => 'IKLAN BARIS',
                'status' => ''],
        '2' => ['jenis_iklan' => 'iklanBiasa',
                'iklan_heading' => 'IKLAN FAVORIT',
                'status' => '']
        ] ?>
      <div class="tab-content">
        <?php for ($i=0; $i < count($data_iklan) ; $i++): ?>
          <div id="<?php echo $data_iklan[$i]['jenis_iklan'] ?>" class="tab-pane fade <?php echo $data_iklan[$i]['status']; ?>">
            <br>
            <div class="panel panel-primary">
              <div class="panel-heading"><?php echo $data_iklan[$i]['iklan_heading']; ?></div>
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tanggal</th>
                      <th>Judul Iklan</th>
                      <th>Status</th>
                      <th>Harga</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach ($this->iklan_model->load_jenis_iklan($data_iklan[$i]['jenis_iklan'], $this->session->userdata('user_kd')) as $data):
                      ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td>
                            Dari :
                            <?php
                              echo date('j M  H:i', strtotime($data['barang_upload_tgl'])) ;
                            ?>
                          </td>
                          <td>
                            <?php echo $data['nama_barang'] ?>
                            <br>
                            <button type="button" class="btn btn-primary btn-xs" onclick="window.location = 'barang/edit/<?php echo $data['slug_nama_barang'] ?>'"><span class="fa fa-pencil-square-o"></span>&nbsp;Edit</button>
                            <button type="button" class="btn btn-danger btn-xs" onclick="window.location='barang/hapus/<?php echo $data['slug_nama_barang'] ?>'"><span class="fa fa-remove"></span>&nbsp;Hapus</button>
                            <button type="button" class="btn btn-info btn-xs" name="button" onclick="window.location ='barang/<?php echo $data['slug_nama_barang'] ?>'"><span class="fa fa-eye"></span>&nbsp;Lihat</button>
                          </td>
                          <td><span style="font-size:14px;" <?php echo $data['tayang_barang'] == 'unpublish' ? "class='label label-danger'" : "class = 'label label-primary'"?>><?php echo $data['tayang_barang'] ?></span></td>
                          <td><?php echo $data['harga_barang'] ?></td>
                          <td><button class="btn btn-success" type="button" name="button">Promosi</button></td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</section>
