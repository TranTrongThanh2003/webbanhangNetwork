

<?php
// Kết nối đến cơ sở dữ liệu
include('db/dbconn.php');

// Kiểm tra nếu form được gửi đi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];

    // Chuẩn bị câu lệnh SQL để thêm đánh giá mới
    $stmt = $conn->prepare("INSERT INTO reviews (email, comment, rating) VALUES (?, ?, ?)");
    $stmt->bind_param('ssi', $email, $comment, $rating);

    // Kiểm tra nếu thực thi câu lệnh thành công
    if ($stmt->execute()) {
        echo "";
    } else {
        echo "Lỗi: " . $conn->error;
    }

    // Đóng câu lệnh
    $stmt->close();
}

// Lấy tất cả các đánh giá từ cơ sở dữ liệu
$result = $conn->query("SELECT * FROM reviews ORDER BY created_at DESC");

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thành Hiếu | Chuyên thiết bị mạng chính hãng</title>
    <link rel="icon" href="img/logo_Network.jpg" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color:bisque;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: green;
        }
        .review {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 15px 0;
            border-radius: 8px;
            background-color: #fafafa;
        }
        .review .rating {
            font-size: 18px;
            color: gold;
            margin-bottom: 5px;
        }
        .review small {
            color: #888;
        }
        h2 {
            margin-top: 40px;
            color: green;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }
        input[type="email"], select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="reset"] {
            background-color: green;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: crimson;
        }
        input[type="reset"]:hover {
            background-color: orangered;
        }
        .no-reviews {
            text-align: center;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🥇Đánh Giá Sản Phẩm🥇</h1>

    <!-- Hiển thị các đánh giá trước đó -->
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="review">
                <div class="rating"><?php echo str_repeat('★', $row['rating']); ?></div>
                <p><?php echo htmlspecialchars($row['comment']); ?></p>
                <small>Người dùng: <?php echo htmlspecialchars($row['email']); ?> vào ngày <?php echo $row['created_at']; ?></small>
            </div>
        <?php endwhile; ?> 
    <?php else: ?>
        <p class="no-reviews">Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá!</p>
    <?php endif; ?>

    <!-- Form đánh giá mới -->
    <h2>Thực hiện đánh giá của bạn</h2>
    <form action="review.php" method="post">
        <label for="email">Email (bắt buộc):</label>
        <input type="email" id="email" name="email" required>

        <label for="rating">Chất lượng (1 đến 5 sao):</label>
        <select id="rating" name="rating" required>
            <option value="5">★★★★★ (5 sao)</option>
            <option value="4">★★★★☆ (4 sao)</option>
            <option value="3">★★★☆☆ (3 sao)</option>
            <option value="2">★★☆☆☆ (2 sao)</option>
            <option value="1">★☆☆☆☆ (1 sao)</option>
        </select>

        <label for="comment">Bình luận:</label>
        <textarea id="comment" name="comment" rows="4" placeholder="Mời bạn nhập bình luận..." required></textarea>

        <input type="submit" value="Gửi đánh giá">
        <input type="reset" value="Hoàn tác" >
        <a href="index.php" style="border-radius: 4px;padding: 10px 30px;text-decoration:none;color: white;background:DarkViolet">Trang chủ</a>
    </form>
</div>

</body>
</html>

<?php
// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
