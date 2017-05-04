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
					<div class="panel-heading">Form Edit Iklan</div>
					<div class="panel-body">
						<?php echo form_open_multipart('admin/edit_save'); ?>
						<div class="col-md-6">
								<div class="form-group">
									<label>Judul Iklan</label>
									<input class="form-control" placeholder="example: Jual cepat mobil bmw" name="nama_barang" value="<?php echo $barang->nama_barang ?>">
								</div>
								<input type="hidden" name="slug_nama_barang" value="<?php echo $barang->slug_nama_barang ?>">

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

								<div class="form-group">
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
								</div>

								<div class="form-group">
									<label>Jenis Barang</label>
									<div class="radio">
										<label>
											<input type="radio" name="jenis_barang" value="baru" <?php echo ($barang->jenis_barang == 'baru') ? 'checked' : '' ; ?>>Baru
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="jenis_barang" value="bekas" <?php echo ($barang->jenis_barang == 'bekas') ? 'checked' : '' ; ?>>Bekas
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
									<textarea class="form-control" name="deskripsi" rows="5"><?php echo $barang->deskripsi_barang ?></textarea>
								</div>
								<!-- <div class="form-group">
									<label>Telepon/HP</label>
									<input type="text" class="form-control" name="telpon" placeholder="example: 085xxx" >
								</div> -->
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
											<option value="publish" <?php echo ($barang->tayang_barang == 'publish') ? 'selected' : ''; ?>>PUBLISH</option>
											<option value="unpublish" <?php echo ($barang->tayang_barang == 'unpublish') ? 'selected' : ''; ?>>UN-PUBLISH</option>
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