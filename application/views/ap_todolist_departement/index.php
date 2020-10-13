
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
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

					<div class="col-lg-1"></div>

					<div class="col-lg-5" align="left">
						<div class="form-group row">
							<label class="col-lg-4"> Departement : </label>
							<div class="col-lg-8">
								<select type="text" class="form-control select2" name="search_todolist"></select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
                <?php $this->load->view('components/alert');?>
                <table id="example1" class="table table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Todo List Title</th>
							<th>Departement</th>
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

