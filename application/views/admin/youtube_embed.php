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
        <div class="panel-heading">Form Youtube Embed </div>
        <div class="panel-body">
          <?php echo form_open_multipart('admin/edit_user_save'); ?>
          <div class="col-md-6">
            <div class="form-group">
              <label>Youtube Embeb Code</label>
              <input type="text" name="nama" class="form-control" placeholder="https://www.youtube.com/embed/id_video" required>
            </div>
            <div class="form-group">
              <label style="display:block;">Foto Upload</label>
              <label class="chs-img" style="width:255px;padding: 35px 0;">
                <img id='frame_embed'>
                <span class="glyphicon glyphicon-eye-open"></span>
                <input type="file" name='foto_upload' onchange="loadImage(this, 'frame_embed', 253, 112)" style="display:none;">
              </label>
              <p class="help-block" style="display:block;">Example block-level help text here.</p>
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
            </div>
            <!-- <div class="form-group has-warning">
              <input class="form-control" placeholder="Warning">
            </div>
            <div class="form-group has-error">
              <input class="form-control" placeholder="Error">
            </div> -->
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-default">Reset</button>
          </div>
            <?php echo form_close() ?>
      </div>
    </div><!-- /.col-->
  </div><!-- /.row -->

</div><!--/.main-->
