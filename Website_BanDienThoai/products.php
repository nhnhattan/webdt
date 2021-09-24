<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
 ?>
<br>

	<div class="main">
    <div class="content">
    	<div class="content_top" style="background-color: #0f9ed8;">
    		<div class="heading">
    		<h3 style="color:white;margin-left: 520px;"><strong>Điện thoại thông minh</strong></h3>
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
					 <!-- <span class="meta-icons wishlist" style="color: #000080"><a href="#" class="mr-2"><span class="icon-heart" style="color:orange;"></span></a><a href="ykienkhachhang.php">9 đánh giá</a></span> -->

					 <!-- <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p> -->
					 <p><span class="price"><?php echo $fm->format_currency($result['price']).""."₫" ?></span></p>
				     <div class="button1"><span><a class="btn btn-black --hover rounded-1" href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
				}
				 ?>
			</div>

	<div class="content_bottom" style="margin-top: 14px ;">
    		
    	
 
			<div class="section group">
			<?php 
	      	$product_new = $product->getproduct_new();
	      	if($product_new){
	      		while ($result_new = $product_new->fetch_assoc()) {
	      			      	
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4" style="margin-left: 45px;height: 495px;">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" /></a>
					 <h2><?php echo $result_new['productName'] ?></h2>

					 <span class="icon-star text-warning"></span>
					 <span class="icon-star text-warning"></span>
					 <span class="icon-star text-warning"></span>
					 <span class="icon-star text-warning"></span>
					 <span class="icon-star text-warning"></span>
					 <br>
					<!--  <span class="meta-icons wishlist" style="color: #000080"><a href="#" class="mr-2"><span class="icon-heart" style="color:pink;"></span></a><a href="ykienkhachhang.php">12 đánh giá</a></span> -->

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


 <div class="container" style="margin-left:964px;">
  <h4 style="color:#0f9ed8;"><img src="images/list.png" style="margin-left: 1px;"><strong> <u> Danh sách trang</u></strong></h4>
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
    <li class="page-item active"><a class="page-link" href="products1.php">1</a></li>
    <li class="page-item"><a class="page-link" href="products2.php">2</a></li>
    <li class="page-item"><a class="page-link" href="products1.php">Trang sau</a></li>
  </ul>
</div>

<?php 
	include 'inc/footer.php';
 ?>

