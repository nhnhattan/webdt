<?php include 'inc/header.php';?>
<?php include '../classes/user.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$ad = new useradmin();
	$fm = new Format();
	if(Session::get('level') == 0){
		echo "<script>alert('Bạn không có quyền truy cập trang này'); window.location = 'index.php' </script>";
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
						<h4 class="card-title">Nhân viên</h4>
					</div>
					<div class="col-6 text-right">
						<?php
							if(isset($_POST['searchFnc'])){
								echo '<form action="adminlist.php">
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
						<th>ID</th>
						<th>Tên nhân viên</th>
                        <th>Email</th>
						<th>Tên tài khoản</th>
						<th>Level</th>
					</tr>
				</thead>
					<tbody>
					<?php
					if(!isset($_POST['searchFnc'])){
						$adlist = $ad->show_user();
						$i = 0;
						if($adlist){
							while ($result = $adlist->fetch_assoc()){
								$i++;		
						?>
						<tr>
							<td><?php echo $result['adminId'] ?></td>
							<td><?php echo $result['adminName'] ?></td>
							<td ><?php echo $result['adminEmail'] ?></td>
							<td><?php 
								echo $result['adminUser']
							?></td>	
							<td><?php 
								echo $result['level'];
							?></td>	
						</tr>
						<?php	
							}
						}
					}
					else{
						$adlist = $ad->search_admin();
						$i = 0;
						if($adlist){
							while ($result = $adlist->fetch_assoc()){
								$i++;		
						?>
						<tr>
							<td><?php echo $result['adminId'] ?></td>
							<td><?php echo $result['adminName'] ?></td>
							<td ><?php echo $result['adminEmail'] ?></td>
							<td><?php 
								echo $result['adminUser']
							?></td>	
							<td><?php 
								echo $result['level'];
							?></td>	
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
<script type="text/javascript">
	$(document).ready(function () {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>
