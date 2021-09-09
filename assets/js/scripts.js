function goTop(){
	 $('body, html').animate({scrollTop: $("#app").offset().top	});
}
$(document).ready(function(){
	/*Blog List*/
	var init_page=1;
	var rows_per_page=4;
	var pgtotal=0;
	var pagination = $(".pagination");
	var blog_list =$(".blog_list");
	var action = site_url+'/blog/pagination/'+init_page;
	$.ajax({
			   url:action,
			   success:function(res){
				var j = JSON.parse(res);
				if(j.status){
					$.each(j.data.blogs,function(k,v3){
						    var c = new Date(v3.created_on);
                            var day = c.getDate();	
                            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June","July", "Aug", "Sep", "Oct", "Nov", "Dec"];
                            var month = monthNames[c.getMonth()];	
							var img = img_url+'/assets/blogimages/'+v3.blog_img;
							var desc =  v3.blog_desc.substr(0, 100);
							var url = site_url+'/blog/blogview/'+v3.blog_id;
					blog_list.append('<article class="post"><div class="row"><div class="col-md-6"><figure class="post-thumbnail"><img alt="" src="'+img+'"></figure></div><div class="col-md-6"><div class="entry"><div class="entry-date">'+day+'<small> /'+month+'</small></div><h3 class="title entry-title"><a href="#">'+v3.blog_title+'</a></h3><div class="entry-content">'+desc+'...<a class="btn bg-color_primary" href="'+url+'">READ MORE</a></div><div class="entry-meta">Post by <a href="#" class="entry-meta-author">RCC</a></div></div></div></div></article>');
					});
					pgtotal = j.data.total_records;
					pagination.html(" ");
					var count=1;
					for(var p=0;p < pgtotal;p += rows_per_page){
						if(count==init_page){
							var style='active';
						}else{
							var style='';							
						}
						pagination.append('<li class="'+style+'"><a class="page" data="'+count+'">'+count+'</a></li>');
						count++;
					}
				}else{
					return false;
				}					
			}
			});
	$(document).on('click','.page',function(){
			prev_page = init_page;
			init_page = $(this).attr('data');
			$(".active").removeClass("active");
			$(this).closest('li').addClass('active');
		var action = site_url+'/blog/pagination/'+init_page;
		$.ajax({
			url:action,
			success:function(res){
				var j = JSON.parse(res);				
				if(j.status){
					blog_list.html(" ");
					$.each(j.data.blogs,function(k,v3){
						    var c = new Date(v3.created_on);
                            var day = c.getDate();	
                            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June","July", "Aug", "Sep", "Oct", "Nov", "Dec"];
                            var month = monthNames[c.getMonth()];	
							var img = img_url+'/assets/blogimages/'+v3.blog_img;
							var desc =  v3.blog_desc.substr(0, 100);
							var url = site_url+'/blog/blogview/'+v3.blog_id;
						blog_list.append('<article class="post"><div class="row"><div class="col-md-6"><figure class="post-thumbnail"><img alt="" src="'+img+'"></figure></div><div class="col-md-6"><div class="entry"><div class="entry-date">'+day+'<small> /'+month+'</small></div><h3 class="title entry-title"><a href="#">'+v3.blog_title+'</a></h3><div class="entry-content">'+desc+'...<a class="btn bg-color_primary" href="'+url+'">READ MORE</a></div><div class="entry-meta">Post by <a href="#" class="entry-meta-author">RCC</a></div></div></div></div></article>');
					});
			
				}else{
					return false;
				}					
			}
		});	
	});
	$("#contact_form").validate({
		rules:{
			'req_name':{
				required:true
			},
			'req_email':{
				required:true,
				email:true
			},
			'req_sub':{
				required:true
			},
			'req_msg':{
				required:true
			},
		},
		messages:{
			req_name:'Please enter name',
			req_email:'Please enter email',
			req_sub:'Please enter subject',
			req_msg:'Please enter message',
		},
	submitHandler:function(form){
		$(form).ajaxSubmit({
				beforeSend: function() {	
					// debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					// debugger;
					
				},
				success: function() {
						// debugger;
					
				},
				complete: function(xhr) {
                //  debugger;					
					var j = JSON.parse(xhr.responseText);
					$("#contact_msg").html(j.msg);					
					if(j.status){	
					// debugger;							
						$("#contact_form").find("input[type=text],input[type=email],textarea").val("");
						$("#contact_msg").html(j.msg);	
                        goTop();						
					}else{
						goTop();
					}
				}
			}); 
			
			return false;
		}	
	});
	$("#newsletter_form").validate({
		rules:{
			'name':{
				required:true
			},
			'email':{
				required:true,
				email:true
			},
		},
		messages:{
			name:'Please enter name',
			email:'Please enter email',
		},
	submitHandler:function(form){
		$(form).ajaxSubmit({
				beforeSend: function() {	
					// debugger;
				},
				uploadProgress: function(event, position, total, percentComplete) {
					// debugger;
					
				},
				success: function() {
						// debugger;
					
				},
				complete: function(xhr) {
                //  debugger;					
					var j = JSON.parse(xhr.responseText);
					$("#newsletter_msg").html(j.msg);					
					if(j.status){	
					// debugger;							
						$("#newsletter_form").find("input[type=text],input[type=email],textarea").val("");
						$("#newsletter_msg").html(j.msg);	
                        goTop();						
					}else{
						goTop();
					}
				}
			}); 
			
			return false;
		}	
	});		
	$("#cust_form").validate({
			rules: {
				cust_name:{
						required:true,		
				},	
                cust_email:{
						required:true,		
						email:true,		
				},									
                cust_phone:{
						required:true,		
						number:true,		
				},	
                address:{
						required:true,		
				},					
			}
		});
	$(document.body).delegate('.remove','click',function(){
		var addI = $(this).attr("id");
		var addA =addI.split('_');
		if(addA['1']==""  || isNaN(addA['1'])){
			alert('Inav');
		}else{
			$.post(site_url+'/shop/delItem',{assign:addA[1]},function(res){
				var j = JSON.parse(res);
				$("#ord_msg").html(j.msg);
				if(j.success){
					
					$("#list_"+addA['1']).remove();
					$("#"+addI).closest('tr').remove();
					$("#gtotal").html(j.total);	
					if(j.count==0){
						$("#clist").html('<div class="col-xs-12 no-pm cart-list" ><p>No products in your cart</p></div>');
					}
				}
				
			});
		}
	});				
	$(document).on('click','.add',function(){
		var addI = $(this).attr("id");
		var addA =addI.split('_');
		var qty = $('#qty_'+addA[1]).val();
		//alert(qty);
		//var shop_id = $('#shop_id').val();
		if(addA['1']=="" || addA['1']<=0 || isNaN(addA['1'])){
			alert('Inav');
		}else if(qty=="" || qty<=0 || isNaN(qty)){
			alert('Please Enter Valid Quantity');
			$('#qty_'+addA[1]).focus();
		}else{
			$.post(site_url+'/shop/add',{coffee_id:addA[1],qty:qty},function(res){
				//alert();
				var j = JSON.parse(res);
				$("#ord_msg").html(j.msg);
				if(j.success){
						var list ='<div id="list_'+j.cartInc+'" class="list col-xs-12 no-pm cart-list"><span class="col-sm-4 col-xs-8 no-rp">'+j.data.qty+' '+j.data.coffee_name+'</span><span class="col-sm-6 col-xs-2 no-lp no-rp text-right">&#x20b9; '+j.data.coffee_price+'  </span><span class="col-sm-2 col-xs-1 no-lp no-rp text-center"><a href="javascript:void(0);"><i id="remove_'+j.cartInc+'" class="remove fa fa-times" style="color:#f10a0a"></i></a></span></div>';
						if(j.count==0){
							$("#clist").html(list);								
						}else{	            					
							$("#clist").append(list);                                  					
						}
					$("#gtotal").html(j.total);	
				}
				
			});
		}
	});
if($("#finalcart").length>0){	
	$("input").keyup(function(event) {
		var assI = $(this).attr("id");
		var qty = $('#'+assI).val();
		var assA =assI.split('_');
		if(assA['1']==""  || isNaN(assA['1'])){	
			alert('Inav');
		}else if(qty=="" || qty<=0 || isNaN(qty)){
			alert('please enter valid quantity');
			$('#'+assI).focus();
		}else{
			$.post(site_url+'/checkout/edit',{assign:assA[1],qty:qty},function(res){
				var j = JSON.parse(res);
				$("#ord_msg").html(j.msg);
				if(j.success){
					$("#"+assA[1]+"coffee_price").html(j.coffee_price);
					$("#gtotal").html(j.total);	
				
				}
			});
		}              
	});
 }
 $('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		}
	});
});