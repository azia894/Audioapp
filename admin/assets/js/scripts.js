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
			'gender':{
				required:true
			},
			'country':{
				required:true
			},
			'city':{
				required:true
			},
			'nar_desc':{
				required:true
			},
			
			
		},
		messages:{
			nar_name:'Please enter Name',
			gender:'Please enter Gender',
			country:'Please enter Country',
			city:'Please enter City',
			nar_desc:'Please enter Description',
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
						$("#add_narrator_form").find("input[type=text],input[type=email],input[type=file],input[type=radio],select,textarea").val("");
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
			'up':{
				required:true
			},
			'bk_year':{
				required:true
			},
			'bk_blurb':{
				required:true
			},
			'bk_tags':{
				required:true
			},
			
		},
		messages:{
			sub_id:'Please select Subject/Genre',
			author_id:'Please select Author',
			bk_name:'Please Enter Name',
			bk_desc:'Please Enter Description',
			up:'Please Select Image',
			bk_year:'Please Enter Year of Publication',
			bk_blurb:'Please Enter Blurb',
			bk_tags:'Please Enter Tags',
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

	$("#add_abook_form").validate({
		rules:{
			'bk_age':{
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
			bk_age:'Please select Age',
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
					$("#add_abook_msg").html(j.msg);					
					if(j.status){	
					debugger;							
						$("#add_abook_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
						$("#add_abook_msg").html(j.msg);
							window.location=site_url+'/abooks';							
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

	$("#edit_sub_form").validate({
		rules:{
			'sub_name':{
				required:true
			},
			
		},
		messages:{
			sub_name:'Please enter Subject Name',
			
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
					$("#edit_sub_msg").html(j.msg);					
					if(j.status){	
					debugger;							
						$("#edit_sub_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
						$("#edit_sub_msg").html(j.msg);
							window.location=site_url+'/subject';							
						}else {
						}
				}
			}); 
			
			return false;
		}
	});	

	$("#edit_authors_form").validate({
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
			aut_name:'Please enter Authors Name',
			aut_desc:'Please enter description',
			aut_img:'Please select image',
		},
		submitHandler:function(form){
			debugger;	
			var action = $(form).attr("action");
			
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
					$("#edit_authors_msg").html(j.msg);					
					if(j.status){	
					debugger;							
						$("#edit_authors_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
						$("#edit_authors_msg").html(j.msg);
							window.location=site_url+'/author';							
						}else {
						}
				}
			}); 
			
			return false;
		}
	});	

	$("#edit_narrator_form").validate({
		rules:{
			'nar_name':{
				required:true
			},
			'gender':{
				required:true
			},
			'country':{
				required:true
			},
			'city':{
				required:true
			},
			'nar_desc':{
				required:true
			},
			
		},
		messages:{
			nar_name:'Please enter narrator Name',
			gender:'Please enter Gender',
			country:'Please enter Country',
			city:'Please enter City',
			nar_desc:'Please enter description',
			
		},
		submitHandler:function(form){
			debugger;	
			var action = $(form).attr("action");
			
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
					$("#edit_narrator_msg").html(j.msg);					
					if(j.status){	
					debugger;							
						$("#edit_narrator_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
						$("#edit_narrator_msg").html(j.msg);
							window.location=site_url+'/narrator';							
						}else {
						}
				}
			}); 
			
			return false;
		}
	});	

	$("#edit_books_form").validate({
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
			'up':{
				required:true
			},
			'bk_year':{
				required:true
			},
			'bk_blurb':{
				required:true
			},
			'bk_tags':{
				required:true
			},
		},
		messages:{
			sub_id:'Please select Subject/Genre',
			author_id:'Please select Author',
			bk_name:'Please Enter Name',
			bk_desc:'Please Enter Description',
			up:'Please Select Image',
			bk_year:'Please Enter Year of Publication',
			bk_blurb:'Please Enter Blurb',
			bk_tags:'Please Enter Tags',
		},
		submitHandler:function(form){
			debugger;	
			var action = $(form).attr("action");
			
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
					$("#edit_books_msg").html(j.msg);					
					if(j.status){	
					debugger;							
						$("#edit_books_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
						$("#edit_books_msg").html(j.msg);
							window.location=site_url+'/books';							
						}else {
						}
				}
			}); 
			
			return false;
		}
	});	

	$("#edit_abooks_form").validate({
		rules:{
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
			bk_name:'Please enter Book Name',
			bk_desc:'Please enter description',
			bk_img:'Please select image',
		},
		submitHandler:function(form){
			debugger;	
			var action = $(form).attr("action");
			
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
					$("#edit_abooks_msg").html(j.msg);					
					if(j.status){	
					debugger;							
						$("#edit_abooks_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
						$("#edit_abooks_msg").html(j.msg);
							window.location=site_url+'/abooks';							
						}else {
						}
				}
			}); 
			
			return false;
		}
	});	

	$("#edit_chapters_form").validate({
		rules:{
			'nar_id':{
				required:true
			},
			'ch_name':{
				required:true
			},
			'ch_audio':{
				required:true
			},
		},
		messages:{
			nar_id:'Please enter Narrator Name',
			ch_name:'Please enter Title',
			ch_audio:'Please select image',
		},
		submitHandler:function(form){
			debugger;	
			var action = $(form).attr("action");
			
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
					$("#edit_chapters_msg").html(j.msg);					
					if(j.status){	
					debugger;							
						$("#edit_chapters_form").find("input[type=text],input[type=email],input[type=file],select,textarea").val("");
						$("#edit_chapters_msg").html(j.msg);
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
 	
});



