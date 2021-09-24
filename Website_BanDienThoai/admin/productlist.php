<?php include 'inc/header.php';?>
<?php include '../classes/category.php';  ?>
<?php include '../classes/cart.php';  ?>
<?php include '../classes/brand.php';  ?> 
<?php include '../classes/product.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$pd = new product();
	$fm = new Format();
	if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['productid']; // Lấy catid trên host
        $delProduct = $pd -> del_product($id); // hàm check delete Name khi submit lên
    }
 ?>
	<div class="container-fluid">
		<!-- Page Title Header Starts-->
		<!-- Page Title Header Ends-->
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
				<div class="row py-3">
					<div class="col-3 text-left">
						<h4 class="card-title">Sản phẩm</h4>
					</div>
					<div class="col-3 text-right">
					<button type="button" class="btn btn-icons btn-rounded btn-success" onclick='window.location = "productadd.php"'><i class="mdi mdi-plus"></i></button>
					</div>
					<div class="col-6 text-right">
						<?php
							if(isset($_POST['searchFnc'])){
								echo '<form action="productlist.php">
								<button class="btn btn-success submit-btn">Trở về</button>
								</form>';
							}
						?>

					</div>
				</div>
				<table class="data display datatable" style="table-layout: fixed; width: 100%;">
				<style>
					table {
					border-collapse: collapse;
					border-spacing: 0;
					width: 100%;
					}

					th, td {
					text-align: left;
					padding: 5px;
					}

					tr:nth-child(even) {
					background-color: #cccccc;
					}
				</style>
				<thead>
					<tr>
						<th style="width: 4%;">ID</th>
						<th style="width: 10%;">Code</th>
						<th style="width: 20%;">Tên sản phẩm</th>
						<th style="width: 10%; text-align:center">Đã bán</th>
						<th style="width: 10%;">Loại</th>
						<th style="width: 12%;">Giá</th>
						<th style="width: 12%;">Image</th>
						<th style="width: 12%;">Danh mục</th>
						<th style="width: 12%;">Thương hiệu</th>
						<th style="width: 12%;">Xử lý</th>
					</tr>
				</thead>
					<tbody>
					<?php
					if(!isset($_POST['searchFnc'])){
						$pdlist = $pd->show_product();
						$i = 0;
						if($pdlist){
							while ($result = $pdlist->fetch_assoc()){
								$i++;		
						?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $result['product_code'] ?></td>
							<td ><?php echo $result['productName'] ?></td>
							<td style="text-align: center;"><?php echo $result['product_soldout'] ?></td>
							<td><?php 
								if($result['type']==0){
									echo 'Nổi bật';
								}else{
									echo 'Không Nổi Bật';
								}
							?></td>
							<td><?php echo $result['price'] ?></td>
							<td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
							<td><?php echo $result['catName'] ?></td>
							<td><?php echo $result['brandName'] ?></td>
							</td>			
							<td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Edit</a> | <a href="?productid=<?php echo $result['productId'] ?>">Delete</a></td>
						</tr>
						<?php	
							}
						}
					}
					else{
						$pdlist = $pd->search_product();
						$i = 0;
						if($pdlist){
							while ($result = $pdlist->fetch_assoc()){
								$i++;		
						?>
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $result['product_code'] ?></td>
							<td ><?php echo $result['productName'] ?></td>
							<td style="text-align: center;"><?php echo $result['product_soldout'] ?></td>
							<td><?php 
								if($result['type']==0){
									echo 'Nổi bật';
								}else{
									echo 'Không Nổi Bật';
								}
							?></td>
							<td><?php echo $result['price'] ?></td>
							<td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
							<td><?php echo $result['catName'] ?></td>
							<td><?php echo $result['brandName'] ?></td>
							</td>			
							<td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Edit</a> | <a href="?productid=<?php echo $result['productId'] ?>">Delete</a></td>
						</tr>
						<?php	
							}
						}
						else {
							echo "<td colspan='10' style='text-align:center;'><h4>Không tìm thấy dữ liệu<h4></td>";
						}
					}
					?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function () {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>
