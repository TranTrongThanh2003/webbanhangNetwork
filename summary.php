<?php
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id = 'yhannaki@gmail.com'; // Business email ID
include("function/session.php");
include("db/dbconn.php");

// Xử lý yêu cầu hủy đơn hàng
if (isset($_GET['cancel_order']) && $_GET['cancel_order'] == '1') {
    $t_id = $_GET['tid'];
    mysqli_query($conn, "UPDATE transaction SET order_stat = 'Đã hủy đơn hàng' WHERE transaction_id = '$t_id'") or die(mysqli_error($conn));
    header("Location: summary.php?tid=".$t_id); // Điều hướng lại để làm mới trang
    exit();
}
?>
<html>
<head>
    <title>Thành Hiếu | Chuyên thiết bị mạng chính hãng</title>
    <link rel="icon" href="img/logo_Network.jpg" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>

<div id="header">
    <img src="img/logo_Network.jpg">
    <label>Thành Hiếu</label>
    <?php
    $id = (int) $_SESSION['id'];

    $query = mysqli_query($conn, "SELECT * FROM customer WHERE customerid = '$id'") or die(mysqli_error($conn));
    $customer = mysqli_fetch_array($query);
    ?>
    <ul>
        <li><a href="function/logout.php"><i class="icon-off icon-white"></i>logout</a></li>
        <li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile" data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $customer['firstname']; ?>&nbsp;<?php echo $customer['lastname']; ?></a></li>
    </ul>
</div>

<br>
<div id="container">
    <div class="nav">    
        <ul>
            <li><a href="home.php"><i class="icon-home"></i> Trang chủ</a></li>
            <li><a href="product1.php"><i class="icon-th-list"></i>Sản phẩm</a></li>
            <li><a href="aboutus1.php"><i class="icon-bookmark"></i>Giới thiệu</a></li>
            <li><a href="contactus1.php"><i class="icon-inbox"></i>Liên hệ</a></li>
            <li><a href="privacy1.php"><i class="icon-info-sign"></i>Bảo hành</a></li>
            <li><a href="faqs1.php"><i></i>🚚 Chính sách giao hàng</a></li>
            <li><a href="review.php">📊 Đánh giá</a></li>
            <li><a href="promotion1.php">🎁  Khuyến mãi</a></li>
            <li><a href="address1.php">🌍 Địa điểm</a></li>
        </ul>
    </div>

    <form method="post" class="well" style="background-color:#fff; overflow:hidden;">
    <label style="font-size:25px;color:green">Đơn hàng của tôi 📋 </label>
        <h4>Thông tin khách hàng</h4>
        <p><strong>Tên khách hàng:</strong> <?php echo $customer['firstname'] . ' ' . $customer['lastname']; ?></p>
        <p><strong>Địa chỉ giao hàng:</strong> <?php echo $customer['address'] .  ', ' . $customer['country']; ?></p>
        <p><strong>Email:</strong> <?php echo $customer['email']; ?></p>
        <p><strong>Số điện thoại:</strong> <?php echo $customer['mobile']; ?></p>

        <br />

        <table class="table" style="width:50%;">
            <tr>
                <th><h5>Số lượng</h5></th>
                <th><h5>Tên sản phẩm</h5></th>
                <th><h5>Size</h5></th>
                <th><h5>Giá cả</h5></th>
            </tr>

            <?php
            $t_id = $_GET['tid'];
            $query = mysqli_query($conn, "SELECT * FROM transaction WHERE transaction_id = '$t_id'") or die (mysqli_error($conn));
            $fetch = mysqli_fetch_array($query);

            $amnt = $fetch['amount'];
            $order_status = $fetch['order_stat'];

            $query2 = mysqli_query($conn, "SELECT * FROM transaction_detail LEFT JOIN product ON product.product_id = transaction_detail.product_id WHERE transaction_detail.transaction_id = '$t_id'") or die (mysqli_error($conn));
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

                // Thêm thông tin vào bảng order_client và lấy order_id
                $insert_order_query = "INSERT INTO order_client (
                     customerid, customer_name, address, country, email, mobile,
                    product_name, quantity, size, price, total_price, order_status
                ) VALUES (
                    '{$customer['customerid']}', 
                    '{$customer['firstname']} {$customer['lastname']}', 
                    '{$customer['address']}', 
                    '{$customer['country']}', 
                    '{$customer['email']}', 
                    '{$customer['mobile']}', 
                    '{$pname}', 
                    '{$oqty}', 
                    '{$psize}', 
                    '{$pprice}', 
                    '{$amnt}', 
                    '{$order_status}'
                )";

                mysqli_query($conn, $insert_order_query) or die(mysqli_error($conn));

                // Lấy order_id vừa được thêm vào
                $order_id = mysqli_insert_id($conn);
            }
            ?>

        </table>
        <legend></legend>
        <h4>Tổng cộng: <?php echo $amnt; ?> Triệu VND</h4>
        <h4 style="color:orangered">Trạng thái đơn hàng: <?php echo $order_status; ?></h4> <!-- Hiển thị trạng thái đơn hàng -->
        <h4 style="color:blue">Mã đơn hàng: <?php echo $t_id; ?></h4> <!-- Hiển thị Order ID từ transaction_id -->
        
        <?php if ($order_status == 'Đã xác nhận đơn hàng') : ?>
            <h4 style="color:crimson">Đơn hàng đã xác nhận thành công ✅</h4> <!-- Thông báo khi đơn hàng được xác nhận -->
        <?php elseif ($order_status == 'Đã hủy đơn hàng') : ?>
            <h4 style="color:crimson">Thanh toán thất bại/Đơn hàng bị hủy</h4> <!-- Thông báo khi đơn hàng bị hủy -->
        <?php elseif ($order_status == 'Đang giao hàng') : ?>
            <!-- Nút hủy đơn hàng chỉ hiển thị nếu trạng thái đơn hàng là "On Hold" -->
            <a href="summary.php?tid=<?php echo $t_id; ?>&cancel_order=1" class="btn btn-danger">Hủy Đơn Hàng</a>
        <?php endif; ?>
    </form>
    <!-- <?php // Thêm nút "Xem đơn hàng" mới
			echo "<a href='order_client.php?id=" . $id . "' style='right:1%; position:fixed; top:20%;'><button class='btn btn-info'>Xem đơn hàng</button></a>";
            ?> -->

    <div class='pull-right'>
        <div class="">
            <form action="<?php echo $paypal_url ?>" method="post">
                <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="item_name" value="Thanh Hieu Network">
                <input type="hidden" name="item_number" value="<?php echo $t_id; ?>">
                <input type="hidden" name="credits" value="510">
                <input type="hidden" name="userid" value="1">
                <input type="hidden" name="amount" value="<?php echo $amnt; ?>">
                <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
                <input type="hidden" name="no_shipping" value="1">
                <input type="hidden" name="currency_code" value="PHP">
                <input type="hidden" name="handling" value="0">
                <input type="hidden" name="cancel_return" value="function/cancel.php">
                <input type="hidden" name="return" value="function/success.php">
                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form> 
        </div>
    </div>
</div>

<br />
<div id="footer" style="padding-bottom:80px;padding-top:-20px" >
    <div class="foot" style="margin-top:55px">
        <label style="font-size:17px;color:red;"> CÔNG TY TNHH TIN HỌC THÀNH HIẾU  </label>
        <p style="font-size:12px;">📍🗺️ Địa chỉ: Số 70 Tô Ký, phường Tân Chánh Hiệp, quận 12, Thành phố Hồ Chí Minh <br/>📱 Hotline: 19006767<br/>💌 Email: Thanhhieunetwork@gmail.com</p>
    </div>
        
    <div id="foot" style="margin-top:55px">
        <h4 style="color:orangered;margin-left:5px">Kết nối với chúng tôi</h4>
        <ul>
            <a href="https://www.facebook.com/profile.php?id=100039094961505&mibextid=ZbWKwL" style="text-decoration:none"><li style="color:orange">Facebook <img src="img/facebook.jpg" width="20px" height="20px"></li></a>
            <a href="https://www.tiktok.com/@nguyen_thanh578?_t=8ooQVTWp5A0&_r=1" style="text-decoration:none"><li style="color:orange">Tiktok <img src="img/Tiktok.jpg" width="30px" height="20px"></li></a>
            <a href="https://youtube.com/@tranthanh1738?si=TZ9r8Msl5FiGa7Ao" style="text-decoration:none"><li style="color:orange">Youtube <img src="img/youtube.jpg" width="25px" height="15px"></li></a>
            <a href="https://www.instagram.com/tran.thanh1601?igsh=YzljYTk1ODg3Zg==" style="text-decoration:none;"><li style="color:orange">Instagram <img src="img/Instagram.jpg" width="25px" height="15px"></li></a>
        </ul>
    </div>
        
    <div style="margin-top:55px"><img src="img/qrcode.jpg" width="150px" style="margin:15px 20px 0px 150px" ></div>
</div>
</body>
</html>
