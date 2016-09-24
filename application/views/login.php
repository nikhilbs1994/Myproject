<?
/*
	@author Nikhil
	*@version 1.0
	*View to display login form. 
*/
?>
<div class="content">
<div class="login">
	<h2>LOGIN</h2>
	<hr>
	<form action="<?php echo base_url().'login/login_check'?>"  method="post">
		<?php $this->load->library('form_validation');?>  
 		<?php echo form_open('form'); ?>
		Username
		<input type="text" name="username" value="<?php echo set_value('username'); ?>">
		<br><br>
		Password     
		<input type="password" name="password" value="<?php echo set_value('password'); ?>">
		<br>
		
		<input type="submit" name="login" value="Login">
		<br><br><br>
		<a href="<?php echo base_url().'home/forgot_pwd'; ?>">Forgot Password</a><br>
		<span id="status">
		<?php
			echo validation_errors(); 
			if(isset($status)){echo "<br>".$status;} 
		?>
		</span>
		</form>	
</div>
</div>