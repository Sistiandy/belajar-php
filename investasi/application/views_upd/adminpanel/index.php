<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.2
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>Administrator Portal Investasi Kota Makassar</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/datepicker.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/easyui/gray/easyui.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/easyui/icon.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/style_na.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/style_adminpanel.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/style_responsive_adminpanel.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/style_default_adminpanel.css" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/uniform/css/uniform.default.css" />
	
	<script src="<?=base_url()?>assets/js/jquery-1.8.0.min.js"></script>
	<script src="<?=base_url()?>assets/js/jquery-blockui.js"></script>
	<script src="<?=base_url()?>assets/easyui/jquery.easyui.min.js"></script>
	<script src="<?=base_url()?>assets/js/jquery.form.js"></script>
	<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/uniform/jquery.uniform.min.js"></script>
	<script src="<?=base_url()?>assets/fancybox/source/jquery.fancybox.pack.js"></script>		
	<script src="<?=base_url()?>assets/tinymce/tiny_mce.js"></script>
	<!--<script src="<?=base_url()?>assets/tiny_mce/tiny_mce.js"></script>-->
	
	<script>
		var host = '<?=base_url()?>';
		//CKEDITOR_BASEPATH = host + '/assets/ckeditor/';
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.init();
			
		});		
	</script>
	<script src="<?=base_url()?>assets/js/scripts.js"></script>
	<script src="<?=base_url()?>assets/js/fungsi.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
	<!-- BEGIN HEADER -->
	<div id="header" class="navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class='bgrepeat'></div>
		<div class="navbar-inner">
			<div class="container-fluid" >
				<!-- BEGIN LOGO -->
				<a class="brand" href="<?=base_url()?>home">
				    AdminPanel
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="arrow"></span>
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<div id="top_menu" class="nav notify-row" style='opacity:10 !important;'>
                    <!-- BEGIN NOTIFICATION -->
					<ul class="nav top-menu">
                        <!-- BEGIN SETTINGS -->
                        
							<center>
							<img src="<?=base_url()?>assets/images/logo_admin.png" alt="PORTAL INVESTASI KOTA MAKASSAR" style="margin-top:-10px;"  />
							</center>
					</ul>
                </div>
                    <!-- END  NOTIFICATION -->
                <div class="top-nav ">
                    <ul class="nav pull-right top-menu" >
                        <!-- BEGIN SUPPORT 
                        <li class="dropdown mtop5">

                            <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
                                <i class="icon-comments-alt"></i>
                            </a>
                        </li>
                        <li class="dropdown mtop5">
                            <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
                                <i class="icon-headphones"></i>
                            </a>
                        </li>
                        <!-- END SUPPORT -->
						<!-- BEGIN USER LOGIN DROPDOWN 
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/avatar1_small.jpg" alt="">
                                <span class="username">Mosaddek Hossain</span>
							<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="icon-user"></i> My Profile</a></li>
								<li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
								<li><a href="#"><i class="icon-calendar"></i> Calendar</a></li>
								<li class="divider"></li>
								<li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul>
					<!-- END TOP NAVIGATION MENU -->
				</div>
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div id="container" class="row-fluid">
		<div id="loading-status">
					<table>
						<tr>
							<td><img src='<?=base_url()?>assets/img/Rounded stripes.gif' /></td>
							<td>Mohon tunggu...</td>
						</tr>
					</table>
		</div>
		<? include ('menu.php');?>
		
		<!-- BEGIN PAGE -->
		<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<h3 class="page-title">
							<span id="judul_na" style="color:navy;font-weight:bold;"><?=$judul?></span>						
						</h3>
			
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">
					
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div id="footer">
		<span style="font-weight: bold; color: inherit; text-decoration: none;">
			PORTAL INVESTASI KOTA MAKASSAR 
			<!--Jl. Taman Makam Pahlawan No.20 Kalibata Jakarta Selatan-->
		</span>&nbsp;&copy;&nbsp;2013&nbsp;-&nbsp;All right reserved
		<div class="span pull-right">
			<span class="go-top"><i class="icon-arrow-up"></i></span>
		</div>
	</div>
	
</body>
<!-- END BODY -->
</html>