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
        <div class="panel-heading">Form Helpdesk </div>
        <div class="panel-body">
          <?php echo form_open(base_url('admin/helpdesk').(isset($menu_helpdesk[0]['ad_helpdesk']) ? '/edit' : '/save'), '', ['slug-helpdesk' => isset($menu_helpdesk
          [0]['ad_helpdesk']) ? $menu_helpdesk[0]['ad_link_help'] : '']); ?>
          <div class="col-md-6">
            <div class="form-group">
              <label>Menu Helpdesk</label>
              <input type="text" name="nama_helpdesk" class="form-control" placeholder="Nama menu Helpdesk" value="<?php echo isset($menu_helpdesk[0]['ad_helpdesk']) ? $menu_helpdesk[0]['ad_helpdesk']: ''; ?>" required>
            </div>
            <div class="form-group">
              <label style="display:block;">Deskripsi</label>
              <textarea name="isi_helpdesk"><?php echo isset($menu_helpdesk[0]['ad_fill_text']) ? $menu_helpdesk[0]['ad_fill_text']: '' ; ?></textarea>
              <p class="help-block" style="display:block;">Example block-level help text here.</p>
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
          <div class="col-lg-6">
    				<div class="panel panel-default">
    					<div class="panel-heading">Tabel Helpdesk</div>
    					<div class="panel-body">
    						<table data-toggle="table" data-url="<?php echo base_url('hparse') ?>"  data-show-refresh="true" data-show-columns="true" data-search="true" data-pagination="true">
    						    <thead>
      						    <tr>
      						        <th data-field="id_help" data-sortable="true" >No.</th>
      										<th data-field="ad_helpdesk" data-sortable="true" >Menu helpdesk</th>
      										<th data-field="action">Action</th>
      						    </tr>
    						    </thead>
    						</table>
    					</div>
    				</div>
			    </div>
      </div>
    </div><!-- /.col-->
  </div><!-- /.row -->
</div><!--/.main-->
