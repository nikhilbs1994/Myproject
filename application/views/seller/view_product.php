<?
/*
	@author Nikhil
	*@version 1.0
	*View to display product details to approve product by admin. 
*/
?>
<div class="content">
<div class="signup">
	<h2>PRODUCT DETAILS</h2>
 		<?php 
			if($prod_details['status'] == 0){
				$prod_status="Inactive";
			}elseif ($prod_details['status'] == 1) {
				$prod_status="Active";		
			}elseif ($prod_details['status'] == 2){
				$prod_status="Rejected";
			}else{
				$prod_status="Sold";
			}
		 ?>
 		<label>Product Name</label>
		<label><?php echo $prod_details['prod_name'] ?></label>
		<br><br><br>
		<label>Category</label>
		<label><?php echo $prod_details['category'] ?></label>
		<br><br><br>
		<label>Phone No.</label>
		<label><?php echo $prod_details['phno'] ?></label>
		<br><br><br>
		<label>Email</label>
		<label><?php echo $prod_details['email'] ?></label>
		<br><br><br>
		<label>Address 1</label>
		<label><?php echo $prod_details['addr1'] ?></label>
		<br><br><br>
		<label>Address 2</label>
		<label><?php echo $prod_details['addr2'] ?></label>
		<br><br><br>
		<label>Rate</label>
		<label><?php echo $prod_details['rate'] ?></label>
		<br><br><br>
		<label>Status</label>
		<label><?php echo $prod_status ?></label>
		<br>
		<label>Product Pic </label>
		<br>
		<?php 
			$list = explode(',', $prod_details['product_pic']);
			foreach ($list as $link) {
    			echo '<img src="'.base_url().$link.'" class="product_pic" >';
    		}
		?>
		<br>
		<?php 
		echo "<a href=".base_url().'seller/product/delete_prod/'.$prod_details['prod_id'].'>Delete</a>&nbsp'; 
		echo "<a href=".base_url().'seller/product/update_products/'.$prod_details['prod_id'].'>Update</a>&nbsp';
		if($prod_details['status'] == 1){
			echo "<a href=".base_url().'seller/product/sold_prod/'.$prod_details['prod_id'].'>Sold</a>';
		}
		?>

</div>
</div>