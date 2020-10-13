  <?php $this->load->view($ajax_detail);?>
<style>
body.dragging, body.dragging * {
	cursor: move !important;
}

.dragged {
	position: absolute;
	opacity: 0.5;
	z-index: 2000;
}

ul.serialization {
	list-style-type: none;
	padding-inline-start: 0px;
}

ul.serialization li.placeholder {
	position: relative;
	/** More li styles **/
}

ul.serialization li.placeholder:before {
	position: absolute;
	/** Define arrowhead **/
}
</style>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="card-tools">
					<div class="card-tools">
						<button type="button" class="btn btn-sm btn-info"
							data-toggle="modal" data-backdrop="static" data-keyboard="false"
							data-target="#modal-default">
							<i class="fa fa-plus"></i> <?php echo $lang_add;?></button>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-lg-6">
						<label>Periode :</label>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
								</div>
								<input type="text" class="form-control datepicker" name="due"
									autocomplete="off" > <span>&nbsp; s/d &nbsp;</span>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
								</div>
								<input type="text" class="form-control datepicker" name="due"
									autocomplete="off"> &nbsp;
								<button type="button" class="btn btn-sm btn-info">Filter</button>
							</div>
						</div>
					</div>

					<div class="col-lg-2"></div>

					<div class="col-lg-4" align="left">
						<div class="form-group row">
							<label class="col-lg-3"> Staff : </label>
							<div class="col-lg-9">
								<select name="division_todolist" class="form-control select2">
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- /.card-header -->
			<div class="card-body">
				<div class="row">
					<div class="col-lg-8"></div>
					<div class="col-lg-4" align="left">
						<div class="form-group row">
							<p class="col-lg-3">Search :</p>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="search_todolist"
									placeholder="Search" id="keyword">
							</div>
						</div>
					</div>
				</div>
                <?php $this->load->view('components/alert');?>
              <div class="card-body">
                 <?php echo form_open_multipart('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php if (!empty($this->session->flashdata('status'))){?>
                  <div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert"
								aria-hidden="true">&times;</button>
							<i class="icon fa fa-check"></i> <?php echo $this->session->flashdata('status');?>!
                  </div>
                  <?php }?>
                  <?php if (!empty($this->session->flashdata('error'))){?>
                  <div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert"
								aria-hidden="true">&times;</button>
							<i class="icon fa fa-warning"></i> <?php echo $this->session->flashdata('error');?>!
                  </div>
                <?php }?>
                <div class="row">
							<div class="col-md-3">
								<div class="callout callout-danger  bg-danger text-center">
									<strong>ToDo List</strong>
								</div>
								<ul class="serialization vertical"
									style="height: 500px; overflow-y: auto;">
									 <?php foreach ($todolist as $value):?>
									<li data-id="<?=$value->todolist_id;?>">
										<div class="card card-danger">
											<div class="card-header">
												<div class="card-tools">
													<button type="button"
														class="btn btn-tool swalDefaultSuccess"
														data-card-widget="collapse">
														<i class="fas fa-check-circle"></i>
													</button>
													<button type="button" class="btn btn-tool"
														data-card-widget="collapse" data-toggle="modal"
														data-backdrop="static" data-keyboard="false"
														data-target="#modal-default">
														<i class="fas fa-times-circle"></i>
													</button>
													<button type="button" class="btn btn-tool"
														data-card-widget="collapse" data-toggle="modal"
														data-backdrop="static" data-keyboard="false"
														data-target="#modal-default">
														<i class="fas fa-eye"></i>
													</button>
												</div>
												<br>
												<p class="card-title"
													style="font-size: 16px; font-weight: bold;"><?=$value->todolist_title?></p>
												<br>
												<p style="font-size: 15px;">Deadline : <?= date('d-m-Y' , strtotime($value->todolist_deadline))?></p>
											</div>
										</div>
									</li>
									<?php endforeach;?>
								</ul>
							</div>

							<div class="col-md-3">
								<div class="callout callout-warning  bg-warning text-center">
									<strong>Process</strong>
								</div>
								<ul class="serialization vertical"
									style="height: 500px; overflow-y: auto;">
									 <?php foreach ($process as $value):?>
									<li data-id="<?=$value->todolist_id;?>">
										<div class="card card-warning">
											<div class="card-header">
												<div class="card-tools">
													<button type="button" class="btn btn-tool"
														data-card-widget="collapse" data-toggle="modal"
														data-backdrop="static" data-keyboard="false"
														data-target="#modal-default">
														<i class="fas fa-eye"></i>
													</button>
												</div>
												<br>
												<p class="card-title"
													style="font-size: 16px; font-weight: bold;"><?=$value->todolist_title?></p>
												<br>
												<p style="font-size: 15px;">Deadline : <?= date('d-m-Y' , strtotime($value->todolist_deadline))?></p>
											</div>
										</div>
									</li>
									<?php endforeach;?>
								</ul>
							</div>

							<div class="col-md-3">
								<div class="callout callout-info  bg-info text-center">
									<strong>Review</strong>
								</div>
								<ul class="serialization vertical"
									style="height: 500px; overflow-y: auto;">
									 <?php foreach ($review as $value):?>
									<li data-id="<?=$value->todolist_id;?>">
										<div class="card card-info" draggable="true"
											ondragstart="drag(event)" id="drag1">
											<div class="card-header">
												<div class="card-tools">
											 <?php
            if ($value->employee_position_id == '1') {
                ?>
												<button type="button"
														class="btn btn-tool swalDefaultSuccess"
														data-card-widget="collapse">
														<i class="fas fa-check-circle"></i>
													</button>
													<button type="button" class="btn btn-tool"
														data-card-widget="collapse" data-toggle="modal"
														data-backdrop="static" data-keyboard="false"
														data-target="#modal-default">
														<i class="fas fa-times-circle"></i>
													</button>
													<button type="button" class="btn btn-tool"
														data-card-widget="collapse" data-toggle="modal"
														data-backdrop="static" data-keyboard="false"
														data-target="#modal-default">
														<i class="fas fa-eye"></i>
													</button>
												   <?php } elseif($value->employee_position_id=='2'){?>
                                                 <?php } ?>
											</div>
												<br>
												<p class="card-title"
													style="font-size: 16px; font-weight: bold;"><?=$value->todolist_title?></p>
												<br>
												<p style="font-size: 15px;">Deadline : <?= date('d-m-Y' , strtotime($value->todolist_deadline))?></p>
											</div>
										</div>
									</li>
									<?php endforeach;?>
								</ul>
							</div>

							<div class="col-md-3">
								<div class="callout callout-success  bg-success text-center">
									<strong>Done</strong>
								</div>
								<ul class="serialization vertical"
									style="height: 500px; overflow-y: auto;">
									 <?php foreach ($done as $value):?>
									<li data-id="<?=$value->todolist_id;?>">
										<div class="card card-success">
											<div class="card-header">
												<div class="card-tools">
													<button type="button" class="btn btn-tool"
														data-card-widget="collapse">
														<i class="far fa-star";"></i></span>
													</button>
												</div>
												<br>
												<p class="card-title"
													style="font-size: 16px; font-weight: bold;"><?=$value->todolist_title?></p>
												<br>
												<p style="font-size: 15px;">Deadline : <?= date('d-m-Y' , strtotime($value->todolist_deadline))?></p>
											</div>
										</div>
									</li>
									<?php endforeach;?>
								</ul>
							</div>
						</div>
					</div>
              <?php echo form_close();?>
              <!-- /.box-body -->
					<div id="loading_simpan" class="overlay" style="display: none">
						<i class="fa fa-refresh fa-spin"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.col-md-12 -->
</div>

