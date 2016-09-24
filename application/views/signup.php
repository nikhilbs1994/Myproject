<?
/*
	@author Nikhil
	*@version 1.0
	*View to display signup form. 
*/
?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<div class="content">
<div class="signup">
	<h2>SIGNUP</h2>
 	<form action="<?php echo base_url().'signup/add_usr'?>" id="add_usr" method="post" 
 	enctype="multipart/form-data">
		<?php $this->load->library('form_validation');?>  
 		<?php echo form_open('form'); ?>  
		<label>First Name</label>
		<input type="text" name="fname" id="fname" value="<?php echo set_value('fname'); ?>" required>
		<br>
		<label>Last Name</label>
		<input type="text" name="lname" id="lname" value="<?php echo set_value('lname'); ?>" required>
		<br>
		<label>Phone No.</label>
		<input type="text" name="phno" id="phno" value="<?php echo set_value('phno'); ?>" required>
		<br>
		<label>Email</label>
		<input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>"required>
		<br>
		<label>Password</label>
		<input type="password" name="pwd" id="pwd" value="<?php echo set_value('pwd'); ?>"required>
		<br>
		<label>Confirm Password</label>
		<input type="password" name="con_pwd" id="con_pwd" value="<?php echo set_value('con_pwd'); ?>"required>
		<br>
		<label>Profile Pic </label>
		<input type="file" name="profilepic">
		<br>
		<label>User Type</label>
		<input type="radio"  name="usr_type" value="Buyer" checked="checked">Buyer
		<input type="radio" name="usr_type" value="seller">Seller
		<br>
		<button onclick="add_user();return false;">Signup</button>
		<br>
		<?php
			echo validation_errors(); 
			if(isset($error)){echo "<br>".$error;} 
		?>
		</span>
		<span id="status">
		<?php
			if(isset($status)){echo "<br>".$status;}
			
		?>

</div>
<?php 
	
 ?>

</div>
<script type="text/javascript">
	function add_usr(){
		document.getElementById("add_usr").submit();
		return true;
	}
	$("#add_usr").validate({ // initialize the plugin
        errorElement: 'div',
        // your other rules and options
    });
</script>