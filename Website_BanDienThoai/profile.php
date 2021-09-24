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
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading" style="margin-left: 485px;">
    		<h3 style="color: white;"><img src="images/register1.png" style="margin-left: -4px; margin-top: -10px;"><strong> Thông tin khách hàng</strong></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<table class="tblone">
    		<?php 
    		$id = Session::get('customer_id');
    		$get_customers = $cs->show_customers($id);
    		if ($get_customers) {
    			while ($result = $get_customers->fetch_assoc()) {
    			
    		 ?>
    		<tr>
    			<td style="font-size: 18px;"><strong>Họ tên</strong></td>
    			<td>:</td>
    			<td><?php echo $result['name']; ?></td>
    		</tr>
    		<tr>
    			<td style="font-size: 18px;"><strong>Thành phố</strong></td>
    			<td>:</td>
    			<td><?php echo $result['city']; ?></td>
    		</tr>
    		<tr>
    			<td style="font-size: 18px;"><strong>Số điện thoại</strong></td>
    			<td>:</td>
    			<td><?php echo $result['phone']; ?></td>
    		</tr>
    		<!-- <tr>
    			<td>Country</td>
    			<td>:</td>
    			<td><?php echo $result['country']; ?></td>
    		</tr> -->
    		<tr>
    			<td style="font-size: 18px;"><strong>Mã bưu chính</strong></td>
    			<td>:</td>
    			<td><?php echo $result['zipcode']; ?></td>
    		</tr>
    		<tr>
    			<td style="font-size: 18px;"><strong>Email</strong></td>
    			<td>:</td>
    			<td><?php echo $result['email']; ?></td>
    		</tr>
    		<tr>
    			<td style="font-size: 18px;"><strong>Địa chỉ</strong></td>
    			<td>:</td>
    			<td><?php echo $result['address']; ?></td>
    		</tr>
            <tr>
                <td colspan="3"><a href="editprofile.php"><button class="btn btn-black rounded-1 py-2 px-2">Cập nhật</button></a></td>              
            </tr>
    		
    		<?php 
    		}
    		}
    		 ?>
    	</table>	
    	</div>	
 	</div>

<?php 
	include 'inc/footer.php';
 ?>