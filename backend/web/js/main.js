jQuery(document).ready(function () {

	$('#button-create').click(function(){
		$('#modal-create').modal('show')
		.find('#modal-socialAccount-content')
		.load($(this).attr('value'));
	});

});