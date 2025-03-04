<?php
include("function/session.php");
include("db/dbconn.php");

// Lấy thông tin người dùng và ID đơn hàng
$user_id = $_SESSION['id'];
$order_id = $_GET['order_id']; // Nhận ID đơn hàng từ URL

// Kiểm tra nếu đơn hàng thuộc về người dùng hiện tại
$query = mysqli_query($conn, "SELECT * FROM transaction WHERE transaction_id = '$order_id' AND customerid = '$user_id'") or die(mysqli_error($conn));
if (mysqli_num_rows($query) == 0) {
    echo "Đơn hàng không tồn tại hoặc bạn không có quyền truy cập.";
    exit();
}

// Xử lý cập nhật sản phẩm trong đơn hàng
if (isset($_POST['update'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    
    // Cập nhật số lượng sản phẩm trong chi tiết đơn hàng
    mysqli_query($conn, "UPDATE transaction_detail SET order_qty = '$quantity' WHERE transaction_id = '$order_id' AND product_id = '$product_id'") or die(mysqli_error($conn));
    echo "Đã cập nhật sản phẩm thành công!";
}

// Xử lý xóa sản phẩm khỏi đơn hàng
if (isset($_GET['delete_product_id'])) {
    $product_id = $_GET['delete_product_id'];
    
    // Xóa sản phẩm khỏi chi tiết đơn hàng
    mysqli_query($conn, "DELETE FROM transaction_detail WHERE transaction_id = '$order_id' AND product_id = '$product_id'") or die(mysqli_error($conn));
    echo "Đã xóa sản phẩm thành công!";
    header("Location: edit_order.php?order_id=$order_id");
    exit();
}

// Lấy danh sách sản phẩm trong đơn hàng
$query_products = mysqli_query($conn, "SELECT * FROM transaction_detail LEFT JOIN product ON product.product_id = transaction_detail.product_id WHERE transaction_detail.transaction_id = '$order_id'") or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Sửa Đơn Hàng</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <h2>Sửa Đơn Hàng</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_array($query_products)) { ?>
            <tr>
                <td><?php echo $row['product_name']; ?></td>
                <td>
                    <form method="post" action="edit_order.php?order_id=<?php echo $order_id; ?>">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                        <input type="number" name="quantity" value="<?php echo $row['order_qty']; ?>" min="1">
                        <button type="submit" name="update" class="btn btn-success btn-sm">Cập nhật</button>
                    </form>
                </td>
                <td><?php echo $row['product_price']; ?> Triệu VND</td>
                <td>
                    <a href="edit_order.php?order_id=<?php echo $order_id; ?>&delete_product_id=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">Xóa</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="order_client.php" class="btn btn-primary">Quay lại</a>
</div>
</body>
</html>
