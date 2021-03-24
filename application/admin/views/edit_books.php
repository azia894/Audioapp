
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
						<div class="col-sm-12">
							<h4 class="page-title">Genre/Subject Books</h4>
								<ol class="breadcrumb">
									<li>	
										<a href="<?=base_url('dashboard')?>">Dashboard</a>
									</li>	
									<li>	
										<a href="<?=base_url('books')?>">Genre/Subject Books List</a>	
									</li>
								<li class="active">
								Edit		
								</li>		
								</ol>
						</div>
						</div>

                        
                        <div class="row">
                        	<div class="col-sm-12">
							  <div id="edit_books_msg"></div> 
								 <form id="edit_books_form" role="form" action="<?=base_url("books/modify/".$record['bkid'])?>"method="post" enctype="multipart/form-data">
                        		
                        		<div class="card-box">
                        			<h4 class="m-t-0 header-title"><b>Edit Genre/Subject Books</b></h4></br></br>
                        			
                        			<div class="row">									
                        			<div class="col-lg-6">	
                                    <div class="form-group">
										<label>Genre/Subject</label>
										<select name="sub_id" id="sub_id" class="form-control">
                                        <option value="">Select Subject/Genre</option>
                                        <?php
                                        if($get_sub['num']>0){
                                        foreach($get_sub['data'] as $s){
                                         ?>
                                        <option <?=($record['sub_id']==$s->id?'selected':'')?> value="<?=$s->id?>"><?=$s->sub_name?></option>
                                         <?php
                                           }

                                            }
                                               ?>
                                        </select>
									</div>

                                    <div class="form-group">
										<label>Authors</label>
										<select name="author_id" id="author_id" class="form-control">
                                        <option value="0" >Select Author</option>
                                        <?php
                                        if($get_data['num']>0){
                                        foreach($get_data['data'] as $c){
                                         ?>
                                        <option <?=($record['author_id']==$c->id?'selected':'')?> value="<?=$c->id?>"><?=$c->aut_name?></option>
                                         <?php
                                           }

                                            }
                                               ?>
                                        
                                        </select>
									</div>		
										   
									<div class="form-group">
										<label>Book Name</label>
										<input class="form-control" id="bk_name" name= "bk_name" value="<?=$record['bk_name']?>">
									</div>
									
									
									<div class="form-group">
										<label>Description </label>
										<textarea class="form-control mathedit" placeholder="Enter Description" name="bk_desc" id="bk_desc"><?=$record['bk_desc']?></textarea>
										<!--label class="error" generated="true" for="job_desc"></label-->
									</div>
									
									<div class="form-group">
										<label>Image</label>
											<input  type="file" name="up" id="bk_img" accept="Image/png,image/jpeg,image/gif">   
									</div>
						
								  
                                    <button type="submit" class="btn btn-primary">Submit</button>									
                        	</div>	
							<br>
							<div class="col-lg-6">
										<?php
												if($record['bk_img']!=""){
											?>	
												<img src="<?=base_url('assets/bookimages/'.$record['bk_img'])?>" class="img-thumbnail" />
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
				
				