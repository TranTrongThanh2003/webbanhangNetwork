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
		<img src="img/intro.jpg" style="width:1150px; height:630px; border:1px solid #000; ">
		<br />
		<br />

		<legend style="font-weight:bold; color:crimson">Chào mừng bạn đã ghé thăm "Thành Hiếu | Chuyên thiết bị mạng chính hãng" !!! </legend>
		<div id="content">
			<legend>
				<h3 style="color:green">Tầm nhìn & sứ mệnh</h3>
			</legend>
			<img src="img/sumenh.jpg" style="width:1150px; height:280px; border:1px solid #000; ">
			<p><em>
					<em><span style="color:orangered">Thành Hiếu - Đỉnh cao kết nối, chất lượng toàn cầu</span></em>: Chúng tôi đã xây dựng trang web này nhằm đưa sản phẩm thiết bị mạng đến gần hơn với mọi người, giúp khách hàng dễ dàng lựa chọn, mua sắm
					và thanh toán các thiết bị mạng một cách nhanh chóng và tiện lợi. Giờ đây chỉ cần một cú click chuột, quý khách hàng đã có thể dễ dàng
					tiếp cận với sản phẩm mà không cần quan tâm đến khoảng cách địa lý, được nhận tư vấn miễn phí, nhiệt tình từ nhân viên của Thành Hiếu chúng tôi
				</em></p>
			<br />
			<legend>
				<h3 style="color:green">Quá trình phát triển</h3>
			</legend>
			<img src="img/lichsupt.jpg" style="width:1150px; height:280px; border:1px solid #000; ">
			<p>Website "Thành Hiếu | Chuyên thiết bị mạng chính hãng" được sáng lập bởi <span style="color:orangered">Trần Trọng Thành và Ngô Quốc Hiếu</span>, hai sinh viên
				đầy nhiệt huyết của <a href="https://ut.edu.vn/">trường Đại học Giao thông Vận tải TP. Hồ Chí Minh</a>. Trong suốt quá trình học tập, cả hai nhận thấy tầm quan trọng của mạng lưới kết nối
				trong thời đại số, đặc biệt là sự cần thiết của các thiết bị mạng chính hãng để đảm bảo hiệu suất và an ninh.<br />
				Xuất phát từ niềm đam mê công nghệ và mong muốn mang lại giải pháp mạng tốt nhất cho cộng đồng, Thành và Hiếu đã quyết định khởi nghiệp ngay từ khi còn là
				sinh viên. Với kiến thức vững vàng trong lĩnh vực công nghệ thông tin và kinh nghiệm thực tiễn từ các dự án học thuật, hai người đã cùng nhau tạo dựng nên
				website "Thành Hiếu", nơi cung cấp các thiết bị mạng chính hãng với chất lượng cao.</p>
			<br />
			<legend>
				<h3 style="color:green">Sản phẩm/ dịch vụ cung cấp</h3>
			</legend>
			<img src="img/cungcap_sp.jpg" style="width:1150px; height:280px; border:1px solid #000; ">
			<p>chuyên cung cấp các sản phẩm router, switch, và firewall chính hãng từ Cisco, đảm bảo chất lượng vượt trội và hiệu suất cao. Chúng tôi cam kết mang đến cho khách
				hàng giải pháp mạng toàn diện, an toàn và đáng tin cậy, giúp kết nối nhanh chóng và bảo vệ hệ thống mạng của bạn một cách tối ưu.</p>
			<br />
			<legen>
				<h3 style="color:green">Khách Hàng & Đối Tác</h3>
			</legen>
			<img src="img/doitac.jpg" style="width:1150px; height:280px; border:1px solid #000; ">
			<p>Đánh Giá Từ Khách Hàng: "Thành Hiếu" đã nhận được nhiều phản hồi tích cực từ khách hàng sau khi sử dụng các sản phẩm và dịch vụ của chúng tôi. Khách hàng đánh giá
				cao chất lượng chính hãng, hiệu suất ổn định, và sự hỗ trợ kỹ thuật tận tình mà chúng tôi cung cấp. Câu chuyện thành công ấy là minh chứng rõ ràng cho cam kết
				của chúng tôi trong việc mang lại giá trị tốt nhất.<br />
				Đối Tác Chiến Lược: "Thành Hiếu" tự hào hợp tác với các nhà cung cấp thiết bị mạng hàng đầu, đặc biệt là <a href="https://www.cisco.com/c/vi_vn/index.html">Cisco Việt Nam</a>, để mang đến các sản phẩm router, switch, và firewall
				chính hãng. Các đối tác chiến lược của chúng tôi đóng vai trò quan trọng trong việc đảm bảo chất lượng sản phẩm và giúp chúng tôi duy trì sự tin cậy với khách hàng.
			</p>
			<br />
			<legen>
				<h3 style="color:green">Giá trị cốt lõi</h3>
			</legen>
			<img src="img/camket.jpg" style="width:1150px; height:300px; border:1px solid #000; ">
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
</body>

</html>