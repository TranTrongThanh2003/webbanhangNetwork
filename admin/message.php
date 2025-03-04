<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thành Hiếu | Chuyên thiết bị mạng chính hãng</title>
	<link rel="icon" href="../img/logo_Network.jpg" />
	<link rel = "stylesheet" type = "text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/carousel.js"></script>
	<script src="../js/button.js"></script>
	<script src="../js/dropdown.js"></script>
	<script src="../js/tab.js"></script>
	<script src="../js/tooltip.js"></script>
	<script src="../js/popover.js"></script>
	<script src="../js/collapse.js"></script>
	<script src="../js/modal.js"></script>
	<script src="../js/scrollspy.js"></script>
	<script src="../js/alert.js"></script>
	<script src="../js/transition.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../javascripts/filter.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<div id="header" style="position:fixed;">
		<img src="../img/logo_Network.jpg">
		<label>Thành Hiếu</label>
		<?php include("../welcome_admin.php"); ?>
			<?php
				$id = (int) $_SESSION['id'];
			
					$query = mysqli_query ($conn, "SELECT * FROM admin WHERE adminid = '$id' ") or die (mysqli_error());
					$fetch = mysqli_fetch_array ($query);
			?>
				
			<ul>
				<li><a href="../function/admin_logout.php"><i class="icon-off icon-white"></i>logout</a></li>
				<li>Welcome:&nbsp;&nbsp;&nbsp;<a><i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
			</ul>
	</div>
	
	<br>
	
	<div id="leftnav">
		<ul>
			<li><a href="admin_home.php" style="color:crimson">Tổng quan</a></li>
			<li><a href="admin_home.php">Sản phẩm</a>
				<ul>
					<li><a href="admin_feature.php "style="font-size:15px; margin-left:15px;">Đặc trưng</a></li>
					<li><a href="admin_product.php "style="font-size:15px; margin-left:15px;">Firewall</a></li>
					<li><a href="admin_switch.php" style="font-size:15px; margin-left:15px;">Switch</a></li>
					<li><a href="admin_router.php"style="font-size:15px; margin-left:15px;">Router</a></li>
				</ul>
			</li>
			<li><a href="transaction.php">Giao dịch</a></li>
			<li><a href="customer.php">Khách hàng</a></li>
			<li><a href="message.php">Tin nhắn</a></li>
			<li><a href="order.php">Sản phẩm đã bán</a></li>
		</ul>
	</div>
	
	<div id="rightcontent" style="position:absolute; top:10%;">
			<div class="alert alert-info"><center><h2>Tin nhắn 💬 </h2></center></div>
			<br />
				<label  style="padding:5px; float:right;"><input type="text" name="filter" placeholder="Tìm kiếm 🔎" id="filter"></label>
			<br />
		
		<div class="alert alert-info">
			<table class="table table-hover" style="background-color:;">
				<thead>
				<tr style="font-size:20px;">
					<th>Email</th>
					<th>Tin nhắn</th>
				</tr>
				</thead>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `contact`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query))
						{
				?>
				<tr>
					<td><?php echo $fetch['email'];?></td>
					<td><?php echo $fetch['message']?></td>
				</tr>		
				<?php
					}
				?>
			</table>
		</div>		
	</div>
</body>
</html>