<?php
include("function/session.php");
include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Thành Hiếu - Chuyên thiết bị mạng chính hãng</title>
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
				<li><a href="promotion1.php">🎁 Khuyến mãi</a></li>
				<li><a href="address1.php">🌍 Địa điểm</a></li>
			</ul>
		</div>
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
	<div>
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