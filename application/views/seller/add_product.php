<div class="content">
<div class="signup">
	<h2>ADD PRODUCT</h2>
 	<form action = "<?php echo base_url().'signup/add_usr'?>" id = "add_usr" method = "post" 
 	enctype = "multipart/form-data">
		<?php $this->load->library('form_validation');?>  
 		<?php echo form_open('form'); ?>  
		<label>Product Name</label>
		<input type = "text" name = "prod_name" id = "prod_name" value="<?php echo set_value('prod_name'); ?>" >
		<br>
		<label>Category</label>
		<select>
			<?php foreach ($category as $row) {
				echo "<option value=".$row->ct_name.">".$row->ct_name."</option>";
				
			} ?>
		</select>
		<br>
		<label>Phone No.</label>
		<input type = "text" name = "phno" id = "phno" value="<?php echo set_value('phno'); ?>" >
		<br>
		<label>Alternative Email</label>
		<input type = "text" name = "alt_email" id = "alt_email" value="<?php echo set_value('alt_email'); ?>">
		<br>
		<label>Address 1</label>
		<textarea rows="3" cols="50" name= addr1></textarea>
		<br>
		<label>Address 2</label>
		<textarea rows="3" cols="50" name= addr1></textarea>
		<br>
		<label>Profile Pic </label>
		<input type="file" name = "profilepic">
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