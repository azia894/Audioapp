                <footer class="footer text-right">
                    © 2021. All rights reserved.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
        <script>
            var resizefunc = [];
        </script>
        <!-- jQuery  -->
        <script src="<?=base_url('assets')?>/js/jquery.min.js"></script>
        <script src="<?=base_url('assets')?>/js/bootstrap.min.js"></script>
        <script src="<?=base_url('assets')?>/js/bootstrap-timepicker.min.js"></script>
        <script src="<?=base_url('assets')?>/js/bootstrap-datetimepicker.js"></script>
	   	<script src="<?=base_url('assets')?>//plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
		<script src="http://malsup.github.com/jquery.form.js"></script>
        <script src="<?=base_url('assets')?>/js/comns.js"></script>
        <script src="<?=base_url('assets')?>/js/detect.js"></script>
        <script src="<?=base_url('assets')?>/js/fastclick.js"></script>
        <script src="<?=base_url('assets')?>/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
		<script src="<?=base_url('assets')?>/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets')?>/js/jquery.slimscroll.js"></script>
        <script src="<?=base_url('assets')?>/js/jquery.blockUI.js"></script>
        <script src="<?=base_url('assets')?>/js/waves.js"></script>
        <script src="<?=base_url('assets')?>/js/wow.min.js"></script>
        <script src="<?=base_url('assets')?>/js/jquery.nicescroll.js"></script>
        <script src="<?=base_url('assets')?>/js/jquery.scrollTo.min.js"></script>
		    <?php $this->load->view('datatbl_scripts'); ?>
		<!--<script src="<?=base_url('assets')?>/js/jquery.validate.js"></script>-->
        <script src="<?=base_url('assets')?>/plugins/peity/jquery.peity.min.js"></script>
        <!-- jQuery  ---->
        <script src="<?=base_url('assets')?>/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="<?=base_url('assets')?>/plugins/counterup/jquery.counterup.min.js"></script>
        <!--<script src="<?=base_url('assets')?>/plugins/morris/morris.min.js"></script>-->
        <script src="<?=base_url('assets')?>/plugins/raphael/raphael-min.js"></script>
        <script src="<?=base_url('assets')?>/plugins/jquery-knob/jquery.knob.js"></script>
        <!--<script src="<?=base_url('assets')?>/pages/jquery.dashboard.js"></script>-->
		
        <script src="<?=base_url('assets')?>/js/jquery.core.js"></script>
        <script src="<?=base_url('assets')?>/js/jquery.app.js"></script>
		<script src="<?=base_url('assets')?>/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="<?=base_url('assets')?>/pages/jquery.sweet-alert.init.js"></script>
		 <!--Form Validation-->
        <script src="<?=base_url('assets')?>/plugins/bootstrapvalidator/dist/js/bootstrapValidator.js" type="text/javascript"></script>
        <!--Form Wizard-->
        <script src="<?=base_url('assets')?>/plugins/jquery.steps/build/jquery.steps.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?=base_url('assets')?>/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
        <!--wizard initialization-->
		<script src="<?=base_url('assets')?>/js/scripts.js"></script>
        <script src="<?=base_url('assets')?>/pages/jquery.wizard-init.js" type="text/javascript"></script>
		<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
		<script src="<?= base_url('assets') ?>/js/tinymce/tinymce.min.js" type="text/javascript"></script>
		<script src="<?= base_url('assets') ?>/js/tinymce/jquery.tinymce.min.js" type="text/javascript"></script>
		<!----- chosen jquery----------->
		<script src="<?=base_url('assets')?>/js/chosen.jquery.js"></script> 
		<script src="<?=base_url('assets')?>/js/prism.js"></script> 
		<!-------Upload Files-------------->
		<script src="<?=base_url('assets')?>/js/jquery.uploadfile.min.js"></script>
		<script>
		$(document).ready(function () {
			 var table;
			var responsiveHelper = undefined;
			var responsiveHelper1 = undefined;
			var responsiveHelper2 = undefined;
			var responsiveHelper3 = undefined;
			var responsiveHelper4 = undefined;
			var responsiveHelper5 = undefined;
			var responsiveHelper6 = undefined;
			var responsiveHelper7 = undefined;
			var breakpointDefinition = {
				lap: 1440,
				tablet: 1024,
				phone : 480
			};
			 table = $('#all-sub-tbl').DataTable({ 
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo site_url('subject/getSubjectAll')?>",
					"type": "POST"
				},
				//Set column definition initialisation properties.
				"columnDefs": [
				{ 
				  "targets": [ -1 ], //last column
				  "orderable": false, //set not orderable
				},
				],
			  });
			   table = $('#all-orders-tbl').DataTable({ 
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo site_url('orders/getOrdersAll')?>",
					"type": "POST"
				},
				//Set column definition initialisation properties.
				"order": [[ 3, "desc" ]],
				"columnDefs": [
				{ 
				  "targets": [ -1 ], //last column
				  "orderable": false, //set not orderable
				},
				],
			  });
			  table = $('#all-imgs-tbl').DataTable({ 
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo site_url('gallery/getImgsAll')?>",
					"type": "POST"
				},
				//Set column definition initialisation properties.
				"columnDefs": [
				{ 
				  "targets": [ -1 ], //last column
				  "orderable": false, //set not orderable
				},
				],
			  });
			  table = $('#all-Author-tbl').DataTable({ 
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo site_url('author/getAuthorAll')?>",
					"type": "POST"
				},
				//Set column definition initialisation properties.
				"columnDefs": [
				{ 
				  "targets": [ -1 ], //last column
				  "orderable": false, //set not orderable
				},
				],
			  });

			  table = $('#all-Narrator-tbl').DataTable({ 
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo site_url('narrator/getNarratorAll')?>",
					"type": "POST"
				},
				//Set column definition initialisation properties.
				"columnDefs": [
				{ 
				  "targets": [ -1 ], //last column
				  "orderable": false, //set not orderable
				},
				],
			  });

			  table = $('#all-Books-tbl').DataTable({ 
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo site_url('books/getBooksAll')?>",
					"type": "POST"
				},
				//Set column definition initialisation properties.
				"columnDefs": [
				{ 
				  "targets": [ -1 ], //last column
				  "orderable": false, //set not orderable
				},
				],
			  });

			  table = $('#all-Chapters-tbl').DataTable({ 
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo site_url('chapter/getChapterAll')?>",
					"type": "POST"
				},
				//Set column definition initialisation properties.
				"columnDefs": [
				{ 
				  "targets": [ -1 ], //last column
				  "orderable": false, //set not orderable
				},
				],
			  });
			  table = $('#all-banner-tbl').DataTable({ 
				"processing": true, //Feature control the processing indicator.
				"serverSide": true, //Feature control DataTables' server-side processing mode.
				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo site_url('banner/getBannerAll')?>",
					"type": "POST"
				},
				//Set column definition initialisation properties.
				"columnDefs": [
				{ 
				  "targets": [ -1 ], //last column
				  "orderable": false, //set not orderable
				},
				],
			  });
		});
	</script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
                $(".knob").knob();
				$(".ctaginp").css({"border":"0px","width":"100%","height": "30px","margin": "2px"});
            });
        </script>
		
    </body>
</html>