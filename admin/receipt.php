<?php
	include("../function/session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thành Hiếu | Chuyên thiết bị mạng chính hãng</title>
	<link rel="icon" href="../img/logo_Network.jpg" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="../js/bootstrap.js"></script>
	<!-- Các tệp tin khác -->
	
	<script language="javascript" type="text/javascript">
		function printDiv(divID) {
			// Lấy nội dung của phần div
			var divElements = document.getElementById(divID).innerHTML;
			// Lưu nội dung hiện tại của trang
			var oldPage = document.body.innerHTML;

			// Đặt lại nội dung trang chỉ với nội dung của div cần in
			document.body.innerHTML = 
				"<html><head><title></title></head><body>" + 
				divElements + "</body>";

			// In nội dung
			window.print();

			// Khôi phục lại nội dung ban đầu của trang
			document.body.innerHTML = oldPage;
		}
	</script>
</head>
<body>
	<!-- Các phần khác của trang -->

	<div id="rightcontent" style="position:absolute; top:10%;">
		<div class="alert alert-info"><center><h2>Giao dịch</h2></center></div>
		<br />

		<div class="alert alert-info">
			<form method="post" class="well" style="background-color:#fff; overflow:hidden;">
				<div id="printablediv">
					<center> 
						<table class="table" style="width:50%;">
							<label style="font-size:25px;">Thành Hiếu</label>
							<label style="font-size:20px;">Biên nhận chính thức</label>
							<tr>
								<th><h5>Số lượng</h5></td>
								<th><h5>Tên sản phẩm</h5></td>
								<th><h5>Size</h5></td>
								<th><h5>Giá cả</h5></td>
							</tr>
							
							<?php
							$t_id = $_GET['tid'];
							$query = mysqli_query($conn, "SELECT * FROM transaction WHERE transaction_id = '$t_id'") or die (mysqli_error());
							$fetch = mysqli_fetch_array($query);
							
							$customer_id = $fetch['customerid'];
							$amnt = $fetch['amount'];
							
							// Truy vấn thông tin khách hàng
							$query_customer = mysqli_query($conn, "SELECT * FROM customer WHERE customerid = '$customer_id'") or die(mysqli_error());
							$customer = mysqli_fetch_array($query_customer);
							
							// Hiển thị thông tin khách hàng
							echo "<h4>Khách hàng: " . $customer['firstname'] . " " . $customer['lastname'] . "</h4>";
							echo "<h5>Địa chỉ: " . $customer['address'] . ", " . $customer['country'] . "</h5>";
							echo "<h5>Mã bưu chính: " . $customer['zipcode'] . "</h5>";
							echo "<h5>ĐT cá nhân: " . $customer['mobile'] . "</h5>";
							echo "<h5>Email: " . $customer['email'] . "</h5>";
							echo "<h5>Thời gian : " . $fetch['order_date'] . "</h5>";
							
							// Truy vấn chi tiết giao dịch
							$query2 = mysqli_query($conn, "SELECT * FROM transaction_detail LEFT JOIN product ON product.product_id = transaction_detail.product_id WHERE transaction_detail.transaction_id = '$t_id'") or die (mysqli_error());
							while($row = mysqli_fetch_array($query2)){
								$pname = $row['product_name'];
								$psize = $row['product_size'];
								$pprice = $row['product_price'];
								$oqty = $row['order_qty'];
								
								echo "<tr>";
								echo "<td>".$oqty."</td>";
								echo "<td>".$pname."</td>";
								echo "<td>".$psize."</td>";
								echo "<td>".$pprice." Triệu VND</td>";
								echo "</tr>";
							}
							?>

						</table>
						<legend></legend>
						<h4>Tổng: <?php echo $amnt; ?> Triệu VND</h4>
					</center>
				</div>
				
				<div class='pull-right'>
					<div class="add"><a onclick="javascript:printDiv('printablediv')" name="print" style="cursor:pointer;" class="btn btn-info"><i class="icon-white icon-print"></i>In biên lai</a></div>
				</div>
			</form>
		</div>
	</div>	
</body>
</html>
