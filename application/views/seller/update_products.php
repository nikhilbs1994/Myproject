<?
/*
	@author Nikhil
	*@version 1.0
	*View to display update product form of seller. 
*/
?>
<div class="content">
<div class="signup">
	<h2>ADD PRODUCT</h2>
 	<form action="<?php echo base_url().'seller/product/update_prod/'.$prod_details['prod_id']?>" id="add_usr" method="post" 
 	enctype="multipart/form-data">
		<?php $this->load->library('form_validation');?>  
 		<?php echo form_open('form'); ?>  
		<label>Product Name</label>
		<input type="text" name="prod_name" id="prod_name" value="<?php echo $prod_details['prod_name']; ?>" required>
		<br>
		<label>Category</label>
		<select name="category">
			<?php foreach ($category as $row) {
				if($prod_details['category']==$row->ct_name){
				echo "<option value=".$row->ct_name." selected>".$row->ct_name."</option>";

			}else{
				echo "<option value=".$row->ct_name.">".$row->ct_name."</option>";
				
			} 
			}
			?>
			
		</select>
		<br>
		<label>Phone No.</label>
		<input type="text" name="phno" id="phno" value="<?php echo $prod_details['phno']; ?>" required>
		<br>
		<label>Email</label>
		<input type="text" name="alt_email" id="alt_email" value="<?php echo $prod_details['email']; ?>" required>
		<br>
		<label>Address 1</label>
		<textarea rows="3" cols="50" name= addr1 required><?php echo $prod_details['addr1'];?></textarea>
		<br>
		<label>Address 2</label>
		<textarea rows="3" cols="50" name= addr2 required><?php echo $prod_details['addr2']; ?></textarea>
		<br>
		<label>State</label>
		<select name="state">
			<option value="Andhra Pradesh">Andhra Pradesh</option>
			<option value="Arunachal Pradesh">Arunachal Pradesh</option>
			<option value="Assam">Assam</option>
			<option value="Bihar">Bihar</option>
			<option value="Chhattisgarh">Chhattisgarh</option>
			<option value="Goa">Goa</option>
			<option value="Gujarat">Gujarat</option>
			<option value="Haryana">Haryana</option>
			<option value="Himachal Pradesh">Himachal Pradesh</option>
			<option value="Jammu and Kashmir">Jammu and Kashmir</option>
			<option value="Jharkhand">Jharkhand</option>
			<option value="Karnataka">Karnataka </option>
			<option value="Kerala">Kerala</option>
			<option value="Madhya Pradesh">Madhya Pradesh</option>
			<option value="Maharashtra">Maharashtra</option>
			<option value="Manipur">Manipur</option>
			<option value="Meghalaya">Meghalaya</option>
			<option value="Mizoram">Mizoram</option>
			<option value="Nagaland">Nagaland</option>
			<option value="Orissa">Orissa</option>
			<option value="Punjab">Punjab</option>
			<option value="Rajasthan">Rajasthan</option>
			<option value="Sikkim">Sikkim</option>
			<option value="Tamil Nadu">Tamil Nadu</option>
			<option value="Telangana">Telangana</option>
			<option value="Tripura">Tripura</option>
			<option value="Uttar Pradesh">Uttar Pradesh</option>
			<option value="Uttarakhand">Uttarakhand</option>
			<option value="West Bengal">West Bengal</option>
		</select>
		<br>
		<label>Product Pic </label>
		<input type="file" name="prod_pic[]" multiple>
		<br>
		<label>Expected Rate</label>
		<input type="text" name="rate" id="rate" value="<?php echo $prod_details['rate']; ?>" required>
		<br>
		<button onclick="add_user();return false;">Update</button>
		<br>
		<span id="error">
		<?php
			echo validation_errors(); 
			if(isset($error)){echo "<br>".$error;} 
		?>
		</span>
		<span id="status">
		<?php
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