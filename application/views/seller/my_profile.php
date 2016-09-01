<div class="content">
<div class="signup">
	<h2>PROFILE</h2>
 	
 		<label>First Name</label>
		<label><?php echo $user_details['fname'] ?></label>
		<br><br><br>
		<label>Last Name</label>
		<label><?php echo $user_details['lname'] ?></label>
		<br><br><br>
		<label>Phone No.</label>
		<label><?php echo $user_details['phno'] ?></label>
		<br><br><br>
		<label>Email</label>
		<label><?php echo $user_details['email'] ?></label>
		<br><br><br>
		<label>User Type</label>
		<label>
		<?php if($user_details['usr_type']==1){
			echo "Admin";
		}elseif ($user_details['usr_type']==2) {
			echo "Seller";
		}else{
			echo "Buyer";
		}
		?>
		</label>
		<br><br><br>
		<label>Profile Pic </label>
		<br><br>
		<img src="<?php echo base_url().$user_details['profile_pic']; ?>">
		<a href="<?php echo base_url().'seller/My_profile/edit_profile' ?>">Update profile</a>
		

</div>
</div>