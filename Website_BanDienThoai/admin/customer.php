<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../classes/customer.php');
    include_once ($filepath.'/../helpers/format.php');
 ?>
<?php
    $cs = new customer(); 
    if(!isset($_GET['customerid']) || $_GET['customerid'] == NULL){
        echo "<script> window.location = 'customerlist.php' </script>";
        
    }else {
        $id = $_GET['customerid']; // Lấy catid trên host
    }
?>
<div class="container-fluid">
		<!-- Page Title Header Starts-->
		<!-- Page Title Header Ends-->
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
				<div class="row">
					<div class="col-6 text-left">
						<h4 class="card-title">Thông tin đơn hàng</h4>
                    </div>
                    <div class="col-6 text-right">
						<form action="customerlist.php" method="POST">
								<button class="btn btn-success submit-btn" name="bck">Trở về quản lý khách hàng</button>
                        </form>
					</div>
                    <?php 
                        $get_customer = $cs->show_customers($id);
                        if($get_customer){
                            while ($result = $get_customer->fetch_assoc()) {      
                    ?>
                </div>
                 <form action="" method="post">
                    <table class="form">
                    <style>
                        table {
                        border-collapse: collapse;
                        border-spacing: 0;
                        width: 70%;
                        }

                        th, td {
                        text-align: left;
                        padding: 3px;
                        }
                        .form-control{
                            height: 45px;
                            font-size: 15px;
                        }
                    </style>					
                        <tr>
                            <td>Tên khách hàng</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-lg" type="text" readonly="readonly" value="<?php echo $result['name']; ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-lg" type="text" readonly="readonly" value="<?php echo $result['phone']; ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Thành phố</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-lg" type="text" readonly="readonly" value="<?php echo $result['city']; ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Quốc gia</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-lg" type="text" readonly="readonly" value="<?php echo $result['country']; ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-lg" type="text" readonly="readonly" value="<?php echo $result['address']; ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-lg" type="text" readonly="readonly" value="<?php echo $result['zipcode']; ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input class="form-control form-control-lg" type="text" readonly="readonly" value="<?php echo $result['email']; ?>" name="catName" class="medium" />
                            </td>
                        </tr>
                        
						
                    </table>
                    </form>

                    <?php 
                        }
                    }

                     ?>

                </div>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>