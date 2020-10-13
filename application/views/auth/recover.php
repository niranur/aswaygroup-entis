<div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $lang_recover_password_desc;?></p>

      <?php echo form_open(base_url('auth/recover?token='.$_GET['token']), 'id="GSForm"');?>
      	<?php $this->load->view('components/alert');?>
      	<?php if ($valid_token){?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="<?php echo $lang_password;?>" name="password" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="<?php echo $lang_password_confirm;?>" name="password_confirm">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <div class="form-control" style="border:none;">
          	<div id="captcha">
          	<?php echo $captcha_img;?>
          	</div>
          </div>
          <div class="input-group-append">
            <div class="input-group-text" style="border:none;">
              <a class="btn btn-sm btn-info" href="javascript:;" onclick="generate_captcha()" tabindex="-1"><i class="fas fa-sync"></i></a>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input class="form-control" type="text" placeholder="<?php echo $lang_captcha;?>" name="captcha" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"><?php echo $lang_recover_password;?></button>
          </div>
          <!-- /.col -->
        </div>
        <?php }?>
      <?php echo form_close();?>

      <p class="mt-3 mb-1">
        <a href="<?php echo base_url('auth/login');?>" class="btn btn-block">
          <i class="fa fa-sign-in-alt mr-2"></i> <?php echo $lang_login;?>
        </a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>