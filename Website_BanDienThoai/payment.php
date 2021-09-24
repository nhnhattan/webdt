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
<?php 
	// if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
 //        echo "<script> window.location = '404.php' </script>";
        
 //    }else {
 //        $id = $_GET['proid']; // Lấy productid trên host
 //    }

 //    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
 //        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
 //        $quantity = $_POST['quantity'];
 //        $AddtoCart = $ct -> add_to_cart($id, $quantity); // hàm check catName khi submit lên
 //    } 
 ?>
 <style>
    h3.payment {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    text-decoration: underline;
    }
    .wrapper_method {
    text-align: center;
    width: 550px;
    margin: 0 auto;
    border: 1px solid #666;
    padding: 20px;
    /* margin: 20px; */
    background: cornsilk;
    }
    .wrapper_method a {
    padding: 10px;
  
    background: red;
    color: #fff;
    
    }
    .wrapper_method h3 {
     margin-bottom: 20px;
    }
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
    		     <h3 style="font-family: Calibri;margin-left: 500px;color: #0f9ed8;"><strong>Phương Thức Thanh Toán</strong></h3>
    		</div>
    		<div class="clear"></div>
            <div class="wrapper_method1" style="width: 450px;height: 200px;margin-left: 408px;">
                <div class="alert alert-info">
                    <h4 class="payment1" style="font-family: Calibri;text-align: center;">Chọn phương thức thanh toán của bạn</h4>
                    <a class="btn btn-black btn-black--hover rounded-2" href="offlinepayment.php" style="margin-left: 110px;">Thanh Toán Offline</a>
                    <!-- <a href="onlinepayment.php">Thanh Toán Online</a> -->
                    <br><br>
                    <a class="btn btn-black btn-black--hover rounded-0" href="cart.php" style="margin-left: 150px;">Quay lại</a>
                </div>
            </div>

    	</div>
    	
    	</div>	
 	</div>

<?php 
	include 'inc/footer.php';
 ?>