<?php
include("function/session.php");
include("db/dbconn.php");

// Lấy ID người dùng từ phiên làm việc
$user_id = $_SESSION['id']; 

// Hủy đơn hàng
if (isset($_GET['cancel_id'])) {
    $id = $_GET['cancel_id'];
    // Chỉ hủy đơn hàng nếu nó thuộc về người dùng hiện tại
    $result = mysqli_query($conn, "SELECT * FROM transaction WHERE transaction_id = '$id' AND customerid = '$user_id'");
    if (mysqli_num_rows($result) > 0) {
        mysqli_query($conn, "UPDATE transaction SET order_stat = 'Đã hủy đơn hàng' WHERE transaction_id = '$id'") or die(mysqli_error($conn));
    }
    header("Location: order_client.php");
    exit();
}

// Thêm sản phẩm vào đơn hàng
if (isset($_POST['add_product'])) {
    $transaction_id = $_POST['transaction_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Thêm sản phẩm vào chi tiết đơn hàng
    mysqli_query($conn, "INSERT INTO transaction_detail (transaction_id, product_id, order_qty) VALUES ('$transaction_id', '$product_id', '$quantity')") or die(mysqli_error($conn));

    header("Location: order_client.php?edit_id=".$transaction_id);
    exit();
}

// Xóa sản phẩm khỏi đơn hàng
if (isset($_GET['delete_product_id'])) {
    $transaction_id = $_GET['edit_id'];
    $product_id = $_GET['delete_product_id'];

    // Xóa sản phẩm khỏi chi tiết đơn hàng
    mysqli_query($conn, "DELETE FROM transaction_detail WHERE transaction_id = '$transaction_id' AND product_id = '$product_id'") or die(mysqli_error($conn));

    header("Location: order_client.php?edit_id=".$transaction_id);
    exit();
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Thành Hiếu | Chuyên thiết bị mạng chính hãng</title>
    <link rel="icon" href="img/logo_Network.jpg" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        .container {
            margin-top: 60px;
        }
        table.table-bordered {
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid black;
        }
        th, td {
            text-align: center;
            vertical-align: middle !important;
        }
        .btn-mini {
            font-size: 12px;
            padding: 3px 10px;
        }
    </style>
</head>
<body>

<div id="header">
    <img src="img/logo_Network.jpg">
    <label>Thành Hiếu</label>

    <?php
    include("welcome.php");
    $id = (int) $_SESSION['id'];

    $query = mysqli_query($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die(mysqli_error());
    $fetch = mysqli_fetch_array($query);
    ?>
    <ul>
        <li><a href="function/logout.php"><i class="icon-off icon-white"></i>logout</a></li>
        <li>Welcome:&nbsp;&nbsp;&nbsp;<a href="#profile" href data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['firstname']; ?>&nbsp;<?php echo $fetch['lastname']; ?></a></li>
    </ul>
</div>

<div class="container">
    <h2>Đơn hàng của tôi</h2>
    <table class="table table-bordered">
        <thead>
            <tr style="color:green">
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái đơn hàng</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Lấy danh sách đơn hàng của người dùng hiện tại
        $query = mysqli_query($conn, "SELECT transaction.transaction_id, transaction.order_stat, transaction.amount, customer.firstname, customer.lastname 
                                      FROM transaction 
                                      LEFT JOIN customer ON transaction.customerid = customer.customerid 
                                      WHERE transaction.customerid = '$user_id'") 
                                      or die(mysqli_error($conn));
        while($row = mysqli_fetch_array($query)){
            $id = $row['transaction_id'];
            $o_stat = $row['order_stat'];
            ?>
            <tr>
                <td><?php echo $row['transaction_id']; ?></td>
                <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                <td><?php echo $row['amount']; ?> Triệu VND</td>
                <td><?php echo $row['order_stat']; ?></td>
                <td>
                    <a href="admin/receipt.php?tid=<?php echo $id; ?>" class="btn btn-mini btn-primary">View</a>
                    <?php 
                    if($o_stat == 'Đã hủy đơn hàng'){
                        echo ' | <span class="badge badge-danger">Đã hủy đơn hàng</span>';
                    } else {
                        echo ' | <a class="btn btn-mini btn-danger" href="order_client.php?cancel_id='.$id.'" onclick="return confirm(\'Bạn có chắc chắn muốn hủy đơn hàng này không?\');">Hủy</a>';
                        echo ' | <a class="btn btn-mini btn-warning" href="order_client.php?edit_id='.$id.'">Sửa</a>';
                    }                    
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <!-- Form Sửa Đơn Hàng -->
    <?php if (isset($_GET['edit_id'])): ?>
        <?php
        $transaction_id = $_GET['edit_id'];
        // Lấy chi tiết đơn hàng
        $order_query = mysqli_query($conn, "SELECT td.*, p.product_name FROM transaction_detail td 
                                            LEFT JOIN product p ON td.product_id = p.product_id 
                                            WHERE td.transaction_id = '$transaction_id'") 
                                            or die(mysqli_error($conn));
        ?>
        <h3>Sửa Đơn Hàng ID: <?php echo $transaction_id; ?></h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php while($order_row = mysqli_fetch_array($order_query)): ?>
                <tr>
                    <td><?php echo $order_row['product_name']; ?></td>
                    <td><?php echo $order_row['order_qty']; ?></td>
                    <td>
                        <a href="order_client.php?edit_id=<?php echo $transaction_id; ?>&delete_product_id=<?php echo $order_row['product_id']; ?>" class="btn btn-mini btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi đơn hàng không?');">Xóa</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Form Thêm Sản Phẩm -->
        <h4>Thêm sản phẩm mới</h4>
        <form method="post" action="">
            <input type="hidden" name="transaction_id" value="<?php echo $transaction_id; ?>">
            <label for="product_id">Chọn sản phẩm:</label>
            <select name="product_id" required>
                <?php
                $product_query = mysqli_query($conn, "SELECT * FROM product") or die(mysqli_error($conn));
                while($product_row = mysqli_fetch_array($product_query)){
                    echo "<option value='".$product_row['product_id']."'>".$product_row['product_name']."</option>";
                }
                ?>
            </select>
            <label for="quantity">Số lượng:</label>
            <input type="number" name="quantity" min="1" required>
            <button type="submit" name="add_product" class="btn btn-success">Thêm sản phẩm</button>
        </form>
    <?php endif; ?>
</div>
<a href="product1.php" style="border-radius: 4px;margin-left:1230px ;padding: 10px 30px;text-decoration:none;color: white;background:DarkViolet;">Quay lại</a>
<div id="footer" style="bottom:0%;margin-top:220px;padding-bottom:80px">
    <div class="foot">
        <label style="font-size:17px; color:red"> CÔNG TY TNHH TIN HỌC THÀNH HIẾU </label>
        <p style="font-size:12px;">📍🗺️ Địa chỉ: Số 70 Tô Ký, phường Tân Chánh Hiệp, quận 12, TPHCM</p>
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
