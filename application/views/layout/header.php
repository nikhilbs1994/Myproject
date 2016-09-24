<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url().'css/style.css'?>">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url().'css/animate.css'?>">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
<div class="header">
	<h1>MY PROJECT</h1>
	<div id="header_link">
		<a href="<?php echo base_url().'/home'?>">Home</a>
		<a href="<?php echo base_url().'/home/contact_us'?>">Contact us</a>
		<a href="<?php echo base_url().'/home/about_us'?>">About us</a>
		<a href="<?php echo $login_link?>" id="link_login" style="float:right;"><?php echo $login_name ?></a>
		<a href="<?php echo $signup_link?>" id="link_login" style="float:right;"><?php echo $signup_name; ?></a>
	</div>
</div>

