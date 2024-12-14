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

// Xử lý thêm sản phẩm
if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $mainimage = $_POST['mainimage'];
    $category = $_POST['category'];

    $sql = "INSERT INTO product (product_name, price, mainimage, category) VALUES ('$product_name', '$price', '$mainimage', '$category')";
    if ($conn->query($sql) === TRUE) {
        echo "Sản phẩm đã được thêm thành công.";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Xử lý sửa sản phẩm
if (isset($_POST['edit_product'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $mainimage = $_POST['mainimage'];
    $category = $_POST['category'];

    $sql = "UPDATE product SET product_name='$product_name', price='$price', mainimage='$mainimage', category='$category' WHERE product_id=$product_id";
    if ($conn->query($sql) === TRUE) {
        echo "Sản phẩm đã được sửa thành công.";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Xử lý xoá sản phẩm
if (isset($_GET['delete_id'])) {
    $product_id = $_GET['delete_id'];
    $sql = "DELETE FROM product WHERE product_id=$product_id";
    if ($conn->query($sql) === TRUE) {
        echo "Sản phẩm đã được xoá thành công.";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

// Lấy danh sách sản phẩm để hiển thị
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    <link rel="stylesheet" href="styles.css"> <!-- Đảm bảo bạn có CSS tùy chỉnh -->
</head>
<body>

    <h1>Quản lý Sản phẩm</h1>

    <!-- Form Thêm Sản phẩm -->
    <h2>Thêm sản phẩm mới</h2>
    <form method="POST" action="">
        <label for="product_name">Tên sản phẩm:</label>
        <input type="text" name="product_name" required><br>

        <label for="price">Giá:</label>
        <input type="number" name="price" required><br>

        <label for="mainimage">Hình ảnh chính:</label>
        <input type="text" name="mainimage" required><br>

        <label for="category">Danh mục:</label>
        <input type="text" name="category" required><br>

        <button type="submit" name="add_product">Thêm Sản phẩm</button>
    </form>

    <hr>

    <!-- Danh sách sản phẩm -->
    <h2>Danh sách sản phẩm</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo number_format($row['price'], 0, ',', '.'); ?>₫</td>
                    <td><img src="<?php echo $row['mainimage']; ?>" alt="<?php echo $row['product_name']; ?>" width="50"></td>
                    <td><?php echo $row['category']; ?></td>
                    <td>
                        <!-- Sửa Sản phẩm -->
                        <button onclick="editProduct(<?php echo $row['product_id']; ?>)">Sửa</button>
                        <!-- Xoá Sản phẩm -->
                        <a href="?delete_id=<?php echo $row['product_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?')">Xoá</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <hr>

    <!-- Form Sửa Sản phẩm -->
    <h2>Sửa sản phẩm</h2>
    <form method="POST" action="">
        <input type="hidden" name="product_id" id="edit_product_id">
        <label for="product_name">Tên sản phẩm:</label>
        <input type="text" name="product_name" id="edit_product_name" required><br>

        <label for="price">Giá:</label>
        <input type="number" name="price" id="edit_price" required><br>

        <label for="mainimage">Hình ảnh chính:</label>
        <input type="text" name="mainimage" id="edit_mainimage" required><br>

        <label for="category">Danh mục:</label>
        <input type="text" name="category" id="edit_category" required><br>

        <button type="submit" name="edit_product">Cập nhật</button>
    </form>

    <script>
        // Hàm để điền thông tin vào form sửa sản phẩm
        function editProduct(productId) {
            var row = document.querySelector('tr[data-id="'+productId+'"]');
            document.getElementById('edit_product_id').value = productId;
            document.getElementById('edit_product_name').value = row.cells[1].textContent;
            document.getElementById('edit_price').value = row.cells[2].textContent;
            document.getElementById('edit_mainimage').value = row.cells[3].children[0].src;
            document.getElementById('edit_category').value = row.cells[4].textContent;
        }
    </script>

</body>
</html>

<?php
// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
