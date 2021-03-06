<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>

	<title><?php echo $retVal = (isset($list['Current_fucntion'])) ? $list['Current_fucntion'] : "sms_system" ; ?></title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	
	<!-- Bootstrap -->
	<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<!-- ColorPicker -->
	<link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/theme/scripts/farbtastic/farbtastic.css" />

	<!-- Bootstrap Extended -->
	<link href="<?php echo base_url(); ?>assets/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">
	
	<!-- JQueryUI v1.9.2 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />
	
	<!-- Glyphicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/glyphicons.css" />
	
	<!-- Bootstrap Extended -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/extend/bootstrap-select/bootstrap-select.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
	
	<!-- Uniform -->
	<link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/theme/scripts/pixelmatrix-uniform/css/uniform.default.css" />

	<!-- JQuery v1.8.2 -->
	<script src="<?php echo base_url(); ?>assets/theme/scripts/jquery-1.8.2.min.js"></script>
	
	<!-- Modernizr -->
	<script src="<?php echo base_url(); ?>assets/theme/scripts/modernizr.custom.76094.js"></script>
	
	<!-- MiniColors -->
	<link rel="stylesheet" media="screen" href="<?php echo base_url(); ?>assets/theme/scripts/jquery-miniColors/jquery.miniColors.css" />
	
	<!-- Theme -->
	<link rel="stylesheet/less" href="<?php echo base_url(); ?>assets/theme/less/style.less?1361270212" />
	
	<!-- FireBug Lite -->
	<!-- <script type="text/javascript" src="https://getfirebug.com/firebug-lite-debug.js"></script> -->
	
	<!-- LESS 2 CSS -->
	<script src="<?php echo base_url(); ?>assets/theme/scripts/less-1.3.3.min.js"></script>
	<!-- LESS 2 CSS -->
	<script src="<?php echo base_url(); ?>assets/custom_function.js"></script>
	
</head>
<body>
	<!-- Start Content -->
	<div class="container-fluid " style="width:100% !important; margin: 0px auto !important; border: none !important;
">
		<?php  if ($this->router->fetch_class()== "login") {
	
}else{ ?>
		<div class="navbar main">
			<a href="<?php base_url('complaint/complaint_list'); ?>" class="appbrand"><span>SMS Complaint <span>System</span></span></a>
			
						<button type="button" class="btn btn-navbar">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
						
			<ul class="topnav pull-right">
				
				
				<li class="account">
										<a  href="<?php echo base_url()."login/logout" ?>" class="glyphicons logout lock"><span class="hidden-phone text">logout</span><i></i></a>
				
									</li>
			</ul>
		</div>
		<?php } ?>
<?php  // ========== All Form Validation=====================
include_once("validation.php");
?>
 <?php
    // ------------------ Check current  Menu ----------
        $class    = $this->router->fetch_class();
        $fucntion = $this->router->fetch_method();
        $url_full = $this->uri->uri_string();
        $url_sess = array(
         'class' => $class,
         'fucntion' => $fucntion,
         'url_full' => $url_full
       );
        $this->session->set_userdata('session_page', $url_sess);
        ?>
        