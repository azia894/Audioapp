	</section>
	<footer id="footer" class="footer-new bg-black-222">
		<p class="font-15 text-white m-0">Copyright &copy;2021. UAB Tech</p>
	</footer>
	<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
	<script src="<?= base_url('assets') ?>/js/npm.js"></script>
	<script>
		var url = window.location.href;
		// remove # from URL
		url = url.substring(0, (url.indexOf("#") == -1) ? url.length : url.indexOf("#"));
		// remove parameters from URL
		url = url.substring(0, (url.indexOf("?") == -1) ? url.length : url.indexOf("?"));
		// select file name
		url = url.substr(url.lastIndexOf("/") + 1);
		// If file name not avilable
		if (url == '') {
			url = 'index.php';
		}
		$('#header_links li').each(function() {
			// select href
			var href = $(this).find('a').attr('href');
			var arr = href.split('/');
			console.log("href", arr[3], url);
			// Check filename
			if (url == arr[3]) {
				// Add active class
				$(this).addClass('active');
			}
		});

		document.getElementById("header_links").addEventListener("click",function(e) {
	// e.target is our targetted element.
    console.log(e.target.nodeName)
	if(e.target && e.target.nodeName == "LI") {
		location.replace(e.target.id);
		console.log("target",e.target);
		// alert(e.target.id);
	}
});
	</script>
	<style>
		#header_links>li>a{
			text-align: center;
			display: block;
		}
		#header_links>li{
			cursor: pointer;
		}
	</style>
	</body>

	</html>