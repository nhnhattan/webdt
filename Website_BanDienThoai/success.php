<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php 
	if(isset($_GET['oderid']) AND $_GET['orderid'] == 'order'){
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delCart = $ct->del_all_data_cart();
        header('Location:success.php');
    }
 ?>
 <style type="text/css">
	.box_left {
    width: 50%;
    border: 1px solid #666;
    float: left;
    padding: 4px;	

	}
 	.box_right {
    width: 47%;
    border: 1px solid #666;
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
}
</style>

<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<h3 style="color: #0f9ed8;"><img src="images/loud.png" style="margin-left: 2px; height: 60px;"> <strong>Đặt hàng thành công !!!</strong></h3>
            
            <p class="success_note" style="color: green;"><img src="images/icon_phone1.png" style="margin-left: 5px;"> Chúng tôi sẽ liên hệ với bạn sớm nhất có thể, xem chi tiết đặt hàng tại <a class="btn btn-black --hover rounded-2" href="orderdetails.php" style="margin-left: 12px;"> Xem chi tiết đặt hàng</a> <a href="bill.php" class="btn btn-black --hover rounded-2" style="margin-left: 10px;">Xem chi tiết hóa đơn</a></p>

 		</div>
 	</div>
 	
 </div>
</form>
<?php 
	include 'inc/footer.php';
 ?>