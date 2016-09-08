<?
/*
	@author Nikhil
	*@version 1.0
	*View to display form for add category of product. 
*/
?>
<div class="content">
<div class="login">
	<h2>ADD CATEGORY</h2>
	<hr>
	<form action="<?php echo base_url().'admin/add_category/add_cate'?>"  method="post">
		<?php $this->load->library('form_validation');?>  
 		<?php echo form_open('form'); ?>
		Category
		<input type="text" name="category_name" value="<?php echo set_value('category_name'); ?>">
		<br><br>
		<input type="submit" name="login" value="Add Category">
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