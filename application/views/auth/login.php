  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $lang_login_desc;?></p>

      <?php echo form_open('', 'id="GSForm"');?>
      	<?php $this->load->view('components/alert');?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="<?php echo $lang_email;?>" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="<?php echo $lang_password;?>" name="password">
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
          <div class="col-8">
            <div class="icheck-primary" style="display: none;">
              <input type="checkbox" id="remember">
              <label for="remember">
                <?php echo $lang_remember_me;?>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><?php echo $lang_login;?></button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close();?>

      <div class="social-auth-links text-center mb-3">
        <p>- <?php echo strtoupper($lang_or);?> -</p>
        <?php if ($app->open_registration==1){?>
        <a href="<?php echo base_url('auth/register');?>" class="btn btn-block">
          <i class="fa fa-user-lock mr-2"></i> <?php echo $lang_register_desc;?>
        </a>
        <?php }?>
        <a href="<?php echo base_url('auth/forgot');?>" class="btn btn-block">
          <i class="fa fa-unlock mr-2"></i> <?php echo $lang_forgot_password;?>
        </a>
      </div>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>