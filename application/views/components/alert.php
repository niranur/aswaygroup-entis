<?php if (!empty($this->session->flashdata('status'))){?>
<div class="alert alert-<?php echo $this->session->flashdata('status_title');?> alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h6><i class="icon fas <?php echo status_to_icon($this->session->flashdata('status_title'));?>"></i> <b><?php echo $lang_alert;?></b></h6>
	<?php echo $this->session->flashdata('status');?>
</div>
<?php }?>
<?php if (!empty(validation_errors())){?>
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<h6><i class="icon fas fa-ban"></i> <b><?php echo $lang_alert;?></b></h6>
	<?php echo validation_errors_trim(validation_errors());?>
</div>
<?php }?>