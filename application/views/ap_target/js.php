<!-- bs-custom-file-input -->
<script src="<?php echo base_url();?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function() {

	var rupiah = document.getElementById("rupiah");
	rupiah.addEventListener("keyup", function(e) {
	  // tambahkan 'Rp.' pada saat form di ketik
	  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
	  rupiah.value = formatRupiah(this.value);
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix) {
	  var number_string = angka.replace(/[^,\d]/g, "").toString(),
	    split = number_string.split(","),
	    sisa = split[0].length % 3,
	    rupiah = split[0].substr(0, sisa),
	    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	  // tambahkan titik jika yang di input sudah menjadi angka ribuan
	  if (ribuan) {
	    separator = sisa ? "." : "";
	    rupiah += separator + ribuan.join(".");
	  }

	  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
	  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
	}


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

<script type="text/javascript">
    jQuery(function($) {
        $('#target').on('change', function() {
                    //use toggle for ease of use
                    $("#alt_narasi").toggle(this.value == '1')
                });
    })
</script>

<script type="text/javascript">
    jQuery(function($) {
        $('#target').on('change', function() {
                    //use toggle for ease of use
                    $("#alt_nominal").toggle(this.value == '0')
                });
    })
</script>