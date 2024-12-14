<style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    font-size: 2.5rem;
    color: #333;
    margin-top: 50px;
}

/* Container for news list */
.news-list {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 cột, mỗi cột có chiều rộng bằng nhau */
    gap: 20px;
    padding: 20px;
    max-width: 80%; /* Đảm bảo container không vượt quá chiều rộng */
    box-sizing: border-box;
    margin-left: 140px;
}

/* Individual news item */
.news-item {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}.news-item img {
    width: 100%; /* Chiếm toàn bộ chiều rộng của container */
    max-width: 400px; /* Giới hạn chiều rộng tối đa */
    height: auto; /* Giữ tỷ lệ ảnh */
    margin-bottom: 15px; /* Khoảng cách giữa ảnh và tiêu đề */
    border-radius: 8px; /* Làm tròn các góc ảnh */
}


.news-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Title styles */
.news-item h2 {
    font-size: 1.8rem;
    color: #e90074;
    margin: 0;
}

.news-item h2 a {
    color: #e90074;
    text-decoration: none;
    transition: color 0.3s;
}

.news-item h2 a:hover {
    color: #f732ae;
}

/* Date and summary styles */
.news-item .date {
    font-size: 1rem;
    color: #777;
    margin-bottom: 10px;
}

.news-item .summary {
    font-size: 1.1rem;
    color: #555;
    line-height: 1.6;
    margin-bottom: 15px;
}

/* Responsiveness */
@media (max-width: 768px) {
    .news-list {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 480px) {
    .news-list {
        grid-template-columns: 1fr;
    }
    
    h1 {
        font-size: 2rem;
    }
}

</style>
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
include('header.php'); 
// Truy vấn tất cả bài viết
$sql = "SELECT * FROM news ORDER BY date DESC"; // Sắp xếp bài viết theo ngày (mới nhất lên đầu)
$result = $conn->query($sql);

// Kiểm tra có bài viết nào trong cơ sở dữ liệu hay không
if ($result->num_rows > 0) {
    // Hiển thị danh sách bài viết
    echo "<h1>BLOG</h1>";
    echo "<div class='news-list'>";
    
    while ($news = $result->fetch_assoc()) {
        echo "<div class='news-item'>";
        if (!empty($news['image'])) {
            echo "<img src='/" . htmlspecialchars($news['image']) . "' alt='Image for " . htmlspecialchars($news['title']) . "'>";
        }        
        echo "<h2><a href='Blog.php?id=" . $news['id'] . "'>" . htmlspecialchars($news['title']) . "</a></h2>";
        echo "<p class='date'><strong>Ngày đăng:</strong> " . htmlspecialchars($news['date']) . "</p>";
        echo "<p class='news-author'><strong>Tác giả: </strong>" . htmlspecialchars($news['author']) . "</p>"; 
        echo "<p class='summary'>" . htmlspecialchars(substr($news['content'], 0, 150)) . "...</p>"; // Hiển thị phần mô tả ngắn
        echo "</div>";
    }

    echo "</div>";
} else {
    echo "<p>Không có bài viết nào.</p>";
}

$conn->close();
?>
<?php include('footer.php'); ?>
