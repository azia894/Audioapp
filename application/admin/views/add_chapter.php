<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
							<?php
                $id=$this->uri->segment('3');
                $this->load->model('books_model');
                $md = $this->books_model->getbName($id);
                $m_name = $md['bk_name'];
                ?>
								<h4 class="page-title"><?=ucwords($m_name);?> Book/Chapters</h4>
								<ol class="breadcrumb">	
								<li>	
								<a href="<?=base_url('author')?>">Chapters List</a>	
								</li>
								<li class="active">	
								Add		
								</li>	
								</ol>
							</div>
						</div>

                        
                        <div class="row">
                        	<div class="col-sm-9">
							   <div id="add_chapter_msg"></div> 
							<form id="add_chapter_form" name="add_chapter_form" role="form" action="<?=base_url('chapter/create')?>" method="post" enctype="multipart/form-data">
                        		<div class="card-box">
                        			<h4 class="m-t-0 header-title"><b>Add Chapters</b></h4></br></br>
                        			
                        			<div class="row">									
                        			<div class="col-lg-6">
                                   <!-- <div class="form-group">
										<label>Books</label>
										<select name="bid" id="bid" class="form-control">
                                        <option value="">Select Books</option>
                                        <?php
                                        if($get_sub['num']>0){
                                        foreach($get_sub['data'] as $s){
                                         ?>
                                        <option value="<?=$s->id?>"><?=$s->bk_name?></option>
                                         <?php
                                           }

                                            }
                                               ?>
                                        </select>
									</div>-->

                                    <div class="form-group">
										<label>Narrators</label>
										<select name="nar_id" id="nar_id" class="form-control">
                                        <option value="" >Select Narrator</option>
                                        <?php
                                        if($get_data['num']>0){
                                        foreach($get_data['data'] as $c){
                                         ?>
                                        <option value="<?=$c->id?>"><?=$c->nar_name?></option>
                                         <?php
                                           }

                                            }
                                               ?>
                                        
                                        </select>
									</div>									
									<span>  
									<input type="hidden"  id="bid" name="bid" value="<?=$this->uri->segment('3')?>">
									</span>	   
									<div class="form-group">
										<label >Chapter Name</label>
										
										<input class="form-control" id="ch_name" name="ch_name">
										
									</div>
									
									
									<div class="form-group">
										<label>Upload Audio</label>
											<input  type="file" name="up" id="ch_audio" accept="Image/png,image/jpeg,image/gif">   
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
