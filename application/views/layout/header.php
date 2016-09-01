<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel = "stylesheet" type = "text/css" href =  "<?php echo base_url().'css/style.css'?>">
</head>
<body>
<div class="header">
	<h1>MY PROJECT</h1>
	<div id="header_link">
		<a href="">Home</a>
		<a href="">Contact us</a>
		<a href="">About us</a>
		<a href="<?php echo $signup_link?>" id="link_login"><?php echo $signup_name; ?></a>
		<a href="<?php echo $login_link?>" id="link_login"><?php echo $login_name ?></a>
	</div>
</div>

