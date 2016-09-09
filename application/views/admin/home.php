
<?
/*
	@author Nikhil
	*@version 1.0
	*View to display home page of admin. 
*/
?>
<div class="content">
<?php
	if (isset($prod_details)) {
		
	foreach ($prod_details as $row) {
		$list = explode(',', $row->product_pic);
		if($row->status == 0){
			$prod_status="Inactive";
		}elseif ($row->status == 1) {
			$prod_status="Active";		
		}else{
			$prod_status="Rejected";
		}
		
		echo '<div class='."product_search".'>';
		echo '<div class='."product_search_img".'>';
		echo "<img src=".'"'.base_url().$list[0].'"'." float=".'"left"'."class=".'"product_pic"'.">";
		echo "</div>";
		echo '<div class='."product_search_text".'>';
		echo "<h4>".$row->prod_name."</h4>";
		echo "<p>".$row->phno;
		echo "<br>".$prod_status;
		echo "<a href=".base_url().'seller/product/view_prod/'.$row->prod_id.'>View details</a></p>';
		echo "</div>";
		echo "</div>";
	}
	}

 ?>
 <a href="<?php echo base_url().'/admin/add_category'; ?>">Add Category</a>
</div>