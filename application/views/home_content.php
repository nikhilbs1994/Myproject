<?
/*
	@author Nikhil
	*@version 1.0
	*View to home page 
*/
?>
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
