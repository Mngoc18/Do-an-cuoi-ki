<?php
session_start();
// product-details.php
require_once 'config.php';
require_once 'Database.php';

$db = new Database();

// Lấy ID sản phẩm từ URL
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

// Truy vấn thông tin sản phẩm
$query = "SELECT * FROM product_details WHERE product_id = $product_id";
$product = $db->select($query);
if ($product) {
    $product = $product->fetch_assoc();
    
    // Xử lý các trường JSON (thumbnail, color, size)
    $thumbnails = json_decode($product['thumbnail'], true);
    $colors = json_decode($product['color'], true);
    $sizes = json_decode($product['size'], true);
} else {
    die("Sản phẩm không tồn tại!");
}
$currentProductQuery = "SELECT * FROM product WHERE product_id = $product_id";
$currentProductResult = $db->select($currentProductQuery);

if (!$currentProductResult) {
    die("Sản phẩm không tồn tại!");
}

$currentProduct = $currentProductResult->fetch_assoc();
$currentCategory = $currentProduct['category'];
$relatedProductsQuery = "
    SELECT * 
    FROM product 
    WHERE category = '$currentCategory' AND product_id != $product_id 
    LIMIT 5
";
$relatedProducts = $db->select($relatedProductsQuery);
$reviews = $db->select("SELECT * FROM reviews WHERE product_id = $product_id ORDER BY review_date DESC");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {

  // Lấy thông tin sản phẩm từ form
  $product_id = intval($_POST['product_id']);
  $product_name = $_POST['product_name'];
  $product_price = floatval($_POST['price']);
  $product_quantity = intval($_POST['quantity']);
  $selected_color_image = $_POST['selected_color_image'];
  $selected_color_name = $_POST['selected_color_name']; 
  $selected_size = $_POST['selected_size'];
  
  // Kiểm tra nếu giỏ hàng chưa tồn tại
  if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
  }

  // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
  if (isset($_SESSION['cart'][$product_id])) {
      $_SESSION['cart'][$product_id]['quantity'] += $product_quantity;
  } else {

      $_SESSION['cart'][$product_id] = [
          'name' => $product_name,
          'price' => $product_price,
          'quantity' => $product_quantity,
          'mainimage' => $selected_color_image, // Lưu ảnh màu sắc
          'size' => $selected_size,
          'color' => $selected_color_name
      ];
  }
  // Chuyển hướng đến trang giỏ hàng
  header("Location: cart.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo $product['product_name']; ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Reset margin and padding for all elements */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f9f9f9;
  color: #333;
  line-height: 1.6;
}
.soluong {}
/* Container for the entire product page */
.container {
  display: flex;
  margin-bottom: 5px;
  margin: 20px auto;
  max-width: 1200px;
  max-height: 950px;
  justify-content: space-between;
}
.images {
  margin-bottom: 70px;
  max-height:fit-content ;
}
.images img#mainImage {
  width: 100%;  /* Đảm bảo ảnh chính chiếm toàn bộ chiều rộng của container */
  height: 75%; /* Giữ tỉ lệ ảnh chính */
  max-width: 700px; /* Giới hạn chiều rộng tối đa của ảnh chính */
  margin-bottom: 20px; /* Khoảng cách giữa ảnh chính và ảnh thu nhỏ */
  margin-right: 20px;
}
.images .thumbnails {
  display: flex; 
  flex-direction: row; 
  gap: 30px; 
  padding: 10px 0; 
  margin-left: 15px;
}
.images .thumbnails .thumbnail {
  width: 200px; /* Đặt kích thước ảnh thu nhỏ lớn hơn */
  height: auto;
  cursor: pointer; /* Hiển thị con trỏ khi di chuột qua ảnh thu nhỏ */
  border: 2px solid transparent; /* Đường viền mặc định */
  transition: border 0.3s ease; /* Hiệu ứng chuyển tiếp khi hover */
}

/* Đổi màu border khi hover vào ảnh thu nhỏ */
.images .thumbnails .thumbnail:hover {
  border: 2px solid #000; /* Thêm viền màu đen khi hover */
}
/* Product details section */
.details {
  max-height: fit-content;
  flex: 1;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

h1 {
  font-size: 2rem;
  color: #333;
  margin-bottom: 15px;
}

.price {
  font-size: 1.5rem;
  color: black;
  margin-bottom: 15px;
  font-weight: bold;
}
button.submit {
  background-color: black;   /* Nền màu đen */
  color: white;              /* Chữ màu trắng */
  border: none;              /* Loại bỏ viền */
  padding: 10px 20px;        /* Thêm khoảng cách bên trong */
  font-size: 16px;           /* Kích thước chữ */
  cursor: pointer;          /* Khi hover sẽ thay đổi con trỏ chuột */
  transition: background-color 0.3s ease; /* Hiệu ứng chuyển màu khi hover */
}
button.submit:hover {
  background-color: #464748;  
}
.colors h3, .sizes h3 {
  font-size: 1.2rem;
  margin-bottom: 10px;
  color: black;
}

.colors img {
  width: 40px;
  height: 40px;
  margin-right: 10px;
  border-radius: 5px;
  cursor: pointer;
  transition: transform 0.3s ease;
}

.colors img:hover {
  transform: scale(1.1);
}

/* Size buttons */
.sizes button {
  padding: 10px;
  margin: 5px;
  background-color: #f1f1f1;
  border: 1px solid #ddd;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.sizes button.active {
  background-color: #333;
  color: #fff;
}

.sizes button:hover:not(.active) {
  background-color: #ddd;
}

.size-info {
  margin-top: 15px;
  font-size: 1rem;
}

.size-guide {
  margin-top: 15px;
  font-size: 0.9rem;
}

.size-guide a {
  color: #3498db;
  text-decoration: none;
}

.size-guide a:hover {
  text-decoration: underline;
}

/* Quantity section */
.quantity {
  margin-top: 20px;
}

.select-quantity h3 {
  font-size: 40px;
  margin-bottom: 10px;
  color: black;
}
.quantity h3 {
  color: black;
}

input[type="number"] {
  padding: 8px;
  font-size: 1rem;
  width: 60px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.add-to-cart {
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  padding: 12px;
  font-size: 1.2rem;
  cursor: pointer;
  border-radius: 5px;
  margin-top: 20px;
  transition: background-color 0.3s ease;
}
button[name="add_to_cart"] {
    background-color: pink; /* Màu nền trắng */
    color: black; /* Màu chữ trắng */
    padding: 10px 20px; /* Cỡ padding (cách điệu) */
    font-size: 16px; /* Cỡ chữ */
    cursor: pointer; /* Con trỏ chuột khi di chuột qua */
    border-radius: 5px; /* Bo góc */
    transition: all 0.3s ease; /* Hiệu ứng chuyển động */
    border: none; 
}

/* Hiệu ứng khi hover (di chuột vào nút) */
button[name="add_to_cart"]:hover {
    color: white; /* Giữ màu chữ trắng */
    border: none; 
    cursor: pointer;
}


.add-to-cart i {
  margin-left: 10px;
}

/* Shipping info */
.shipping-info {
  margin-top: 15px;
  font-size: 1rem;
  color: #888;
}

.shipping-info i {
  margin-right: 5px;
}

/* Reviews section */
.reviews {
    width: 80%; /* Chiều rộng cố định */
    margin: 20px auto; /* Căn giữa */
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
.reviews h2 {
  color: black;
  font-weight:bold;
}
.review-form h3 {
  color:black;
}
/* Style cho đánh giá */
.stars {
  color: gold; /* Đổi màu ngôi sao thành vàng */
  font-size: 1.2rem; /* Kích thước ngôi sao */
  margin-bottom: 5px;
}

.stars .filled {
  color: gold; /* Ngôi sao đã đánh giá */
}

.stars .empty {
  color: #ddd; /* Ngôi sao chưa đánh giá */
}

.reviews h2 {
  font-size: 1.5rem;
  margin-bottom: 20px;
}

.review-form input, .review-form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1px solid #ddd;
  font-size: 1rem;
}

.review-form button {
  background-color: black;
  color: #fff;
  padding: 10px 20px;
  font-size: 1.1rem;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.review-form button:hover {
  background-color: #464748;
}

.recommendations {
    width: 80%; /* Chiều rộng cố định */
    margin: 20px auto; /* Căn giữa */
}
.recommendations h2 {
  color: black;
}

.recommendation-items {
  display: flex;
  gap: 20px;
  overflow-x: auto; /* Cho phép cuộn ngang nếu sản phẩm nhiều hơn */
  padding: 10px;
}

.recommendation-item {
  width: 200px;
  background-color: #fff;
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
  transition: transform 0.3s ease;
}

.recommendation-item:hover {
  transform: translateY(-5px);
}

.recommendation-item img {
  max-width: 100%;
  border-radius: 8px;
  margin-bottom: 10px;
}

.recommendation-info h3 {
  font-size: 1em;
  margin-bottom: 10px;
  color: black;
}

.recommendation-info .price {
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
}

.recommendation-info .add {
  display: inline-block;
  padding: 8px 16px;
  background-color: black;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  font-size: 0.9em;
  transition: background-color 0.3s ease;
}

.recommendation-info .add:hover {
  background-color: #333;
}

.arrow-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  border: none;
  padding: 10px;
  font-size: 20px;
  cursor: pointer;
  border-radius: 50%;
  z-index: 2; /* Đảm bảo mũi tên ở trên */
}

.arrow-btn-left {
  left: 10px;
}

.arrow-btn-right {
  right: 10px;
}

.arrow-btn:hover {
  background-color: rgba(0, 0, 0, 0.8);
}
.add {
    background-color: black;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 14px;
    border-radius: 5px;
}
  </style>
</head>
<body>
  <?php include('header.php');?>
  <div class="container">
    <div class="images">
      <img alt="<?php echo $product['product_name']; ?>" id="mainImage" src="<?php echo '/Cuối kì/' .  $product['mainimage']; ?>" />
      <div class="thumbnails">
        <?php foreach ($thumbnails as $thumbnail): ?>
          <img src="<?php echo '/Cuối kì/' . $thumbnail; ?>" alt="Thumbnail" class="thumbnail" onclick="changeImage(this)" />
        <?php endforeach; ?>
      </div>
    </div>
    <div class="details">
      <h1><?php echo $product['product_name']; ?></h1>
      <div class="price"><?php echo number_format($product['price'], 0, ',', '.'); ?>₫</div>
      <div class="colors">
      <h3>Màu sắc</h3>
      <div class="colors-options">
          <?php foreach ($colors as $color): ?>
              <label>
                  <input type="radio" name="selected_color_name" value="<?php echo $color['name']; ?>" required onclick="updateColorName('<?php echo $color['name']; ?>', '<?php echo '/Cuối kì/' . $color['image']; ?>')">
                  <img src="<?php echo '/Cuối kì/' . $color['image']; ?>" alt="<?php echo $color['name']; ?>" class="color-swatch">
              </label>
          <?php endforeach; ?>
      </div>
  </div>
  <input type="hidden" name="selected_color_name_hidden" id="selected_color_name_hidden" value="">
      <div class="sizes">
      <h3>Kích cỡ</h3>
      <div class="size-options">
        <?php foreach ($sizes as $size): ?>
          <button onclick="selectSize('<?php echo $size; ?>')"><?php echo $size; ?></button>
        <?php endforeach; ?>
      </div>
      </div>

      
      <div class="size-guide">
        <i class="fas fa-ruler"></i>
        <a href="#">Hướng dẫn chọn kích cỡ</a>
      </div>
      <div class="size-info">
      Bạn đã lựa chọn: <strong id="selected_size">Chưa chọn kích cỡ</strong>
      </div>
      <div class="quantity">
        <h3>Số lượng:</h3>
        <input type="number" id="quantity" name="quantity" value="1" min="1" />
      </div>
      <div class="add-to-cart">
      <form method="POST" action="" onSubmit="setQuantity()">
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>">
    <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
    <input type="hidden" name="selected_color_image" id="selected_color_image_hidden" value="<?php echo '/Cuối kì/' . $product['mainimage']; ?>">
    <input type="hidden" name="selected_color_name" id="selected_color_name_hidden" value="">
    <input type="hidden" id="selected_quantity" name="quantity" value="1" min="1">
    <input type="hidden" name="selected_size" id="selected_size" value="">
    <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
    </form>
    </div>
    </div>
  </div>
  <div class="reviews">
    <h2>Đánh giá</h2>
    <div id="reviewsContainer">
        <?php if ($reviews && $reviews->num_rows > 0): ?>
            <?php while ($review = $reviews->fetch_assoc()): ?>
                <div class="review">
                    <div class="stars">
                        <?php echo str_repeat('★', $review['rating']) . str_repeat('☆', 5 - $review['rating']); ?>
                    </div>
                    <p class="comment"><?php echo htmlspecialchars($review['review_text']); ?></p>
                    <p class="review-author">By <?php echo htmlspecialchars($review['reviewer_name']); ?> on <?php echo date('d/m/Y', strtotime($review['review_date'])); ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Chưa có đánh giá nào cho sản phẩm này.</p>
        <?php endif; ?>
    </div>
    <div class="review-form">
        <h3>Gửi đánh giá của bạn</h3>
        <input type="text" id="reviewerName" placeholder="Tên của bạn" />
        <textarea id="reviewText" placeholder="Đánh giá của bạn"></textarea>
        <input type="number" id="rating" min="1" max="5" placeholder="Đánh giá (1-5 sao)" />
        <button class="submit" onclick="submitReview(<?php echo $product_id; ?>)">Gửi Đánh Giá</button>
    </div>
</div>
  <div class="recommendations">
    <h2>Có thể bạn sẽ thích</h2>
    <div class="recommendation-items">
        <?php if ($relatedProducts): ?>
            <?php while ($relatedProduct = $relatedProducts->fetch_assoc()): ?>
                <div class="recommendation-item">
                    <img src="<?php echo '/Cuối kì/' . $relatedProduct['mainimage']; ?>" alt="<?php echo $relatedProduct['product_name']; ?>" />
                    <div class="recommendation-info">
                        <h3><?php echo $relatedProduct['product_name']; ?></h3>
                        <div class="price"><?php echo number_format($relatedProduct['price'], 0, ',', '.'); ?>₫</div>
                        <a href="product_details.php?product_id=<?php echo $relatedProduct['product_id']; ?>" class="add">Xem chi tiết</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Không có sản phẩm nào liên quan.</p>
        <?php endif; ?>
    </div>
</div>


  <script>
    document.querySelector('form').addEventListener('submit', function(e) {
  setQuantity();  // Ensure quantity is updated
  // Do other form manipulations here if needed
});
function setQuantity() {
    var quantity = document.getElementById('quantity').value;
    document.getElementById('selected_quantity').value = quantity;

    // Ensure size is set correctly before submission
    var selectedSize = document.getElementById('selected_size').value;
    if (selectedSize) {
        document.getElementById('selected_size').value = selectedSize;
    } else {
        alert("Please select a size!"); // Optionally show an alert if no size is selected
    }
}

    // Cập nhật kích thước đã chọn và ẩn thông báo
    function selectSize(size) {
    document.getElementById('selected_size').value = size;
    document.getElementById('selected_size').innerHTML = size; // Optionally show selected size in the UI
    document.getElementById('size-info').innerHTML = "Bạn đã lựa chọn: " + size;  // Display selected size to the user
}

    function updateColorName(colorName, imageUrl) {
    document.getElementById('selected_color_name_hidden').value = colorName;
    document.getElementById('selected_color_image_hidden').value = imageUrl;
    document.getElementById('mainImage').src = imageUrl; // Cập nhật ảnh chính
}


    function submitReview(product_id) {
    const reviewerName = document.getElementById('reviewerName').value;
    const reviewText = document.getElementById('reviewText').value;
    const rating = document.getElementById('rating').value;

    if (!reviewerName || !reviewText || !rating) {
        alert('Vui lòng điền đầy đủ thông tin!');
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit_review.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
            location.reload(); // Refresh page to load new reviews
        }
    };
    xhr.send(`product_id=${product_id}&reviewer_name=${encodeURIComponent(reviewerName)}&review_text=${encodeURIComponent(reviewText)}&rating=${rating}`);
}
    // Thay đổi hình ảnh chính
    function changeImage(imgElement) {
      document.getElementById('mainImage').src = imgElement.src;
    }
  </script>
</body>
<?php include('footer.php'); ?>
</html>
