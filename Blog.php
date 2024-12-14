<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Bài Tin</title>
    <?php include('header.php'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        h1, h2, h3 {
            color: #333;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 15px;
            text-align: center;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .news-date, .news-author {
            font-size: 14px;
            color: #888;
            margin-bottom: 20px;
        }

        .news-content {
            font-size: 18px;
            line-height: 1.8;
            color: #333;
            margin-bottom: 30px;
            text-align: justify;
        }
        .news-content img {
        width: 100%;            /* Hình ảnh sẽ chiếm toàn bộ chiều rộng của container */
        height: auto;           /* Giữ tỷ lệ khung hình gốc */
        max-width: 100%;        /* Đảm bảo hình ảnh không vượt quá 100% chiều rộng container */
        display: block;         /* Đảm bảo hình ảnh không bị chèn vào dòng text */
        margin: 20px 0;         /* Thêm khoảng cách trên và dưới hình ảnh */
    }
    .news-image-title {
    width: 100%;            /* Hình ảnh sẽ chiếm toàn bộ chiều rộng của container */
    height: auto;           /* Giữ tỷ lệ khung hình gốc */
    max-width: 100%;        /* Đảm bảo hình ảnh không vượt quá 100% chiều rộng container */
    display: block;         /* Đảm bảo hình ảnh không bị chèn vào dòng text */
    margin: 20px 0;         /* Thêm khoảng cách trên và dưới hình ảnh */
    border-radius: 8px;     /* Làm tròn các góc nếu muốn */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Thêm bóng đổ */
}



        .comments {
            margin-top: 40px;
        }

        .comments h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }

        .comments ul {
            list-style: none;
            padding: 0;
        }

        .comments li {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }

        .comments li:hover {
            background-color: #f1f1f1;
        }

        .comments strong {
            color: #444;
        }

        .comments p {
            color: #555;
            font-size: 14px;
            margin-top: 5px;
        }

        .comment-form {
            margin-top: 30px;
        }

        .comment-form input,
        .comment-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .comment-form button {
            background-color: pink;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .comment-form button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Kết nối với cơ sở dữ liệu
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "Cuối kì"; // Kiểm tra lại tên cơ sở dữ liệu nếu có dấu cách hoặc ký tự đặc biệt

        $conn = new mysqli($host, $user, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Lấy thông tin bài tin từ URL và bảo vệ khỏi SQL Injection
        $news_id = isset($_GET['id']) ? (int)$_GET['id'] : 0; // Chuyển id về kiểu số nguyên

        // Nếu $news_id không phải là một số hợp lệ
        if ($news_id <= 0) {
            die("ID bài tin không hợp lệ.");
        }

        // Sử dụng prepared statement để tránh SQL Injection
        $sql = "SELECT * FROM news WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $news_id); // 'i' nghĩa là integer
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $news = $result->fetch_assoc();
            // Hiển thị thông tin bài tin
            echo "<h2>" . htmlspecialchars($news['title']) . "</h2>";
            echo "<p class='news-author'><strong>Tác giả: </strong>" . htmlspecialchars($news['author']) . "</p>";
            echo "<p class='news-date'><strong>Ngày đăng: </strong>" . htmlspecialchars($news['date']) . "</p>";
            if (!empty($news['image'])) {
                echo "<img src='/" . htmlspecialchars($news['image']) . "' alt='Image for " . htmlspecialchars($news['title']) . "' class='news-image-title'>";
            }                  
            echo "<div class='news-content'>" . $news['content'] . "</div>";
        } else {
            echo "Không tìm thấy bài tin.";
        }

        // Hiển thị bình luận
        $sql_comments = "SELECT * FROM comments WHERE news_id = ?";
        $stmt_comments = $conn->prepare($sql_comments);
        $stmt_comments->bind_param("i", $news_id); // 'i' nghĩa là integer
        $stmt_comments->execute();
        $result_comments = $stmt_comments->get_result();

        if ($result_comments->num_rows > 0) {
            echo "<div class='comments'>";
            echo "<h3>Bình luận</h3><ul>";
            while ($comment = $result_comments->fetch_assoc()) {
                echo "<li><strong>" . htmlspecialchars($comment['author']) . ":</strong> " . htmlspecialchars($comment['text']) . "</li>";
            }
            echo "</ul></div>";
        } else {
            echo "<p>Không có bình luận.</p>";
        }

        // Xử lý gửi bình luận
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $author = htmlspecialchars($_POST['author']);
            $comment_text = htmlspecialchars($_POST['comment_text']);
            if (!empty($author) && !empty($comment_text)) {
                // Thêm bình luận vào cơ sở dữ liệu
                $sql_insert = "INSERT INTO comments (news_id, author, text) VALUES (?, ?, ?)";
                $stmt_insert = $conn->prepare($sql_insert);
                $stmt_insert->bind_param("iss", $news_id, $author, $comment_text);
                if ($stmt_insert->execute()) {
                    echo "<p>Bình luận của bạn đã được gửi.</p>";
                } else {
                    echo "<p>Lỗi khi gửi bình luận.</p>";
                }
            } else {
                echo "<p class='error-message'>Vui lòng điền đủ thông tin.</p>";
            }
        }

        // Đóng kết nối
        $conn->close();
        ?>

        <!-- Form gửi bình luận -->
        <div class="comment-form">
            <h3>Gửi bình luận</h3>
            <form method="POST" action="">
                <input type="text" name="author" placeholder="Tên của bạn" required>
                <textarea name="comment_text" rows="4" placeholder="Nội dung bình luận" required></textarea>
                <button type="submit">Gửi bình luận</button>
            </form>
        </div>
    </div>
</body>
<?php include('footer.php'); ?>
</html>
