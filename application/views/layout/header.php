<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel = "stylesheet" type = "text/css" href =  "http://10.4.3.155:100/css/style.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
<div class="header">
	<h1>MY PROJECT</h1>
	<div id="header_link">
		<a href="">Home</a>
		<a href="">Contact us</a>
		<a href="">About us</a>
		<a href="<?php echo $signup_link?>" id="link_login" ><?php echo $signup_name; ?></a>
		<a href="<?php echo $login_link?>" id="link_login" ><?php echo $login_name ?></a>
	</div>
</div>

