<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<?php 
	$product = new product();
	if(isset($_GET['type_slider']) && isset($_GET['type'])){
		$id = $_GET['type_slider'];
		$type = $_GET['type'];
		$update_type_slider = $product->update_type_slider($id,$type);

	}
	if(isset($_GET['slider_del'])){
		$id = $_GET['slider_del'];
		$del_slider = $product->del_slider($id);

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
						<h4 class="card-title">Slider</h4>
					</div>
					<div class="col-3 text-right">
					<button type="button" class="btn btn-icons btn-rounded btn-success" onclick='window.location = "slideradd.php"'><i class="mdi mdi-plus"></i></button>
					</div>
					<div class="col-6 text-right"></div>
					<?php 
					if (isset($del_slider)) {
						echo $del_slider;
					}
					?>  
				</div>
				<table class="data display datatable" style="table-layout: auto; width: 100%;">
				<style>
					table {
					border-collapse: collapse;
					border-spacing: 0;
					width: 100%;
					}

					th, td {
					text-align: left;
					padding: 3px;
					text-align: center;
					}

					tr:nth-child(even) {
					background-color: #cccccc;
					}
				</style>
					<thead>
						<tr>
							<th style="width: 4%;">No.</th>
							<th style="width: 15%;">Tiêu đề slider</th>
							<th style="width: 60%;">Slider Image</th>
							<th style="width: 12%;">Hiển thị</th>
							<th style="width: 12%;">Xử lý</th>
						</tr>
					</thead>
					<tbody>
		
						<?php
							$product = new product();
							$get_slider = $product->show_slider_list();
							if($get_slider){
								$i = 0;
								while($result_slider = $get_slider->fetch_assoc()){
									$i++;
								?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result_slider['sliderName'] ?></td>
							<td><img src="uploads/<?php echo $result_slider['slider_image'] ?>" height="120px" width="500px"/></td>		
							<td>
								<?php
								if($result_slider['type']==1){
								?>
								<a href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=0">Off</a> 
								<?php
								}else{
								?>	
								<a href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=1">On</a> 
								<?php
								}
								?>

							</td>		
						<td>
							
							<a href="?slider_del=<?php echo $result_slider['sliderId'] ?>" onclick="return confirm('Are you sure to Delete!');" >Delete</a> 
						</td>
							</tr>
						<?php
						}}
						?>	
					</tbody>
				</table>
			</div>
       </div>
    </div>
</div>
<?php include 'inc/footer.php';?>
