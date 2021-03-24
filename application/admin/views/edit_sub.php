
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
						<div class="col-sm-12">
							<h4 class="page-title">Genre/Subject</h4>
								<ol class="breadcrumb">
									<li>	
										<a href="<?=base_url('dashboard')?>">Dashboard</a>
									</li>	
									<li>	
										<a href="<?=base_url('subject')?>">Genre/Subject List</a>	
									</li>
								<li class="active">
								Edit		
								</li>		
								</ol>
						</div>
						</div>

                        
                        <div class="row">
                        	<div class="col-sm-12">
							  <div id="edit_sub_msg"></div> 
								 <form id="edit_sub_form" role="form" action="<?=base_url("subject/modify/".$record['id'])?>" method="post" enctype="multipart/form-data">
                        		
                        		<div class="card-box">
                        			<h4 class="m-t-0 header-title"><b>Edit Genre/Subject</b></h4></br></br>
                        			
                        			<div class="row">									
                        			<div class="col-lg-6">	

										   
									<div class="form-group">
										<label>Subject Name</label>
										<input class="form-control" id="sub_name" name= "sub_name" value="<?=$record['sub_name']?>">
									</div>
								
									
								  
                                    <button type="submit" class="btn btn-primary">Submit</button>									
                        	</div>	
							
							
                    	</div>
                      </div>
								</form>
							</form>
                        	</div>
                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
				
				