<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php 
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       $customer_id = Session::get('customer_id');
       $insertOrder = $ct->insertOrder($customer_id);
       $delCart = $ct->del_all_data_cart();
       header('Location:success.php');
    }
 ?>
 <style type="text/css">
	.box_left {
    width: 64%;
    border: 2px solid #0f9ed8;
    float: left;
    padding: 4px;

	}
 	.box_right {
    width: 35%;
    border: 2px solid #0f9ed8;
    float: right;
    padding: 4px;
	}
	.a_order {
    background: #653092;
    color: aliceblue;
    padding: 10px;
    font-size: 25px;
    border-radius: none;
    cursor: pointer;
	}
</style>

<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="heading">
    		     <h2 style="font-family: Calibri;color: #0f9ed8;margin-left: 505px;margin-bottom: 20px;"><strong><u>THANH TOÁN OFFLINE</u></strong></h2>
    		</div>
    		<div class="clear"></div>
    		<div class="box_left">
    			<div class="cartpage1">
			    	<h4 style="font-family:Calibri;color: #0f9ed8;margin-left: 300px;"><i><strong><u>GIỎ HÀNG CỦA BẠN</u></strong></h4>
			    	<?php 
			    	if (isset($update_quantity_Cart)) {
			    		echo $update_quantity_Cart;
			    	}
			    	 ?>
			    	<?php 
			    	if (isset($delcart)) {
			    		echo $delcart;
			    	}
			    	 ?>
			    	 <?php
			    	 if(isset($delcart)){
			    	 	echo $delcart;
			    	 }
			    	?>
						<table class="tblone" style="margin-left: -3.9px;color: black;">
							<tr>
								<th width="5%"><strong>STT</strong></th>
								<th width="15%"><strong>Tên SP</strong></th>
								<th width="15%"><strong>Giá</strong></th>
								<th width="25%"><strong>Số lượng</strong></th>
								<th width="20%"><strong>Tổng giá</strong></th>
								
							</tr>
							<?php 
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								$i=0;
								while ($result = $get_product_cart->fetch_assoc()) {
									$i++;
								
							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>
								
								<td><?php echo $result['price'].'₫' ?></td>
								<td>
									<?php echo $result['quantity'] ?>
								</td>
								<td>
									<?php 
									$total = $result['price'] * $result['quantity'];
									echo $total.'₫';
									 ?>
								</td>
								
							</tr>
							<?php 

							$subtotal += $total;
							$qty = $qty + $result['quantity'];
								}
							}
							 ?>
	
						</table>
						<?php
							$check_cart = $ct->check_cart();
							if ($check_cart) {

							 ?>
						<table style="float:right;text-align:left;color: black;" width="40%">
							<tr>
								<th><strong>Tổng giá : </strong></th>
								<td>
								<?php echo $subtotal.' ₫';

									  Session::set('sum',$subtotal);
									  Session::set('qty',$qty);
								?>
								</td>
							</tr>
							<tr>
								<th><strong>Thuế : </strong></th>
								<td>10% (<?php echo $vat = $subtotal * 0.1. ' ₫';?>)</td>
							</tr>
							<tr>
								<th style="font-size: 20px;"><strong>Tổng cộng :</strong></th>
								<td><?php 
								$vat = $subtotal * 0.1;
								$grandTotal = $subtotal + $vat;
								echo $grandTotal.' ₫';
								 ?> </td>
							</tr>
					   </table>
					   <?php 
						}else {
							echo 'Giỏ hàng của bạn hiện đang trống. Hãy mua sắm ngay !!';
						}
					    ?>
					</div>
					

    		</div>
    		<div class="box_right">
    			<table class="tblone" style="color: black;"><a style="color: #0f9ed8;margin-left: 65px;font-size:16px ;"><strong><u>THÔNG TIN THANH TOÁN NHẬN HÀNG</u></strong></a>
		    		<?php 
		    		$id = Session::get('customer_id');
		    		$get_customers = $cs->show_customers($id);
		    		if ($get_customers) {
		    			while ($result = $get_customers->fetch_assoc()) {
		    			
		    		 ?>
		    		<tr>
		    			<td><strong>Họ Tên</strong></td>
		    			<td>:</td>
		    			<td><?php echo $result['name']; ?></td>
		    		</tr>
		    		<tr>
		    			<td><strong>Thành Phố</strong></td>
		    			<td>:</td>
		    			<td><?php echo $result['city']; ?></td>
		    		</tr>
		    		<tr>
		    			<td><strong>Số điện thoại</strong></td>
		    			<td>:</td>
		    			<td><?php echo $result['phone']; ?></td>
		    		</tr>
		    		<!-- <tr>
		    			<td>Country</td>
		    			<td>:</td>
		    			<td><?php echo $result['country']; ?></td>
		    		</tr> -->
		    		<tr>
		    			<td><strong>Mã bưu chính</strong></td>
		    			<td>:</td>
		    			<td><?php echo $result['zipcode']; ?></td>
		    		</tr>
		    		<tr>
		    			<td><strong>Email</strong></td>
		    			<td>:</td>
		    			<td><?php echo $result['email']; ?></td>
		    		</tr>
		    		<tr>
		    			<td><strong>Địa chỉ</strong></td>
		    			<td>:</td>
		    			<td><?php echo $result['address']; ?></td>
		    		</tr>
		            <tr>
		                <td colspan="3"><a class="btn btn-black btn-black--hover rounded-1" style="margin-top: 10px;" href="editprofile.php">Cập nhật thông tin</a></td>
		               
		            </tr>
		    		
		    		<?php 
		    		}
		    		}
		    		 ?>
		    	</table>	

    		</div>
 		</div>
 	</div>
 	<center style="padding-bottom: 20px;"><a class="btn btn-black btn-black--hover rounded-1" href="?orderid=order" class="a_order" style="height: 38px; margin-left: -475px;">Đặt hàng ngay</a></center>
 </div>
</form>
<?php 
	include 'inc/footer.php';
 ?>