		<div class="row">
          <div class="col-md-12">
          	<?php echo form_open('', 'role="form" id="GSForm"');?>
          	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $lang_update.' '.$lang_app_setting;?></h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                	<?php $this->load->view('components/alert');?>
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                            	<label for="inputName"><?php echo $lang_app_name;;?></label>
                            	<input type="text" class="form-control" name="nama" placeholder="<?php echo $lang_app_name;?>" value="<?php echo $content->app_name;?>">
                            </div>
                            <div class="form-group">
                            	<label for="inputName"><?php echo $lang_app_desc;?></label>
                            	<input type="text" class="form-control" name="desc" placeholder="<?php echo $lang_app_desc;?>" value="<?php echo $content->app_desc;?>">
                            </div>
                            <div class="form-group">
                            	<label for="inputName"><?php echo $lang_app_ver;?></label>
                            	<input type="text" class="form-control" name="ver" placeholder="<?php echo $lang_app_ver;?>" value="<?php echo $content->app_ver;?>">
                            </div>
                            <div class="form-group">
                            	<label for="inputName"><?php echo $lang_app_company;?></label>
                            	<input type="text" class="form-control" name="company" placeholder="<?php echo $lang_app_company;?>" value="<?php echo $content->company;?>">
                            </div>
                            <div class="form-group">
                            	<label for="inputName"><?php echo 'Backup Database';?></label>
                            	<div class="input-group">
                                	<input type="text" class="form-control" name="backup" placeholder="<?php echo 'Backup Database';?>" value="<?php echo $content->database_last_backup;?>" readonly>
                                    <div class="input-group-append">
                                    	<button onclick="uriAlert('<?php echo base_url($this->uri->rsegment(1).'/backup_db');?>')" type="button" class="btn btn-info"><i class="fa fa-cloud"></i> <?php echo 'Backup';?></button>
                                    </div>
                                </div>
                            </div>
                		</div>
                		<div class="col-md-6">
                			<div class="form-group">
                            	<label for="inputName"><?php echo $lang_app_copy_right;?></label>
                            	<input type="text" class="form-control" name="copy_right" placeholder="<?php echo $lang_app_copy_right;?>" value="<?php echo $content->copy_right;?>">
                            </div>
                            <div class="form-group">
                            	<label for="inputName"><?php echo $lang_app_copy_right_url;?></label>
                            	<input type="text" class="form-control" name="copy_right_url" placeholder="<?php echo $lang_app_copy_right_url;?>" value="<?php echo $content->copy_right_url;?>">
                            </div>
                            <div class="form-group">
                            	<label for="inputName"><?php echo $lang_app_address;?></label>
                            	<textarea rows="" cols="" class="form-control summernote" name="address" placeholder="<?php echo $lang_app_address;?>"><?php echo $content->address;?></textarea>
                            </div>
                            <div class="form-group">
                            	<label for="inputName"><?php echo $lang_app_open_registration;?></label>
                            	<select class="form-control select2" name="open_registration">
                            		<option value="1"<?php echo $content->open_registration==1?'selected':'';?>><?php echo $lang_yes;?></option>
                            		<option value="0"<?php echo $content->open_registration==0?'selected':'';?>><?php echo $lang_no;?></option>
                            	</select>
                            </div>
                            <div class="form-group">
                            	<label for="inputName"><?php echo $lang_app_multi_language;?></label>
                            	<select class="form-control select2" name="multi_language">
                            		<option value="1"<?php echo $content->multi_language==1?'selected':'';?>><?php echo $lang_yes;?></option>
                            		<option value="0"<?php echo $content->multi_language==0?'selected':'';?>><?php echo $lang_no;?></option>
                            	</select>
                            </div>
                		</div>
                	</div>
              </div><!-- /.card-body -->
              <div class="card-footer text-right">
              	<button type="submit" class="btn btn-primary"><i class="fa fa-check-double"></i> <?php echo $lang_save;?></button>
                <button type="reset" class="btn btn-default"><i class="fa fa-history"></i> <?php echo $lang_reset;?></button>
              </div>
            </div>
            <?php echo form_close();?>
          </div>
        </div>