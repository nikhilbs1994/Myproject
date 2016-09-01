<div class="content">
<div class="signup">
	<h2>SIGNUP</h2>
 	<form action = "<?php echo base_url().'signup/add_usr'?>" id = "add_usr" method = "post" 
 	enctype = "multipart/form-data">
		<?php $this->load->library('form_validation');?>  
 		<?php echo form_open('form'); ?>  
		<label>First Name</label>
		<input type = "text" name = "fname" id = "fname" value="<?php echo set_value('fname'); ?>" >
		<br>
		<label>Last Name</label>
		<input type = "text" name = "lname" id = "lname" value="<?php echo set_value('lname'); ?>" >
		<br>
		<label>Phone No.</label>
		<input type = "text" name = "phno" id = "phno" value="<?php echo set_value('phno'); ?>" >
		<br>
		<label>Email</label>
		<input type = "text" name = "email" id = "email" value="<?php echo set_value('email'); ?>">
		<br>
		<label>Password</label>
		<input type = "password" name = "pwd" id = "pwd" value="<?php echo set_value('pwd'); ?>">
		<br>
		<label>Confirm Password</label>
		<input type = "password" name = "con_pwd" id = "con_pwd" value="<?php echo set_value('con_pwd'); ?>">
		<br>
		<label>Profile Pic </label>
		<input type="file" name = "profilepic">
		<br>
		<label>User Type</label>
		<input type = "radio"  name = "usr_type" value="Buyer" checked="checked">Buyer
		<input type = "radio" name = "usr_type" value="seller">Seller
		<br>
		<button onclick = "add_user();return false;">Signup</button>
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
<script type="text/javascript">
	function add_usr(){
		document.getElementById("add_usr").submit();
		return true;
	}
</script>