<div class="row">
    <div class="tab-content">
        <div class="book-page">
            <div class="content-wrap clearfix">
                <div class="book-page-book-cover">
                    <?php
                    $img = $record['bk_img'];
                    ?>
                    <img src="<?= $img ?>" width="175" height="175" />
                </div>
                <h1 style="color:black"><?= ucwords($record['bk_name']) ?>
                </h1>
                <p class="book-page-author">
                    <a href="<?= base_url('authors/view/' . $record['id']) ?>">
                        <?= ucwords($record['aut_name']) ?>
                        <!-- <span class="dod-dob">(<?= $record['dob'] ?>)</span> -->
                    </a>
                </p>
                <p class="book-meta">Published In: <?= $record['bk_year'] ?> </p>
                <p class="description"><br /><?= $record['bk_desc'] ?><br /><br />
                </p>
                <!-- <p class="book-page-genre"><span>Genre(s):</span> Action & Adventure</p> -->
                <!-- <p class="book-page-genre"><span>Language:</span> English</p> -->
            </div> <!-- end .content-wrap -->
            <table class="chapter-download">
                <thead>
                    <tr>
                        <th>ID </th>
                        <th>Audio </th>
                        <th>Chapter</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($getdata == null) {
                    ?>
                        <tr>
                            <td colspan="7">No Data to display</td>
                        <tr>
                            <?php
                        } else {
                            $i = 1;
                            foreach ($getdata as $row) {
                            ?>
                        <tr>
                            <td style="vertical-align: middle;"><?php echo $i; ?>
                            </td>
                            <td><audio controls>
                                    <source src="<?= $row->ch_audio ?>" type="audio/ogg">
                                    <source src="<?= $row->ch_audio ?>" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio></td>
                            <td style="vertical-align: middle;">
                                <span class="chapter-name">
                                    <?php echo $row->ch_name ?>
                                </span>
                            </td>
                            <td style="vertical-align: middle;"><?php echo $row->ch_duration ?>
                            </td>
                        </tr>
                <?php
                                $i++;
                            }
                        }
                ?>
                </tbody>
            </table>
        </div><!-- end .page -->
    </div>
</div>
<!-- </div>
</div>
</div>
</div>
</div>
</section>
</div>
</div> -->