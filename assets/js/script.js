function triFunction(value){	
	$('.card').not('.'+value).hide('1000');
	$('.card').filter('.'+value).show('1000');
}
