		<div class="row">
		<?php 
		$type = '';
		foreach ($list_module as $val):
		?>
		  <?php 
		  if ($val->type == 0) {
		      $type = $val->$mylanguages_field;
		  } else {
		  ?>
		  
          <div class="col-md-4 col-sm-6 col-12">
          	<a href="<?php echo base_url($val->slug);?>" style="color:#000000 !important; text-decoration: none;">
            <div class="info-box">
              <span class="info-box-icon bg-<?php echo $val->color;?>"><i class="fa <?php echo $val->icon;?>"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo $type;?></span>
                <span class="info-box-number"><?php echo $val->$mylanguages_field;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </a>
          </div>
          
          <?php }?>
          <?php endforeach;?>
        </div>