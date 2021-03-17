<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
								<h4 class="page-title">Narrator</h4>
								<ol class="breadcrumb">	
								<li>	
								<a href="<?=base_url('narrator')?>">Narrator List</a>	
								</li>
								<li class="active">	
								Add		
								</li>	
								</ol>
							</div>
						</div>

                        
                        <div class="row">
                        	<div class="col-sm-9">
							   <div id="add_narrator_msg"></div> 
							<form id="add_narrator_form" name="add_narrator_form" role="form" action="<?=base_url('narrator/create')?>" method="post" enctype="multipart/form-data">
                        		<div class="card-box">
                        			<h4 class="m-t-0 header-title"><b>Add Narrator</b></h4></br></br>
                        			
                        			<div class="row">									
                        			<div class="col-lg-6">									
		                                
										   
									<div class="form-group">
										<label>Narrator Name</label>
										<input class="form-control" id="nar_name" name= "nar_name">
									</div>
									
									<div class="form-group">
										<label>Description </label>
										<textarea class="form-control mathedit" placeholder="Enter Description" name="nar_desc" id="nar_desc"></textarea>
										<!--label class="error" generated="true" for="job_desc"></label-->
									</div>
									
									<div class="form-group">
										<label>Image</label>
											<input  type="file" name="up" id="nar_img" accept="Image/png,image/jpeg,image/gif">   
									</div>
									
									
												
                                    <button type="submit" class="btn btn-primary">Submit</button>									
                        	</div>	
                    	</div>
                      </div>
				</form>
			</div>
		</div>

	</div> <!-- container -->
			   
</div> <!-- content -->
