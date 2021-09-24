<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';  ?>
<?php
    // gọi class category
    $brand = new brand();     
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['delid']; // Lấy catid trên host
        $delbrand = $brand -> del_brand($id); // hàm check delete Name khi submit lên
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
						<h4 class="card-title">Thương hiệu sản phẩm</h4>
					</div>
					<div class="col-3 text-right">
					<button type="button" class="btn btn-icons btn-rounded btn-success" onclick='window.location = "brandadd.php"'><i class="mdi mdi-plus"></i></button>
					</div>
					<div class="col-6 text-right"></div>
					<?php 
						if(isset($delbrand)){
							echo $delbrand;
						}
					?>      
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
					padding: 3px;
					}

					tr:nth-child(even) {
					background-color: #cccccc;
					}
				</style>
					<thead>
						<tr>
							<th style="width: 10%;">No.</th>
							<th style="width: 75%;">Thương hiệu</th>
							<th style="width: 15%;">Xử lý</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$show_brand = $brand -> show_brand();
							if($show_brand){
								$i = 0;
								while($result = $show_brand -> fetch_assoc()){
									$i++;
								
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['brandName']; ?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brandId']; ?>">Edit</a> | <a onclick = "return confirm('Are you want to delete???')" href="?delid=<?php echo $result['brandId'] ?>">Delete</a></td>
						</tr>
						<?php 
							}
						}
						 ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>

