<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- <link rel="shortcut icon" href="assets/images/favicon_1.ico"> -->

    <link rel="icon" href="<?php echo base_url('assets') . '/images/logo.png'; ?>" type="image/gif" sizes="16x16">

    <title>Dil-ki-Awaz Admin Panel</title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet"
        href="<?= base_url('assets') ?>/plugins/morris/morris.css">

    <!--Form Wizard-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets') ?>/plugins/jquery.steps/demo/css/jquery.steps.css" />

    <link
        href="<?= base_url('assets') ?>/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"
        rel="stylesheet" />
    <link
        href="<?= base_url('assets') ?>/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css"
        rel="stylesheet" />
    <link
        href="<?= base_url('assets') ?>/plugins/sweetalert/dist/sweetalert.css"
        rel="stylesheet" type="text/css">
    <link
        href="<?= base_url('assets') ?>/css/bootstrap.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="<?= base_url('assets') ?>/css/core.css"
        rel="stylesheet" type="text/css" />
    <link
        href="<?= base_url('assets') ?>/css/components.css"
        rel="stylesheet" type="text/css" />
    <link
        href="<?= base_url('assets') ?>/css/icons.css"
        rel="stylesheet" type="text/css" />
    <link
        href="<?= base_url('assets') ?>/css/pages.css"
        rel="stylesheet" type="text/css" />
    <link
        href="<?= base_url('assets') ?>/css/responsive.css"
        rel="stylesheet" type="text/css" />
    <link
        href="<?= base_url('assets') ?>/css/bootstrap-timepicker.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="<?= base_url('assets') ?>/plugins/clockpicker/dist/jquery-clockpicker.min.css"
        rel="stylesheet">

    <!--<link href="<?= base_url('assets') ?>/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
    rel="stylesheet">-->

    <link
        href="<?= base_url('assets') ?>/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" type="text/css" />

    <!-- chosen Jquery -->

    <link
        href="<?= base_url('assets') ?>/css/prism.css"
        rel="stylesheet">
    <link
        href="<?= base_url('assets') ?>/css/chosen.css"
        rel="stylesheet">
    <link
        href="<?= base_url('assets') ?>/css/uploadfile.css"
        rel="stylesheet">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>




    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script
        src="<?= base_url('assets') ?>/js/modernizr.min.js">
    </script>



</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <div class="topbar-left" style="padding: 0px 30px 0px 50px; width: auto !important;">
                <div class="text-center">
                    <!-- <span>
								<img src="<?php echo base_url('assets') . '/images/logo.svg'; ?>"
                    style="width:40px;" />
                    </span>
                    <span style="color :#7030a0;vertical-align: super;">
                        DIL KI AWAZ
                    </span> -->
                    <a href="<?= base_url('dashboard') ?>"
                        class="logo">
                        <img src="<?php echo base_url('assets') . '/images/logo.svg'; ?>"
                            style="width:40px;" alt="">
                        Dil ki Awaz
                    </a>
                </div>
            </div>


            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="">
                        <div class="pull-left">
                            <button class="button-menu-mobile open-left">
                                <i class="ion-navicon"></i>
                            </button>
                            <span class="clearfix"></span>
                        </div>

                        <!--<form role="search" class="navbar-left app-search pull-left hidden-xs">
			                     <input type="text" placeholder="Search..." class="form-control">
			                     <a href=""><i class="fa fa-search"></i></a>
			                </form>-->


                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="dropdown">
                                <?php
                                $img = base_url('assets/images/admin.jpg');
                                ?>
                                <a href="" class="dropdown-toggle profile" data-toggle="dropdown"
                                    aria-expanded="true"><img
                                        src="<?= $img ?>?<?= time() ?>"
                                        alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?= base_url('EditAdmin') ?>">
                                            <i class="ti-pencil m-r-5"></i> 
                                            Edit Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('logout') ?>">
                                            <i class="ti-power-off m-r-5"></i> 
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- Top Bar End -->



        <!-- ========== Left Sidebar Start ========== -->

        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>

                        <li class="text-muted menu-title">Navigation</li>
                        <li class="has_sub">
                            <a href="<?= base_url("dashboard") ?>"
                                class="waves-effect <?php if ($this->uri->segment(1) == 'dashboard') {
                                    echo 'active';
                                } else {
                                    echo 'noactive';
                                } ?>"><i
                                    class="ti-home"></i> <span>Dashboard </span>
                                <!--span class="menu-arrow"></span-->
                            </a>
                        </li>

                        <li class="has_sub">
                            <a href="<?= base_url('subject') ?>"
                                class="waves-effect <?php if ($this->uri->segment(1) == 'subject') {
                                    echo 'active';
                                } else {
                                    echo 'noactive';
                                } ?>"><i
                                    class="md md-add-to-photos"></i> <span> Genre/Subjects</span></span> </a>

                        </li>



                        <li class="has_sub">
                            <a href="<?= base_url('author') ?>"
                                class="waves-effect <?php if ($this->uri->segment(1) == 'author') {
                                    echo 'active';
                                } else {
                                    echo 'noactive';
                                } ?>"><i
                                    class="md md-people"></i> <span>Authors</span></span> </a>
                        </li>

                        <li class="has_sub">
                            <a href="<?= base_url('narrator') ?>"
                                class="waves-effect <?php if ($this->uri->segment(1) == 'narrator') {
                                    echo 'active';
                                } else {
                                    echo 'noactive';
                                } ?>"><i
                                    class="md md-person"></i> <span>Narrators</span></span> </a>
                        </li>

                        <li class="has_sub">

                            <a href="<?= base_url('books') ?>"
                                class="waves-effect <?php if ($this->uri->segment(1) == 'books') {
                                    echo 'active';
                                } else {
                                    echo 'noactive';
                                } ?>"><i
                                    class="icon-book-open"></i> <span>Books</span></span> </a>

                        </li>
                        <li class="has_sub">

                            <a href="<?= base_url('review') ?>"
                                class="waves-effect <?php if ($this->uri->segment(1) == 'review') {
                                    echo 'active';
                                } else {
                                    echo 'noactive';
                                } ?>"><i
                                    class="ti ti-clipboard"></i><span>Reviews</span></span> </a>

                        </li>
                        <li class="has_sub">

                            <a href="<?= base_url('notification') ?>"
                                class="waves-effect <?php if ($this->uri->segment(1) == 'notification') {
                                    echo 'active';
                                } else {
                                    echo 'noactive';
                                } ?>"><i
                                    class="md md-notifications"></i><span>Notification</span></span> </a>

                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('ul li a').click(function() {
                    $('li a').removeClass("active");
                    $(this).addClass("active");
                });
            });
        </script>