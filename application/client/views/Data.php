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
									$img = ADMIN_URL.'/assets/bookimages/'.$row['bk_img']; 
								?>
            
                        <li class="catalog-result">
                            <a href="<?= base_url('home/view/'.$row['bkid']) ?>" class="book-cover">
                            <img src="<?=$img?>" alt="book-cover-65x65" width="65" height="65" /></a>
                            <div class="result-data"><h3><a href="<?= base_url('home/view/'.$row['bkid']) ?> "><?php echo ucwords($row['bk_name']); ?></a></h3><p class="book-author"> 
                            <a href="#"><?php echo ucwords($row['aut_name']); ?><span class="dod-dob">(<?php echo $row['dob']; ?>)</span></a></p>
                            <p class="book-meta">Complete | English</p></div></li>
                           
							<?php
								}
							}
							?> 
                        </ul>
            
                   
						<div id="ajax_links" class="text-center">
    <?php echo $links; ?>
</div>