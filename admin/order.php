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
    <script src="../jscript/jquery-1.9.1.js" type="text/javascript"></script>
    
    <!--Le Facebox-->
    <link href="../facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="../facefiles/jquery-1.9.js" type="text/javascript"></script>
    <script src="../facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
    <script src="../facefiles/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox() 
    })
    </script>
    
    <script language="javascript" type="text/javascript">
        function printFunc(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
        }
    </script>
</head>
<body>
    <div id="header" style="position:fixed;">
        <img src="../img/logo_Network.jpg">
        <label>Thành Hiếu</label>
        <?php include("../welcome_admin.php"); ?>
            <?php
                $id = (int) $_SESSION['id'];
                $query = mysqli_query($conn, "SELECT * FROM admin WHERE adminid = '$id' ") or die (mysqli_error());
                $fetch = mysqli_fetch_array($query);
            ?>
                
            <ul>
                <li><a href="../function/admin_logout.php"><i class="icon-off icon-white"></i>logout</a></li>
                <li>Welcome:&nbsp;&nbsp;&nbsp;<i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
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
        <div class="alert alert-info"><center><h2>Đơn hàng đã chốt 📋</h2></center></div>
        <br />
        <div style='width:975px;' class="alert alert-info">
            <table class="table table-hover">    
                <thead>    
                    <th>Thiết bị đã bán</th>
                    <th>Giao dịch No.</th>
                    <th>ID Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                </thead>
                <tbody>
                    <?php 
                    $Q1 = mysqli_query($conn, "SELECT * FROM transaction WHERE order_stat = 'Confirmed'");
                    while($r1 = mysqli_fetch_array($Q1)){
                    
                        $tid = $r1['transaction_id'];
                        
                        // Lấy tất cả các sản phẩm liên quan đến transaction_id
                        $Q2 = mysqli_query($conn, "SELECT * FROM transaction_detail 
                                                    LEFT JOIN product ON product.product_id = transaction_detail.product_id 
                                                    WHERE transaction_detail.transaction_id = '$tid' ");
                        while($r2 = mysqli_fetch_array($Q2)) {
                            $pid = $r2['product_id'];
                            $o_qty = $r2['order_qty'];
                            $p_price = $r2['product_price'];
                            $brand = $r2['product_name'];
                            
                            echo "<tr>";
                            echo "<td>".$brand."</td>";
                            echo "<td>".$tid."</td>";
                            echo "<td>".$pid."</td>";
                            echo "<td>".$o_qty."</td>";
                            echo "<td>".formatMoney($p_price)." Triệu VND"."</td>";
                            echo "</tr>";
                        }
                    }
                    
                    $Q3 = mysqli_query($conn, "SELECT sum(amount) FROM transaction WHERE order_stat = 'Confirmed'");
                    while($r3 = mysqli_fetch_array($Q3)){
                        $amnt = $r3['sum(amount)'];
                        echo "<tr><td></td><td style='color:crimson;font-weight:bold;font-size:15px'>TỔNG TIỀN THU ĐƯỢC : </td> <td><b style='color:green;font-weight:bold;font-size:15px'> ".formatMoney($amnt)." Triệu VND</b></td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        function formatMoney($number, $fractional=false) {
            if ($fractional) {
                $number = sprintf('%.2f', $number);
            }
            while (true) {
                $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                if ($replaced != $number) {
                    $number = $replaced;
                } else {
                    break;
                }
            }
            return $number;
        }
        ?>
    </div>
</form>
</div>        
</body>
</html>
