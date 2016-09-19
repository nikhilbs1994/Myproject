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
		<label>Product Pic </label>
		<br>
		<?php 
			$list = explode(',', $prod_details['product_pic']);
			foreach ($list as $link) {
    			echo '<img src="'.base_url().$link.'" class="product_pic" >';
    		}
		?>
		<br>
		<a href="<?php echo base_url().'admin/add_category/approve_prod/'.$prod_details['prod_id'] ?>">Approve</a>&nbsp	
		<a href="<?php echo base_url().'admin/add_category/reject_prod/'.$prod_details['prod_id'] ?>">Reject</a>
		
		

</div>
</div>