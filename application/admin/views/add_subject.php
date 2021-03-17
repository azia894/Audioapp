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
								<a href="<?=base_url('subject')?>">Genre/Subject List</a>	
								</li>
								<li class="active">	
								Add		
								</li>	
								</ol>
							</div>
						</div>

                        
                        <div class="row">
                        	<div class="col-sm-12">
							   <div id="add_sub_msg"></div> 
							<form id="add_subject_form" name="add_subject_form" role="form" action="<?=base_url('subject/create')?>" method="post" enctype="multipart/form-data">
                        		<div class="card-box">
                        			<h4 class="m-t-0 header-title"><b>Add Subject</b></h4></br></br>
                        			
                        			<div class="row">									
                        			<div class="col-lg-6">									
		                                
										   
									<div class="form-group">
										<label>Genre/Subject Name</label>
										<input class="form-control required" id="sub_name" name= "sub_name">
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
				