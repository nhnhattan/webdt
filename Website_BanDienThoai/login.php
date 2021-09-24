<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
 <?php 
	$login_check = Session::get('customer_login');
	if ($login_check) {
		header('Location:order.php'); 
	}
?>

<?php
    // gọi class category
     
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertCustomer = $cs -> insert_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
 <?php 
 	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $login_Customer = $cs -> login_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3 style="color: #0f9ed8;"><img src="images/login9.png" style="margin-left: -4px;height:35px;"><strong> Đăng nhập</strong></h3>
        	<p style="color: black;">Mời nhập thông tin</p>
        	<?php 
    		if (isset($login_Customer)) {
    			echo $login_Customer;
    		}
    		 ?>
        	<form action="" method="POST">
                	<input type="text" name="email" class="field" placeholder="Nhập email..." >
                    <input type="password" name="password" class="field" placeholder="Nhập password..." >
                 
                 <!-- <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p> -->
                    <div class="buttons"><div><input type="submit" class="btn btn-black rounded-0 py-1 px-3"  name="login" class="grey" value="Đăng nhập" style="
    background: ;
"></div></div>
                    </form>
                    </div>

    	<div class="register_account">
    		<h3 style="color: #0f9ed8;"><img src="images/register1.png" style="margin-left: -4px;height:42px;"><strong> Đăng ký tài khoản</strong></h3>
    		<?php 
    		if (isset($insertCustomer)) {
    			echo $insertCustomer;
    		}
    		 ?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Nhập họ tên..." style="width: 94%;">
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Nhập công ty..." style="width: 94%;">
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Nhập mã bưu chính..."style="width: 94%;">
							</div>
							<div>
								<input type="text" name="email" placeholder="Nhập E-Mail..." style="width: 94%;">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Nhập địa chỉ..." style="margin-left: 9px;">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required" style="width: 97%;height: 40px;margin-top: 5px;margin-left: 10px;">
							<option value="hcm">TPHCM</option>
							<option value="hn">Hà Nội</option>
							<option value="dn">Đà Nẵng</option>
							<option value="ct">Cần Thơ</option>
							<option value="dn">Đồng Nai</option>
							<option value="bd">Bình Dương</option>
							<option value="vt">Bà Rịa Vũng Tàu</option>
							<option value="cm">Cà Mau</option>
							<option value="na">Nghệ An</option>     
							<option value="tb">Thái Bình</option>     
							<option value="ht">Hà Tĩnh</option>     
							<option value="hp">Hải Phòng</option>         
							

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Nhập số điện thoại..." style="margin-left: 9.5px; margin-top: 5px;">
		          </div>
				  
				  <div>
					<input type="password" name="password" placeholder="Nhập password..." style="
    width: 97%;
    height: 40px;
    margin-top: 5px;
    margin-left: 10px;
">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" class="btn btn-black rounded-0 py-1 px-2" name="submit" class="grey" value="Tạo tài khoản" style="
    background: ;
"></div></div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>


<?php 
	include 'inc/footer.php';
 ?>
