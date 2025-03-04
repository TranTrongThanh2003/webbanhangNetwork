<?php
include("../function/session.php");
include("../db/dbconn.php");

// Xác nhận đơn hàng
if (isset($_GET['confirm_id'])) {
    $id = $_GET['confirm_id'];
    mysqli_query($conn, "UPDATE transaction SET order_stat = 'Đã xác nhận đơn hàng' WHERE transaction_id = '$id'") or die(mysqli_error($conn));
    header("Location: transaction.php");
    exit();
}

// Hủy đơn hàng
if (isset($_GET['cancel_id'])) {
    $id = $_GET['cancel_id'];
    mysqli_query($conn, "UPDATE transaction SET order_stat = 'Đã hủy đơn hàng' WHERE transaction_id = '$id'") or die(mysqli_error($conn));
    header("Location: transaction.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thành Hiếu | Chuyên thiết bị mạng chính hãng</title>
    <!-- Thêm favicon -->
    <link rel="icon" href="../img/logo_Network.jpg" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <style>
        .container {
            margin-top: 30px;
        }
        table.table-bordered {
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
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
<div class="container">
    <h2>Quản lý đơn hàng</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> ID</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái đơn hàng</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $query = mysqli_query($conn, "SELECT transaction.transaction_id, transaction.order_stat, transaction.amount, customer.firstname, customer.lastname 
                                      FROM transaction 
                                      LEFT JOIN customer ON transaction.customerid = customer.customerid") 
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
                    <a href="receipt.php?tid=<?php echo $id; ?>" class="btn btn-mini btn-primary">View</a>
                    <?php 
                    if($o_stat == 'Đã xác nhận đơn hàng'){
                        echo ' | <span class="badge badge-success">Đã xác nhận</span>';
                    } elseif($o_stat == 'Đã hủy đơn hàng'){
                        echo ' | <span class="badge badge-danger">Đã hủy</span>';
                    } else {
                        echo ' | <a class="btn btn-mini btn-info" href="transaction.php?confirm_id='.$id.'">Xác nhận</a> ';
                        echo ' | <a class="btn btn-mini btn-danger" href="transaction.php?cancel_id='.$id.'">Hủy</a>';
                    }                    
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<a href="admin_home.php" style="border-radius: 4px;margin-left:1230px ;padding: 10px 30px;text-decoration:none;color: white;background:DarkViolet;">Quay lại</a>
</body>
</html>
