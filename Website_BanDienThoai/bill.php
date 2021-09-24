<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php
 //    if(isset($_GET['cartid'])){
 //        $cartid = $_GET['cartid']; 
 //        $delcart = $ct->del_product_cart($cartid);
 //    }
        
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
 //        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
 //        $cartId = $_POST['cartId'];
 //        $quantity = $_POST['quantity'];
 //        $update_quantity_Cart = $ct -> update_quantity_Cart($cartId, $quantity); // hàm check catName khi submit lên
 //    	if ($quantity <= 0) {
 //    		$delcart = $ct->del_product_cart($cartId);
 //    	}
 //    } 
 ?>
<?php 
	$login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:login.php');
	  }
 ?>
 <?php
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
    }
?>
 <div class="main">
    <div class="content" id="section_id">
    	<div class="cartoption">		
			<div class="cartpage" style="background-color:#ffffff;">
					<p style="font-size: 38px;color:#0f9ed8;margin-bottom: -10px; "><img src="images/logo.png" style="width: 50px;margin-left: 468px;"><strong> <u>BEE PHONE</u></strong><img src="images/logo.png" style="width: 50px;margin-left: 10px;"></p>
					<p style="color:black;margin-left: 470px;"><strong>------------------------------------------------</strong></p>
			    	<h3 style="color: #0f9ed8;font-family: Calibri;margin-top: -7px;margin-bottom: 12px;margin-left: 517px"><img src="images/payment1.png" style="margin-top: -2px; ;margin-bottom: 2px;width: 32px; "><strong> PHIẾU HÓA ĐƠN</strong></h3>

						<table class="tblone" style="background-color: #cdf2f2;">
							<tr>
								<th width="10%">STT</th>
								<th width="25%">Tên sản phẩm</th>
								<th width="25%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="10%">Số lượng</th>
								<th width="15%">Ngày mua hàng</th>
								<!-- <th width="10%">Trạng thái</th>
								<th width="10%">Xử lý</th> -->
							</tr>
							<?php
							$customer_id = Session::get('customer_id');  
							$get_cart_ordered = $ct->get_cart_ordered($customer_id);
							if($get_cart_ordered){
								$i=0;
								$qty = 0;
								while ($result = $get_cart_ordered->fetch_assoc()) {
								$i++;
							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td style="color: black;font-size: 18px;"><strong><?php echo $result['productName'] ?></strong></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" width="100px"/></td>
								<td style="color: red;font-size: 20px;"><strong><?php echo $result['price'].' VND' ?></strong></td>
								<td><?php echo $result['quantity'] ?></td>
								<td><?php echo $fm->formatDate($result['date_order'])  ?></td>
								<!-- <td>
								<?php 
									if ($result['status'] == '0') {
										echo "Đang chờ xử lý";
									}elseif($result['status'] == 1) {
								?>
								<span>Đã gửi hàng</span>
								
								<?php

									}elseif($result['status']==2){
										echo 'Đã nhận';
									}
								 ?>	

								</td>
								<?php 
								if ($result['status'] == '0') {
								 ?>

								<td><?php echo 'N/A'; ?></td>

								 <?php 
								 }elseif($result['status']==1) {
								 ?>	
								 <td>
								 	<a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xác nhận</a>
								 </td>
								 <?php 
								}else{
								  ?>
								  
								<td><?php echo 'Đã nhận'; ?></td>
								<?php 
								}
								 ?> -->
							</tr>
							<?php 							
								}
							}
							 ?>
	
						</table>
						<form action="" method="POST">
							 <div class="main">
							    <div class="content">
							    	<div class="section group">
							    		<!-- <h3 style="color: #0f9ed8;"><img src="images/loud.png" style="margin-left: -5px; height: 60px;"> <strong>Đặt hàng thành công !!!</strong></h3> -->
							            <?php
							                $customer_id = Session::get('customer_id'); 
							                $get_amount = $ct->getAmountPrice($customer_id);
							                if ($get_amount) {
							                    $amount = 0;
							                    while ($result = $get_amount->fetch_assoc()) {
							                        $price = $result['price'];
							                        $amount += $price;
							                    }
							                }
							             ?>
							             <h5 style="margin-bottom: -4px;"><img src="images/tax.png" style="margin-left: 930px;width: 25px;color: black;">  Đã bao gồm Thuế GTGT </h5>
							             <p style="color:black;margin-left: 930px;"><strong>----------------------------------------------------</strong></p>
							            <h4 class="success_note" style="color: black;margin-left: 920px;margin-top: -10px;"><img src="images/dollar.png" style="margin-left: 1px;margin-top: -6px;">  <strong>THANH TOÁN: <?php 
							                $vat = $amount * 0.1;
							                $total = $vat + $amount;
							                echo '<span style="color:red;">';
							                echo $total.' ₫';
							                echo '</span>';
							             ?></strong></h4>
							             
							            
							 		</div>
							 	</div>
							 	
							 </div>
						</form>
						<form>
							<input type="button" class="btn btn-black rounded-1 px-3 py-2" value="In hóa đơn" style="margin-left: 600px;" onClick="window.print()">
						</form>
						
						<!--  -->
					
						<h4 style="color: #0f9ed8;font-family: Calibri;margin-left: 340px;margin-top: 40px;"><img src="images/icon_love.png"> Cảm ơn quý khách đã tin tưởng mua hàng tại BEE PHONE <img src="images/icon_love.png"></h4>

					</div>
    			</div>  

    			
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>
