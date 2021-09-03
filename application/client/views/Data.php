<ul class="browse-list">
	<?php
	if ($home == null) {
	?>
		<li align="center">
			<td colspan="7">No Data to display</td>
		<li>
			<?php
		} else {
			foreach ($home as $row) {
			?>
				<?php
				$img = $row['bk_img'];
				$genreList = '';
				if ($row['genre'] != "") {
					$genres = explode(',', $row['genre']);
					if (count($genres) > 0) {
						foreach ($genres as $key => $value) {
							$genre = explode(':', $value);
							$genreList .= "<a href='" . base_url('subject/category/' . $genre[0]) . "'>" . $genre[1] . "</a> <span> | </span>";
						}
					}
				} ?>

		<li class="catalog-result">
			<a href="<?= base_url('chapter/view/' . $row['bkid']) ?>" class="book-cover">
				<img src="<?= $img ?>" alt="book-cover-65x65" width="65" height="65" /></a>
			<div class="result-data">
				<h3><a href="<?= base_url('chapter/view/' . $row['bkid']) ?> "><?php echo ucwords($row['bk_name']); ?></a>
				</h3>
				<p class="book-author">
					<a href="<?= base_url('authors/view/' . $row['id']) ?>"><?php echo ucwords($row['aut_name']); ?>
					<!-- <span class="dod-dob">(<?php echo $row['dob']; ?>)</span> -->
				</a>
				</p>
				<p class="book-meta"> <?= $genreList ?>
				</p>
			</div>
		</li>

<?php
			}
		}
?>
</ul>


<div id="ajax_links" class="text-center">
	<?php echo $links; ?>
</div>