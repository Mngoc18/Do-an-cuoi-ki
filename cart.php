<?php
session_start();

// Kiểm tra nếu giỏ hàng trống
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h2>Giỏ hàng của bạn đang trống!</h2>";
    echo "<a href='product.php'>Tiếp tục mua sắm</a>";
    exit();
}

$cart = $_SESSION['cart'];
$total_price = 0;

// Tính tổng tiền
foreach ($cart as $item) {
    $total_price += $item['price'] * $item['quantity'];
}

// Xử lý cập nhật số lượng và xóa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_cart'])) {
        foreach ($_POST['quantities'] as $product_id => $quantity) {
            if (intval($quantity) > 0) {
                $_SESSION['cart'][$product_id]['quantity'] = intval($quantity);
            } else {
                unset($_SESSION['cart'][$product_id]);
            }
        }
        header("Location: cart.php");
        exit();
    }

    if (isset($_POST['remove_product'])) {
        $product_id = intval($_POST['product_id']);
        unset($_SESSION['cart'][$product_id]);
        header("Location: cart.php");
        exit();
    }
}
if (isset($_POST['remove_product'])) {
    $product_id = intval($_POST['product_id']);
    echo "<script>if (confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')) { window.location.href = 'cart.php?remove=" . $product_id . "'; }</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    color: #333;
    margin: 0;
    padding: 0;
}
h2 {
    text-align: ;
}

.container {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    gap: 20px;
}

.left-section {
    flex: 0 0 70%; /* Phần hiển thị thông tin sản phẩm chiếm 70% */
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 20px;
    overflow: hidden;
}

.right-section {
    flex: 0 0 30%; /* Phần tổng tiền và thanh toán chiếm 30% */
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
}
.right-section a:hover {
    background-color: pink;
    color:white;
}

.header {
    font-size: 26px;
    font-weight: 600;
    margin-bottom: 30px;
    color: #444;
}

.cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1px solid #f1f1f1;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    background-color: #fafafa;
    transition: box-shadow 0.3s ease, transform 0.2s ease;
}

.cart-item:hover {
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    transform: translateY(-5px);
}

.cart-item img {
    width: 100px;
    height: 100px;
    border-radius: 5px;
    object-fit: cover;
}

.item-details {
    flex: 1;
    margin-left: 20px;
}

.item-details p {
    margin: 5px 0;
    color: #555;
}

.item-actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: center;
}

.item-actions input[type="number"] {
    width: 70px;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    text-align: center;
    transition: border-color 0.3s ease;
}

.item-actions input[type="number"]:focus {
    border-color: #007bff;
}

.item-actions button {
    padding: 8px 16px;
    background-color: #e74c3c; /* Màu nút Xóa giữ nguyên (Đỏ) */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.item-actions button:hover {
    background-color: #c0392b; /* Màu nút Xóa khi hover */
    transform: translateY(-3px);
}

/* Nút cập nhật giỏ hàng và thanh toán có nền đen, chữ trắng */
.update-cart-btn,
.checkout-btn {
    display: inline-block;
    padding: 12px 24px;
    background-color: black; /* Nền đen */
    color: white; /* Chữ trắng */
    text-decoration: none;
    border-radius: 8px;
    text-align: center;
    transition: background-color 0.3s ease, transform 0.2s ease;
    font-size: 18px;
    cursor: pointer;
}

.update-cart-btn:hover,
.checkout-btn:hover {
    background-color: #333; /* Đổi màu nền khi hover */
    transform: translateY(-3px);
}

.summary {
    text-align: left;
    padding: 20px;
    margin-top: 20px;
    border-top: 2px solid #f1f1f1;
}

.summary h3 {
    font-size: 20px;
    margin: 10px 0;
    color: #555;
}

.summary .total {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin: 20px 0;
}

hr {
    border: none;
    border-top: 1px solid #ddd;
    margin: 20px 0;
}

    </style>
</head>
<body>
    <?php include('header.php'); ?>
<div class="container">
    <div class="left-section">
        <div class="header">Giỏ hàng của bạn</div>
        <form method="POST" action="">
    <?php foreach ($cart as $product_id => $item): ?>
        <div class="cart-item">
            <img src="<?php echo htmlspecialchars($item['mainimage']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" />
            <div class="item-details">
                <p><strong><?php echo htmlspecialchars($item['name']); ?></strong></p>
                <div class="product-size">Kích cỡ: <?php echo htmlspecialchars($item['size']); ?></div> <!-- Hiển thị kích thước -->
                <p>Giá: <?php echo number_format($item['price'], 0, ',', '.'); ?>₫</p>
                <p>
                    Số lượng:
                    <input type="number" name="quantities[<?php echo $product_id; ?>]" value="<?php echo $item['quantity']; ?>" min="1">
                </p>
                <!-- Thêm trường ẩn để gửi kích cỡ -->
                <input type="hidden" name="sizes[<?php echo $product_id; ?>]" value="<?php echo htmlspecialchars($item['size']); ?>">
            </div>
            <div class="item-actions">
                <button type="submit" name="remove_product" value="1">Xóa</button>
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Nút cập nhật giỏ hàng nhỏ và nằm dưới cùng -->
    <button type="submit" name="update_cart" class="update-cart-btn">Cập nhật giỏ hàng</button>
</form>
    </div>

    <div class="right-section">
        <div class="summary">
            <h3>Tổng tiền: <span class="total"><?php echo number_format($total_price, 0, ',', '.'); ?>₫</span></h3>
            <a href="checkout.php" class="checkout-btn">Thanh toán</a>
        </div>
    </div>
</div>
</div>
</body>
<?php include('footer.php'); ?>
</html>
