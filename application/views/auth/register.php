  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $lang_register_desc;?></p>

      <?php echo form_open('', 'id="GSForm"');?>
      	<?php $this->load->view('components/alert');?>
      	<?php if ($app->open_registration==1){?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="<?php echo $lang_name;?>" name="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="<?php echo $lang_email;?>" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
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
          <input type="text" class="form-control" placeholder="<?php echo $lang_mobile_number;?>" name="hp">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
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
            <button type="submit" class="btn btn-primary btn-block"><?php echo $lang_register;?></button>
          </div>
          <!-- /.col -->
        </div>
        <?php } else {?>
        <p align="center">
        <?php echo $lang_registration_closed;?>
        </p>
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