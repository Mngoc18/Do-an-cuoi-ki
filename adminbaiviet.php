<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost"; // Thay bằng tên máy chủ của bạn
$username = "root";        // Thay bằng tên đăng nhập của bạn
$password = "";            // Thay bằng mật khẩu của bạn
$dbname = "Cuối kì"; // Thay bằng tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý thêm bài viết
if (isset($_POST['add_news'])) {
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $image = $_POST['image'];

    $stmt = $conn->prepare("INSERT INTO news (title, summary, content, image, author) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $summary, $content, $image, $author);
    if ($stmt->execute()) {
        echo "Bài viết đã được thêm thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }
    $stmt->close();
}

// Xử lý sửa bài viết
if (isset($_POST['edit_news'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $image = $_POST['image'];

    $stmt = $conn->prepare("UPDATE news SET title=?, summary=?, content=?, image=?, author=? WHERE id=?");
    $stmt->bind_param("sssssi", $title, $summary, $content, $image, $author, $id);
    if ($stmt->execute()) {
        echo "Bài viết đã được cập nhật!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }
    $stmt->close();
}

// Xử lý xóa bài viết
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM news WHERE id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Bài viết đã được xóa!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }
    $stmt->close();
}

// Lấy danh sách bài viết
$result = $conn->query("SELECT * FROM news");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Quản lý bài viết</title>
    <link rel="stylesheet" href="styles.css"> <!-- Style tùy chỉnh -->
</head>
<body>
    <h1>Quản lý bài viết</h1>
    <h2>Thêm bài viết mới</h2>
    <form method="POST" action="adminbaiviet.php">
        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" required><br>
        <label for="summary">Tóm tắt:</label>
        <textarea name="summary" required></textarea><br>
        <label for="content">Nội dung:</label>
        <textarea name="content" required></textarea><br>
        <label for="image">Đường dẫn ảnh:</label>
        <input type="text" name="image"><br>
        <label for="author">Tác giả:</label>
        <input type="text" name="author" required><br>
        <button type="submit" name="add_news">Thêm bài viết</button>
    </form>

    <h2>Danh sách bài viết</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Tóm tắt</th>
            <th>Ngày tạo</th>
            <th>Thao tác</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['summary']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td>
                    <a href="adminbaiviet.php?edit=<?php echo $row['id']; ?>">Sửa</a> |
                    <a href="adminbaiviet.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa bài viết này?')">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <?php
    // Xử lý chỉnh sửa bài viết
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $stmt = $conn->prepare("SELECT * FROM news WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    ?>
        <h2>Sửa bài viết</h2>
        <form method="POST" action="adminbaiviet.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>
            <label for="summary">Tóm tắt:</label>
            <textarea name="summary" required><?php echo $row['summary']; ?></textarea><br>
            <label for="content">Nội dung:</label>
            <textarea name="content" required><?php echo $row['content']; ?></textarea><br>
            <label for="image">Đường dẫn ảnh:</label>
            <input type="text" name="image" value="<?php echo $row['image']; ?>"><br>
            <label for="author">Tác giả:</label>
            <input type="text" name="author" value="<?php echo $row['author']; ?>" required><br>
            <button type="submit" name="edit_news">Cập nhật bài viết</button>
        </form>
    <?php
    }
    ?>
</body>
</html>

<?php $conn->close(); ?>
