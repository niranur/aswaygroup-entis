<!-- bs-custom-file-input -->
<script src="<?php echo base_url();?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script type="text/javascript">
var save_method; //for save method string
var table;

function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal-default').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
}


function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo base_url('ap_employee/employee_add')?>";
    } else {
   	 url = "<?php echo base_url('ap_employee/employee_add')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
               // reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}
</script>


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

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });


    $('.toastsDefaultWarning').click(function() {
        $(document).Toasts('create', {
          class: 'bg-warning',
          title: 'New TodoList',
          subtitle: 'Subtitle',
          body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });

    $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          type: 'success',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });

</script>