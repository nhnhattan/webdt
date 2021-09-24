<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/brand.php';  ?> 
<?php include '../classes/product.php';  ?>
<?php
    // gọi class category
    $pd = new product();
    if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        echo "<script> window.location = 'productlist.php' </script>";
        
    }else {
        $id = $_GET['productid']; // Lấy productid trên host
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $updateProduct = $pd -> update_product($_POST, $_FILES, $id); // hàm check catName khi submit lên
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
						<h4 class="card-title">Sửa sản phẩm</h4>
					</div>
                    <?php 
                        if(isset($updateProduct)){
                            echo $updateProduct;
                        }
                    ?>
                    <?php 
                    $get_product_by_id = $pd->getproductbyId($id);
                    if($get_product_by_id){
                        while ($result_product = $get_product_by_id->fetch_assoc()) {
                            # code...
                        
                    ?>   
                </div>
                <form action="" method="post" enctype="multipart/form-data">
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
                            <label>Name</label>
                        </td>
                        <td>
                            <input class="form-control form-control-lg" name="productName" value="<?php echo $result_product['productName'] ?>" type="text" class="medium" class="form-control form-control-lg"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Code</label>
                        </td>
                        <td>
                            <input class="form-control form-control-lg" name="product_code" value="<?php echo $result_product['product_code'] ?>" type="text" class="medium" class="form-control form-control-lg"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Quantity</label>
                        </td>
                        <td>
                            <input class="form-control form-control-lg" name="productQuantity" value="<?php echo $result_product['productQuantity'] ?>" type="text" class="medium" class="form-control form-control-lg"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select class="form-control form-control-lg" id="select" name="category">
                                <option>Select Category</option>
                                <?php 
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while ($result = $catlist->fetch_assoc()){
                                
                                ?>
                                <option 
                                <?php 
                                if($result['catId']==$result_product['catId'])
                                    { echo 'selected'; }
                                ?>    
                                value=" <?php echo $result['catId'] ?> "> <?php echo $result['catName'] ?></option>
                                
                                <?php 
                                }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>
                            <select class="form-control form-control-lg" id="select" name="brand">
                                <option>Select Brand</option>
                                <?php 
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if($brandlist){
                                    while ($result = $brandlist->fetch_assoc()){
                                
                                ?>
                                <option
                                <?php 
                                if($result['brandId']==$result_product['brandId'])
                                    { echo 'selected'; }
                                ?> 
                                value=" <?php echo $result['brandId'] ?> "> <?php echo $result['brandName'] ?> </option>
                                
                                <?php 
                                }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea class="form-control form-control-lg" name="product_desc" class="tinymce"><?php echo $result_product['product_desc'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input class="form-control form-control-lg" name="price" value="<?php echo $result_product['price'] ?>" type="text" class="medium" />
                        </td>
                    </tr>
                
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="uploads/<?php echo $result_product['image'] ?>" width="100"><br>
                            <input class="file-upload-browse btn btn-info"  name="image" type="file" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select class="form-control form-control-lg" id="select" name="type">
                                <option>Select Type</option>
                                <?php 
                                if ($result_product['type'] ==0) {
                                ?>
                                <option selected value="0">Featured</option>
                                <option value="1">Non-Featured</option>
                                <?php 
                                    }else{
                                ?>
                                <option value="1">Featured</option>
                                <option selected value="0">Non-Featured</option>    
                                <?php 
                            }
                                ?>
                                
                            
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input class="btn btn-success mr-2 btn-lg"  type="submit" name="submit" value="Update" />
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


