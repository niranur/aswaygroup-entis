		<?php echo form_open('', 'class="form-horizontal" id="GSForm"');?>
		<div class="row">
          <div class="col-md-6">
          	<div class="card">
              <div class="card-body">
                	<?php $this->load->view('components/alert');?>
                	<div class="form-group row">
                    	<label for="inputName" class="col-sm-3 col-form-label"><?php echo $lang_roles;?></label>
                    	<div class="gs-field col-sm-9">
                    		<input type="text" class="form-control" name="nama" placeholder="<?php echo $lang_roles;?>" value="<?php echo $content->roles;?>">
                    	</div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-info"><i class="fa fa-check-double"></i> <?php echo $lang_save;?></button>
                          <button type="reset" class="btn btn-default"><i class="fa fa-history"></i> <?php echo $lang_reset;?></button>
                        </div>
                    </div>
              </div><!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-6">
          	<div class="card">
              <div class="card-body">
              	<?php foreach ($all_module as $val):?>
                	<div align="center" class="checkbox">
                		<label class="kt-checkbox">
                		<input <?php echo in_array($val->id,$module_saat_ini)?'checked':'';?> type="checkbox" name="module[]" id="module_<?php echo $val->id?>" value="<?php echo $val->id?>_<?php echo $val->parent?>_<?php echo $val->type?>" onchange="parent(<?php echo $val->id?>)">
                		<strong><?php echo $val->$mylanguages_field;?></strong>
                		<span></span>
                		</label>
                	</div>
                <?php 
                foreach ($all_module_child as $value):
                if ($val->id==$value->parent){
                ?>
                	<div align="center" class="checkbox">
                		<label class="kt-checkbox">
                        <input class="module_child_<?php echo $val->id?>" <?php echo in_array($value->id,$module_saat_ini)?'checked':'';?> type="checkbox" name="module[]" value="<?php echo $value->id?>_<?php echo $value->parent?>_<?php echo $val->type?>" onchange="child(<?php echo $value->parent?>)">
                		<?php echo $value->$mylanguages_field;?>
                		<span></span>
                		</label>
                	</div>
                <?php 
                }
                endforeach;
                ?>
                <hr>
                <?php endforeach;?>
              </div>
            </div>
          </div>
        </div>
        <?php echo form_close();?>