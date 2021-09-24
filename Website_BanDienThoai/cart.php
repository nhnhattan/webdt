 <?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php
    if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid']; 
        $delcart = $ct->del_product_cart($cartid);
    }
        
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $cartId = $_POST['cartId'];
        $proId = $_POST['proId'];
        $quantity = $_POST['quantity'];
        $update_quantity_Cart = $ct -> update_quantity_Cart($proId,$cartId, $quantity); // hàm check catName khi submit lên
    	if ($quantity <= 0) {
    		$delcart = $ct->del_product_cart($cartId);
    	}
    } 
 ?>
 <?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h3 style="font-family: Calibri;color: #0f9ed8"><img src="images/cart2.png" style="margin-top: -10px; " ><strong> GIỎ HÀNG CỦA BẠN</strong></h3>
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
						<table class="tblone">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								<th width="10%">Xử lý</th>
							</tr>
							<?php 
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								while ($result = $get_product_cart->fetch_assoc()) {
									
								
							 ?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price'])." ₫" ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" min="0" value="<?php echo $result['cartId'] ?>"/>
										<input type="hidden" name="proId" min="0" value="<?php echo $result['productId'] ?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>
									<?php 
									$total = $result['price'] * $result['quantity'];
									echo $fm->format_currency($total)." ₫";
									 ?>
								</td>
								<td><a class="btn btn-black --hover rounded-10" href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
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
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>
								<?php echo $fm->format_currency($subtotal)." ₫";

									  Session::set('sum',$subtotal);
									  Session::set('qty',$qty);
								?>
								</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php 
								$vat = $subtotal * 0.1;
								$grandTotal = $subtotal + $vat;
								echo $fm->format_currency($grandTotal)." ₫";
								 ?> </td>
							</tr>
					   </table>
					   <?php 
						}else {
							echo 'Giỏ của bạn trống trơn ! Hãy mua sắm ngay bây giờ';
						}
					    ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a class="btn btn-black --hover rounded-0" style="margin-left: 515px;" href="payment.php">Thanh toán</a>
						</div>
						<div class="shopright">
							<a class="btn btn-black --hover rounded-0" style="margin-left: 45px;" href="index.php">Tiếp tục mua hàng</a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>
