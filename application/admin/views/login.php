
	<body>

		<div class="account-pages"></div>
		<div class="clearfix"></div>
		 <div class="wrapper-page">
        	<div class=" card-box">
            <div class="panel-heading"> 
                <h3 class="text-center">Audio App <strong class="text-custom">Admin Panel 
</strong> </h3>
            </div> 


            <div class="panel-body">
           <form class="form-horizontal m-t-20"  method="post" role="form" action="index.html" id="signin_form" name="signin_form">
			<?=($this->session->flashdata('msg'))?$this->session->flashdata('msg'):'';?>
			<div id="signin_msg"></div>
			  
			<div class="form-group ">
				<div class="col-xs-12">
					<input class="form-control" type="text" required="" placeholder="Username" name="user_name" id="user_name">
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<input class="form-control" type="password" required="" placeholder="Password" name="user_pass" id="user_pass">
				</div>
			</div>

			
			<div class="form-group text-right m-t-20">
			
					 <div class="col-xs-12">
                        <button class="btn btn-info btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
			</div>											
			</div>					
					</form>           
            </div>   
            </div>                              
        </div>