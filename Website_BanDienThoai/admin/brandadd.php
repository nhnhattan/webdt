<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/brand.php';  ?>
<?php
    // gọi class category
    $brand = new brand(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $brandName = $_POST['brandName'];
        $insertBrand = $brand -> insert_brand($brandName); // hàm check catName khi submit lên
    }
  ?> 
<div class="container-fluid">
		<!-- Page Title Header Starts-->
		<!-- Page Title Header Ends-->
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
				<div class="row">
					<div class="col-3 text-left">
						<h4 class="card-title">Thêm thương hiệu</h4>
					</div>
                    <?php 
                        if(isset($insertBrand)){
                            echo $insertBrand;
                        }
                    ?>
                </div>
                 <form action="brandadd.php" method="post">
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
                            <td>
                                <input class="form-control form-control-lg" type="text" name="brandName" placeholder="Làm ơn thêm thương hiệu sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input class="btn btn-success mr-2 btn-lg" type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>