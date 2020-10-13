<!-- jquery-validation -->
<script src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<script>
$(function() {
	  $.validator.setDefaults({
		    submitHandler: function (form) {
			  <?php if ($this->uri->rsegment(2)=='register'){?>
              <?php $this->load->view('components/swal');?>
              <?php } else {?>
		      form.submit();
		      <?php }?>
		    }
		  });
		  $('#GSForm').validate({
		    rules: {
		      nama: {
			    required: true,
			  },
		      email: {
		        required: true,
		      },
		      password: {
		        required: true,
		      },
		      password_confirm: {
			  	required: true,
			  	equalTo: "#password"
			  },
		      captcha: {
		    	required: true,
		      }
		    },
		    messages: {
		      nama: {
		        required: "<?php echo $lang_required;?>",
		      },
		      email: {
			    required: "<?php echo $lang_required;?>",
			  },
		      password: {
		    	required: "<?php echo $lang_required;?>",
		    	equalTo: "<?php echo $lang_must_same;?>",
		      },
		      password_confirm: {
			    required: "<?php echo $lang_required;?>",
			  },
		      captcha: {
			    required: "<?php echo $lang_required;?>",
			  },
		    },
		    errorElement: 'span',
		    errorPlacement: function (error, element) {
		      error.addClass('invalid-feedback');
		      element.closest('.form-group').append(error);
		    },
		    highlight: function (element, errorClass, validClass) {
		      $(element).addClass('is-invalid');
		    },
		    unhighlight: function (element, errorClass, validClass) {
		      $(element).removeClass('is-invalid');
		    }
		  });
});

function generate_captcha(){
	$.ajax({
    	type: "POST",
    	url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_generate_captcha')?>",
    	cache: false,
    	success: function(result){
    		$('#captcha').html(result);
    	}
    });
}
</script>