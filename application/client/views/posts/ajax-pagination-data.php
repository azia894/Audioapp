<ul class="browse-list">

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
				$img = ADMIN_URL . '/assets/authorimages/' . $post['aut_img']; ?>

		<li class="catalog-result">

			<a href="<?= base_url('chapter/view/' . $post['id']) ?>" class="book-cover">
				<img src="<?= $img ?>" alt="book-cover-65x65" width="65" height="65" /></a>
			<div class="result-data">
				<h3><a href="<?= base_url('chapter/view/' . $post['id']) ?> "><?php echo ucwords($post['aut_name']); ?></a>
				</h3>
				<p class="book-author">
					<!-- <span class="dod-dob">(<?php echo $post['dob']; ?>)</span> -->
				</p>
				<p class="book-meta">Complete | English</p>
			</div>
		</li>

<?php
			}
		}
?>
</ul>


<?php echo $this->ajax_pagination->create_links();
