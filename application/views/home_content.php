<?
/*
	@author Nikhil
	*@version 1.0
	*View to home page 
*/
?>
<body>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<div class="content">
<section class="demo">
 
  <div class="img_slide">

    <div style="display: inline-block;">
      	<img src="<?php echo base_url()."/uploads/img4.jpg"; ?>"/>
	</div>
    <div>
	     <img src="<?php echo base_url()."/uploads/img3.jpg"; ?>"/>
    </div>
    	<button class="prev">&lt;</button>
   		<button class="next">&gt;</button>
  		
   </div>

</section>
<br><br>                                        
<section class="demo">
 
  <div class="prod_slide">
  <div class="prod1">
    <?php
  if (isset($prod_details)) {
   $i=0; 
  foreach ($prod_details as $row) {
    if($i<3){
        $list = explode(',', $row->product_pic);
        echo '<div class=product style='.'"display: inline-block;"'.'>';
        echo "<img src=".'"'.base_url().$list[0].'"'."class=".'"product_pic"'.">";
        echo "<br>";
        echo "<h4>".$row->prod_name."</h4>";
        echo "<p>".$row->phno;
        echo "<br>&#x20b9;".$row->rate;
        echo "</div>";
          
    }else{
        $list = explode(',', $row->product_pic);
        echo '<div class=product style='.'"display: none;"'.'>';
        echo "<img src=".'"'.base_url().$list[0].'"'." float=".'"left"'."class=".'"product_pic"'.">";
        echo "<br>";
        echo "<h4>".$row->prod_name."</h4>";
        echo "<p>".$row->phno;
        echo "<br>&#x20b9;".$row->rate;
        echo "</div>";
    }
    $i++;
  }
  }
 ?>
 	   </div>
      <button class="prod_prev" style="display:none;">&lt;</button>
      <button class="prod_next">&gt;</button>
      
   </div>
   </div>
 
</section>

</div>
<script type="text/javascript">
	var currentIndex = 0,
  	items = $('.img_slide div'),
 	itemAmt = items.length;

function cycleItems() {
	var item = $('.img_slide div').eq(currentIndex);
	items.hide();
	 item.css('display','inline-block');
}

var autoSlide = setInterval(function() {
  currentIndex += 1;
  if (currentIndex > itemAmt - 1) {
    currentIndex = 0;
  }
  cycleItems();
}, 3000);

$('.next').click(function() {
  clearInterval(autoSlide);
  currentIndex += 1;
  if (currentIndex > itemAmt - 1) {
    currentIndex = 0;
  }
  cycleItems();
});

$('.prev').click(function() {
  clearInterval(autoSlide);
  currentIndex -= 1;
  if (currentIndex < 0) {
    currentIndex = itemAmt - 1;
  }
  cycleItems();
});
</script>

<script type="text/javascript">
  var ProductIndex = 4,
    prod = $('.prod_slide div'),
  prodAmt = prod.length;


function cycleProducts() {
  var item = $('.prod_slide div').eq(ProductIndex);
  
  item.css('display','inline-block');
}

$('.prod_next').click(function() {
   
    //alert(ProductIndex);
    $('.prod_next').show();
    $('.prod_prev').show();
    

    prod.hide();
    for (var i = 0; i < 3; i++) {
       cycleProducts();
        $('.prod1').show('slide', {direction: 'right'}, 500);
        ProductIndex += 1;
        if (ProductIndex >= prodAmt) {
            
            $('.prod_next').hide();
            return;
        }
        
    }
});

$('.prod_prev').click(function() {
	prod.hide();
    $('.prod_next').show();
    ProductIndex -= 1;
    for (var i=0; i < 3; i++) {
            ProductIndex -= 1;
            cycleProducts();
            $('.prod1').show('slide', {direction: 'left'}, 500);
        }
        if(ProductIndex<4){
            ProductIndex = 4;
           $('.prod_prev').hide(); 
        }   
});
</script>
</body>