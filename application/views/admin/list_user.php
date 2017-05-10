
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
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel User</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="<?php echo base_url()?>uparse"  data-show-refresh="true" data-show-columns="true" data-search="true" data-select-item-name="state" data-pagination="true" data-sort-name="nama" data-sort-order="desc">
						    <thead>
						    <tr>
						        <!-- <th data-field="state" data-checkbox="true" ></th> -->
						        <th data-field="user_id" data-sortable="true" >No.</th>
						        <th data-field="user_add" data-sortable="true">Tanggal</th>
										<th data-field="user_nama" data-sortable="true" >Nama</th>
						        <th data-field="user_email"  data-sortable="true">Email</th>
						        <th data-field="user_type" data-sortable="true">Tipe</th>
										<th data-field="action" data-sortable="true">Action</th>
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
										classes += ' table';
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
