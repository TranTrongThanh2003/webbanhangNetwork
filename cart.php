<?php
	include("function/session.php");
	include("db/dbconn.php");
	// Lấy ID khách hàng từ session
	$customer_id = (int) $_SESSION['id'];

	// Khôi phục giỏ hàng từ cơ sở dữ liệu khi người dùng đăng nhập
	if (!isset($_SESSION['cart'])) {
	    $_SESSION['cart'] = array(); // Khởi tạo giỏ hàng nếu chưa có
	    
	    $query_cart = mysqli_query($conn, "SELECT * FROM cart_client WHERE customer_id = '$customer_id'") or die(mysqli_error($conn));
	    while ($row_cart = mysqli_fetch_array($query_cart)) {
	        $product_id = $row_cart['product_id'];
	        $quantity = $row_cart['quantity'];
	        $_SESSION['cart'][$product_id] = $quantity;
	    }
	}
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
	<style>
		#Delete{
			background:Orange;
		}
		#Delete:hover{
			background:crimson;
		}
	</style>
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
				<li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile"  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['firstname']; ?>&nbsp;<?php echo $fetch['lastname'];?></a></li>
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
	
	<form method="post" class="well" style="background-color:#fff;">
	<table class="table">
	<label style="font-size:25px;color:crimson">Giỏ hàng của tôi 🛒 </label>
		<tr style="color:blue">
			<th><h3>Ảnh</h3></th>
			<th><h3>Sản phẩm</h3></th>
			<th><h3>Size</h3></th>
			<th><h3>Số lượng</h3></th>
			<th><h3>Đơn giá</h3></th>
			<th><h3>Thêm</h3></th>
			<th><h3>Bớt</h3></th>
			<th><h3>Tổng giá</h3></th>
			<th><h3>Xóa</h3></th>
		</tr>
	
<?php
	if (isset($_GET['id']))
		$id = $_GET['id'];
	else
		$id = 1;
	if (isset($_GET['action']))
		$action = $_GET['action'];
	else
		$action = "empty";

	switch ($action) {
		case "view":
			if (isset($_SESSION['cart'][$id]))
				$_SESSION['cart'][$id];
			break;

		case "add":
			// Lấy số lượng tồn kho từ bảng stock
			$stock_query = mysqli_query($conn, "SELECT qty FROM stock WHERE product_id = $id");
			$stock_row = mysqli_fetch_assoc($stock_query);
			$available_stock = $stock_row['qty'];

			// Kiểm tra nếu sản phẩm đã có trong giỏ hàng
			if (isset($_SESSION['cart'][$id])) {
				// Nếu số lượng hiện tại trong giỏ + 1 <= tồn kho thì mới cho phép thêm
				if ($_SESSION['cart'][$id] < $available_stock) {
					$_SESSION['cart'][$id]++;
				} else {
					// Tùy chọn: thông báo cho người dùng rằng họ không thể thêm quá số lượng tồn kho
					echo "";
				}
			} else {
				// Nếu sản phẩm chưa có trong giỏ, kiểm tra tồn kho rồi mới thêm
				if ($available_stock > 0) {
					$_SESSION['cart'][$id] = 1;
				} else {
					echo "<script>alert('Sản phẩm đã hết hàng.');</script>";
				}
			}
			// Lưu giỏ hàng vào bảng `cart_client`
			$quantity = $_SESSION['cart'][$id];
			$cart_query = mysqli_query($conn, "SELECT * FROM cart_client WHERE customer_id = '$customer_id' AND product_id = '$id'");
			if(mysqli_num_rows($cart_query) > 0) {
				// Nếu sản phẩm đã có trong bảng `cart_client`, cập nhật số lượng
				mysqli_query($conn, "UPDATE cart_client SET quantity = '$quantity' WHERE customer_id = '$customer_id' AND product_id = '$id'");
			} else {
				// Nếu sản phẩm chưa có, thêm mới
				mysqli_query($conn, "INSERT INTO cart_client (customer_id, product_id, quantity) VALUES ('$customer_id', '$id', '$quantity')");
			}
			break;

		case "remove":
			if (isset($_SESSION['cart'][$id])) {
				if ($_SESSION['cart'][$id] > 0) {
					$_SESSION['cart'][$id]--;
				}
				// else {
				//     Optionally, you can keep this part to unset the item if the quantity reaches 0
				//     unset($_SESSION['cart'][$id]);
				// }
			}
			break;
		case "delete":
			$quantity = $_SESSION['cart'][$id];
			mysqli_query($conn, "DELETE FROM cart_client WHERE customer_id = '$customer_id' AND product_id = '$id'");
			if (isset($_SESSION['cart'][$id])) {
				unset($_SESSION['cart'][$id]);
			}
			break;
		case "empty":
			unset($_SESSION['cart']);
			mysqli_query($conn, "DELETE FROM cart_client WHERE customer_id = '$customer_id'");
			break;
	}

	if (isset($_SESSION['cart'])) {
		$total = 0;
		foreach ($_SESSION['cart'] as $id => $x) {
			$result = mysqli_query($conn, "Select * from product where product_id=$id");
			$myrow = mysqli_fetch_array($result);
			$name = $myrow['product_name'];
			$name = substr($name, 0, 40);
			$price = $myrow['product_price'];
			$image = $myrow['product_image'];
			$product_size = $myrow['product_size'];
			$line_cost = $price * $x;
			$total += $line_cost;
			
			echo "<tr class='table'>";
			echo "<td><h4><img height='70px' width='70px' src='photo/".$image."'></h4></td>";
			echo "<td><h4><input type='hidden' required value='".$id."' name='pid[]'> ".$name."</h4></td>";
			echo "<td><h4>".$product_size."</h4></td>";
			echo "<td><h4><input type='hidden' required value='".$x."' name='qty[]'> ".$x."</h4></td>";
			echo "<td><h4>".$price. " Triệu VND</h4></td>";
			echo "<td><h4><a href='cart.php?id=".$id."&action=add'><i class='icon-plus-sign'></i></a></h4></td>";
			echo "<td><h4><a href='cart.php?id=".$id."&action=remove'><i class='icon-minus-sign'></i></a></h4></td>";
			echo "<td><strong><h3> ".$line_cost." Triệu VND</h3></strong></td>";
			echo "<td ><a id=Delete href='cart.php?id=".$id."&action=delete' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> 🗑️</a></td>";
			echo "</tr>";
		}
		
		echo "<tr>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td><h2 style='color: green;'>💰 TOTAL:</h2></td>";
		echo "<td><strong><input type='hidden' value='".$total."' required name='total'><h2 class='text-danger'> ".$total." Triệu VND</h2></strong></td>";
		echo "<td></td>";
		echo "<td><a class='btn btn-danger btn-sm pull-right' href='cart.php?id=".$id."&action=empty'><i class='fa fa-trash-o'></i>Làm trống giỏ </a></td>";		
		echo "</tr>";
	} else {
		echo "<font color='#111' class='alert alert-error' style='float:right'>Giỏ trống rỗng</font>";
	}
?>
	</table>
	
			
	<div class='pull-right'>
	<a href='product1.php' class='btn btn-inverse btn-lg'>Tiếp tục mua</a>
	<?php echo "<button name='pay_now' type='submit' class='btn btn-inverse btn-lg' >Mua</button>";
	include ("function/paypal.php"); 
	?>
	</form>
	</div>

		<div id="purchase" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Phương thức thanh toán</h3>
			</div>
				<div class="modal-body">
					<form method="post">
					<center>
						<input type="image" src="img/button.jpg" border="0" name="submit" alt="Thanh toán bằng PayPal"  />
						<br/>
						<br/>
						<button class="btn btn-lg" >Cash</button>
					</center>
				</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Đóng</button>
					</form>
			</div>
		</div>	
		<br />		
		<br />	
</div>
<br />
	<div id="footer" style="padding-bottom:80px;padding-top:-20px" >
	<div class="foot" style="margin-top:55px">
			<label style="font-size:17px;color:red;"> CÔNG TY TNHH TIN HỌC THÀNH HIẾU  </label>
			<p style="font-size:12px;">📍🗺️ Địa chỉ: Số 70 Tô Ký, phường Tân Chánh Hiệp, quận 12, Thành phố Hồ Chí Minh <br/>📱 Hotline: 19006767<br/>💌 Email:Thanhhieunetwork@gmail.com</p>
		</div>
			
			<div id="foot" style="margin-top:55px">
				<h4 style="color:orangered;margin-left:5px">Kết nối với chúng tôi</h4>
					<ul>
						<a href="https://www.facebook.com/profile.php?id=100039094961505&mibextid=ZbWKwL" style="text-decoration:none"><li style="color:orange">Facebook <img src="img/facebook.jpg" width="20px" height="20px"></li></a>
						<a href="https://www.tiktok.com/@nguyen_thanh578?_t=8ooQVTWp5A0&_r=1" style="text-decoration:none"><li style="color:orange">Tiktok <img src="img/Tiktok.jpg" width="30px" height="20px"></li></a>
						<a href="https://youtube.com/@tranthanh1738?si=TZ9r8Msl5FiGa7Ao" style="text-decoration:none"><li style="color:orange">Youtube <img src="img/youtube.jpg" width="25px" height="15px"></li></a>
						<a href="s://www.instagram.com/tran.thanh1601?igsh=YzljYTk1ODg3Zg==" style="text-decoration:none;"><li style="color:orange">Instagram <img src="img/Instagram.jpg" width="25px" height="15px"></li></a>
					</ul>
			</div>
			
			<div style="margin-top:55px"><img src="img/qrcode.jpg" width="150px" style="margin:15px 20px 0px 150px" ></div>
	</div>
</body>
</html>
