$(document).ready(function(){

$(".calculator").attr('unselectable','on')
     .css({'-moz-user-select':'-moz-none',
           '-moz-user-select':'none',
           '-o-user-select':'none',
           '-khtml-user-select':'none', /* you could also put this in a class */
           '-webkit-user-select':'none',/* and add the CSS class here instead */
           '-ms-user-select':'none',
           'user-select':'none'
     }).bind('selectstart', function(){ return false; });

 //$("#user-type").selectmenu();
 $("html").niceScroll({cursorwidth:"8px",cursorborder:"none",zindex:"10",
 autohidemode:false,cursorcolor:"#2B323A",scrollspeed:100,horizrailenabled:false,
 cursorborderradius:"0px"});
  
 
//For Profile Dropdown Desktop And Responsive View
$("#profile").click(function(){

 $(".dropdown-profile").fadeToggle(500);
 $('.dropdown-alert').hide();

return false;
});

$(document).click(function(event) {
if ( !$(event.target).hasClass('dropdown-profile')) {
     $(".dropdown-profile").fadeOut(500);
}
});

// For Alert Dropdown
$(".my-dropdown").on('click',function(){
if($(".my-dropdown").css('display') == 'block' && $(this).next("ul").css('display')!='block'){ 
   $('.dropdown-alert').hide();
} 
$(this).next("ul").fadeToggle(1000);
if($('.dropdown-profile').css('display') == 'block'){ 
   $('.dropdown-profile').hide();
} 
return false;
});


//Sidebar Nav Menu
 $('#menu').metisMenu();

 //navbar
 $('#menu').slicknav({closeOnClick:true,label: 'Navigation'});

 //Hide Nav

 $(".hide-nav").click(function(){
 if($(".sidebar").width()!="0"){
 $(".js #menu").css("display","none");	
 $(".main-content").animate({paddingLeft: "0px"},300);
 $(".sidebar").animate({width:"0px"},300,function(){
 $(".js .slicknav_menu").css("display","block");	
 }); 
 }else{
 //Expand Sidebar
 $(".js #menu").css("display","block");	
 $(".title").css("display","none");
 $(".main-content").animate({paddingLeft: "240px"},300);
 $(".sidebar").animate({width:"250px"},300,function(){
 $(".js .slicknav_menu").css("display","none");
 $(".title").css("display","inline");	
 }); 
}
 return false;
 });

 //window Resize

 $(window).resize(function(){
 if($(window).width()<=768){
 $(".js .slicknav_menu").css("display","block");
 $(".js #menu").css("display","none");	
 $(".sidebar").css("width","0");
 $(".main-content").css("padding-left","0");		
 }else{
  $(".js .slicknav_menu").css("display","none");
 $(".js #menu").css("display","block");	
 $(".sidebar").css("width","250px");
 $(".main-content").css("padding-left","240px");		
 }

 });


 

$('#menu li a').click(function(){
if($(".sidebar").width()==250){
$("#menu li").each(function(){
if($(this).hasClass("has-sub-change")){
$(this).addClass("has-sub");
$(this).removeClass("has-sub-change");
}
});
if($(this).parent().hasClass("active")){
$(this).parent().removeClass("has-sub");
$(this).parent().addClass("has-sub-change");
}	
}
});
    
$(document).on('click','.exit',function(){
$(".alertbox-info").fadeTo(500, 0.2,function(){     
$(".alertbox-info").remove();
});
});


});


function showIncome(content,date,url,event){
if(url==1){
swal("Already Received",content+" On- "+date, "success")	
}else{
swal({
title: "Are you sure want to reveive "+content+" ?",
text: "You will not be able to Remove this Transaction In Future!",
type: "info",
showCancelButton: true,   
confirmButtonColor: "#1abc9c",   
confirmButtonText: "Yes, Receive it!",   
closeOnConfirm: false,
showLoaderOnConfirm: true}, 
function(){
//Ajax Functionality
$.ajax({
method : "GET",
url : url,
beforeSend : function(){
$(".block-ui").css('display','block');  
},success : function(data){
$(".block-ui").css('display','none');  	
if(data=='true'){
if (typeof event != 'undefined'){
event.url=1;
}	
swal("Received!", "Your Income has been Received.", "success"); 
}
}
});   

});	
}
}

function showExpense(content,date,url,event){
if(url==1){
swal("Already Paid",content+" On- "+date, "success")	
}else{
swal({
title: "Are you sure want to paid "+content+"?",
text: "You will not be able to Remove this Transaction In Future!",
type: "info",
showCancelButton: true,   
confirmButtonColor: "#1abc9c",   
confirmButtonText: "Yes, Pay it!",   
closeOnConfirm: false,
showLoaderOnConfirm: true}, 
function(){   
//Ajax Functionality
$.ajax({
method : "GET",
url : url,
beforeSend : function(){
$(".block-ui").css('display','block');  
},success : function(data){
$(".block-ui").css('display','none');  	
if(data=='true'){
event.url=1;	
swal("Paid!", "Your Transaction Has Been Sucessfully Completed.", "success");
}
}
}); 
});	
}
}

 
function loadpage(){
$(document).on('click','.asyn-menu li a,.slicknav_menu a',function(){		
var link=$(this).attr("href");
if(link!='#' && link !=''){  
$(".block-ui").css('display','block');    
history.pushState(null, null,link);
link=link+"/asyn";  
$('.asyn-div').empty();    
$('.asyn-div').load(link,function() {
$(".block-ui").css('display','none');


//Ajdust content
if($(".sidebar").width()=="0"){
$(".main-content").css("padding-left","0px");
}   
}); 
$(".asyn-menu li a").removeClass('active-menu');
$(".slicknav_menu a").removeClass('active-menu');
$(this).addClass('active-menu'); 

}   

return false;
});

}

function loadpage2(){
$(document).on('click','.asyn-link',function(){
var link=$(this).attr("href");
if(link!='#' && link !=''){  
$(".block-ui").css('display','block');    
history.pushState(null, null,link);
link=link+"/asyn";  
$('.asyn-div').empty();    
$('.asyn-div').load(link,function() {
$(".block-ui").css('display','none');
//Ajdust content
if($(".sidebar").width()=="0"){
$(".main-content").css("padding-left","0px");
}
}); 
$(".asyn-menu li a").removeClass('active-menu');
$(".slicknav_menu a").removeClass('active-menu');
$(this).addClass('active-menu');    
}   
return false;
});

}

$(window).bind('popstate', function(){
link = location.pathname.replace(/^.*[\\\/]/, ''); //get filename only
if(link!=''){  
$('.asyn-div').empty();
$(".block-ui").css('display','block');     
$('.asyn-div').load(link+"/asyn",function() {
$(".block-ui").css('display','none');  
}); 
}
});

function sucessAlert(message){
if (!$(".ajax-notify").length){
$(".system-alert-box").append("<div class='alert alert-success ajax-notify'></div>");
} 	
$('.ajax-notify').css("display","block");	
$('.ajax-notify').addClass("alert-success"); 
$('.ajax-notify').removeClass("alert-danger");     
$('.ajax-notify').html('<i class="fa fa-check"></i> '+message+'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
}

function failedAlert(message){
if (!$(".ajax-notify").length){
$(".system-alert-box").append("<div class='alert alert-success ajax-notify'></div>");
} 	
$('.ajax-notify').css("display","block");	
$('.ajax-notify').removeClass("alert-success"); 
$('.ajax-notify').addClass("alert-danger");     
$('.ajax-notify').html('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-times"></i> '+message);
}

function failedAlert2(message){
if (!$(".ajax-notify").length){
$(".system-alert-box").append("<div class='alert alert-success ajax-notify'></div>");
} 	
$('.ajax-notify').css("display","block");	
$('.ajax-notify').removeClass("alert-success"); 
$('.ajax-notify').addClass("alert-danger");     
$('.ajax-notify').html('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> '+message);
}



var specialElementHandlers = {
'#editor': function (element,renderer) {
return true;
}
};


$(document).on('click','.pdf-btn',function(){
var pdf = new jsPDF('l', 'pt', 'a4');
    pdf.setFont("times");
    pdf.text(40,60,$(".report-heading h4").html());
    pdf.setFontSize(12);
    pdf.text(40,75,$(".report-heading p").html());
    source = $('#Table-div')[0]; //table Id
    specialElementHandlers = { 
        '#bypassme': function (element, renderer) {
            return true
        }
    };
    margins = { //table margins and width
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
    pdf.fromHTML(
    source, 
    margins.left,
    margins.top, { 
        'width': margins.width, 
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        pdf.save('Report.pdf'); //Filename
    }, margins);

});


$(document).on('click','.print-btn',function(){    
Print($("#Report-Table").html()); 
});
