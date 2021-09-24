<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
	
	include_once 'lib/database.php';
	include_once 'helpers/format.php';

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
		

	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$cs = new customer();
	$cat = new category();
	$product = new product();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Bee Phone - Uy tín - Chất lượng - Giá cả phải chăng</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo1.png" alt="" style="width: 330px;margin-left: 25px;margin-top: : : -10px;" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box" style="margin-left: -10px;">
				    <form action="search.php" method="POST">
				    	<input name="searchFnc" type="text" value="Bạn cần tìm gì?" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm sản phẩm';}"><button type="submit" class="btn btn-white rounded-0">Search</button>
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title"><strong>Cart</strong></span>
								<span class="no_product" style="color: #191970;">
									
								<?php
								$check_cart = $ct->check_cart();
								if ($check_cart) {
								 	$sum = Session::get("sum");
								 	$qty = Session::get("qty");
									echo $fm->format_currency($sum).'₫'.' '.' SL: '.$qty;

								 }else {
								 	echo 'Trống';
								 } 
								
								 ?>

								</span>
							</a>
						</div>
			      </div>
			<?php 
				if(isset($_GET['customer_id'])){
					$customer_id = $_GET['customer_id'];
					$delCart = $ct->del_all_data_cart();
					$delCompare = $ct->del_compare($customer_id);
					Session::destroy();
				}
			?>   
		   <div class="login" style="margin-left: 14px;">
			<?php 
			$login_check = Session::get('customer_login');
			if ($login_check==false) {
				echo '<h5>';
				echo '<a href="login.php" class="btn btn-black rounded-0" style="width:100%;height:100%;"><img src="images/login1.png" style="margin-left:-15px;margin-top:-4px;"> Đăng nhập</a></div>';
				echo '</h5>'; 
			}else {
				echo '<h5>';
				echo '<a href="?customer_id='.Session::get('customer_id').' " class="btn btn-black rounded-0" style="width:100%;height:100%;"><img src="images/logout.png" style="margin-left:-15px;margin-top:-4px;"> Đăng xuất</a></div>'; 
				echo '</h5>'; 
			}
			 ?>

		   	
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu" style="margin-left: -14px;width: 1366px;">
	
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><img src="images/home_page.png" style="margin-left: -160px;margin-top: 15px;width: 22px;height: 26px;"><a href="index.php"><h6 style="margin-left: 20px;">Trang chủ</h6></a></li>
	  <li><img src="images/icon_phone.png" style="margin-left: -150px;width: 38px;height: 28px;margin-top: 13px;"><a href="products.php">Sản phẩm</a> </li>
	  
	  <?php 
	  $check_cart = $ct->check_cart();
	  if ($check_cart==true) {
	  	echo '<li><img src="images/cart_12.png" style="width:20px; margin-left:-136px;margin-top:16.5px;"><a href="cart.php">Giỏ hàng</a></li>';
	  }else {
	  	echo '';
	  }
	   ?>

	  <?php 
	  $customer_id = Session::get('customer_id'); 
	  $check_order = $ct->check_order($customer_id);
	  if ($check_order==true) {
	  	echo '<li><img src="images/bill10.png" style="width:19px; margin-left:-140px;margin-top:19px;"><a href="orderdetails.php">Đơn hàng</a></li>';
	  }else {
	  	echo '';
	  }
	   ?>
	  
	  <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	echo '';
	  }else {
	  	echo '<li><img src="images/user.png" style="width:19px; margin-left:-156px;margin-top:18px;"><a href="profile.php">Khách hàng</a></li>';
	  }
	   ?>
	  <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check) {
	  	echo '<li><img src="images/icon_compare.png" style="width:20px; margin-left:-125px;margin-top:18px;"><a href="compare.php">So sánh</a></li>';
	  }
	   ?>
	   <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check) {
	  	echo '<li><img src="images/icon_love.png" style="width:20px; margin-left:-140px;margin-top:18px;"><a href="wishlist.php">Yêu thích</a> </li>';
	  }
	   ?>
	  <li><img src="images/icon_hi.png" style="width:20px; margin-left:-143px;margin-top:18px;"><a href="gioithieu.php">Giới thiệu</a> </li>
	  <li><img src="images/icon_contact1.png" style="width:20px; margin-left:-117px;margin-top:18px;"><a href="contact.php">Liên hệ</a> </li>
	  <div class="clear"></div>
	</ul>
</div>
