<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
    <div class="container-fluid py-3">
      <div class="card-deck py-3">
        <div class="card bg-light text-center" style="width: 18rem;">
        <i class="fa fa-users icon-lg py-3" style="color:black; font-size: 70px;"></i>
          <div class="card-body">
            <h5 class="card-title">Nhân viên</h5>
            <a href="adminlist.php" class="btn btn-light stretched-link">Quản lý nhân sự</a>
          </div>
        </div>
        <div class="card bg-light text-center" style="width: 18rem;">
        <i class="fa fa-handshake-o icon-lg py-3" style="color:black; font-size: 70px;"></i>
          <div class="card-body">
            <h5 class="card-title">Khách hàng</h5>
            <a href="customerlist.php" class="btn btn-light stretched-link">Quản lý thông tin khách hàng</a>
          </div>
        </div>
        <div class="card bg-light text-center" style="width: 18rem;">
        <i class="fa fa-suitcase icon-lg py-3" style="color:black; font-size: 70px;"></i>
          <div class="card-body">
            <h5 class="card-title">Danh sách Đơn hàng</h5>
            <a href="inboxlist.php" class="btn btn-light stretched-link">Quản lý tình trạng các đơn hàng</a>
          </div>
        </div>
        <div class="card bg-light text-center" style="width: 18rem;">
        <i class="fa fa-cubes icon-lg py-3" style="color:black; font-size: 70px;"></i>
          <div class="card-body">
            <h5 class="card-title">Quản lý sản phẩm</h5>
            <a href="productlist.php" class="btn btn-light stretched-link">Thông tin sản phẩm</a>
          </div>
        </div>
      </div>
      <div class="card-deck">
        <div class="card bg-light text-center" style="width: 18rem;">
        <i class="fa fa-tags icon-lg py-3" style="color:black; font-size: 70px;"></i>
          <div class="card-body">
            <h5 class="card-title">Danh mục sản phẩm</h5>
            <a href="catlist.php" class="btn btn-light stretched-link">Quản lý danh mục sản phảm</a>
          </div>
        </div>
        <div class="card bg-light text-center" style="width: 18rem;">
        <i class="fa fa-windows icon-lg py-3" style="color:black; font-size: 70px;"></i>
          <div class="card-body">
            <h5 class="card-title">Thương hiệu sản phẩm</h5>
            <a href="brandlist.php" class="btn btn-light stretched-link">Quản lý các thương hiệu của sản phẩm</a>
          </div>
        </div>
        <div class="card bg-light text-center" style="width: 18rem;">
        <i class="fa fa-sliders icon-lg py-3" style="color:black; font-size: 70px;"></i>
          <div class="card-body">
            <h5 class="card-title">Slider</h5>
            <a href="sliderlist.php" class="btn btn-light stretched-link">Quản lý slider hiển thị các sản phẩm nổi bật</a>
          </div>
        </div>
        <div class="card bg-light text-center" style="width: 18rem;">
        <i class="fa fa-bar-chart-o icon-lg py-3" style="color:black; font-size: 70px;"></i>
          <div class="card-body">
            <h5 class="card-title">Thống kê</h5>
            <a href="stats.php" class="btn btn-light stretched-link">Thống kê số lượng sản phẩm bán ra</a>
          </div>
        </div>
      </div>
      </div>
    </div>
<?php include 'inc/footer.php';?>