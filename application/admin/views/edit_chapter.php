
<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
						<div class="col-sm-12">
							<h4 class="page-title">Chapters</h4>
								<ol class="breadcrumb">
									<li>	
										<a href="<?=base_url('dashboard')?>">Dashboard</a>
									</li>	
									<li>	
										<a href="<?=base_url('chapter')?>">Chapters List</a>	
									</li>
								<li class="active">
								Edit		
								</li>		
								</ol>
						</div>
						</div>

                        
                        <div class="row">
                        	<div class="col-sm-12">
							  <div id="edit_chapters_msg"></div> 
								 <form id="edit_chapters_form" role="form" action="<?=base_url("chapter/modify/".$record['bid'].'/'.$record['id'])?>"method="post" enctype="multipart/form-data">
                        		
                        		<div class="card-box">
                        			<h4 class="m-t-0 header-title"><b>Edit Chapter</b></h4></br></br>
                        			
                        			<div class="row">									
                        			<div class="col-lg-6">
                                    <input type="hidden"  id="bid" name="bid" value="<?=$this->uri->segment('3')?>">
                                    <div class="form-group">
										<label>Narrators</label>
										<select name="nar_id" id="nar_id" class="form-control">
                                        <option value="" >Select Narrator</option>
                                        <?php
                                        if($get_data['num']>0){
                                        foreach($get_data['data'] as $c){
                                         ?>
                                        <option <?=($record['nar_id']==$c->id?'selected':'')?> value="<?=$c->id?>"><?=$c->nar_name?></option>
                                         <?php
                                           }

                                            }
                                               ?>
                                        
                                        </select>
									</div>				

										   
									<div class="form-group">
										<label>Chapter Title</label>
										<input class="form-control" id="ch_name" name= "ch_name" value="<?=$record['ch_name']?>">
									</div>
									
									
									
									<div class="form-group">
										<label>Upload Audio</label>
											<input  type="file" name="up" id="ch_audio" accept="Image/png,image/jpeg,image/gif">   
									</div>
						
								  
                                    <button type="submit" class="btn btn-primary">Submit</button>									
                        	</div>
                            <br/>	
							
							<div class="col-lg-6">
										<?php
												if($record['ch_audio']!=""){
											?>	
												
                                                <audio controls>
            <source src="<?=base_url('assets/chapterimages/'.$record['ch_audio'])?>" type="audio/ogg">
            <source src="<?=base_url('assets/chapterimages/'.$record['ch_audio'])?>" type="audio/mpeg">
          Your browser does not support the audio element.
          </audio>
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
				
				