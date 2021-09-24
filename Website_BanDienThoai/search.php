<?php
	include 'inc/header.php';
	include 'inc/slider.php';

?>

<div class="main">
    <div class="content">
    	<div class="content_top" style="background-color: #0f9ed8;">
    		<div class="heading">
    		<h3 style="color:white;margin-left: 520px;"><strong>Điện thoại thông minh</strong></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php if(isset($_POST['searchFnc'])){
			?>

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

						<th style="width: 20%;">Tên sản phẩm</th>
						

						<th style="width: 12%;">Giá</th>
						<!-- <th style="width: 12%;">Image</th> -->
						<th style="width: 12%;">Danh mục</th>
						<th style="width: 12%;">Thương hiệu</th>
						<th style="width: 12%;">Chi tiết</th>
					</tr>
				</thead>
					<tbody>
					<?php
						$pdlist = $product->search_product();
						$i = 0;
						if($pdlist){
							while ($result = $pdlist->fetch_assoc()){
								$i++;		
						?>
						<tr>
							<td><?php echo $i ?></td>
							<td ><?php echo $result['productName'] ?></td>
							

							<td><?php echo $result['price'] ?></td>
							<!-- <td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td> -->
							<td><?php echo $result['catName'] ?></td>
							<td><?php echo $result['brandName'] ?></td>
							<td><a class="btn btn-black --hover rounded-1" href="details.php?proid=<?php echo $result['productId'] ?>" class="details" class="btn btn-black rounded-0">Chi tiết</a></td>
							</td>			
							
						</tr>
						<?php	
							}
						}
						else{
							echo '<tr><td colspan="7" style="text-align:center; color:red; font-size:25px; padding:5%;">Không có thứ bạn tìm</td></tr>';
						}
						?>
					</tbody>
				</table>
			<?php
			}
			?>
			</div>
    </div>
 </div>		


 <div class="container" style="margin-left:964px;">
  <h4 style="color:#0f9ed8;"><img src="images/list.png" style="margin-left: 1px;"><strong> <u> Danh sách trang</u></strong></h4>
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
    <li class="page-item active"><a class="page-link" href="products1.php">1</a></li>
    <li class="page-item"><a class="page-link" href="products2.php">2</a></li>
    <li class="page-item"><a class="page-link" href="products1.php">Trang sau</a></li>
  </ul>
</div>


<?php
	include 'inc/footer.php';
?>
