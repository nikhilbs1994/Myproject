<?
/*
	@author Nikhil
	*@version 1.0
	*View to display forgot password form. 
*/
?>
<div class="content">
<div class="login">
	<h2>LOGIN</h2>
	<hr>
	<form action="<?php echo base_url().'forgot_pwd/check_user'?>"  method="post">
		<?php $this->load->library('form_validation');?>  
 		<?php echo form_open('form'); ?>
		Username
		<input type="text" name="username" value="<?php echo set_value('username'); ?>">
		<br><br>
		
		<input type="submit" name="login" value="Forgot Password">
		<br>
		<span id="status">
		<?php
			echo validation_errors(); 
			if(isset($status)){echo "<br>".$status;} 
		?>
		</span>
	</form>	
</div>
</div>