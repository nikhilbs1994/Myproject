<div class="content">
<div class="signup1">
	
 	<form action = "<?php echo base_url().'buyer/product/search_product'?>" id = "add_usr" method = "post" 
 	enctype = "multipart/form-data">
		<?php $this->load->library('form_validation');?>  
 		<?php echo form_open('form'); ?>  
 		<div class="ui-widget">
		<label>Search Tag</label>
		<input type="text" name="search_tag" id="tags">
	
		<label>Category</label>
		<select name="category">
			<?php foreach ($category as $row) {
				echo "<option value=".$row->ct_name.">".$row->ct_name."</option>";
				
			} ?>
		</select>
		
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
		
		<button onclick="add_user();return false;">Search</button>
		</div>
		<span id="status">
		<?php
			echo validation_errors(); 
			if(isset($status)){echo "<br>".$status;} 
		?>
		</span>	
	</form>
	<img src="">
</div>
<?php
	if (isset($product_details)) {
		
	foreach ($product_details as $row) {
		$list = explode(',', $row->product_pic);
		
		echo '<div class='."product_search".'>';
		echo '<div class='."product_search_img".'>';
		echo "<img src=".'"'.base_url().$list[0].'"'." float=".'"left"'."class=".'"product_pic"'.">";
		echo "</div>";
		echo '<div class='."product_search_text".'>';
		echo "<h3>".$row->prod_name."</h3>";
		echo "<h4>".$row->phno."</h4>";
		echo "<h4>".$row->email."</h4>";
		echo "<a href=".base_url().'buyer/product/view_prod/'.$row->prod_id.'>View details</a>';
		echo "</div>";
		echo "</div>";
	}
	}
 ?>
</div>
<script type="text/javascript">
	function add_usr(){
		document.getElementById("add_usr").submit();
		return true;
	}
	$(this).ready( function() {
           $("#tags").autocomplete({
               minLength: 1,

               source:
               function(req, add){

                   $.ajax({
                       url: "<?php echo base_url().'buyer/product/search_tag' ?>",
                       dataType: 'json',
                       type: 'POST',
                       data:req,
                       success:   
                       function(data){
                           if(data.response =="true"){
                           	
                              add(data.message);
                              
                           	
                           }
                       },
                       error: function(ts) { alert(ts.responseText) },
                   });
               },
           });
       });	


</script>
