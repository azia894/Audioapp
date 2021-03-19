<section class="divider">
<div class="container">
  <div class="row">
  <div class="col-md-12 col-lg-12">
 
	
	  <h3>Browse the Catalog</h3>
		
            <div role="tabpanel" class="tab-pane fade active in" id="howwecan_1">
				
				
				<div>
					<div class="row" style="margin-top:30px;">
					<div  class="col-xs-12 "  style="margin-top: -50px;">
						<div class="widget">
						<div class="services-list">
							<ul class="list list-border angle-double-right" style="width:100%">
								<li>
									<a href="#howwecan_10" aria-controls="howwecan_10" role="tab" data-toggle="tab" aria-expanded="true" style="padding: 106px;"><span>Authors</span></a>
								</li>
								<li>
									<a href="#howwecan_11" aria-controls="howwecan_11" role="tab" data-toggle="tab" aria-expanded="true" style="padding: 106px;"><span>Title</span></a>
								</li>
								<li>
									<a href="#howwecan_12" aria-controls="howwecan_12" role="tab" data-toggle="tab" aria-expanded="true" style="padding: 106px;"><span>Genre/Subject</span></a>
								</li>
								
							</ul>
						</div>
						</div>
					</div>
					</div>
					<br/>
					<br/>
				   <div class="row">
				   <div class="tab-content">
					
					<h3>Latest Audiobook Releases</h3>

                    
            
                        <ul class="browse-list">
						<?php
							if ($home == NULL) {
							?>
								<li align="center"> <td colspan="7">No Data to display</td><li>
							<?php
							} else {
								foreach ($home as $row) {
								?>
								<?php 
									$img = ADMIN_URL.'/assets/bookimages/'.$row->bk_img; 
								?>
            
                        <li class="catalog-result">
                            <a href="<?= base_url('home/view/'.$row->bkid) ?>" class="book-cover">
                            <img src="<?=$img?>" alt="book-cover-65x65" width="65" height="65" /></a>
                            <div class="result-data"><h3><a href="<?= base_url('home/view/'.$row->bkid) ?> "><?php echo ucwords($row->bk_name); ?></a></h3><p class="book-author"> 
                            <a href="#"><?php echo ucwords($row->aut_name); ?><span class="dod-dob">(<?php echo $row->dob; ?>)</span></a></p>
                            <p class="book-meta">Complete | English</p></div></li>
                           
							<?php
								}
							}
							?> 
                        </ul>
            
                   
				   </div> 
					
					</div>
					
				</div>
            </div>
			
           
	  
  </div>
  </div>
</div>
</section> 

	</div>
  </div>