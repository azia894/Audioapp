<div class="row">
	<div class="tab-content">

		<div class="page author-page">
			<div class="page-header-wrap js-header_section">
				<div class="content-wrap clearfix">
					<?php
					$img = $record['aut_img'];
					?>
					<div class="book-page-book-cover">
						<img src="<?= $img ?>" alt="book-cover-large" width="175" height="175">



					</div>
					<h1 style="color: black;"><?= ucwords($record['aut_name']) ?>
						<!-- <span class="dod-dob">(<?= ucwords($record['dob']) ?>)</span> -->
					</h1>

					<p class="description"><?= ucwords($record['aut_desc']) ?>
					</p>



				</div>


				<div class="sort-menu" id="sort_menu" style="display:none;">
					<p>Order by</p>
					<select class="js-sort-menu">
						<option value="alpha">Alphabetically</option>
						<option value="catalog_date">Release date</option>
					</select>
				</div><!-- end .sort-menu -->
			</div><!-- end . page-header -->

			<ul class="browse-list">
				<?php
				if ($getdata == null) {
				?>
					<li>
						<td colspan="7">No Data to display</td>
					<li>
						<?php
					} else {
						$i = 1;
						foreach ($getdata as $row) {
							$img = $row->bk_img;
							// print_r($row);
							// $genreList = '';
							// if($row->genre != ""){
							// $genres = explode(',',$row->genre);
							// if(count($genres) > 0){
							// 	foreach ($genres as $key => $value) {
							// 	$genre = explode(':',$value);
							// 	$genreList .= "<a href='".base_url('subject/category/'.$genre[0])."'>".$genre[1]."</a> <span> | </span>";
							// 	}
							// }
							// }
						?>
					<li class="catalog-result">



						<a href="<?= base_url('chapter/view/' . $row->bkid) ?>" class="book-cover"><img src="<?= $img ?>" alt="book-cover-65x65" width="65" height="65"></a>

						<div class="result-data">
							<h3><a href="<?= base_url('chapter/view/' . $row->bkid) ?>"><?= ucwords($row->bk_name) ?></a></h3>


							<!-- <p class="book-meta">  <?= $genreList ?>
						</p> -->
						</div>


					</li>
			<?php
						}
					}
			?>

			</ul>

			<div class="page-number-nav"></div>

		</div>
	</div><!-- end .page -->


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