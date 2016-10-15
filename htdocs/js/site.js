$(document).ready(function(){
	$(document).on("click","#info_button",function(){
		$("#info").toggle();
		return false;
		// return false stops default action of returning to original html page
	});
	$(document).on("click","#options_button",function(){
		$("#options").toggle();
		return false;
		// return false stops default action of returning to original html page
	}); 
	
	$(document).on("click", "#close_info", function(){
		$("#info").toggle();
	});
	
	
	$(document).on("click", "#close_options", function(){
		$("#options").toggle();
	});
});