<!DOCTYPE html>
<html>
<head>
	<title>Thành Hiếu | Chuyên thiết bị mạng chính hãng</title>
	<link rel="icon" href="../img/logo_Network.jpg" />
	<link rel = "stylesheet" type = "text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
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
	<audio id="myAudio" autoplay>
    <source src="../video/welcome_admin.mp3" type="audio/mpeg">
	</audio>
	
</head>
<body style="background:url(../img/bg_admin.jpg) repeat scroll left top #e7ebf2;">
	<div id="header">
		<img src="../img/logo_Network.jpg">
		<label>Thành Hiếu</label>
		<script>
   	 window.onload = function() {
        var audio = document.getElementById("myAudio");
		audio.muted = false;
        audio.play();
    }
		</script>
	<div style="text-align: right; padding-right: 40px;color:gold;font-size:20px">
		<?php 
            date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ Việt Nam
            $current_time = date('d/m/Y '); // Định dạng ngày/tháng/năm 
            echo "Lịch ⏰: ".$current_time; 
        ?>
    </div>
	</div>
	<?php include("../welcome_admin.php"); ?>

		<?php include('../function/admin_login.php');?>
	<div id="admin">
		<h2 align="center" style="color:white;">❤️ XIN CHÀO QUẢN TRỊ VIÊN ❤️</h2>
		<form method="post" class="well" style="background:LimeGreen;border: 3px solid Chartreuse;margin-top:10px">
			<center>
				<legend style= "font-weight:bold; font-size:25px; color:Black"> ĐĂNG NHẬP QUẢN LÝ</legend>
					<table>
						<tr>
							<input type="text" name="username" placeholder="Admin">
						</tr>
						<tr>
							<input type="password" name="password" placeholder="Password">
						</tr>
						<br>
						<br>
							<input type="submit" name="enter" value="Enter" class="btn btn-primary" style="width:200px;">
					</table>
			</center>
		</form>
	</div>
</div>
</body>
</html>