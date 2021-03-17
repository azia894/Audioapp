/*var site_url = window.location.protocol+'://'+window.location.hostname;*/
var site_url = window.location.origin+'/admin';
function goTop(){
	 $('body, html').animate({scrollTop: $("#app").offset().top	});
}
function ajxReqs(url,data,dataType,type){
	return $.ajax({
		url:url,
		data:data,
		dataType:dataType,
		type:type,
		success:function(res){
			return res;
		}
	});
}
/*function ajxReqFile(frm){
return $('#'+frm).ajaxForm({
		beforeSend: function() {
			
		},
		uploadProgress: function(event, position, total, percentComplete) {
			
		},
		success: function() {
			
		},
		complete: function(xhr) {
			status.html(xhr.responseText);
			return xhr.responseText;
		}
	}); 
}*/
function ajxReq(url,data,type,dataType){
	return $.ajax({
		url:url,
		data:data,
		type:type,
		dataType:dataType,
		success:function(res){
			debugger;
			return res;
		}
	});	
}