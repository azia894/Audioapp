<div class="row">
    <div class="tab-content">

        <h3>Latest Audiobook Releases</h3>

        <div id="ajax_content ok">
            <?php $this->load->view('Data', $home); ?>
        </div>


    </div>

<!-- </div> -->
<!-- 
</div>
</div>



</div>
</div>
</div> -->
</section>

<!-- </div>
  </div> -->

<!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
<!-- <script type="text/javascript">
    $(function() {
        paginate();

        function paginate() {
            $('#abc a').click(function() {
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: 'ajax=true',
                    success: function(data) {
                        $('#ajax_content').html(data);
                    }
                });
                return false;
            });
        }
    });
</script> -->