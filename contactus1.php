<?php
include("function/session.php");
include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Thành Hiếu | Chuyên thiết bị mạng chính hãng</title>
	<link rel="icon" href="img/logo_Network.jpg" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all">
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

<body >
	<div id="header">
		<img src="img/logo_Network.jpg">
		<label>Thành Hiếu</label>

		<?php
		$id = (int) $_SESSION['id'];

		$query = mysqli_query($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die(mysqli_error());
		$fetch = mysqli_fetch_array($query);
		?>

		<ul>
			<li><a href="function/logout.php"><i class="icon-off icon-white"></i>logout</a></li>
			<li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile" href data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['firstname']; ?>&nbsp;<?php echo $fetch['lastname']; ?></a></li>
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

			$query = mysqli_query($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die(mysqli_error());
			$fetch = mysqli_fetch_array($query);
			?>
			<center>
				<form method="post">
					<center>
						<table>
							<tr>
								<td class="profile">Tên:</td>
								<td class="profile"><?php echo $fetch['firstname']; ?>&nbsp;<?php echo $fetch['mi']; ?>&nbsp;<?php echo $fetch['lastname']; ?></td>
							</tr>
							<tr>
								<td class="profile">Địa chỉ:</td>
								<td class="profile"><?php echo $fetch['address']; ?></td>
							</tr>
							<tr>
								<td class="profile">Tỉnh:</td>
								<td class="profile"><?php echo $fetch['country']; ?></td>
							</tr>
							<tr>
								<td class="profile">Mã bưu chính:</td>
								<td class="profile"><?php echo $fetch['zipcode']; ?></td>
							</tr>
							<tr>
								<td class="profile">ĐT cá nhân:</td>
								<td class="profile"><?php echo $fetch['mobile']; ?></td>
							</tr>
							<tr>
								<td class="profile">ĐT khác (nếu có):</td>
								<td class="profile"><?php echo $fetch['telephone']; ?></td>
							</tr>
							<tr>
								<td class="profile">Email:</td>
								<td class="profile"><?php echo $fetch['email']; ?></td>
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
				<li><a href="faqs1.php"><i></i>🚚 Chính sách giao hàng</a></li>
				<li><a href="review.php">📊 Đánh giá</a></li>
				<li><a href="promotion.php">🎁 Khuyến mãi</a></li>
				<li><a href="address1.php">🌍 Địa điểm</a></li>
			</ul>
		</div>
		<img src="img/contact.jpg" style="width:1150px; height:300px; border:1px solid #000; ">
		<div class="container">
			<h1 style="color:crimson">Tư Vấn Bán Hàng</h1>
			<p><span class="highlight">Thành Hiếu</span> - là một trong những công ty hàng đầu trong lĩnh vực công nghệ thông tin. Chúng tôi luôn cam kết mang đến cho khách hàng những sản phẩm, dịch vụ sửa chữa chất lượng cao, cùng với dịch vụ chăm sóc khách hàng chu đáo và chuyên nghiệp.</p>

			<div class="service-item">
				<h2 style="color:green">Bán hàng Online - Nhanh chóng</h2>
				<img src="img/tuvankh_1.jpg" width="1150" height="250">
				<p>Hàng chính hãng - Bảo hành chính hãng.</p>
				<p>Sản phẩm đa dạng: Với hơn 20.000 sản phẩm đáp ứng mọi nhu cầu của Khách hàng.</p>
				<p>Giá cạnh tranh: Mua sắm tiết kiệm với nhiều chương trình ưu đãi hấp dẫn mỗi ngày.</p>
				<p>Dịch vụ chuyên nghiệp: Đặt hàng nhanh chóng, thanh toán tiện lợi, giao hàng tận nơi.</p>
				<p>Hỗ trợ tận tình: Đội ngũ nhân viên tư vấn sẵn sàng giải đáp mọi thắc mắc của Khách hàng.</p>
			</div>

			<div class="service-item">
				<h2 style="color:green">Hỗ trợ kỹ thuật - Giải đáp mọi vấn đề của bạn</h2>
				<img src="img/tuvankh_2.jpg" width="1150" height="250">
				<p>Bạn gặp trục trặc khi sử dụng sản phẩm hay Laptop, máy tính bàn của bạn đang gặp sự cố? Đừng lo lắng, đội ngũ hỗ trợ kỹ thuật chuyên nghiệp của chúng tôi luôn sẵn sàng hỗ trợ:</p>
				<p>Giải đáp thắc mắc: Giải đáp mọi vấn đề liên quan đến sản phẩm một cách nhanh chóng và chính xác.</p>
				<p>Hỗ trợ sửa chữa: Cung cấp dịch vụ sửa chữa Laptop, máy tính bàn uy tín, đảm bảo chất lượng.</p>
			</div>

			<div class="service-item">
				<h2 style="color:green">Hỗ trợ bảo hành - An tâm mua sắm</h2>
				<img src="img/tuvankh_3.jpg" width="1150" height="250">
				<p>Luôn đảm bảo quyền lợi của khách hàng với chính sách bảo hành uy tín và chuyên nghiệp.</p>
				<p><a href="#">Xem ngay Chính sách bảo hành</a></p>
			</div>

			<div class="service-item">
				<h2 style="color:green">Chăm sóc khách hàng - Trải nghiệm mua sắm hoàn hảo</h2>
				<img src="img/tuvankh_4.jpg" width="1150" height="250">
				<p>Sự hài lòng của Khách hàng là ưu tiên hàng đầu của Công ty. Đội ngũ chăm sóc khách hàng tận tâm luôn sẵn sàng:</p>
				<p>Giải quyết khiếu nại: Tiếp nhận và giải quyết mọi khiếu nại của khách hàng một cách thỏa đáng.</p>
				<p>Hỗ trợ sau mua hàng: Cung cấp dịch vụ hỗ trợ sau mua hàng chu đáo, đảm bảo quyền lợi của khách hàng.</p>
			</div>

			<p><span class="highlight">Thành Hiếu</span> luôn mong muốn mang đến cho Khách hàng những trải nghiệm mua sắm tuyệt vời nhất. Hãy liên hệ với chúng tôi ngay hôm nay để được tư vấn và hỗ trợ.</p>
			<p align="left"><strong>Tổng đài 📱: 1900 6767</strong></p>
			<p align="left"><strong>Hoặc có thể liên hệ qua email 💌 với chúng tôi ngay bây giờ 🤗🤗🤗🤗🤗</strong></p>
		</div>
		<br />
		<br />

		<div id="content">
			<form method="post">
				<table style="position:relative; left:25%;">
					<tr>
						<td style="font-size:20px;">Email:</td>
						<td><input type="email" name="email" value="<?php echo $fetch['email']; ?>" style="width:400px;" disabled></td>
					</tr>
					<tr>
						<td style="font-size:20px;">Message:</td>
						<td><textarea name="message" style="width:400px; height:300px;" required></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td><button class="btn btn-info" name="send" style="width:300px;"><i class="icon icon-ok icon-white"></i>Submit</button>&nbsp;<a href="index.php"><button class="btn btn-danger" style="width:110px;"><i class="icon icon-remove icon-white"></i>Cancel</button></a></td>
					</tr>
				</table>
			</form>
		</div>
		<?php


		if (isset($POST['send'])); {
			@$email = $_POST['email'];
			@$message = $_POST['message'];

			mysqli_query($conn, "INSERT INTO `contact` (email, message) VALUES ('$email', '$message')") or die(mysqli_error());
		}
		?>

		<br />
	</div>
	<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px; color:red"> CÔNG TY TNHH TIN HỌC THÀNH HIẾU </label>
			<p style="font-size:12px;">📍🗺️ Địa chỉ: Số 70 Tô Ký, phường Tân Chánh Hiệp, quận 12, Thành phố Hồ Chí Minh <br />📱 Hotline: 19006767<br />💌 Email:Thanhhieunetwork@gmail.com</p>
		</div>

		<div id="foot">
			<h4 style="color:orangered">Kết nối với chúng tôi</h4>
			<ul>
				<a href="https://www.facebook.com/profile.php?id=100039094961505&mibextid=ZbWKwL" style="text-decoration:none">
					<li style="color:orange">Facebook <img src="img/facebook.jpg" width="20px" height="20px"></li>
				</a>
				<a href="https://www.tiktok.com/@nguyen_thanh578?_t=8ooQVTWp5A0&_r=1" style="text-decoration:none">
					<li style="color:orange">Tiktok <img src="img/Tiktok.jpg" width="30px" height="20px"></li>
				</a>
				<a href="https://youtube.com/@tranthanh1738?si=TZ9r8Msl5FiGa7Ao" style="text-decoration:none">
					<li style="color:orange">Youtube <img src="img/youtube.jpg" width="25px" height="15px"></li>
				</a>
				<a href="s://www.instagram.com/tran.thanh1601?igsh=YzljYTk1ODg3Zg==" style="text-decoration:none;">
					<li style="color:orange">Instagram <img src="img/Instagram.jpg" width="25px" height="15px"></li>
				</a>
			</ul>
		</div>

		<div><img src="img/qrcode.jpg" width="120px" style="margin:15px 20px 0px 150px"></div>
	</div>
</body>

</html>