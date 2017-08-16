	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Forms</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Forms</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-xs-12">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Form Edit Iklan</div>
					<div class="panel-body">
						<?php echo form_open_multipart('admin/edit_save', '', [
							'upload_tgl' => $barang->barang_upload_tgl,
							'slug_nama_barang' => $barang->slug_nama_barang
						]); ?>
						<div class="col-md-6">
								<div class="form-group">
									<label>Judul Iklan</label>
									<input class="form-control" placeholder="example: Jual cepat apa saja" name="nama_barang" value="<?php echo $barang->nama_barang ?>" minlength="20" maxlength="70" required>
								</div>
								<div class="form-group">
									<label>Kategori</label>
									<select class="form-control" name="kategori">
										<?php foreach ($kategori as $list_kategori): ?>
											<?php if ($list_kategori['id_kategori'] == $barang->id_kategori ): ?>
												<option value="<?php echo $list_kategori['id_kategori'] ?>" selected><?php echo $list_kategori['nama_kategori'] ?></option>
											<?php else: ?>
												<option value="<?php echo $list_kategori['id_kategori'] ?>"><?php echo $list_kategori['nama_kategori'] ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<!-- <div class="form-group">
									<label>Regional</label>
									<select class="form-control" name="provinsi" id="provinsi" style="margin-bottom:5px">
										<option>Pilih Provinsi</option>
										<?php foreach ($this->iklan_model->get_data_provinsi() as $provinsi): ?>
											<?php if($provinsi['id'] == $barang->barang_provinsi): ?>
												<option value="<?php echo $provinsi['id'] ?>" selected><?php echo $provinsi['nama'] ?></option>
											<?php else: ?>
												<option value="<?php echo $provinsi['id'] ?>"><?php echo $provinsi['nama'] ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
									<select class="form-control" name="kabkota" id="kabkota" style="margin-bottom:5px">
										<option>Pilih Kabupaten/Kota</option>
										<?php foreach ($this->iklan_model->get_data_kabkota() as $kabkota): ?>
											<?php if ($kabkota['id'] == $barang->barang_kota): ?>
												<option value="<?php echo $kabkota['id'] ?>" selected><?php echo $kabkota['nama'] ?></option>
											<?php else: ?>
												<option value="<?php echo $kabkota['id'] ?>"><?php echo $kabkota['nama'] ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
									<select class="form-control" name="kecamatan" id="kecamatan">
										<option>Pilih Kecamatan</option>
										<?php foreach ($this->iklan_model->get_data_kecamatan() as $kecamatan): ?>
											<?php if ($kecamatan['id'] == $barang->barang_kecamatan): ?>
												<option value="<?php echo $kecamatan['id'] ?>" selected><?php echo $kecamatan['nama'] ?></option>
											<?php else: ?>
												<option value="<?php echo $kecamatan['id'] ?>"><?php echo $kecamatan['nama'] ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div> -->
								<!-- <div class="form-group">
									<label>Jenis Iklan</label>
									<div class="radio">
										<label>
											<input type="radio" name="jenis_iklan" value="iklan_baris" <?php echo ($barang->jenis_iklan == 'iklan_baris') ? 'checked' : '' ; ?>>Iklan Baris
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="jenis_iklan" value="iklan_foto" <?php echo ($barang->jenis_iklan == 'iklan_foto') ? 'checked' : '' ; ?>>Iklan Foto
										</label>
									</div>
								</div> -->
								<div class="form-group">
									<label>Jenis Barang</label>
									<div class="radio">
										<label>
											<input type="radio" name="jenis_barang" value="baru" <?php echo ($barang->jenis_barang == 'baru') ? 'checked' : '' ; ?> >Baru
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="jenis_barang" value="bekas" <?php echo ($barang->jenis_barang == 'bekas') ? 'checked' : '' ; ?> >Bekas
										</label>
									</div>
								</div>

								<div class="form-group">
									<label style="display:block;">Foto Upload</label>
									<label class="chs-img" style="width:253px;padding: 35px 0;">
										<?php $tanggal = date('Y-m-d-N', strtotime($barang->barang_upload_tgl)); ?>
										<img id="foto_upload" <?php echo ($barang->gambar_fitur == '' ? '' : "src='".base_url('images/post_foto_feature/'.$this->admin->tanggal_indonesia($tanggal).$barang->gambar_fitur)."'");?> width="251" height="112">
										<span class="glyphicon glyphicon-eye-open"></span>
										<input type="file" name='foto_upload' onchange='loadImage(this, this.name, 251, 112)' style="display:none;">
									</label>
									<p class="help-block" style="display:block;">Example block-level help text here.</p>
								</div>

								<div class="form-group">
									<label style="display:block;">Foto Grup</label>
									<?php $data_hasil_explode = explode(",", $barang->gambar_barang) ?>
									<?php foreach ($data_hasil_explode as $key => $value): ?>
										<label class="chs-img" style="width:80px; padding:15px 0; font-size:15px">
											<img id="image_<?php echo $key+1 ?>" <?php echo ($value == '') ? '' : "src='".base_url('images/post_foto_ikl/'.$this->admin->tanggal_indonesia($tanggal).$barang->slug_nama_barang.'/'.$value)."'" ?> width="78" height="51">
											<span class="glyphicon glyphicon-eye-open"></span>
											<input type="file" name="foto_fitur[]" onchange="loadImage(this,'image_<?php echo $key+1?>', 78, 51)" style="display:none;">
										</label>
									<?php endforeach; ?>
								</div>
								<p class="help-block">Example block-level help text here.</p>
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
							<div class="col-md-6">
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea class="form-control" name="deskripsi" rows="5"><?php echo $barang->deskripsi_barang ?></textarea>
								</div>
								<div class="form-group">
									<label>Telepon/HP</label>
									<input type="text" class="form-control" name="telpon" placeholder="example: 085xxx" value="<?php echo $barang->telpon ?>">
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" class="form-control" name="alamat" placeholder="example: Alamat barang ..." value="<?php echo $barang->alamat_barang ?>">
								</div>
							<div class="form-group">
								 <label>Harga</label>
									<div class="input-group">
										<span class="input-group-addon">Rp.</span>
										<input type="text" class="form-control" name="harga" id="harga" placeholder="example: 5.000.000" value="<?php echo $barang->harga_barang ?>">
										<span class="input-group-addon">, 00</span>
									</div>
								</div>
								<div class="form-group">
									<label>TAYANG IKLAN</label>
									<div class="form-group has-success">
										<select name="tayang_iklan" class="form-control">
											<option value="publish" <?php echo ($barang->tayang_barang == 'publish') ? 'selected' : ''; ?>>Publish</option>
											<option value="unpublish" <?php echo ($barang->tayang_barang == 'unpublish') ? 'selected' : ''; ?>>Unpublish</option>
										</select>
									</div>
								</div>
								<!-- <label>Validation</label>
								<div class="form-group has-warning">
									<input class="form-control" placeholder="Warning">
								</div>
								<div class="form-group has-error">
									<input class="form-control" placeholder="Error">
								</div> -->
								<br><br>
								<button type="submit" name="submit" class="btn btn-primary">Simpan Iklan</button>
								<button type="reset" class="btn btn-default">Reset</button>
							</div>
							<?php echo form_close() ?>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
	</div><!--/.main-->
