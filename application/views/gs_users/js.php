<!-- bs-custom-file-input -->
<script src="<?php echo base_url();?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function() {
	
	$('.select2').select2({
		placeholder: "<?php echo $lang_choose;?>",
	});
	  bsCustomFileInput.init();
	  $("#example1").DataTable({
	      "scrollX": true,
	      "autoWidth": false,
	      "columnDefs": [ {
	          "targets"  : 'no-sort',
	          "orderable": false,
	      }],
	  });
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
			    <?php if ($this->uri->rsegment(3)==NULL){?>
			    password: {
				    required: true,
				},
				password_confirm: {
				  	required: true,
				  	equalTo: "#password"
				},
				<?php }?>
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