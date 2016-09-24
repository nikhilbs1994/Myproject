<?
/*
	@author Nikhil
	*@version 1.0
	*View to display login form. 
*/
?>
<div class="content">
<div class="signup">
	<h2>UPDATE PROFILE</h2>
 	<form action="<?php echo base_url().'buyer/Update_profile/upd_profile'?>" id="add_usr" method="post" 
 	enctype="multipart/form-data">
		<?php $this->load->library('form_validation');?>  
 		<?php echo form_open('form'); ?>  
		<label>First Name</label>
		<input type="text" name="fname" id="fname" value="<?php echo $user_details['fname']; ?>" >
		<br>
		<label>Last Name</label>
		<input type="text" name="lname" id="lname" value="<?php echo $user_details['lname']; ?>" >
		<br>
		<label>Phone No.</label>
		<input type="text" name="phno" id="phno" value="<?php echo $user_details['phno']; ?>" >
		<br>
		<label>Email</label>
		<input type="text" name="email" id="email" value="<?php echo $user_details['email']; ?>">
		<br>
		<label>Profile Pic </label>
		<input type="file" name="profilepic">
		<br>
		<label>User Type</label>
		<input type="radio"  name="usr_type" value="Buyer" <?php if($user_details['usr_type']==3){echo "checked";} ?>>Buyer
		<input type="radio" name="usr_type" value="seller" <?php if($user_details['usr_type']==2){echo "checked";} ?> >Seller
		<br>
		<button onclick="add_user();return false;">Update</button>
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
