$(document).ready(function() {  
	$('#s').data('holder',$('#s').attr('placeholder'));
	$('#s').focusin(function(){
		$(this).attr('placeholder','');
	});
	$('#s').focusout(function(){
		$(this).attr('placeholder',$(this).data('holder'));
	});	
});