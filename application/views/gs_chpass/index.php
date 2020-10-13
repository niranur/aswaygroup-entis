		<div class="row">
          <div class="col-md-6">
          	<?php echo form_open('', 'role="form" id="GSForm"');?>	
          	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $lang_update.' '.$lang_password;?></h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php $this->load->view('components/alert');?>
                <div class="form-group">
                    <label for="password"><?php echo $lang_password;?></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo $lang_password;?>" value="">
                </div>
                <div class="form-group">
                    <label for="password_confirm"><?php echo $lang_password_confirm;?></label>
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="<?php echo $lang_password_confirm;?>" value="">
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