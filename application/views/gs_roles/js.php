<script>
$(function() {

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

	function parent(val){
	  if ($('#module_'+val).is(':checked')) {
		  $('.module_child_'+val).prop('checked', true);
	  } else {
		  $('.module_child_'+val).prop('checked', false);
	  }
	}

	function child(val){
	  	var favorite = [];
	    $.each($("input[name='module[]']:checked"), function(){
		    var ambil = $(this).val().split("_");
		    if(parseFloat(ambil[1])==val){
		    	favorite.push($(this).val());
		    }         
	    });
	    
	    if(parseFloat(favorite.length)==0){
	    	$('#module_'+val).prop('checked', false);	    	
	    } else {
	    	$('#module_'+val).prop('checked', true);
	    }
	}
</script>