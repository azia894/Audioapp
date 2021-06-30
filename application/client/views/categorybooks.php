
				   <div class="row">
				   <div class="tab-content">
               <?php    $md = $this->subject_model->getName($this->uri->segment('3'));?>	
					<h3>Browsing <?php echo $md['sub_name']; ?></h3></br>
                 <div id="postList">
                 <ul class="browse-list">
                 <?php
							if ($getbk == NULL) {
							?>
								<li> <td colspan="7">No Data to display</td><li>
							<?php
							} else {
                                $i=1;
								foreach ($getbk as $rowbk) {
                                    $img = $rowbk->bk_img; 
								?>
	
    <li class="catalog-result">	
<a href="<?= base_url('chapter/view/'.$rowbk->bkid) ?>" class="book-cover"><img src="<?=$img?>" alt="book-cover-65x65" width="65" height="65"></a>

<div class="result-data">
                <h3><a href="<?= base_url('chapter/view/'.$rowbk->bkid) ?>"><?=ucwords($rowbk->bk_name)?></a></h3>
    
    <p class="book-author"> <a href="<?= base_url('authors/view/'.$rowbk->id) ?>"><?php echo ucwords($rowbk->aut_name); ?> <span class="dod-dob">(<?php echo $rowbk->dob; ?>)</span></a> </p>
    <p class="book-meta"> Complete | Solo | English</p>
</div>	

    <div class="download-btn">
    <a href="http://www.archive.org/download//a_christmas_miscellany_2018_1807_librivox/a_christmas_miscellany_2018_1807_librivox_64kb_mp3.zip">Download</a>
    <span>173MB</span>
</div>
    
</li>
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
</div>
</section> 

	</div>
  </div>

 