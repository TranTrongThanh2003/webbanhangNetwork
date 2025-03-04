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
	<div id="container">
		<div class="nav">
			<ul>
				<li><a href="index.php"><i class="icon-home"></i> Trang chủ</a></li>
				<li><a href="product.php"><i class="icon-th-list"></i> Sản phẩm</a>
				<li><a href="aboutus.php"><i class="icon-bookmark"></i> Giới thiệu</a></li>
				<li><a href="contactus.php"><i class="icon-inbox"></i> Liên hệ</a></li>
				<li><a href="privacy.php"><i class="icon-info-sign"></i> Bảo hành</a></li>
				<li><a href="faqs.php"><i></i>🚚 Chính sách giao hàng</a></li>
				<li><a href="review.php">📊 Đánh giá</a></li>
				<li><a href="promotion.php">🎁 Khuyến mãi</a></li>
				<li><a href="address.php">🌍 Địa điểm</a></li>
			</ul>
		</div>



		<div id="content">
			<legend style="color:crimson">Chất lượng khi giao hàng tại Thành Hiếu 🛒💸💰</legend>

			<h4>An toàn không ❓</h4>
			<p style="text-indent:60px;">Vô cùng an toàn khỏi lo nhé ✅</p>

			<h4>Có uy tín không ❓</h4>
			<p style="text-indent:60px;">Phải gọi là quá uy tín 💯</p>

			<h4>Tiết kiệm không nhỉ ❓</h4>
			<p style="text-indent:60px;">Chi phí đã được tính toán sao cho có lợi nhất với khách hàng rồi nha 😍</p>

			<h4>Có rút ngắn thời gian không ❓</h4>
			<p style="text-indent:60px;">Còn tùy vào khoảng cách địa lý, còn lại là tốc độ giao hàng chưa biết chậm là gì 🙈</p>
			<hr />
		</div>
		<div>
			<h1 style="color:crimson">Chính Sách Giao Hàng</h1>
			<img src="img/giaohang.jpg" width="1060" height="100">
			<h2 style="color:green">1. Mục đích:</h2>
			<p>Quy định cụ thể về chính sách liên quan đến giao nhận hàng hóa nhằm đảm bảo quyền lợi cho khách hàng khi mua hàng hóa tại Công ty TNHH Tin Học Thành Hiếu.</p>

			<h2 style="color:green">2. Phạm vi áp dụng:</h2>
			<p>Áp dụng cho toàn bộ khách hàng mua hàng của Công ty TNHH Thành Hiếu.</p>

			<h2 style="color:green">3. Nội dung:</h2>

			<h3 style="color:green">3.1 Giao nhận hàng hóa tại Thành Hiếu:</h3>
			<ul>
				<li>Với khách hàng mua sản phẩm tại Công ty TNHH Tin Học Thành Hiếu, Quý khách hàng sẽ nhận sản phẩm trực tiếp tại công ty ngay sau khi thanh toán xong.</li>
				<li>Quý khách hàng vui lòng kiểm tra thật kỹ sản phẩm, đối chiếu sản phẩm lại với thông tin đã được nhân viên bán hàng tư vấn và với thông tin trên chứng từ trước khi nhận hàng.</li>
				<li>Quý khách hàng sẽ được nhân viên cung cấp đầy đủ chứng từ Hóa Đơn Bán Hàng và Hóa Đơn Tài Chính.</li>
				<li>Mọi khiếu nại về hư hỏng sản phẩm (trầy, sướt, bị gãy, màn hình bị bể…) sau khi nhận sản phẩm sẽ không được giải quyết.</li>
			</ul>

			<h3 style="color:green">3.2 Giao nhận hàng hóa tại địa chỉ khách hàng:</h3>

			<h4 style="color:green">3.2.1 Chi phí giao hàng:</h4>
			<table style="max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1); font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0; line-height: 1.6;
            color: #555; color: blue;
            font-weight: bold;">
				<tr>
					<th style="background:cyan; color:black">Theo giá trị đơn hàng</th>
					<th style="background:gold; color:black">Số Km được Miễn Phí</th>
					<th style="background:pink;color:black">Thu phí</th>
				</tr>
				<tr>
					<td>Dưới 1 triệu đồng</td>
					<td></td>
					<td>40.000đ / 1 lần giao (trong vòng 15 km) <br> 50.000đ / 1 lần giao (trong vòng 20 km) <br> Trên 20km thu thêm 6.000đ/km – Tối đa 30km</td>
				</tr>
				<tr>
					<td>Trên 1 triệu đồng</td>
					<td>15km</td>
					<td>Từ km thứ 16 thu phí 6.000/km (chở hàng bằng ô tô thu phí 10.000đ/km)</td>
				</tr>
				<tr>
					<td>Trên 5 triệu đồng</td>
					<td>25km</td>
					<td>Từ km thứ 26 thu phí 6.000/km (chở hàng bằng ô tô thu phí 10.000đ/km)</td>
				</tr>
				<tr>
					<td>Trên 50 triệu đồng</td>
					<td>50km</td>
					<td>Từ km thứ 51 thu phí 10.000/km hoặc theo tư vấn từ nhân viên bán hàng</td>
				</tr>
				<tr>
					<td>Trên 100 triệu đồng</td>
					<td>100km</td>
					<td>Từ km thứ 101 thu phí 10.000/km hoặc theo tư vấn từ nhân viên bán hàng</td>
				</tr>
				<tr>
					<td>Trên 200 triệu đồng</td>
					<td>200km</td>
					<td>Từ km thứ 201 thu phí 10.000/km hoặc theo tư vấn từ nhân viên bán hàng</td>
				</tr>
				<tr>
					<td>Trên 300 triệu đồng</td>
					<td>300km</td>
					<td>Từ km thứ 301 thu phí 10.000/km hoặc theo tư vấn từ nhân viên bán hàng</td>
				</tr>
			</table>

			<h4 style="color:green">3.2.2 Thời gian giao hàng:</h4>
			<ul>
				<li>Thời gian hoạt động giao hàng: cam kết phục vụ giao hàng từ thứ 2 đến thứ 7 (không áp dụng ngày Lễ, tết).</li>
				<li>Quy định về khung giờ giao hàng:</li>
			</ul>
			<table>
				<tr>
					<th>Thời gian xác nhận đơn hàng</th>
					<th>Thời gian giao hàng</th>
				</tr>
				<tr>
					<td>Nội thành TP. HCM</td>
					<td></td>
				</tr>
				<tr>
					<td>Trước 14h00</td>
					<td>Trong ngày</td>
				</tr>
				<tr>
					<td>Sau 14h00</td>
					<td>Trễ nhất 12h00 sáng ngày hôm sau</td>
				</tr>
			</table>

			<h2 style="color:green">4. Trách nhiệm đối với hàng hóa:</h2>
			<ul>
				<li>Công ty TNHH Tin Học Thành Hiếu sẽ chịu trách nhiệm với hàng hóa và các rủi ro như mất mát hoặc hư hại của hàng hóa trong suốt quá trình vận chuyển hàng từ kho hàng chúng tôi đến địa chỉ nhận hàng của quý khách.</li>
				<li>Quý khách có trách nhiệm kiểm tra hàng hóa khi nhận hàng. Khi phát hiện hàng hóa bị hư hại, trầy xước, bể vỡ, mốp méo, hoặc sai hàng hóa thì ký xác nhận tình trạng hàng hóa với Nhân viên giao nhận và thông báo ngay cho Bộ phận chăm sóc khách hàng theo số hotline của Công ty TNHH Tin Học Thành Hiếu: 1900 6789.</li>
				<li>Sau khi quý khách đã ký nhận hàng mà không ghi chú hoặc có ý kiến về hàng hóa, Công ty TNHH Tin Học Thành Hiếu không có trách nhiệm với những yêu cầu đổi trả hàng vì hư hỏng, trầy xước, bể vỡ, mốp méo, sai hàng hóa,… từ quý khách sau này.</li>
				<li>Nếu dịch vụ vận chuyển do quý khách chỉ định và lựa chọn thì quý khách sẽ chịu trách nhiệm với hàng hóa và các rủi ro như mất mát hoặc hư hại của hàng hóa trong suốt quá trình vận chuyển hàng từ kho hàng của Công ty TNHH Tin Học Thành Hiếu đến quý khách. Quý khách hàng cũng sẽ chịu cước phí và tổn thất liên quan trong trường hợp này.</li>
			</ul>

			<h2 style="color:green">5. Các quy định khác:</h2>
			<ul>
				<li>Công ty TNHH Tin Học Thành Hiếu chỉ giao hàng cho đúng người nhận mà Quý khách hàng đã đăng ký khi mua hàng. Trong quá trình giao hàng nếu có sự thay đổi người nhận một cách không rõ ràng, chúng tôi có quyền từ chối giao hàng và yêu cầu quý khách hàng nhận hàng tại địa điểm bán hàng của công ty.</li>
				<li>Trong các trường hợp bất khả kháng, do thiên tai, lũ lụt, hỏng hóc cầu phà …, chúng tôi không chịu trách nhiệm bồi thường thiệt hại phát sinh do giao hàng không đúng thời gian hoặc địa điểm như đã thỏa thuận với khách hàng.</li>
				<li>Trong trường hợp công ty Thành Hiếu đã giao hàng đúng thời gian như thỏa thuận ban đầu nhưng khách hàng để Nhân viên Thành Hiếu chờ quá 30 phút để nhận hàng và mọi nỗ lực của chúng tôi nhằm liên hệ với khách hàng đều không thành công, công ty chúng tôi có quyền từ chối vận chuyển mà giao nhận hàng trực tiếp tại công ty.</li>
			</ul>
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