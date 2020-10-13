

<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Form Target</h4>
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Departement</label>
					<div class="col-sm-9">
						<select type="text" class="form-control select2"
							name="cmbDepartement"></select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Target Title</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="txtTitle"
							placeholder="Input Target Title" maxlength="32">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Target Category</label>
					<div class="col-sm-9">
						<select type="text" class="form-control select2" name="cmbTargetType"
							id="target">
							 <?php foreach ($target_category as $val):?>
                            	<option value="<?php echo $val->target_category_type;?>"><?php echo ucfirst($val->target_category_name);?></option>
                            <?php endforeach;?>
						</select>
					</div>
				</div>

				<div class="form-group row" id="alt_narasi" style="display: none;">
					<label class="col-sm-3 col-form-label">Target Detail</label>
					<div class="col-sm-9">
						<textarea type="text" class="form-control" name="txtDetail"
							placeholder="Input Target Detail" maxlength="225"></textarea>
					</div>
				</div>

				<div class="form-group row" id="alt_nominal" style="display: none;">
					<label class="col-sm-3 col-form-label">Target Nominal</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="txtNominal" id="rupiah"
							placeholder="Input Target Detail" maxlength="32">
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

