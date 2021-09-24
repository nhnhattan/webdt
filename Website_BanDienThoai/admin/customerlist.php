<?php include 'inc/header.php';?>
<?php include '../classes/customer.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$cs = new customer();
	$fm = new Format();
	if(!isset($_GET['customerid']) || $_GET['customerid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
	}
 ?>
	<div class="container-fluid">
		<!-- Page Title Header Starts-->
		<!-- Page Title Header Ends-->
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
				<div class="row py-3">
					<div class="col-6 text-left">
						<h4 class="card-title">Khách hàng</h4>
					</div>
					<div class="col-6 text-right">
						<?php
							if(isset($_POST['searchFnc'])){
								echo '<form action="customerlist.php">
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
					padding: 3px;
					}

					tr:nth-child(even) {
					background-color: #cccccc;
					}
				</style>
				<thead>
					<tr>
						<th style="width: 4%;">ID</th>
						<th style="width: 12%;">Tên khách hàng</th>
                        <th style="width: 20%;">Email</th>
                        <th style="width: 10%;">Số điện thoại</th>
						<th style="width: 10%;">Thành phố</th>
						<!-- <th style="width: 10%;">Quốc gia</th> -->
						<th style="width: 10%;">Đơn hàng</th>
						<th style="width: 20%;">Địa chỉ</th>
					</tr>
				</thead>
					<tbody>
					<?php
					if(!isset($_POST['searchFnc'])){
						$cslist = $cs->show_customers_all();
						if($cslist){
							while ($result = $cslist->fetch_assoc()){		
						?>
						<tr>
							<td><?php echo $result['id'] ?></td>
							<td><?php echo $result['name'] ?></td>
							<td ><?php echo $result['email'] ?></td>
							<td><?php 
								echo $result['phone']
							?></td>
							<td><?php echo $result['city'] ?></td>
							<td><a href="inbox.php?inboxid=<?php echo $result['id'] ?>">Xem Đơn hàng</a></td>
							<td><?php echo $result['address'] ?></td>
							</td>			
						</tr>
						<?php	
							}
						}
					}
					else{
						$cslist = $cs->search_customers();
						if($cslist){
							while ($result = $cslist->fetch_assoc()){		
						?>
						<tr>
							<td><?php echo $result['id'] ?></td>
							<td><?php echo $result['name'] ?></td>
							<td ><?php echo $result['email'] ?></td>
							<td><?php 
								echo $result['phone']
							?></td>
							<td><?php echo $result['city'] ?></td>
							<td><a href="inbox.php?inboxid=<?php echo $result['customer_id'] ?>">Xem Đơn hàng</a></td>
							<td><?php echo $result['address'] ?></td>
							</td>			
						</tr>
						<?php	
							}
						}
					}
					?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
<?php include 'inc/footer.php';?>
