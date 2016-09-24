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
		<button onclick="report();">Report</button>
		
	<div id="myReport" class="report">
	  <div class="report-content">
	    <span class="close">x</span>
	    <h3>REPORT</h3>
	    <form action="<?php echo base_url().'buyer/product/add_status/'.$prod_details['prod_id']?>" id="add_usr" method="post" 
 		enctype="multipart/form-data">
	    <input type="radio" name="report_status" value="Ad is duplicate">Ad is duplicate
	    <input type="radio" name="report_status" value="Seller not responding">Seller not responding
	    <input type="radio" name="report_status" value="Product already sold">Product already sold
	    <textarea placeholder="#More comments.." style=" width:400px; height:100px;"></textarea>
	    <br>
	    <input type="submit" name="Send">
	    </form>
	</div>

</div>

</div>
</div>
<script type="text/javascript">
	var span = document.getElementsByClassName("close")[0];
	function report(){
		document.getElementById('myReport').style.display="block";
	}
	span.onclick = function() {
    	document.getElementById('myReport').style.display = "none";
	}
</script>