<div class="row">
	<div class="tab-content">

		<h3>Authors</h3>
		<div id="postList">
			<ul class="browse-list">
				<div class="loading" style="display: none;">
					<div class="content"><img src="<?php echo base_url() . 'assets/images/loadingimage.gif'; ?>" />
					</div>
				</div>
				<?php
				if ($posts == null) {
				?>
					<li align="center">
						<td colspan="7">No Data to display</td>
					<li>
						<?php
					} else {
						foreach ($posts as $post) {
						?>
							<?php
							$img = $post['aut_img']; ?>

					<li class="catalog-result">

						<a href="<?= base_url('authors/view/' . $post['id']) ?>" class="book-cover">
							<img src="<?= $img ?>" alt="book-cover-65x65" width="65" height="65" /></a>
						<div class="result-data">
							<h3><a href="<?= base_url('authors/view/' . $post['id']) ?> "><?php echo ucwords($post['aut_name']); ?></a>
							</h3>
							<p class="book-author">
								<!-- <span class="dod-dob">(<?php echo $post['dob']; ?>)</span> -->
							</p>
							<!-- <p class="book-meta">Complete | English</p> -->
							<span><?php echo $post['total']; ?>
								books</span>
						</div>
					</li>

			<?php
						}
					}
			?>
			</ul>


			<?php echo $this->ajax_pagination->create_links(); ?>
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