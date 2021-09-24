<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
 ?>	

 <div class="main">
    <div class="content">
    	<div class="content_top" style="margin-top: 15px;background-color: #0f9ed8;">
    		<div class="heading">
    		<h3 style="color:white;margin-left: 540px;"><strong>Sản phẩm nổi bật</strong></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      	$product_featheread = $product->getproduct_featheread();
	      	if($product_featheread){
	      		while ($result = $product_featheread->fetch_assoc()) {
	      			      	
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4" style="margin-left: 45px;height: 495px;">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>

					 <span class="icon-star text-warning"></span>
					 <span class="icon-star text-warning"></span>
					 <span class="icon-star text-warning"></span>
					 <span class="icon-star text-warning"></span>
					 <br>
					 
					 <!-- <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p> -->
					 <p><span class="price"><?php echo $fm->format_currency($result['price']).""."₫" ?></span></p>
				     <div class="button1"><span><a class="btn btn-black --hover rounded-1" href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
				}
				 ?>
			</div>
			<div class="content_bottom" style="margin-top: 14px ;background-color: #0f9ed8;">
    		<div class="heading">
    		<h3 style="color:white;margin-left: 540px;"><strong>Sản phẩm mới</strong></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php 
	      	$product_new = $product->getproduct_new();
	      	if($product_new){
	      		while ($result_new = $product_new->fetch_assoc()) {
	      			      	
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4" style="margin-left: 45px;height: 495px;">
					 <a href="details.php?proid=<?php echo $result_new['productId'] ?>"><img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" /></a>
					 <h2><?php echo $result_new['productName'] ?></h2>

					 <span class="icon-star text-warning"></span>
					 <span class="icon-star text-warning"></span>
					 <span class="icon-star text-warning"></span>
					 <span class="icon-star text-warning"></span>
					 <span class="icon-star text-warning"></span>
					 <br>					

					 <!-- <p><?php echo $fm->textShorten($result_new['product_desc'], 50) ?></p> -->
					 <p><span class="price"><?php echo $fm->format_currency($result_new['price'])."₫" ?></span></p>
				     <div class="button1"><span><a class="btn btn-black --hover rounded-1" href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details" class="btn btn-black rounded-0">Chi tiết</a></span></div>
				</div>
			<?php 
				}
				}
			?>
			</div>
    </div>
 </div>

 	<!------------------------------------- Khuyến mãi 2-------------------------------------->
    <div class="site-blocks-cover overlay get-notification" id="special-section" style="background-image: url(images/hero_2.jpg); background-attachment: fixed; background-position: top;width: 1366px; margin-left: -14px;margin-bottom:-34px; " data-aos="fade">
      <div class="container">

        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center">
            <h3 class="section-sub-title">Ưu đãi cùng hàng ngàn quà tặng</h3>
            <h3 class="section-title text-white mb-4">Khuyến mãi sốc dịp hè</h3>
            <p class="mb-5 lead">BEE PHONE hiện tung ra nhiều gói ưu đãi cực khủng vào các ngày lễ lớn trong năm, đặc biệt bùng nổ vào dịp hè</p>
            
            <div id="date-countdown" class="mb-5"></div>

            <p><a href="index.php" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 mb-lg-0 mb-2 d-block d-sm-inline-block">Mua hàng ngay</a></p>
          </div>
        </div>

      </div>
    </div>
    <br>

	  <script src="css/them/js/owl.carousel.min.js"></script>
	  <script src="css/them/js/jquery.stellar.min.js"></script>
	  <script src="css/them/js/jquery.countdown.min.js"></script>
	  <script src="css/them/js/aos.js"></script>
	  <script src="css/them/js/jquery.sticky.js"></script>
	  <script src="css/them/js/main.js"></script>
    <!--------------------------------------------------------------------------->

<?php 
	include 'inc/footer.php'; //chen gd footer trang Web
 ?>
