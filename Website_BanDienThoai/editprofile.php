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
    $id = Session::get('customer_id');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $UpdateCustomers = $cs -> update_customers($_POST, $id); // hàm check catName khi submit lên
    } 
 ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    		<div class="heading">
    		<h3 style="color: white;margin-left: 500px;"><strong>Thông tin khách hàng</strong></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
        <form action="" method="post">
    	<table class="tblone">
            <tr>
                <?php 
                if (isset($UpdateCustomers)) {
                    echo '<td colspan="3">'.$UpdateCustomers.'</td>';
                }
                 ?>
            </tr>

    		<?php 
    		$id = Session::get('customer_id');
    		$get_customers = $cs->show_customers($id);
    		if ($get_customers) {
    			while ($result = $get_customers->fetch_assoc()) {
    			
    		 ?>
    		<tr>
    			<td>Họ tên</td>
    			<td>:</td>

    			<td><input type="text" name="name" value="<?php echo $result['name']; ?>"></td>
    		</tr>
    		<!-- <tr>
    			<td>City</td>
    			<td>:</td>
                <td><input type="text" name="name" value="<?php echo $result['city']; ?>"></td>
    			
    		</tr> -->
    		<tr>
    			<td>Số điện thoại</td>
    			<td>:</td>
                <td><input type="text" name="phone" value="<?php echo $result['phone']; ?>" style="width: 25%;"></td>
    			
    		</tr>
    		<!-- <tr>
    			<td>Country</td>
    			<td>:</td>
    			<td><?php echo $result['country']; ?></td>
    		</tr> -->
    		<tr>
    			<td>Mã Zipcode</td>
    			<td>:</td>
                <td><input type="text" name="zipcode" value="<?php echo $result['zipcode']; ?>" style="width: 25%;"></td>
    			
    		</tr>
    		<tr>
    			<td>Email</td>
    			<td>:</td>
                <td><input type="text" name="email" value="<?php echo $result['email']; ?>" style="width: 25%;"></td>
    			
    		</tr>
    		<tr>
    			<td>Địa chỉ</td>
    			<td>:</td>
                <td><input type="text" name="address" value="<?php echo $result['address']; ?>" style="width: 50%;"></td>
    			
    		</tr>
            <tr>
                <td colspan="3"><input type="submit" name="save" value="Lưu thông tin"  class="btn btn-black rounded-1 py-1 px-1" ></td>

               
            </tr>
            <tr>
                <td colspan="4"><button class="btn btn-black rounded-1 py-2 px-1" style="color: white;"><a href="profile.php">Quay về trang trước</a></button>
            </tr>
    		
    		<?php 
    		}
    		}
    		 ?>
    	</table>
        </form>

    	</div>	
 	</div>

<?php 
	include 'inc/footer.php';
 ?>