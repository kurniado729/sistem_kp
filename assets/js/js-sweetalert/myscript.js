const flashdata = $('.flash-data') .data('flashdata');
if(flashdata){
	Swal({
		title: 'Data Menu',
		text: flashdata,
		type: 'success'
	});
}
