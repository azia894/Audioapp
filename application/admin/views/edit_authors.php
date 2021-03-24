
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
						<div class="col-sm-12">
							<h4 class="page-title">Authors</h4>
								<ol class="breadcrumb">
									<li>	
										<a href="<?=base_url('dashboard')?>">Dashboard</a>
									</li>	
									<li>	
										<a href="<?=base_url('authors')?>">Authors List</a>	
									</li>
								<li class="active">
								Edit		
								</li>		
								</ol>
						</div>
						</div>

                        
                        <div class="row">
                        	<div class="col-sm-12">
							  <div id="edit_authors_msg"></div> 
								 <form id="edit_authors_form" role="form" action="<?=base_url("author/modify/".$record['id'])?>"method="post" enctype="multipart/form-data">
                        		
                        		<div class="card-box">
                        			<h4 class="m-t-0 header-title"><b>Edit Author</b></h4></br></br>
                        			
                        			<div class="row">									
                        			<div class="col-lg-6">	

										   
									<div class="form-group">
										<label>Author Name</label>
										<input class="form-control" id="aut_name" name= "aut_name" value="<?=$record['aut_name']?>">
									</div>
									
									
									<div class="form-group">
										<label>Description </label>
										<textarea class="form-control mathedit" placeholder="Enter Description" name="aut_desc" id="aut_desc"><?=$record['aut_desc']?></textarea>
										<!--label class="error" generated="true" for="job_desc"></label-->
									</div>
									
									<div class="form-group">
										<label>Image</label>
											<input  type="file" name="up" id="aut_img" accept="Image/png,image/jpeg,image/gif">   
									</div>
						
								  
                                    <button type="submit" class="btn btn-primary">Submit</button>									
                        	</div>	
							<br>
							<div class="col-lg-6">
										<?php
												if($record['aut_img']!=""){
											?>	
												<img src="<?=base_url('assets/authorimages/'.$record['aut_img'])?>" class="img-thumbnail" />
											<?php			
												}
											?>
									</div>
							
                    	</div>
                      </div>
								</form>
							</form>
                        	</div>
                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->
				
				