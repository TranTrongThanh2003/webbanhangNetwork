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
	
	
		<script type="text/javascript" src="../chart/chart.js"></script>

	<script src="../chart/highcharts.js"></script>
	<script src="../chart/exporting.js"></script>

		<script type="text/javascript">
$(function () {

    // Make monochrome colors and set them as default for all pies
    Highcharts.getOptions().plotOptions.pie.colors = (function () {
        var colors = [],
            base = Highcharts.getOptions().colors[0],
            i;

        for (i = 0; i < 10; i += 1) {
            // Start out with a darkened base color (negative brighten), and end
            // up with a much brighter color
            colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
        }
        return colors;
    }());

    // Build the chart
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Thị phần sản phẩm theo danh mục đến năm <?php echo $date = date("Y"); ?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Share',
            data: [
				<?php 
				$result = mysqli_query($conn, "SELECT category FROM product GROUP BY category");
				while($row = mysqli_fetch_array($result)){
				
				$category = $row['category'];
				
				$result1 = mysqli_query($conn, "SELECT * FROM product WHERE category = '$category'");
				$row1 = mysqli_num_rows($result1);
				
				echo "['".$category."',   ".$row1."],";
				
				}
				?>
				
            ]
        }]
    });
});
		</script>

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
			<li><a href="admin_home.php" >Sản phẩm</a>
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
	
	<div id="container" style="min-width: 310px; height: 600px; max-width: 1000px; margin: 0 auto; background:none; float:left;"></div>

				
	
	</div>

</body>
</html>
