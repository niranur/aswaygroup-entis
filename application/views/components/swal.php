	
	Swal.fire({
		title: '<?php echo $lang_are_you_sure;?>?',
		text: "<?php echo $lang_are_you_sure_desc;?>",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: '&nbsp;&nbsp;&nbsp;<?php echo $lang_yes;?>&nbsp;&nbsp;&nbsp;',
		cancelButtonText: '&nbsp;&nbsp;&nbsp;<?php echo $lang_no;?>&nbsp;&nbsp;&nbsp;',
		reverseButtons: true,
		showClass: {
		    popup: 'animate__animated animate__fadeInDown'
		},
		hideClass: {
		    popup: 'animate__animated animate__fadeOutUp'
		},
	}).then((result) => {
		if (result.value) {
			form.submit();
		}
	});