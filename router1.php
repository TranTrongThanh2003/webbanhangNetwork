<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thành Hiếu | Chuyên thiết bị mạng chính hãng</title>
	<link rel="icon" href="img/logo_Network.jpg" />
	<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/button.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/tab.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/popover.js"></script>
	<script src="js/collapse.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/scrollspy.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/transition.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div id="header">
		<img src="img/logo_Network.jpg">
		<label>Thành Hiếu</label>
		
			<?php
				$id = (int) $_SESSION['id'];
			
					$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
					$fetch = mysqli_fetch_array ($query);
			?>
	
			<ul>
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>logout</a></li>
				<li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile" href  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['firstname']; ?>&nbsp;<?php echo $fetch['lastname'];?></a></li>
			</ul>	
	</div>
	
		<div id="profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Tài khoản của tôi 🙎🏻‍♂️</h3>
				</div>
					<div class="modal-body">
						<?php
							$id = (int) $_SESSION['id'];
			
								$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
								$fetch = mysqli_fetch_array ($query);
						?>
						<center>
					<form method="post">
						<center>
							<table>
								<tr>
									<td class="profile">Tên:</td><td class="profile"><?php echo $fetch['firstname'];?>&nbsp;<?php echo $fetch['mi'];?>&nbsp;<?php echo $fetch['lastname'];?></td>
								</tr>
								<tr>
									<td class="profile">Địa chỉ:</td><td class="profile"><?php echo $fetch['address'];?></td>
								</tr>
								<tr>
									<td class="profile">Tỉnh:</td><td class="profile"><?php echo $fetch['country'];?></td>
								</tr>
								<tr>
									<td class="profile">Mã bưu chính:</td><td class="profile"><?php echo $fetch['zipcode'];?></td>
								</tr>
								<tr>
									<td class="profile">ĐT cá nhân:</td><td class="profile"><?php echo $fetch['mobile'];?></td>
								</tr>
								<tr>
									<td class="profile">ĐT khác (nếu có):</td><td class="profile"><?php echo $fetch['telephone'];?></td>
								</tr>
								<tr>
									<td class="profile">Email:</td><td class="profile"><?php echo $fetch['email'];?></td>
								</tr>
							</table>
						</center>
					</div>
				<div class="modal-footer">
					<a href="account.php?id=<?php echo $fetch['customerid']; ?>"><input type="button" class="btn btn-success" name="edit" value="Chỉnh sửa hồ sơ"></a>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Đóng</button>
				</div>
					</form>
			</div>
		
			
			
		
	<br>
<div id="container">
	
	<div class="nav">
			 <ul>
			 	<li><a href="home.php"><i class="icon-home"></i> Trang chủ</a></li>
				<li><a href="product1.php"><i class="icon-th-list"></i>Sản phẩm</a>
				<li><a href="aboutus1.php"><i class="icon-bookmark"></i>Giới thiệu</a></li>
				<li><a href="contactus1.php"><i class="icon-inbox"></i>Liên hệ</a></li>
				<li><a href="privacy1.php"><i class="icon-info-sign"></i>Bảo hành</a></li>
				<li><a href="faqs1.php"><i ></i>🚚 Chính sách giao hàng</a></li>
				<li><a href="review.php">📊 Đánh giá</a></li>
				<li><a href="promotion1.php">🎁  Khuyến mãi</a></li>
				<li><a href="address1.php">🌍 Địa điểm</a></li>
			</ul>
		</div>
		
		<div class="nav1">
			<ul>
				<li><a href="product1.php">Firewall</a></li>
				<li>|</li>
				<li><a href="switch1.php">Switch</a></li>
				<li>|</li>
				<li><a href="router1.php" class="active" style="color:#111;">Router</a></li>
			</ul>
			<?php 
			echo "<a href='cart.php?id=" . $id . "&action=view' style='right:1%; position:fixed; top:15%;'><i class='icon-shopping-cart icon-white'><button class='btn btn-inverse' ></i> Xem giỏ hàng</button></a>";
			// Thêm nút "Xem đơn hàng" mới
			echo "<a href='order_client.php?id=" . $id . "' style='right:1%; position:fixed; top:20%;'><button class='btn btn-info'>Xem đơn hàng</button></a>";
			?>
		</div>
	
	<div id="content">
		<br />
		<br />
		<div id="product">
			
			<?php 
				
				$query = mysqli_query($conn, "SELECT *FROM product WHERE category='Router' ORDER BY product_id DESC") or die (mysqli_error());
				
					while($fetch = mysqli_fetch_array($query))
						{
							
						$pid = $fetch['product_id'];
						
						$query1 = mysqli_query($conn, "SELECT * FROM stock WHERE product_id = '$pid'") or die (mysqli_error());
						$rows = mysqli_fetch_array($query1);
						
						$qty = $rows['qty'];
						if($qty <= 5){
						
						}else{
							echo "<div class='float'>";
							echo "<center>";
							echo "<a href='details.php?id=".$fetch['product_id']."'><img class='img-polaroid' src='photo/".$fetch['product_image']."' height = '300px' width = '300px'></a>";
							echo "<span style='color: ForestGreen;font-size:15px;font-weight:bold'> ".$fetch['product_name']."</span>";
							echo "<br />";
							echo "<span style='color: crimson;font-weight:bold'> ".$fetch['product_price']." Triệu VND</span>";
							echo "<br />";
							echo "<h3 class='text-info' style='position:absolute; margin-top:-90px; text-indent:15px;color:Orange'> Size: <span style='color:Purple'>".$fetch['product_size']."<span></h3>";
							echo "</center>";
							echo "</div>";
						}
							
						}
			?>
		</div>
		
		
		

	</div>
		
	<br />
</div>
	<br />
	<div id="footer">
	<div class="foot">
			<label style="font-size:17px; color:red"> CÔNG TY TNHH TIN HỌC THÀNH HIẾU  </label>
			<p style="font-size:12px;">📍🗺️ Địa chỉ: Số 70 Tô Ký, phường Tân Chánh Hiệp, quận 12, Thành phố Hồ Chí Minh <br/>📱 Hotline: 19006767<br/>💌 Email:Thanhhieunetwork@gmail.com</p>
		</div>
			
			<div id="foot">
				<h4 style="color:orangered">Kết nối với chúng tôi</h4>
					<ul>
						<a href="https://www.facebook.com/profile.php?id=100039094961505&mibextid=ZbWKwL" style="text-decoration:none"><li style="color:orange">Facebook <img src="img/facebook.jpg" width="20px" height="20px"></li></a>
						<a href="https://www.tiktok.com/@nguyen_thanh578?_t=8ooQVTWp5A0&_r=1" style="text-decoration:none"><li style="color:orange">Tiktok <img src="img/Tiktok.jpg" width="30px" height="20px"></li></a>
						<a href="https://youtube.com/@tranthanh1738?si=TZ9r8Msl5FiGa7Ao" style="text-decoration:none"><li style="color:orange">Youtube <img src="img/youtube.jpg" width="25px" height="15px"></li></a>
						<a href="s://www.instagram.com/tran.thanh1601?igsh=YzljYTk1ODg3Zg==" style="text-decoration:none;"><li style="color:orange">Instagram <img src="img/Instagram.jpg" width="25px" height="15px"></li></a>
					</ul>
			</div>
			
			<div><img src="img/qrcode.jpg" width="120px" style="margin:15px 20px 0px 150px" ></div>
	</div>
</body>
</html>