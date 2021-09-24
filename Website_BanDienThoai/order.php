<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>	
 <?php 
	$login_check = Session::get('customer_login');
	if ($login_check==false) {
		header('Location:login.php'); 
	}

 ?>
<div class="main">
    <div class="content" class="site-blocks-cover overlay get-notification"  style="background-image: url(images/city.jpg);  background-attachment: none; background-position: top;height:310px">
    	<div class="cartoption">		
			<div class="cartpage1">
				<div class="order_page">
					<!-- <div class="alert-primary" style="width: 180px;margin-left:578px;">
						<h3 style="text-align: center; font-family: Arial; color: green;">Thông báo</h3>
					</div> -->
					<div class="alert alert-info1">
					<!-- -->
 					<div class="container" style="margin-left: 330px;margin-top: 20px;">
						<div class="star-controll" style="margin-left: 210px;">
							<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>

						 </div>

					 	<h4 style="color: #34495E; font-family: Calibri;margin-left: -50px;"><img src="images/welcome.png" style="width: 70px;margin-top: -8px;"><strong>Chào mừng khách hàng: <a style="color: #0f9ed8;"><?php echo Session::get("customer_name"); ?></a> đã đến với Bee Phone</strong><img src="images/welcome.png" style="width: 70px;margin-top: -8px;"></h4>
					 	<div class="star-controll" style="margin-left: 210px;">
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
						 	<span class="icon-star text-warning"></span>
					 	</div><br>
						 
						<!-- -->
						<span style="margin-left: 228px;">
							<a href="index.php" class="btn btn-black btn-black--hover px-4 py-3 rounded-10" style="height: ;">Mua hàng ngay</a><br>
						</span>
					</div> 
				</div>
					
				</div>					
			</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
	include 'inc/footer.php';
 ?>