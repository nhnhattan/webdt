<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';  ?>
<?php
    // gọi class category
    $product = new product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        
        $insertSlider = $product -> insert_slider($_POST, $_FILES); // hàm check catName khi submit lên
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
						<h4 class="card-title">Thêm Silder</h4>
					</div>
                    <?php 
                    if(isset($insertSlider)){
                        echo $insertSlider;
                    }
                    ?>  
                </div>             
                <form action="slideradd.php" method="post" enctype="multipart/form-data">
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
                                <label>Tiêu đề</label>
                            </td>
                            <td>
                                <input class="form-control form-control-lg" type="text" name="sliderName" placeholder="Enter Slider Title..." class="medium" />
                            </td>
                        </tr>           
            
                        <tr>
                            <td>
                                <label>Tải ảnh lên</label>
                            </td>
                            <td>
                                <input class="file-upload-browse btn btn-info" type="file" name="image"/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Hiển thị</label>
                            </td>
                            <td>
                                <select class="form-control form-control-lg" name="type">
                                    <option value="1">On</option>    
                                    <option value="0">Off</option> 
                                </select>
                            </td>
                        </tr>
                    
                        <tr>
                            <td></td>
                            <td>
                                <input class="btn btn-success mr-2 btn-lg" type="submit" name="submit" value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>