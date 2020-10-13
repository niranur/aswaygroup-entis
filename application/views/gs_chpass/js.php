<script>
$(function() {
	  $.validator.setDefaults({
		    submitHandler: function (form) {
              <?php $this->load->view('components/swal');?>
		    }
		  });
		  $('#GSForm').validate({
		    rules: {
		    	password: {
			        required: true,
			    },
			    password_confirm: {
				  	required: true,
				  	equalTo: "#password"
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
</script>