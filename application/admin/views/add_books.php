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
								<a href="<?=base_url('author')?>">Genre/Subject Books List</a>	
								</li>
								<li class="active">	
								Add		
								</li>	
								</ol>
							</div>
						</div>

                        
                        <div class="row">
                        	<div class="col-sm-9">
							   <div id="add_book_msg"></div> 
							<form id="add_book_form" name="add_book_form" role="form" action="<?=base_url('books/create')?>" method="post" enctype="multipart/form-data">
                        		<div class="card-box">
                        			<h4 class="m-t-0 header-title"><b>Add Books</b></h4></br></br>
                        			
                        			<div class="row">									
                        			<div class="col-lg-6">
										   
									<div class="form-group">
										<label>Title</label>
										<input class="form-control" id="bk_name" name="bk_name">
									</div>

									<div class="form-group">
										<label>Authors</label>
										<select name="author_id" id="author_id" class="form-control">
                                        <option value="" >Select Author</option>
                                        <?php
                                        if($get_data['num']>0){
                                        foreach($get_data['data'] as $c){
                                         ?>
                                        <option value="<?=$c->id?>"><?=$c->aut_name?></option>
                                         <?php
                                           }

                                            }
                                               ?>
                                        
                                        </select>
									</div>

									<div class="form-group">
										<label>Year Of Publication</label>
										<input class="form-control" id="bk_year" name="bk_year">
									</div>									
		                                
                                    <div class="form-group">
										<label>Genre</label>
										<select name="sub_id" id="sub_id" class="form-control" multiple>
                                        <option value="">Select Genre</option>
                                        <?php
                                        if($get_sub['num']>0){
                                        foreach($get_sub['data'] as $s){
                                         ?>
                                        <option value="<?=$s->id?>"><?=$s->sub_name?></option>
                                         <?php
                                           }

                                            }
                                               ?>
                                        </select>
									</div>

									<div class="form-group">
                                    <label>Age</label>
										<select name="bk_age" id="bk_age" class="form-control required">
                                        <option value="" >Select Age</option>
                                        <option value="Old">Old people</option>
                                        <option value="Adults">Adult</option>
										<option value="children">Children</option>
										
										</select>
										
									</div>
									<div class="form-group">
										<label>Blurb</label>
										<input class="form-control" id="bk_blurb" name="bk_blurb">
									</div>

									<div class="form-group">
										<label>Tags</label>
										<input class="form-control" id="bk_tags" name="bk_tags">
									</div>
									
									<div class="form-group">
										<label>Description </label>
										<textarea class="form-control mathedit" placeholder="Enter Description" name="bk_desc" id="bk_desc"></textarea>
										<!--label class="error" generated="true" for="job_desc"></label-->
									</div>
									
									<div class="form-group">
										<label>Image</label>
											<input  type="file" name="up" id="bk_img" accept="Image/png,image/jpeg,image/gif">   
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
