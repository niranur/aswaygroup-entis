		<div class="row">
          <div class="col-md-4">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <a class="example-image-link" href="<?php echo base_url('uploads/'.$users->users_avatar);?>" data-lightbox="example-1">
                  	<img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('uploads/'.$users->users_avatar);?>" alt="User profile picture">
                  </a>
                </div>

                <h3 class="profile-username text-center"><?php echo $users->users_name;?></h3>

                <p class="text-muted text-center"><?php echo $users->roles;?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b><?php echo $lang_email;?></b> <a class="float-right"><?php echo $users->users_email;?></a>
                  </li>
                  <li class="list-group-item">
                    <b><?php echo $lang_mobile_number;?></b> <a class="float-right"><?php echo $users->users_mobile_number;?></a>
                  </li>
                  <li class="list-group-item">
                    <b><?php echo $lang_join_date;?></b> <a class="float-right"><?php echo date('D, M Y', strtotime($users->users_date_join));?></a>
                  </li>
                  <li class="list-group-item">
                    <b><?php echo $lang_active_period;?></b> 
                    <a class="float-right"><?php echo $users->users_date_due==NULL?$lang_unlimited:date('D, M Y', strtotime($users->users_date_due));?>
                    	<br>
                    	<?php if ($users->users_date_due!=NULL){ ?>
                    	<span class="badge badge-info">
                    		<?php echo count_day($users->users_date_due, date('Y-m-d')).' '.$lang_day;?>
                    	</span>
                    	<?php }?>
                    </a>
                  </li>
                </ul>

                <a href="<?php echo base_url('gs_chpass')?>" class="btn btn-primary btn-block"><b><?php echo $lang_chpass;?></b></a>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-8">
          	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $lang_update.' '.$lang_profile;?></h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php echo form_open_multipart('', 'class="form-horizontal" id="GSForm"');?>
                	<?php $this->load->view('components/alert');?>
                	<div class="form-group row">
                    	<label for="inputName" class="col-sm-3 col-form-label"><?php echo $lang_name;?></label>
                    	<div class="gs-field col-sm-9">
                    		<input type="text" class="form-control" name="nama" placeholder="<?php echo $lang_name;?>" value="<?php echo $users->users_name;?>">
                    	</div>
                    </div>
                    <div class="form-group row">
                    	<label for="inputName" class="col-sm-3 col-form-label"><?php echo $lang_email;?></label>
                    	<div class="gs-field col-sm-9">
                    		<input type="text" class="form-control" name="email" placeholder="<?php echo $lang_email;?>" value="<?php echo $users->users_email;?>">
                    	</div>
                    </div>
                    <div class="form-group row">
                    	<label for="inputName" class="col-sm-3 col-form-label"><?php echo $lang_mobile_number;?></label>
                    	<div class="gs-field col-sm-9">
                    		<input type="text" class="form-control" name="hp" placeholder="<?php echo $lang_mobile_number;?>" value="<?php echo $users->users_mobile_number;?>">
                    	</div>
                    </div>
                    <div class="form-group row">
                    	<label for="inputName" class="col-sm-3 col-form-label"><?php echo $lang_avatar;?></label>
                    	<div class="col-sm-9">
                    		<div class="custom-file">
                            	<input type="file" class="custom-file-input" id="exampleInputFile" name="avatar" placeholder="<?php echo $lang_avatar;?>">
                            	<label class="custom-file-label" for="exampleInputFile"><?php echo $lang_choose;?> file</label>
                            </div>
                    	</div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-check-double"></i> <?php echo $lang_save;?></button>
                          <button type="reset" class="btn btn-default"><i class="fa fa-history"></i> <?php echo $lang_reset;?></button>
                        </div>
                    </div>
              	<?php echo form_close();?>
              </div><!-- /.card-body -->
            </div>
          </div>
        </div>