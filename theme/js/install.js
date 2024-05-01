$(document).on('ready',function(){
    $(document).on('click','.instruction-btn',function(){
    $(".instruction").fadeOut(500,function(){
    $("#install-form-1").fadeIn(500);   	
	});
	});
	
	$(document).on('submit','#install-form-1',function(){
	
	var valid=true;	
	$('#install-form-1 input').each(function() {
	var $this = $(this);

	if(!$this.val()) {
	$(this).css("border","1px solid #e74c3c");
	valid = false;
	}else{
	$(this).css("border","1px solid #CCC");	
	}
	});	
	if(valid==true){
	
	var link=$(this).attr("action");
	$.ajax({
	method : "POST",
	url : link,
	data : $(this).serialize(),
	beforeSend : function(){
	$(".loader").css("display","inline");
	},success : function(data){
	$(".loader").css("display","none");
	if(data=="false"){
	alert("Invalid Database settings !");
	}else{
	//next Page
	$(".install-apps").html(data);
	}
	}
	});
	}
	return false;
	});
	
	
	$(document).on('submit','#final-install',function(){
	var valid=true;	
	$('#final-install input').each(function() {
	var $this = $(this);

	if(!$this.val()) {
	$(this).css("border","1px solid #e74c3c");
	valid = false;
	}else{
	$(this).css("border","1px solid #CCC");	
	}
	});	
	if(valid==true){
	var link=$(this).attr("action");
	$.ajax({
	method : "POST",
	url : link,
	data : $(this).serialize(),
	beforeSend : function(){
	$(".loader").css("display","inline");
	},success : function(data){
	$(".loader").css("display","none");
	if(data=="false"){
	alert("Installation Failed Due To Invalid Settings, Please Try Again");
	}else{
	$(".install-body").html(data);
	}
	}
	});
    }
	return false;
	});
	

  
});