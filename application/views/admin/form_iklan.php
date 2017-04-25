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
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Form Pasang Iklan</div>
					<div class="panel-body">
						<?php echo form_open_multipart('admin/save'); ?>
						<div class="col-md-6">
								<div class="form-group">
									<label>Judul Iklan</label>
									<input class="form-control" placeholder="example: Jual cepat mobil bmw" name="nama_barang" required>
								</div>

								<div class="form-group">
									<label>Kategori</label>
									<select class="form-control" name="kategori">
										<?php foreach ($kategori as $list_kategori): ?>
											<option value="<?php echo $list_kategori['id_kategori'] ?>"><?php echo $list_kategori['nama_kategori'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="form-group">
									<label>Jenis Iklan</label>
									<div class="radio">
										<label>
											<input type="radio" name="jenis_iklan" value="iklan_baris" checked>Iklan Baris
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="jenis_iklan" value="iklan_foto">Iklan Foto
										</label>
									</div>
								</div>
								<div class="form-group">
									<label>Jenis Barang</label>
									<div class="radio">
										<label>
											<input type="radio" name="jenis_barang" value="baru" checked>Baru
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="jenis_barang" value="bekas">Bekas
										</label>
									</div>
								</div>
								<div class="form-group">
									<label>Foto Upload</label>
									<input type="file" name='foto_upload'>
									<p class="help-block">Example block-level help text here.</p>
								</div>
								<div class="form-group">
									<label>Foto Grup</label>
									<input type="file" name="foto_fitur[]">
									<input type="file" name="foto_fitur[]">
									<input type="file" name="foto_fitur[]">
									<input type="file" name="foto_fitur[]">
									<input type="file" name="foto_fitur[]">
									<input type="file" name="foto_fitur[]">
									<p class="help-block">Example block-level help text here.</p>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
								</div>
								<!-- <div class="form-group">
									<label>Telepon/HP</label>
									<input type="text" class="form-control" name="telpon" placeholder="example: 085xxx">
								</div> -->
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" class="form-control" list="alamatta" name="alamat" placeholder="example: Kamu tinggal dimana?" required>
									<!-- <select class="form-control" name="alamat"> -->
									<datalist id="alamatta">
										<?php foreach ($kabkota as $kota): ?>
											<option value="<?php echo $kota['nama'] ?>"><?php echo $kota['nama'] ?></option>
										<?php endforeach; ?>
									</datalist>
									<!-- </select> -->
								</div>

								<label>Harga</label>
								<div class="input-group">
									<span class="input-group-addon">Rp.</span>
									<input type="text" class="form-control" name="harga" id="harga" placeholder="example: 5.000.000" required>
									<span class="input-group-addon">, 00</span>
								</div>
								<!-- <label>Validation</label>
								<div class="form-group has-success">
									<input class="form-control" placeholder="Success">
								</div>
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
