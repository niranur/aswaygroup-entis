		<?php echo form_open_multipart('', 'class="form-horizontal" id="GSForm"');?>
		<div class="row">
          <div class="col-md-12">
          	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $lang_form;?></h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php $this->load->view('components/alert');?>
                <div class="row">
          			<div class="col-md-6">
                        <div class="form-group">
                        	<label for="inputName"><?php echo $lang_email;?></label>
                        	<input type="text" class="form-control" name="email" placeholder="<?php echo $lang_email;?>" value="<?php echo $content->users_email;?>">
                        </div>
                        <div class="form-group">
                        	<label for="inputName"><?php echo $lang_mobile_number;?></label>
                        	<input type="text" class="form-control" name="hp" placeholder="<?php echo $lang_mobile_number;?>" value="<?php echo $content->users_mobile_number;?>">
                        </div>
                        <div class="form-group">
                            <label for="password"><?php echo $lang_password;?></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo $lang_password;?>" value="">
                        </div>
                        <div class="form-group">
                            <label for="password_confirm"><?php echo $lang_password_confirm;?></label>
                            <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="<?php echo $lang_password_confirm;?>" value="">
                        </div>
                        <div class="form-group">
                            <label for="inputName"><?php echo $lang_roles;?></label>
                            <select class="form-control select2" name="role">
                            	<option></option>
                            <?php foreach ($roles as $val):?>
                            	<option value="<?php echo $val->id;?>"<?php echo $content->roles_id==$val->id?'selected':'';?>><?php echo $val->roles;?></option>
                            <?php endforeach;?>
                        	</select>
                        </div>
                        <div class="form-group">
                        	<label for="inputName"><?php echo $lang_active_period;?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            	<input type="text" class="form-control datepicker" value="<?php echo $content->users_date_due;?>" name="due" autocomplete="off" placeholder="<?php echo $lang_active_period;?>">
                          </div>
                        </div>
              		</div><!-- /.card-body -->
              		<div class="col-md-6">
              			<div class="form-group">
                        	<label for="inputName"><?php echo $lang_name;?></label>
                        	<input type="text" class="form-control" name="nama" placeholder="<?php echo $lang_name;?>" value="<?php echo $content->users_name;?>">
                        </div>
                        <div class="form-group">
                        	<label for="inputName"><?php echo $lang_avatar;?></label>
                        	<p align="center">
                            	<a class="example-image-link" href="<?php echo base_url('uploads/'.$content->users_avatar);?>" data-lightbox="example-1">
                                	<img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('uploads/'.$content->users_avatar);?>" alt="User profile picture">
                                </a>
                            </p>
                        	<div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="avatar" placeholder="<?php echo $lang_avatar;?>">
                            	<label class="custom-file-label" for="exampleInputFile"><?php echo $lang_choose;?> file</label>
                        	</div>
                        </div>
                        <div class="form-group">
                            <label for="inputName"><?php echo $lang_language;?></label>
                            <select class="form-control select2" name="lang">
                            <?php foreach ($language as $val):?>
                            	<option value="<?php echo $val->lang;?>"<?php echo $content->users_lang==$val->lang?'selected':'';?>><?php echo ucfirst($val->lang);?></option>
                            <?php endforeach;?>
                        	</select>
                        </div>
                        <div class="form-group">
                            <label for="inputName"><?php echo $lang_active;?></label>
                            <select class="form-control select2" name="active">
                            	<option value="1"<?php echo $content->users_active==1?'selected':'';?>><?php echo $lang_yes;?></option>
                            	<option value="0"<?php echo $content->users_active==2?'selected':'';?>><?php echo $lang_no;?></option>
                        	</select>
                        </div>
              		</div>
              	</div>
              </div>
              <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check-double"></i> <?php echo $lang_save;?></button>
                  <button type="reset" class="btn btn-default"><i class="fa fa-history"></i> <?php echo $lang_reset;?></button>
              </div>
            </div>
          </div>
        </div>
        <?php echo form_close();?>