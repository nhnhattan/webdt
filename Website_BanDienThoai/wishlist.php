<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 

    if(isset($_GET['proid'])){
    	$customer_id = Session::get('customer_id');
     	$proid = $_GET['proid']; 
      	$delwlist = $product->del_wlist($proid,$customer_id);
 	}
  ?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h3 style="color: blue;font-family: Calibri;"><img src="images/phone_love.png" style="margin-top: -10px; width: 50px;"><strong> Sản phẩm yêu thích</strong></h3>
			    	
						<table class="tblone">
							<tr>
								<th width="10%">STT</th>
								<th width="20%">Tên sản phẩm</th>
								<th width="20%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="15%">Xử lý</th>
	
							</tr>
							<?php 
							$customer_id = Session::get('customer_id');
							$get_wishlist = $product->get_wishlist($customer_id);
							if($get_wishlist){
								$i = 0;
								while ($result = $get_wishlist->fetch_assoc()) {
								$i++;	
								
							 ?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								
								<td>
									<a class="btn btn-black rounded-10" href="?proid=<?php echo $result['productId'] ?>">Xóa</a> ||
									<a class="btn btn-black rounded-10" href="details.php?proid=<?php echo $result['productId'] ?>">Mua</a>
								</td>
							</tr>
							<?php 

							
								}
							}
							 ?>
	
						</table>
						
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a class="btn btn-black rounded-1" style="margin-left: 580px;" href="index.php">Tiếp tục mua hàng</a>
						</div>
						
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>
