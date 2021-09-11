<!DOCTYPE html>
<html lang="en">

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<title>Audio App</title>

	<link rel="icon"
		href="<?php echo base_url() . 'assets/images/logo.png'; ?>"
		type="image/gif" sizes="16x16">

	<link
		href="<?= base_url('assets') ?>/css/bootstrap.min.css"
		rel="stylesheet" type="text/css">
	<link
		href="<?= base_url('assets') ?>/css/jquery-ui.min.css"
		rel="stylesheet" type="text/css">
	<link
		href="<?= base_url('assets') ?>/css/animate.css"
		rel="stylesheet" type="text/css">
	<link rel="stylesheet"
		href="<?= base_url('assets') ?>/css/et-line-fonts.css"
		type="text/css">
	<link
		href="<?= base_url('assets') ?>/css/style.css"
		rel="stylesheet" type="text/css">
	<link
		href="<?= base_url('assets') ?>/css/stylewp.css"
		rel="stylesheet" type="text/css">
	<link
		href="<?= base_url('assets') ?>/css/HomeStyleSheet.css"
		rel="stylesheet" type="text/css">
	<link
		href="<?= base_url('assets') ?>/css/stylesheet.css"
		rel="stylesheet" type="text/css">

	<link
		href="<?= base_url('assets') ?>/css/responsive.css"
		rel="stylesheet" type="text/css">
	<link
		href="<?= base_url('assets') ?>/css/boot.css"
		rel="stylesheet" type="text/css">

	<script
		src="<?= base_url('assets') ?>/js/jquery-ui.min.js">
	</script>

	<script
		src="<?= base_url('assets') ?>/js/jquery-plugin-collection.js">
	</script>
	<script
		src="<?= base_url('assets') ?>/js/bootstrap.min.js">
	</script>
</head>

<body class="">
	<div id="wrapper" class="clearfix" style="font-size: 16px;">
		<header id="header" class="header">
			<div class="container">
				<nav class="navbar ownavigation">
					<div class="container-fluid">

						<div class="navbar-header">
							<!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button> -->
							<a class="navbar-brand menuzord-brand pull-left flip"
								href="<?php echo base_url() . 'index.php'; ?>"
								style="margin-top: 20px">
								<span>
									<img src="<?php echo base_url() . 'assets/images/logo.png'; ?>"
										style="width:40px;" />
								</span>
								<span style="color :#7030a0;vertical-align: super;">
									Dil ki Awaz
								</span>
							</a>
						</div>
						<div id="navbar" class="navbar-collapse collapse" id="myNavbar">
							<ul class="nav navbar-nav" style="float: right;">
								<li>
									<a href="<?php echo base_url() . 'index.php'; ?>"
										title="Download Android application">
										<img src="<?php echo base_url() . 'assets/images/android-logo.png'; ?>"
											alt="android application" style="width:30px;">
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() . 'index.php'; ?>"
										title="Download IOS application">
										<img src="<?php echo base_url() . 'assets/images/apple.png'; ?>"
											alt="ios application" style="width:30px;">
									</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</header>
		<div class="container" style="padding-top: 0;">
			<div role="tabpanel" class="tab-pane fade active in" id="howwecan_1" style="height: 50px;">
				<div>
					<!-- <div class="container">	 -->
					<div class="widget" style="margin-bottom: 0;">
						<div class="services-list">
							<ul class="list list-border angle-double-right row" id="header_links">
								<li class="list-item col-md-4 col-sm-4 col-xs-4"
									id="<?php echo base_url() . 'index.php'; ?>">
									<a href="<?php echo base_url() . 'index.php'; ?>"
										name="books" aria-controls="howwecan_10" role="tab" data-toggle="tab"
										aria-expanded="true">
										Books
									</a>
								</li>
								<li class="list-item col-md-4 col-sm-4 col-xs-4"
									id="<?php echo base_url() . 'authors'; ?>">
									<a href="<?php echo base_url() . 'authors'; ?>"
										name="authors" aria-controls="howwecan_11" role="tab" data-toggle="tab"
										aria-expanded="true">
										Authors
									</a>
								</li>
								<li class="list-item col-md-4 col-sm-4 col-xs-4"
									id="<?php echo base_url() . 'subject'; ?>">
									<a href="<?php echo base_url() . 'subject'; ?>"
										name="subject" aria-controls="howwecan_12" role="tab" data-toggle="tab"
										aria-expanded="true">
										Genre
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="pull-right" style="display: flex; flex-direction: row; align-items: baseline;">
						<form action="/index.php" method="get" style="display: inline-block;">
							<div class="form-group" style="display: inline-block;">
								<input type="text" placeholder="Book name" class="form-control" id="search"
									name="search" maxlength="100" style="height: 33px;">
							</div>
							<button type="submit" class="btn btn-primary">Search</button>
					</div>
					</form>
				</div>
			</div>
		<!-- </section> -->