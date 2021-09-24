<div class="container">
	<div class="slide-them" style="height: 110px;width: 1380px;margin-left: -136px;margin-top: -20px;">
		<img src="images/banner_3.png">
	</div>
</div>
 <div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				$getLastestDell = $product->getLastestDell();
				if($getLastestDell){
					while($resultdell = $getLastestDell->fetch_assoc()){
				 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultdell['productId'] ?>"> <img src="admin/uploads/<?php echo $resultdell['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2 style="color: #717D7E;"><img src="images/apple.png" style="width: 30px;height: 22px;margin-top: -4px;"><strong>iPhone</strong></h2>
						<p><?php echo $fm->textShorten($resultdell['productName'],35) ?></p>
						<div class="button1"><span><a class="btn btn-black --hover rounded-2" href="details.php?proid=<?php echo $resultdell['productId'] ?>">Mua ngay</a></span></div>						
				   </div>
			   </div>
			   <?php
				}}
			    ?>

			    <?php
				$getLastestSS = $product->getLastestSamsum();
				if($getLastestSS){
					while($resultss = $getLastestSS->fetch_assoc()){
				 ?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proid=<?php echo $resultss['productId'] ?>"><img src="admin/uploads/<?php echo $resultss['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2 style="color: #145A32;"><img src="images/oppo_logo.png" style="width: 30px;height: 27px;"><strong>Oppo</strong></h2>
						  <p><?php echo $fm->textShorten($resultss['productName'],35) ?></p>
						  <div class="button1"><span><a class="btn btn-black --hover rounded-2" href="details.php?proid=<?php echo $resultss['productId'] ?>">Mua ngay</a></span></div>
					</div>
				</div>
				<?php
				}}
			    ?>
			</div>
			<div class="section group">
				<?php
				$getLastestAP = $product->getLastestApple();
				if($getLastestAP){
					while($result_ap = $getLastestAP->fetch_assoc()){
				 ?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result_ap['productId'] ?>"> <img src="admin/uploads/<?php echo $result_ap['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2 style="color: #A93226;"><img src="images/fire.png" style="width: 30px;height: 24px;margin-top: -4px;"><strong>Vsmart</strong></h2>
						<p><?php echo $fm->textShorten($result_ap['productName'],35) ?></p>
						<div class="button1"><span><a class="btn btn-black --hover rounded-2" href="details.php?proid=<?php echo $result_ap['productId'] ?>">Mua ngay</a></span></div>
				   </div>
			   </div>
			   <?php
				}}
			    ?>

				<?php
				$getLastestHW = $product->getLastestHuawei();
				if($getLastestHW){
					while($result_hw = $getLastestHW->fetch_assoc()){
				 ?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result_hw['productId'] ?>"> <img src="admin/uploads/<?php echo $result_hw['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2 style="color: #2874A6;"><img src="images/samsung_icon.png" style="width: 30px;height: 27px;"><strong>Samsung</strong></h2>
						<p><?php echo $fm->textShorten($result_hw['productName'],35) ?></p>
						<div class="button1"><span><a class="btn btn-black --hover rounded-2" href="details.php?proid=<?php echo $result_hw['productId'] ?>">Mua ngay</a></span></div>
				   </div>
			   </div>
			   <?php
				}}
			    ?>			
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider" style="width: 711px;margin-left: -44px;">
					<ul class="slides">
						<?php 
						$get_slider = $product->show_slider();
						if ($get_slider) {
							while ($result_slider = $get_slider->fetch_assoc()) {
								# code...
							
						 ?>
						<li><img src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt=""/></li>
						<?php 
						}
						}
						 ?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>