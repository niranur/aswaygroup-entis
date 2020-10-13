
<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Form Todo List</h4>
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Todo List Title <span
						style="color: red;"> * </span></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="txtTitle"
							placeholder="Input Title Todo List" maxlength="32"
							required="true">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Todo List Detail <span
						style="color: red;"> * </span></label>
					<div class="col-sm-9">
						<textarea type="text" class="form-control" name="txtDetail"
							placeholder="Input Detail Todo List" maxlength="225"></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Todo List Time</label>
					<div class="col-sm-9">
						<select name="cmbTime" class="form-control select2">
							<option>Choose Time</option>
							<option>Harian</option>
							<option>Mingguan</option>
							<option>Bulanan</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label"> Todo List Deadline <span
						style="color: red;"> * </span></label>
					<div class="col-sm-9">
						<input type="text" class="form-control datepicker" name="dateDateline"
							autocomplete="off" placeholder="Click for show date">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Departement</label>
					<div class="col-sm-9">
						<select name="cmbDepartement" class="form-control select2">
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Staff</label>
					<div class="col-sm-9">
						<select name="cmbStaff" class="form-control select2">
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">File</label>
					<div class="col-sm-9">
						<select name="cmbFile" id="file"
							class="form-control select2">
							<option>Choose File</option>
							<option value="file">Upload File</option>
							<option value="link">Link</option>
						</select>
					</div>
				</div>


				<div class="form-group row" id="alt_file" style="display: none;">
					<label class="col-sm-3 col-form-label">Upload File</label>
					<div class="col-sm-9">
						<div class="custom-file">
							<input type="file" class="custom-file-input"
								id="exampleInputFile" name="fileTodolist"> <label
								class="custom-file-label" for="exampleInputFile"><?php echo $lang_choose;?> file</label>
						</div>
					</div>
				</div>

				<div class="form-group row" id="alt_link" style="display: none;">
					<label class="col-sm-3 col-form-label">Link</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="txtLink"
							placeholder="Input Link" maxlength="32">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Reason</label>
					<div class="col-sm-9">
						<textarea type="text" class="form-control" name="txtReason"
							placeholder="Input Reason" maxlength="225"></textarea>
					</div>
				</div>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
