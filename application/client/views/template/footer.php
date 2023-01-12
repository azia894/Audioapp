</div>
</div>
</section>
<footer id="footer" class="footer-new bg-black-222">
	<div class="container">
		<div class="row">
			<div class="col-md-4 text-left">
				<div class="section-header text-white">
					Sponsors
				</div>
				<a href="https://maahiruk.org/" target="_blank">
					<div class="sponsers">
						<img src="<?php echo base_url() . 'assets/images/maahir.png'; ?>" alt="" class="sponser-icon">
						<span class="text-white"> MAAHIR </span>
					</div>
				</a>
			</div>
			<div class="col-md-6 text-left download-app-footer">
				<div class="text-white section-header">
					Download Our App for more Features
				</div>
				<div class="btnsbox">
					<a href="https://play.google.com/store/apps/details?id=com.uabtech.dilkiawaz" target="_blank" id="download_android" class="white" style="display: flex;">
						<span class="icon">
							<img src="<?php echo base_url() . 'assets/images/playstore.png'; ?>" width="20" height="20" class="download for android">
						</span>
						<p>Download for
							<strong>Android User</strong>
						</p>
					</a>
					<a href="https://apps.apple.com/in/app/dil-ki-awaz/id1638704803" target="_blank"  id="download_ios" class="white" style="display: flex;">
						<span class="icon">
							<img src="<?php echo base_url() . 'assets/images/appstore-icon-dark.svg'; ?>" width="20" height="20" class="download for ios">
						</span>
						<p>Download on the
							<strong>APP Store</strong>
						</p>
					</a>
				</div>
			</div>
			<div class="col-md-2 text-left">
				<a href="<?php echo base_url() . 'Aboutus'; ?>" id="aboutus" class="text-white">About Us</a>
			</div>
			<div class="col-md-2 text-left" style="margin-top: 10px">
				<a href="<?php echo base_url() . 'Privacypolicy'; ?>" id="Privacypolicy" class="text-white">Privacy Policy</a>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<div class="font-15 text-white mt-0">Copyright &copy;<span id="year"></span>. UAB Tech</div>
		</div>
	</div>
</footer>
<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<!-- <script
		src="<?= base_url('assets') ?>/js/bootstrap.min.js">
</script> -->
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
		if (url == arr[3]) {
			$(this).addClass('active');
		}
	});

	document.getElementById("header_links").addEventListener("click", function(e) {
		// e.target is our targetted element.
		console.log(e.target.nodeName)
		if (e.target && e.target.nodeName == "LI") {
			location.replace(e.target.id);
			console.log("target", e.target);
			// alert(e.target.id);
		}
	});
</script>
<style>
	#header_links>li>a {
		text-align: center;
		display: block;
	}

	#header_links>li {
		cursor: pointer;
	}
</style>
<script>
	var d = new Date();
	var n = d.getFullYear();
	document.getElementById("year").innerHTML = n;
	document.getElementById("browseList").addEventListener("click", function(e) {
		// e.target is our targetted element.
		console.log(e.target.nodeName)
		if (e.target && e.target.nodeName == "LI") {
			location.replace(e.target.id);
			// alert(e.target.id);
		}
	});
</script>
</body>

</html>
