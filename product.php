<?php
require_once 'config.php';
require_once 'Database.php';

$db = new Database();

$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'all';

// Lấy danh sách sản phẩm từ cơ sở dữ liệu
$query = "SELECT * FROM product";
if ($selectedCategory != 'all') {
    $query .= " WHERE category = '$selectedCategory'";
}

$product = $db->select($query);

if (!$product) {
    die("Không có sản phẩm nào trong cơ sở dữ liệu!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" href="stylestrangsp.css">
    <style>
      /* Basic reset and font settings */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: white !important;
    display:fixed;
    flex-direction: column; /* Ensure the entire page's content is stacked */
    min-height: 100vh; /* Ensure body takes full height */
}

/* Main container holding sidebar and content */
.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    display: flex;
    gap: 20px;
    flex-wrap: wrap; /* Allow the layout to wrap on smaller screens */
    background-color: white;
}

/* Sidebar section with categories */
.sidebar {
    width: 250px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px; /* Rounded corners for the sidebar */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.sidebar h3 {
    margin-top: 0;
    font-size: 1.5em;
}

.sidebar .category {
    margin: 10px 0;
    cursor: pointer;
    padding: 5px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.sidebar .category:hover {
    background-color: #f1f1f1;
    color: black;
}
/* Main content layout */
.main-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Header with toggle filters and search */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.header button {
    background-color: black;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 14px;
    border-radius: 5px;
}

.header input {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 300px;
}

/* Filter section styling */
.filters {
    flex-direction: row;
    gap: 20px;
    margin-top: 20px;
    margin-left: 20px;
}

.filter select, .filter input {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Grid layout for product items */
.list {
    display: grid;
    grid-template-columns: auto auto auto;
    gap: 20px;
}

/* Styling individual product item */
.item {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.item:hover {
    transform: translateY(-10px);
}

.item .img {
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 200px;
}

.item .img img {
    max-height: 100%;
    max-width: 100%;
    object-fit: cover;
}

.item .content .add {
    display: inline-block; /* Hiển thị như một khối nội tuyến */
    margin-top: 20px; /* Khoảng cách giữa nút và giá sản phẩm */
    padding: 10px 20px; /* Khoảng cách bên trong nút */
    background-color: black; /* Màu nền của nút */
    color: white; /* Màu chữ */
    text-decoration: none; /* Bỏ gạch chân */
    border-radius: 5px; /* Bo góc */
    font-size: 1em; /* Kích thước chữ */
    text-align: center; /* Căn giữa nội dung bên trong nút */
    cursor: pointer; /* Con trỏ chuột dạng nhấn */
    transition: background-color 0.3s; /* Hiệu ứng đổi màu nền */
}

.item .content .add:hover {
    background-color: #333; /* Đổi màu nền khi hover */
}

.item .content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 10px;
    box-sizing: border-box;
}
.title {
    font-size: 1.2em;
    font-weight: bold;
}

.item .content .des {
    opacity: 0.7;
    margin: 10px 0;
}

.item .content .price {
    font-size: 1.1em;
    font-weight: bold;
    letter-spacing: 1px;
    margin-bottom: 10px;
}
.listPage {
    padding: 10px;
    display: flex;
    text-align: center;
    justify-content: center;
    list-style: none;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.listPage li {
    display: inline-block;
    background-color: #f1f1f1;
    padding: 10px 20px;
    margin: 0 5px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.listPage li:hover {
    background-color: black;
    color: white;
}

.listPage .active {
    color: black;
    border: 1px solid;
}
.price {
    text-align: center;
    font-style: normal;
    margin-top: 15px;
}

.category.selected {
    background-color: black;
    color: white; /* Đổi màu chữ thành trắng khi danh mục được chọn */
}
.main-content {
    display: flex;
    flex-direction: column;
  }
  
  #productList {
    min-height: 500px; /* Điều chỉnh giá trị này sao cho phù hợp với chiều cao tối thiểu */
  }

/* Make the layout responsive */
@media (max-width: 768px) {
    .container {
        flex-direction: column;
        align-items: center;
    }

    .sidebar {
        width: 100%;
        margin-bottom: 20px;
    }

    .main-content {
        width: 100%;
    }
}

    </style>
</head>
<?php include ('header.php'); ?>
  <div class="container">
    <!-- Sidebar for Categories -->
    <div class="sidebar">
      <h3>Danh Mục Sản Phẩm</h3>
      <div class="category" data-category="all">Tất cả danh mục</div>
      <div class="category" data-category="giaycaogot">Giày cao gót</div>
      <div class="category" data-category="giaythethao">Giày thể thao</div>
      <div class="category" data-category="sandal">Sandal</div>
      <div class="category" data-category="giaybupbe">Giày búp bê</div>
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
      <div class="header">
        <button id="toggleFilters">
          <i class="fas fa-filter"></i> LỌC &amp; SẮP XẾP
        </button>
        <input type="text" id="searchInput" placeholder="Tìm kiếm sản phẩm..." />
      </div>
      
      <!-- Filter and Sort Options -->
      <div class="filters" id="filterSection" style="display: none;">
        <div class="filter">
          <select id="priceFilter">
            <option value="none">Bỏ bộ lọc</option>
            <option value="500000-1000000">500.000₫ - 1.000.000₫</option>
            <option value="1000000-1500000">1.000.000₫ - 1.500.000₫</option>
            <option value="1500000-2000000">1.500.000₫ - 2.000.000₫</option>
            <option value="2000000">Trên 2.000.000₫</option>
          </select>
        </div>
        <div class="filter">
          <select id="sortPrice">
            <option value="asc">Giá: Từ thấp đến cao</option>
            <option value="desc">Giá: Từ cao đến thấp</option>
          </select>
        </div>
      </div>

      <!-- Product List -->
      <div class="list" id="productList">
      <?php while ($row = $product->fetch_assoc()): ?>
    <div class="item" data-price="<?php echo $row['price']; ?>" data-category="<?php echo $row['category']; ?>">
    <div class="img">
        <img src="<?php echo '/Cuối kì/' . $row['mainimage']; ?>" alt="<?php echo $row['product_name']; ?>">
    </div>
    <div class="content">
        <div class="title"><?php echo $row['product_name']; ?></div>
        <div class="price"><?php echo number_format($row['price'], 0, ',', '.'); ?>₫</div>
        <a href="product_details.php?product_id=<?php echo $row['product_id']; ?>" class="add">Xem chi tiết</a>
    </div>
</div>
<?php endwhile; ?>
      </div>
      <ul class="listPage"></ul>
    </div>
  </div>

  <script>
    let thisPage = 1;
    let limit = 6;
    const list = document.querySelectorAll('.list .item');
    const productList = document.getElementById('productList');
    const items = Array.from(document.querySelectorAll('.item'));
    const searchInput = document.getElementById('searchInput');
    const categories = document.querySelectorAll('.category');
    const priceFilter = document.getElementById('priceFilter');
    const sortPrice = document.getElementById('sortPrice');
    let filteredItems = items; // Sử dụng filteredItems để lưu trữ sản phẩm đã lọc

    // Lọc và sắp xếp sản phẩm
    function filterAndSortProducts() {
      thisPage = 1; // Đặt lại trang hiện tại về trang 1 khi lọc hoặc sắp xếp
      filteredItems = items;

      // Lọc theo giá
      const selectedPrice = priceFilter.value;
      if (selectedPrice !== 'none') {
        const [minPrice, maxPrice] = selectedPrice.split('-').map(price => parseInt(price.replace('₫', '').replace('.', '')));
        filteredItems = filteredItems.filter(item => {
          const price = parseInt(item.getAttribute('data-price'));
          return maxPrice ? price >= minPrice && price <= maxPrice : price >= minPrice;
        });
      }

      // Lọc theo từ khóa tìm kiếm
      const searchQuery = searchInput.value.toLowerCase();
      if (searchQuery) {
        filteredItems = filteredItems.filter(item => {
          const title = item.querySelector('.title').textContent.toLowerCase();
          return title.includes(searchQuery);
        });
      }

      // Lọc theo danh mục
      const selectedCategory = document.querySelector('.category.selected')?.getAttribute('data-category');
      if (selectedCategory && selectedCategory !== 'all') {
        filteredItems = filteredItems.filter(item => item.getAttribute('data-category') === selectedCategory);
      }
      // Kiểm tra tham số 'category' trong URL khi trang được tải
      const urlParams = new URLSearchParams(window.location.search);
      const categoryFromURL = urlParams.get('category');

      // Nếu có tham số category trong URL, làm nổi bật danh mục đó
      if (categoryFromURL) {
        categories.forEach(category => {
          if (category.getAttribute('data-category') === categoryFromURL) {
            category.classList.add('selected');
          }
        });
      }

      // Sắp xếp theo giá
      const sortOrder = sortPrice.value;
      filteredItems.sort((a, b) => {
        const priceA = parseInt(a.getAttribute('data-price'));
        const priceB = parseInt(b.getAttribute('data-price'));
        return sortOrder === 'asc' ? priceA - priceB : priceB - priceA;
      });

      // Cập nhật danh sách sản phẩm sau khi lọc
      updateProductList(filteredItems);
      listPage();
    }

    // Cập nhật danh sách sản phẩm
    function updateProductList(updatedItems) {
      productList.innerHTML = ''; // Xóa tất cả sản phẩm cũ
      updatedItems.forEach(item => productList.appendChild(item)); // Thêm sản phẩm đã lọc
    }

    // Phân trang
    function listPage() {
    let count = Math.ceil(filteredItems.length / limit); // Tổng số trang
    const listPageContainer = document.querySelector('.listPage');
    listPageContainer.innerHTML = ''; // Xóa phân trang cũ

    // Thêm nút "PREV" nếu không phải trang đầu tiên
    if (thisPage !== 1) {
        let prev = document.createElement('li');
        prev.innerText = 'PREV';
        prev.setAttribute('onclick', `changePage(${thisPage - 1})`);
        listPageContainer.appendChild(prev);
    }

    // Tạo danh sách số trang
    for (let i = 1; i <= count; i++) {
        let newPage = document.createElement('li');
        newPage.innerText = i;

        // Đặt lớp "active" cho số trang hiện tại
        if (i === thisPage) {
            newPage.classList.add('active');
        }

        newPage.setAttribute('onclick', `changePage(${i})`);
        listPageContainer.appendChild(newPage);
    }

    // Thêm nút "NEXT" nếu không phải trang cuối cùng
    if (thisPage !== count) {
        let next = document.createElement('li');
        next.innerText = 'NEXT';
        next.setAttribute('onclick', `changePage(${thisPage + 1})`);
        listPageContainer.appendChild(next);
    }

    // Hiển thị sản phẩm của trang hiện tại
    loadItem();
}

function changePage(page) {
    thisPage = page; // Cập nhật số trang hiện tại
    listPage(); // Cập nhật giao diện phân trang
}

    // Hiển thị sản phẩm theo trang
    function loadItem() {
      let beginGet = limit * (thisPage - 1);
      let endGet = limit * thisPage - 1;

      filteredItems.forEach((item, key) => {
        if (key >= beginGet && key <= endGet) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    }

    // Lắng nghe sự kiện thay đổi bộ lọc
    priceFilter.addEventListener('change', filterAndSortProducts);
    sortPrice.addEventListener('change', filterAndSortProducts);
    searchInput.addEventListener('input', filterAndSortProducts);

    // Lắng nghe sự kiện chọn danh mục
    categories.forEach(category => {
      category.addEventListener('click', () => {
        categories.forEach(cat => cat.classList.remove('selected'));
        category.classList.add('selected');
        const selectedCategory = category.getAttribute('data-category');
        const url = new URL(window.location.href);
        url.searchParams.set('category', selectedCategory);  // Thêm tham số vào URL
        window.history.pushState({}, '', url);  // Thay đổi URL mà không làm mới trang
        filterAndSortProducts(); // Lọc lại sản phẩm theo danh mục được chọn
      });
    });

    // Toggle bộ lọc khi nhấn nút
    const toggleButton = document.getElementById('toggleFilters');
    const filterSection = document.getElementById('filterSection');
    toggleButton.addEventListener('click', () => {
      filterSection.style.display = filterSection.style.display === 'none' ? 'block' : 'none';
    });
    

    // Lọc và sắp xếp sản phẩm khi trang được tải
    window.onload = filterAndSortProducts;
  </script>
</body>
<?php include ('footer.php'); ?>
</html>
