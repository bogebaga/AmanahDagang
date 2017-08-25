
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Tables</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tabel</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-xs-12">
				<?php echo $this->session->flashdata('success_edit'); ?>
				<?php echo $this->session->flashdata('has_delete'); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel Iklan</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="<?php echo base_url("iklanparse")?>" data-show-refresh="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="nama" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="id_barang" data-sortable="true" >No.</th>
						        <th data-field="barang_upload_tgl" data-sortable="true">Tanggal</th>
										<th data-field="user_nama" data-sortable="true" >Nama</th>
										<th data-field="jenis_iklan" data-sortable="true">Jenis Iklan</th>
						        <th data-field="nama_barang"  data-sortable="true">Judul Iklan</th>
						        <th data-field="tayang_barang" data-sortable="true">Status</th>
						        <th data-field="action">Action</th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
					<script>
					    $(function () {
					        $('#hover, #striped, #condensed').click(function () {
					            var classes = 'table';

					            if ($('#hover').prop('checked')) {
					                classes += ' table-hover';
					            }
					            if ($('#condensed').prop('checked')) {
					                classes += ' table-condensed';
					            }
					            $('#table-style').bootstrapTable('destroy')
					                .bootstrapTable({
					                    classes: classes,
					                    striped: $('#striped').prop('checked')
					                });
					        });
					    });

					    function rowStyle(row, index) {
					        var classes = ['highlighted', 'green', 'blue', 'orange', 'red'];

					        if (index % 2 === 0 && index / 2 < classes.length) {
					            return {
					                classes: classes[index / 2]
					            };
					        }
					        return {};
					    }
					</script>
		</div><!--/.row-->
