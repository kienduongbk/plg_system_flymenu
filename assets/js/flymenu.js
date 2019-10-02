jQuery(document).ready(function($){
	$(document).on('click','.flymenu-offcanvas-toggle',function(e){
		e.preventDefault();
		$('.flymemu').toggle();
	});
});
