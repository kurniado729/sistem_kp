const flashdata = $('.flash-data') .data('flashdata');
if(flashdata){
	Swal.fire({
		title: 'Berhasil!',
		text: flashdata,
		icon: 'success',
		confirmButtonText: 'ok'
	})
}


//tombol hapus

$('.tombol-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-success',
			cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
	});

	swalWithBootstrapButtons.fire({
		title: 'Apakan anda yakin ?',
		text: "data akan dihapus!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: 'No, cancel!',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		} else if (
			/* Read more about handling dismissals below */
			result.dismiss === Swal.DismissReason.cancel
		) {
			swalWithBootstrapButtons.fire(
				'Cancelled',
				'Your imaginary file is safe :)',
				'error'
			)
		}
	});
});
