<!-- bs-custom-file-input -->
<script src="<?php echo base_url();?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function() {
	  bsCustomFileInput.init();
	  $.validator.setDefaults({
		    submitHandler: function (form) {
              <?php $this->load->view('components/swal');?>
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
		      hp: {
			        required: true,
			  },
		    },
		    errorElement: 'span',
		    errorPlacement: function (error, element) {
		      error.addClass('invalid-feedback');
		      element.closest('.gs-field').append(error);
		    },
		    highlight: function (element, errorClass, validClass) {
		      $(element).addClass('is-invalid');
		    },
		    unhighlight: function (element, errorClass, validClass) {
		      $(element).removeClass('is-invalid');
		    }
		  });
});
</script>