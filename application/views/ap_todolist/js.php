<script src="<?php echo base_url();?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js">
</script>

<!-- date-range-picker -->
<script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script>

<script src="<?php echo base_url();?>assets/vendor/jquery-sortable/js/jquery-sortable.js"></script>
<script>
var group = $("ul.serialization").sortable({
    group: 'serialization',
    onDrop: function ($item, container, _super) {
        var data = group.sortable("serialize").get();
        var jsonString = JSON.stringify(data, null, ' ');

        $("#loading_simpan").show();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url($this->uri->rsegment(1).'/ajax_simpan/')?>",
            data: {
                'serial':jsonString
            },
            cache: false,
            success: function(result){
            	$("#loading_simpan").hide();
            	location.reload();
            }
        });
        _super($item, container);
    }
});


</script>

<script>
  $(function () {

	    //Initialize Select2 Elements
	  $('.select2').select2({
			placeholder: "<?php echo $lang_choose;?>",
		});

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: TRUE,
      timer: 3000
    });



    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });


</script>


<script type="text/javascript">
    jQuery(function($) {
        $('#file').on('change', function() {
                    //use toggle for ease of use
                    $("#alt_file").toggle(this.value == 'file')
                });
    })
</script>

<script type="text/javascript">
    jQuery(function($) {
        $('#file').on('change', function() {
                    //use toggle for ease of use
                    $("#alt_link").toggle(this.value == 'link')
                });
    })
</script>