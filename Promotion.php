<?php
include("function/login.php");
include("function/customer_signup.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Thành Hiếu | Chuyên thiết bị chính hãng</title>
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

<body>
	<div id="header">
		<img src="img/logo_Network.jpg">
		<label>Thành Hiếu</label>
		<?php include("welcome.php"); ?>
		<ul>
			<li><a href="#signup" data-toggle="modal">Sign Up</a></li>
			<li><a href="#login" data-toggle="modal">Login</a></li>
		</ul>
	</div>

	<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3 id="myModalLabel">Đăng nhập 🗝️</h3>
		</div>
		<div class="modal-body">
			<form method="post">
			<center>
					<input type="email" id="login-email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" style="width:250px;">
					<span id="emailError" style="color:red;display:none;">Định dạng email không hợp lệ: xxx123@gmail.com</span>
					<input type="password" name="password" placeholder="Password" style="width:250px;">
				</center>
		</div>
		<div class="modal-footer">
			<input class="btn btn-primary" type="submit" name="login" value="Login">
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Đóng</button>
			</form>
		</div>
	</div>

	<div id="signup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3 id="myModalLabel">Đăng kí 🔐</h3>
		</div>
		<div class="modal-body">
		<center>
				<form method="post" onsubmit="return validateEmail()">
				<input type="text" name="firstname" placeholder="Tên" required value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : ''; ?>">
<input type="text" name="mi" placeholder="Tên đệm" maxlength="30" required value="<?php echo isset($_POST['mi']) ? htmlspecialchars($_POST['mi']) : ''; ?>">
<input type="text" name="lastname" placeholder="Họ" required value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>">
<input type="text" name="address" placeholder="Địa chỉ" style="width:430px;" required value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>">
<input type="text" name="country" placeholder="Tỉnh" required value="<?php echo isset($_POST['country']) ? htmlspecialchars($_POST['country']) : ''; ?>">
<input type="text" name="zipcode" placeholder="Mã bưu chính" required maxlength="10" value="<?php echo isset($_POST['zipcode']) ? htmlspecialchars($_POST['zipcode']) : ''; ?>">
<input type="text" name="mobile" placeholder="ĐT cá nhân" maxlength="11" required value="<?php echo isset($_POST['mobile']) ? htmlspecialchars($_POST['mobile']) : ''; ?>">
<input type="text" name="telephone" placeholder="ĐT khác (nếu có)" maxlength="10" value="<?php echo isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : ''; ?>">
<input type="email" id="email" name="email" placeholder="Email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
<input type="password" name="password" placeholder="Password" required value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">

			</center>
		</div>
		<div class="modal-footer">
			<input type="submit" class="btn btn-primary" name="signup" value="Đăng kí">
			<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Đóng</button>
		</div>
		</form>
	</div>

	<br>
	<div class="nav">
		<ul>
			<li><a href="index.php"><i class="icon-home"></i> Trang chủ</a></li>
			<li><a href="product.php"><i class="icon-th-list"></i>Sản phẩm</a>
			<li><a href="aboutus.php"><i class="icon-bookmark"></i>Giới thiệu</a></li>
			<li><a href="contactus.php"><i class="icon-inbox"></i>Liên hệ</a></li>
			<li><a href="privacy.php"><i class="icon-info-sign"></i>Bảo hành</a></li>
			<li><a href="faqs.php">🚚 Chính sách giao hàng</a></li>
			<li><a href="review.php">📊 Đánh giá</a></li>
			<li><a href="promotion.php">🎁 Khuyến mãi</a></li>
			<li><a href="address.php">🌍 Địa điểm</a></li>
		</ul>
	</div>
	<div id="container">

		<div id="container">
			<h2 align="center" style="color:crimson;background:cyan">CHÍNH SÁCH KHUYẾN MÃI XUYÊN SUỐT CỦA THÀNH HIẾU</h2>

			<div id="tinmoinhat" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
				<div class="col" style="border: 1px solid #ccc; background:gold; padding: 10px;">
					<h4 style="color:green">Chương trình khuyến mãi</h4>
					<em style="color:blue">❤️ Siêu hấp dẫn</em>
					<img src="img/bigsale.jpg" alt="Khuyến mãi" style="width: 100%; height: auto;border:1px solid red">
					<div class="tomtat">
						Nhằm tri ân khách hàng đã ủng hộ cửa hàng trong suốt thời gian qua, chúng tôi xin giới thiệu các chương trình khuyến mãi đặc biệt:
						<ul>
							<li>Giảm giá 20% cho combo sản phẩm router và switch khi mua từ 4 món trở lên.</li>
							<li>Mua 2 tặng 1 đối với một số mẫu sản phẩm cũ chính hãng.</li>
							<li>Giảm giá 10% khi mua combo gồm router và switch.</li>
						</ul>
					</div>
				</div>

				<div class="col" style="border: 1px solid #ccc;background:gold; padding: 10px;">
					<h4 style="color:green">Điều kiện áp dụng</h4>
					<em style="color:blue">⏰ Không giới hạn thời gian</em>
					<img src="img/dieukienapdung.jpg" alt="Khuyến mãi" style="width: 100%; height: 205px;border:1px solid red">
					<div class="tomtat">
						Chính sách khuyến mãi chỉ áp dụng trong các trường hợp sau, khách hàng lưu ý:
						<ul>
							<li>Áp dụng cho khách hàng mua hàng trực tuyến tại website chính thức của cửa hàng.</li>
							<li>Hoặc mua sản phẩm tại chính cửa hàng</li>
							<li>Sản phẩm phải có tem bảo hành của Thành Hiếu</li>
						</ul>
					</div>
				</div>

				<div class="col" style="border: 1px solid #ccc; padding: 10px; background:gold">
					<h4 style="color:green">Các ưu đãi hấp dẫn khác</h4>
					<em style="color:blue">🌟Chương trình Khách hàng thân thiết</em>
					<img src="img/khuyenmaidb.jpg" alt="Khuyến mãi" style="width: 100%; height: auto;border:1px solid red">
					<div class="tomtat">
						<ul>
							<li>Hệ thống tích điểm: Mỗi lần mua hàng, khách hàng sẽ tích điểm và có thể đổi điểm để nhận được giảm giá cho các lần mua hàng tiếp theo..</li>
							<li>Giảm giá độc quyền cho thành viên: Các ưu đãi đặc biệt dành cho khách hàng quay lại mua hàng hoặc đăng ký chương trình thành viên.</li>
							<li>Đổi cũ lấy mới: Khách hàng có thể đổi thiết bị mạng cũ của họ để nhận được giảm giá khi mua các mẫu mới hơn, hiện đại hơn.</li>
							<li>Khuyến mãi Mùa tựu trường: Giảm giá cho các sản phẩm như router và bộ mở rộng Wi-Fi, lý tưởng cho sinh viên chuẩn bị chỗ ở ký túc xá</li>
							<li>Giảm giá Ngày Black Friday/Cyber Monday: Giảm giá mạnh cho các sản phẩm phổ biến như router cao cấp và thiết bị mạng thông minh cho gia đình.</li>
						</ul>
					</div>
				</div>

				<div class="col" style="border: 1px solid #ccc; padding: 10px; background:gold">
					<h4 style="color:green">Tặng kèm món quà giá trị</h4>
					<em style="color:blue">🎁 Tri ân thượng đế</em>
					<img src="img/trian.jpg" alt="Khuyến mãi" style="width: 100%; height: 200px; border:1px solid red">
					<div class="tomtat">
						Nhằm tri ân khách hàng đã ủng hộ cửa hàng trong suốt thời gian qua, chúng tôi xin giới thiệu các chương trình khuyến mãi đặc biệt:
						<ul>
							<li>Khách hàng có thể lựa chọn các món quà tặng kèm như tai nghe, dây sạc...</li>
							<li>Tặng kèm dây cáp khi mua hàng: Tặng kèm dây cáp Ethernet hoặc bộ mở rộng Wi-Fi miễn phí khi mua hàng trên một mức giá nhất định.</li>
							<li>Hướng dẫn cài đặt miễn phí: Cung cấp hướng dẫn cài đặt miễn phí hoặc video hướng dẫn khi mua bộ thiết lập mạng.</li>
						</ul>
					</div>
				</div>
			</div>
			<br />
		</div>
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
	</div>
</body>

</html>