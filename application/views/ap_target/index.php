 <?php $this->load->view($ajax_detail);?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="card-tools">
					<button type="button" class="btn btn-sm btn-info"
						data-toggle="modal" data-backdrop="static" data-keyboard="false"
						data-target="#modal-default">
						<i class="fa fa-plus"></i> Tambah
					</button>
				</div>
				<br>

				<div class="row">
					<div class="col-md-6">
						<label>Periode:</label>
					</div>
					<div class="col-md-6"></div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
								</div>
								<input type="text" class="form-control datepicker" name="due"
									autocomplete="off"> <span>&nbsp; s/d &nbsp;</span>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
								</div>
								<input type="text" class="form-control datepicker" name="due"
									autocomplete="off"> &nbsp;
								<button type="button" class="btn btn-sm btn-info">Filter</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Todo List Target</th>
							<th>Category</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /.col-md-12 -->
</div>

