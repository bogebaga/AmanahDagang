<script type="text/javascript">
$(function() {
  $('#provinsi').change(function() {
    var provinsi = $('#provinsi').val();
    $('#kabkota').empty();
    data_kabkota (provinsi);
  });

  function data_kabkota (a)
  {
    $.post('kabkota',{id_provinsi : a}, function(data1)
    {
      var data_arr = JSON.parse(data1);
      for (var i = 0; i < data_arr.length; i++) {
        var select = "<option value='"+data_arr[i]['id']+"'>"+data_arr[i]['nama']+"</option>";
        $('#kabkota').append(select);
      }
    });
  }
});
</script>
<section>
  <?php echo form_open_multipart('edit'); ?>
  <div  class="detail-biodata">
    <div class="dua">
      <div class="user-container" style="margin-bottom:30px;text-align:center;">
        <label for="foto_user">
          <?php if (empty($data_user[0]['user_picture'])): ?>
            <img src="images/gambar.jpg" width="200px">
          <?php else: ?>
            <img src="<?php echo base_url()."images/user_iklan/".$data_user[0]['user_picture'] ?>" width="200px">
          <?php endif; ?>
        </label>
        <h4><?php echo $data_user[0]['user_nama'] ?></h4>
        <h4>Makassar</h4>
      </div>
      <div class="col-xs-6">
        <label for="" class="label-control">Provinsi</label>
        <select class="form-control" name="provinsi" id="provinsi">
          <?php foreach ($data_provinsi as $provinsi): ?>
            <?php if ($data_user[0]['user_provinsi'] == $provinsi['id']): ?>
              <option value="<?php echo $provinsi['id'] ?>" selected><?php echo $provinsi['nama'] ?></option>
            <?php continue; ?>
            <?php endif; ?>
              <option value="<?php echo $provinsi['id'] ?>"><?php echo $provinsi['nama']  ?></option>
          <?php endforeach; ?>
        </select>
        <label for="" class="label-control">Kabupaten/Kota</label>
        <select class="form-control" name="kota" id="kabkota">
        <?php $data_kabkota = $this->iklan_model->get_data_kabkota($data_user[0]['user_provinsi']) ?>
        <?php foreach ($data_kabkota as $kota): ?>
          <?php if ($data_user[0]['user_kota'] == $kota['id']): ?>
            <option value="<?php echo $kota['id'] ?>" selected><?php echo $kota['nama'] ?></option>
          <?php continue; ?>
          <?php endif; ?>
            <option value="<?php echo $kota['id'] ?>"><?php echo $kota['nama'] ?></option>
        <?php endforeach; ?>
        </select>
        <label class="label-control">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Fulan..." value="<?php echo $data_user[0]['user_nama'] ?>" required>
        <label class="label-control">Telepon</label>
        <input type="text" class="form-control" name="telpon" placeholder="08xxxxx" value="<?php echo $data_user[0]['user_telpon'] ?>">
      </div>
      <div class="col-xs-6">
        <input type="file" name="foto_user" id="foto_user" style="display:none;">
        <label class="label-control">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="7"><?php echo $data_user[0]['user_deskripsi'] ?></textarea>
        <br>
        <button type="submit" name="submit" class="btn btn-lg btn-success pull-right">Simpan</button>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="tiga"> <ul class="nav nav-pills">
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
      <div class="tab-content">
        <div id="iklan" class="tab-pane fade active in">
          <br>
          <div class="panel panel-primary">
            <div class="panel-heading">IKLAN GENERAL</div>
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
                  $i = 1;
                  foreach ($this->iklan_model->load_jenis_iklan('iklan', $this->session->userdata('user_kd')) as $isi_iklan):
                ?>
                      <tr>
                        <td><?php echo $i++ ?></td>
                        <td>
                          Dari :
                          <?php
                            echo date('j M  H:i', strtotime($isi_iklan['barang_upload_tgl'])) ;
                          ?>
                        </td>
                        <td>
                          <?php echo $isi_iklan['nama_barang'] ?>
                          <br>
                          <button type="button" class="btn btn-primary btn-xs" onclick="window.location = 'barang/edit/<?php echo $isi_iklan['slug_nama_barang'] ?>'"><span class="fa fa-pencil-square-o"></span>&nbsp;Edit</button>
                          <button type="button" class="btn btn-danger btn-xs" onclick="window.location='barang/hapus/<?php echo $isi_iklan['slug_nama_barang'] ?>'"><span class="fa fa-remove"></span>&nbsp;Hapus</button>
                          <button type="button" class="btn btn-info btn-xs" name="button" onclick="window.location ='barang/<?php echo $isi_iklan['slug_nama_barang'] ?>'"><span class="fa fa-eye"></span>&nbsp;Lihat</button>
                        </td>
                        <td><span style="font-size:14px;" <?php echo $isi_iklan['tayang_barang'] == 'unpublish' ? "class='label label-danger'" : "class = 'label label-primary'"?>><?php echo $isi_iklan['tayang_barang'] ?></span></td>
                        <td><?php echo $isi_iklan['harga_barang'] ?></td>
                        <td><button class="btn btn-success" type="button" name="button">Promosi</button></td>
                      </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id="iklanBaris" class="tab-pane fade">
          <br>
          <div class="panel panel-primary">
            <div class="panel-heading">IKLAN BARIS</div>
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
                  $i = 1;
                  foreach ($this->iklan_model->load_jenis_iklan('iklan_baris', $this->session->userdata('user_kd')) as $isi_iklan_baris):
                ?>
                      <tr>
                        <td><?php echo $i++ ?></td>
                        <td>
                          Dari :
                          <?php
                            echo date('j M  H:i', strtotime($isi_iklan_baris['barang_upload_tgl'])) ;
                          ?>
                        </td>
                        <td>
                          <?php echo $isi_iklan_baris['nama_barang'] ?>
                          <br>
                          <button type="button" class="btn btn-primary btn-xs" onclick="window.location = 'barang/edit/<?php echo $isi_iklan_baris['slug_nama_barang'] ?>'"><span class="fa fa-pencil-square-o"></span>&nbsp;Edit</button>
                          <button type="button" class="btn btn-danger btn-xs" onclick="window.location='barang/hapus/<?php echo $isi_iklan_baris['slug_nama_barang'] ?>'"><span class="fa fa-remove"></span>&nbsp;Hapus</button>
                          <button type="button" class="btn btn-info btn-xs" name="button" onclick="window.location ='barang/<?php echo $isi_iklan_baris['slug_nama_barang'] ?>'"><span class="fa fa-eye"></span>&nbsp;Lihat</button>
                        </td>
                        <td><span style="font-size:14px;" <?php echo $isi_iklan_baris['tayang_barang'] == 'unpublish' ? "class='label label-danger'" : "class = 'label label-primary'"?>><?php echo $isi_iklan_baris['tayang_barang'] ?></span></td>
                        <td><?php echo $isi_iklan_baris['harga_barang'] ?></td>
                        <td><button class="btn btn-success" type="button" name="button">Promosi</button></td>
                      </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div id="iklanBiasa" class="tab-pane fade">
          <br>
          <div class="panel panel-primary">
            <div class="panel-heading">IKLAN FAVORIT</div>
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
                  $i = 1;
                  foreach ($this->iklan_model->load_jenis_iklan('iklan_foto', $this->session->userdata('user_kd')) as $isi_iklan_foto):
                ?>
                      <tr>
                        <td><?php echo $i++ ?></td>
                        <td>
                          Dari :
                          <?php
                            echo date('j M  H:i', strtotime($isi_iklan_foto['barang_upload_tgl'])) ;
                          ?>
                        </td>
                        <td>
                          <?php echo $isi_iklan_foto['nama_barang'] ?>
                          <br>
                          <button type="button" class="btn btn-primary btn-xs" onclick="window.location='barang/edit/<?php echo $isi_iklan_foto['slug_nama_barang'] ?>'"><span class="fa fa-pencil-square-o" ></span>&nbsp;Edit</button>
                          <button type="button" class="btn btn-danger btn-xs" onclick="window.location='barang/hapus/<?php echo $isi_iklan_foto['slug_nama_barang'] ?>'"><span class="fa fa-remove"></span>&nbsp;Hapus</button>
                          <button type="button" class="btn btn-info btn-xs" name="button" onclick="window.location = 'barang/<?php echo $isi_iklan_foto['slug_nama_barang'] ?>'"><span class="fa fa-eye"></span>&nbsp;Lihat</button>
                        </td>
                        <td><span style="font-size:14px;" <?php echo $isi_iklan_foto['tayang_barang'] == 'unpublish' ? "class='label label-danger'" : "class = 'label label-primary'"?>><?php echo $isi_iklan_foto['tayang_barang'] ?></span></td>
                        <td><?php echo $isi_iklan_foto['harga_barang'] ?></td>
                        <td><button class="btn btn-success" type="button" name="button">Promosi</button></td>
                      </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
