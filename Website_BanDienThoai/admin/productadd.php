<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/brand.php';  ?> 
<?php include '../classes/product.php';  ?>
<?php
    // gọi class category
    $pd = new product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertProduct = $pd -> insert_product($_POST, $_FILES); // hàm check catName khi submit lên
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
						<h4 class="card-title">Thêm sản phẩm</h4>
                    </div>
                    <div class="col-6 text-right">
                        <form action="productlist.php">
							<button class="btn btn-success submit-btn">Thoát</button>
						</form>
                    </div>
                    <?php 
                        if(isset($insertProduct)){
                            echo $insertProduct;
                        }
                    ?>   
                </div>
                <form action="productadd.php" method="post" enctype="multipart/form-data">
                    <table class="forms-sample">
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
                            <label>Tên sản phẩm</label>
                        </td>
                        <td>
                            <input class="form-control form-control-lg" name="productName" type="text" placeholder="Nhập tên sản phẩm..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Code sản phẩm</label>
                        </td>
                        <td>
                            <input class="form-control form-control-lg" name="product_code" type="text" placeholder="Nhập code sản phẩm..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Số lượng sản phẩm</label>
                        </td>
                        <td>
                            <input class="form-control form-control-lg" name="productQuantity" type="text" placeholder="Nhập số lượng sản phẩm..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Danh mục sản phẩm</label>
                        </td>
                        <td>
                            <select class="form-control form-control-lg" id="select" name="category">
                                <option>Chọn chuyên mục</option>
                                <?php 
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while ($result = $catlist->fetch_assoc()){
                                
                                ?>
                                <option value=" <?php echo $result['catId'] ?> "> <?php echo $result['catName'] ?> </option>
                                
                                <?php 
                                }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Thương hiệu</label>
                        </td>
                        <td>
                            <select class="form-control form-control-lg" id="select" name="brand">
                                <option>Chọn thương hiệu</option>
                                <?php 
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if($brandlist){
                                    while ($result = $brandlist->fetch_assoc()){
                                
                                ?>
                                <option value=" <?php echo $result['brandId'] ?> "> <?php echo $result['brandName'] ?> </option>
                                
                                <?php 
                                }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Mô tả</label>
                        </td>
                        <td>
                            <textarea class="form-control form-control-lg" name="product_desc" class="tinymce"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Giá</label>
                        </td>
                        <td>
                            <input class="form-control form-control-lg" name="price" type="text" placeholder="Nhập giá..." class="medium" />
                        </td>
                    </tr>
                
                    <tr>
                        <td>
                            <label>Tải ảnh</label>
                        </td>
                        <td>
                            <input class="file-upload-browse btn btn-info" name="image" type="file" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label>Loại sản phẩm</label>
                        </td>
                        <td>
                            <select class="form-control form-control-lg" id="select" name="type">
                                <option>Chọn</option>
                                <option value="0">Nổi bật</option>
                                <option value="1">Không nổi bật</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
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


