$(document).ready(function(){
	$(document).on("click","#info_button",function(){
		$("#info").show();
		$("#modal_background").show()
		$("#options").hide();
		return false;
		// return false stops default action of returning to original html page
	});
	$(document).on("click","#options_button",function(){
		$("#options").show();
		$("#modal_background").show()
		$("#info").hide();
		
		return false;
		// return false stops default action of returning to original html page
	}); 

	$(document).on("click", "#modal_background", function(){
		$("#options").hide();
		$("#info").hide();
		$("#modal_background").hide();
	});
	
});