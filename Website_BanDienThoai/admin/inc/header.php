<?php 
    include '../lib/session.php';
    Session::checkSession();
    if(isset($_POST["lo"])){
      Session::destroy();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin page</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
        <link rel="stylesheet" href="../assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.addons.css">
        <!-- endinject -->
        <!-- plugin css for this page -->
        <link rel="stylesheet" href="../assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="../assets/css/shared/style.css">
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="../assets/css/demo_1/style.css">
        <!-- End Layout styles -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">
    </head>
    <body>
        <div class="container-scroller">
            <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                  <a class="navbar-brand brand-logo" href="../index.php">
                    <img src="../images/logo1.png" style="width: 150px; height: 50px;" alt="logo" /> </a>
                  <a class="navbar-brand brand-logo-mini" href="index.php">
                    <img src="../images/logo.png" style="width: 60px; height: 60px;" alt="logo" /> </a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center">
                  <form class="ml-auto search-form d-none d-md-block" action="" method="POST">
                    <div class="form-group">
                      <input type="text/submit" class="form-control" placeholder="Search Here" name="searchFnc">
                    </div>
                  </form>
                  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                  </button>
                </div>
              </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <div class="profile-content" style="width: 100%; height: 150px;">
                            <a class="nav-link" href="index.php">
                                <div class="row">
                                  <div class="col"></div>
                                    <div class="col text-center">
                                        <i class="fa fa-user-circle icon-lg mt-1" style="color:white; font-size: 70px;"></i>
                                    </div>
                                  <div class="col"></div>
                                </div>
                                <div class="row text-center">
                                    <div class="nav-item nav-profile">
                                      <!-- Hiện tên user -->
                                      <?php
                                      $_SESSION["userid"] = Session::get('adminName');
                                        if(isset($_SESSION["userid"])){
                                            echo "<div><h5 class='profile-name font-weight-bolder' style='font-size:25px; color:white; text-shadow: 1px 1px black'>".$_SESSION["userid"]."</h5></div>";
                                        }
                                      ?>
                                      <!-- end -->
                                    </div>
                                </div>
                            </a>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                              <span class="menu-title">Quản lý chung</span>
                              <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="ui-basic">
                              <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                  <a class="nav-link" href="adminlist.php">Quản lý nhân viên</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="customerlist.php">Quản lý khách hàng</a>
                                </li>
                              </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inboxlist.php">
                                <i class="menu-icon typcn typcn-coffee"></i>
                                <span class="menu-title">Danh sách đơn hàng</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="productlist.php">
                                <i class="menu-icon typcn typcn-coffee"></i>
                                <span class="menu-title">Quản lý sản phẩm</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="catlist.php">
                                <i class="menu-icon typcn typcn-coffee"></i>
                                <span class="menu-title">Quản lý danh mục sản phẩm</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="brandlist.php">
                                <i class="menu-icon typcn typcn-coffee"></i>
                                <span class="menu-title">Thương hiệu sản phẩm</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sliderlist.php">
                                <i class="menu-icon typcn typcn-coffee"></i>
                                <span class="menu-title">Quản lý Slider</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stats.php">
                                <i class="menu-icon typcn typcn-coffee"></i>
                                <span class="menu-title">Thống kê</span>
                            </a>
                        </li>
                        <div>
                              <form class="text-center py-3" action="index.php" method="POST">
                                <button class="btn btn-secondary submit-btn" name="lo">Đăng xuất</button>
                              </form>
                            </div>
                    </ul>
                </nav>

                <div class="main-panel" style="margin-left: 20%;">