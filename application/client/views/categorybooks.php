<div class="row">
  <div class="tab-content">
    <?php $md = $this->subject_model->getName($this->uri->segment('3')); ?>
    <h3>Browsing <?php echo $md['sub_name']; ?>
    </h3></br>
    <div id="postList">
      <ul class="browse-list">
        <?php
        if ($getbk == null) {
        ?>
          <li>
            <td colspan="7">No Data to display</td>
          <li>
            <?php
          } else {
            $i = 1;
            // print_r($getbk); exit;
            foreach ($getbk as $rowbk) {
              $img = $rowbk->bk_img;
              $genreList = '';
              // if ($rowbk->genre != "") {
              //   $genres = explode(',', $rowbk->genre);
              //   if (count($genres) > 0) {
              //     foreach ($genres as $key => $value) {
              //       $genre = explode(':', $value);
              //       $genreList .= "<a href='" . base_url('chapter/view/' . $rowbk->bkid) . "'>" . $genre[1] . "</a> <span> | </span>";
              //     }
              //   }
              // } 
            ?>

          <li class="catalog-result">
            <a href="<?= base_url('chapter/view/' . $rowbk->bkid) ?>" class="book-cover"><img src="<?= $img ?>" alt="book-cover-65x65" width="65" height="65"></a>

            <div class="result-data">
              <h3><a href="<?= base_url('chapter/view/' . $rowbk->bkid) ?>"><?= ucwords($rowbk->bk_name) ?></a></h3>

              <p class="book-author"> 
                <a href="<?= base_url('authors/view/' . $rowbk->id) ?>">
                  <?php echo ucwords($rowbk->aut_name); ?> 
                  <!-- <span class="dod-dob">(<?php echo $rowbk->dob; ?>)</span> -->
                </a> 
              </p>
              <!-- <p class="book-meta"> <?= $genreList ?> -->
              </p>
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