$(document).ready(function(){
	$("#add_subject_form").validate({
		rules:{
			'sub_name':{
				required:true
			},
			
		},
		messages:{
			sub_name:'Please enter Genre/Subject',
			
		},
	submitHandler:function(form){
			
		$(form).ajaxSubmit({
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;
					
				},
				success: function() {
						debugger;
					
				},
				complete: function(xhr) {
                 debugger;					
					var j = JSON.parse(xhr.responseText);
					$("#add_sub_msg").html(j.msg);					
					if(j.status){	
					debugger;							
						$("#add_subject_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
						$("#add_sub_msg").html(j.msg);
							window.location=site_url+'/subject';							
						}else {
						}
				}
			}); 
			
			return false;
		}
	});	
	
	
	
	$("#add_Author_form").validate({
		rules:{
			'aut_name':{
				required:true
			},
			'aut_desc':{
				required:true
			},
			'aut_img':{
				required:true
			},
			
		},
		messages:{
			aut_name:'Please enter Author Name',
			aut_desc:'Please enter description',
			aut_img:'Please select image',
		},
		submitHandler:function(form){
			debugger;	
			
		$(form).ajaxSubmit({
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;
					
				},
				success: function() {
						debugger;
					
				},
				complete: function(xhr) {
                 debugger;					
					var j = JSON.parse(xhr.responseText);
					$("#add_author_msg").html(j.msg);					
					if(j.status){	
					debugger;							
						$("#add_Author_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
						$("#add_author_msg").html(j.msg);
							window.location=site_url+'/author';							
						}else {
						}
				}
			}); 
			
			return false;
		}
	});
	
	
	$("#add_narrator_form").validate({
		rules:{
			'nar_name':{
				required:true
			},
			'nar_desc':{
				required:true
			},
			'nar_img':{
				required:true
			},
			
		},
		messages:{
			aut_name:'Please enter Name',
			aut_desc:'Please enter description',
			aut_img:'Please select image',
		},
		submitHandler:function(form){
			debugger;	
			
		$(form).ajaxSubmit({
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;
					
				},
				success: function() {
						debugger;
					
				},
				complete: function(xhr) {
                 debugger;					
					var j = JSON.parse(xhr.responseText);
					$("#add_narrator_msg").html(j.msg);					
					if(j.status){	
					debugger;							
						$("#add_narrator_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
						$("#add_narrator_msg").html(j.msg);
							window.location=site_url+'/narrator';							
						}else {
						}
				}
			}); 
			
			return false;
		}
	});	

	$("#add_book_form").validate({
		rules:{
			'sub_id':{
				required:true
			},
			'author_id':{
				required:true
			},
			'bk_name':{
				required:true
			},
			'bk_desc':{
				required:true
			},
			'bk_img':{
				required:true
			},
			
		},
		messages:{
			sub_id:'Please select Subject/Genre',
			author_id:'Please select Author',
			bk_name:'Please enter Name',
			bk_desc:'Please enter Description',
			bk_img:'Please select Image',
		},
		submitHandler:function(form){
			debugger;	
			
		$(form).ajaxSubmit({
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;
					
				},
				success: function() {
						debugger;
					
				},
				complete: function(xhr) {
                 debugger;					
					var j = JSON.parse(xhr.responseText);
					$("#add_book_msg").html(j.msg);					
					if(j.status){	
					debugger;							
						$("#add_book_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
						$("#add_book_msg").html(j.msg);
							window.location=site_url+'/books';							
						}else {
						}
				}
			}); 
			
			return false;
		}
	});	

	$("#add_chapter_form").validate({
		rules:{
			'bid':{
				required:true
			},
			'nar_id':{
				required:true
			},
			'ch_name':{
				required:true
			},
			
			'ch_img':{
				required:true
			},
			
		},
		messages:{
			bid:'Please select Book',
			nar_id:'Please select Narrator',
			ch_name:'Please enter Name',
			
			ch_img:'Please select Image',
		},
		submitHandler:function(form){
			debugger;	
			
		$(form).ajaxSubmit({
				beforeSend: function() {	
					debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					debugger;
					
				},
				success: function() {
						debugger;
					
				},
				complete: function(xhr) {
                 debugger;
				 var bid = document.getElementById("bid").value;					
					var j = JSON.parse(xhr.responseText);
					$("#add_chapter_msg").html(j.msg);					
					if(j.status){	
					debugger;							
						$("#add_chapter_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
						$("#add_chapter_msg").html(j.msg);
							window.location=site_url+'/chapter/list/'+bid;							
						}else {
						}
				}
			}); 
			
			return false;
		}
	});	

	
	$('.datetimepicker').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		format: "yyyy-mm-dd ",
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
		});
});
function ldddd() {
	$('.mathedit').each(function() {
		var ele = this.id;
		tinymce.init({ 
			font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
			plugins: [
			"eqneditor advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste",
		"textcolor colorpicker" ],
			toolbar: "undo redo | eqneditor link image | styleselect | bold italic | bullist numlist outdent indent	",
			selector : '#'+ele,
			setup: function(instance) {
					instance.on('blur', function(id) {
						tinymce.remove('#'+ele);
					});
				}
			});
		});
	
}
/*ldddd();*/
$(function(){
	$(document).on("focus",".mathedit",function(){
		var ele = $(this).attr('id');
		tinymce.init({ 
		font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
		plugins: [
		"eqneditor advlist autolink lists link image charmap print preview anchor",
		"searchreplace visualblocks code fullscreen",
		"insertdatetime media table contextmenu paste",
		"textcolor colorpicker" ],
		toolbar: "undo redo | eqneditor link image | styleselect | bold italic | bullist numlist outdent indent	 | forecolor backcolor",
		selector : '#'+ele,
		setup: function(instance) {
				instance.on('blur', function(id) {
					tinymce.remove('#'+ele);
				});
			}
		});
		
	});
	
	/*$("body").on("blur",".mathedit",function(){
		var ele = $(this).attr('id');
		tinymce.init({ 
		plugins: [
		"eqneditor advlist autolink lists link image charmap print preview anchor",
		"searchreplace visualblocks code fullscreen",
		"insertdatetime media table contextmenu paste" ],
		toolbar: "undo redo | eqneditor link image | styleselect | bold italic | bullist numlist outdent indent	",
		selector : '#'+ele,
		setup: function(instance) {
				instance.on('blur', function(id) {
					tinymce.remove('#'+ele);
				});
			}
		});
	});*/
	
	$(document).on("focusout",".mathedit",function(){
		var ele = $(this).attr('id');
		tinymce.init({ 
		font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
		plugins: [
		"eqneditor advlist autolink lists link image charmap print preview anchor",
		"searchreplace visualblocks code fullscreen",
		"insertdatetime media table contextmenu paste",
		"textcolor colorpicker" ],
		toolbar: "undo redo | eqneditor link image | styleselect | bold italic | bullist numlist outdent indent	 | forecolor backcolor",
		selector : '#'+ele,
		setup: function(instance) {
				instance.on('blur', function(id) {
					tinymce.remove('#'+ele);
				});
			}
		});
	});
	var extraObj1 =  $("#fileuploader1").uploadFile({
		url:site_url+'/gallery/uploadimgs',
		fileName:"file",
		extraHTML:function()
       {
    	var html = "<div><b>File Tags:</b><input type='text' name='tags' value='' /> <br/>";
		html += "</div>";
		return html;    		
        },
		showDone:true,
		uploadStr:'Select Files',
		dynamicFormData: function()
		{
			var data =$("#add_img_form").serialize();
			//alert(data);
			return data;        
		},
		autoSubmit:false,
		allowedTypes:"*",
		onSuccess:function(files,data,xhr,pd)
		{
			$('#add_img_form').append(data.msg);	
			/*window.locoffeeion=site_url+'/tests/pend';*/
		}
	});
	
	$("#uploadbtn1").click(function(){
		extraObj1.startUpload();
	}); 	
});


$(document).ready(function(){
	 var tb = $(".url"); 
	 var item = $(".videourl").length;
     $("#addUrl").click(function(){
	 var newrow = item;
     $('<div class="form-group videourl"><label>URL:</label><input type="text" class="form-control" id="video_url'+newrow+'" name= "video_url[]"><button class="btn btn-icon waves-effect waves-light btn-danger delRowBtn"> <i class="fa fa-remove"></i> </button></div>').appendTo(tb);     
	item++;
});	
});
/*$(document.body).delegate(".delRowBtnr", "click", function(){
        $(this).closest(".videourl").remove();        
}); */
$(document.body).delegate(".delRowBtn", "click", function(){ 
		var delRowBtn = $(this);
		var e = delRowBtn.attr('data');
		if(e==undefined){
			delRowBtn.closest('.videourl').remove();
		}else if(e>0){
			var data = {e:e};
			var req = ajxReq(site_url+'/videos/urlDel',data,'POST','json');
			req.done(function(data){
					debugger;
				if(data.success){			
					debugger;
					delRowBtn.closest('.videourl').remove();  
					$("#msg").html(data.msg);
				}
			});
		}
		return false;
}); 
