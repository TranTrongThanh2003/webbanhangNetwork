<?php
include("function/login.php");
include("function/customer_signup.php");
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
			<li><a href="faqs.php"><i></i>🚚 Chính sách giao hàng</a></li>
			<li><a href="review.php">📊 Đánh giá</a></li>
			<li><a href="promotion.php">🎁 Khuyến mãi</a></li>
			<li><a href="address.php">🌍 Địa điểm</a></li>
		</ul>
	</div>
	<div id="container">

		<div id="content">
			<legend>
				<h3 style="color:red">Thiết bị của bạn đang gặp sự cố - Đừng lo lắng!!!</h3>
			</legend>
			<img src="img/baohanh.jpg" width="1150px">
			<p>
				Bạn sẽ hoàn toàn an tâm - Chúng tôi luôn sẵn sàng phục vụ.
				Chuyên nghiệp - Uy tín - Chất lượng - Tận tâm là phương châm phục vụ của chúng tôi.
				Với dịch vụ sửa chữa lấy liền uy tín – chuyên nghiệp, bạn sẽ cảm thấy hài lòng
				và hoàn toàn an tâm khi đến với Trung tâm kỹ thuật - dịch vụ bảo hành sửa chữa của Thành
				Nhân phục vụ nhanh nhất, hiệu quả nhất cùng chi phí phù hợp - cạnh tranh nhất.
			</p>
			<hr>
			<h4 style="color:red">Cam kết chất lượng vơi khách hàng</h4>
			<p>Chúng tôi hiểu rằng sản phẩm công nghệ cần phải được bảo trì và bảo hành một cách chuyên nghiệp để đảm bảo hiệu suất tối ưu. Chính vì vậy, Công Ty TNHH Thành Hiếu cung cấp dịch vụ bảo hành với các cam kết sau:</p>
			<ul>
				<li>Thời gian bảo hành nhanh chóng, đúng hẹn.</li>
				<li>Đội ngũ kỹ thuật viên giàu kinh nghiệm, tận tâm.</li>
				<li>Sử dụng linh kiện chính hãng, chất lượng cao.</li>
				<li>Hỗ trợ khách hàng 24/7 qua hotline và email.</li>
				<li>Kiểm tra, đánh giá kỹ lưỡng, đoán đúng bệnh và báo đúng giá.</li>
				<li>Bảo đảm tình trạng máy thiết bị của khách hàng nguyên vẹn sau khi sửa chữa.</li>
				<li>Không thay đổi bất kỳ linh kiện nào khi chưa có sự đồng ý của khách hàng</li>
				<li>Hoàn trả lại chi phí sửa chữa nếu như thiết bị của khách hàng đã bảo hành lỗi kỹ thuật quá 3 lần hoặc không thể khắc phục được.</li>
			</ul>
			<img src="img/uytin.jpg" width="600px">

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