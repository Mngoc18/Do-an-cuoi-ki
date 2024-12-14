<?php
session_start();

// Kiểm tra xem giỏ hàng có tồn tại hay không
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h2>Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm vào giỏ hàng.</h2>";
    echo "<a href='product.php'>Tiếp tục mua sắm</a>";
    exit();
}

$cart = $_SESSION['cart'];
$total_price = 0;

// Tính tổng tiền
foreach ($cart as $item) {
    $total_price += $item['price'] * $item['quantity'];
}

// Trước khi form được hiển thị, bạn cần truyền dữ liệu vào các trường trong form.
$_SESSION['cart'] = $cart; // Đảm bảo dữ liệu giỏ hàng vẫn được lưu trong session.

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Thanh toán</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
    <style>
        /* To match the checkout page style provided */
        body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Đảm bảo body chiếm ít nhất toàn bộ chiều cao cửa sổ */
}

.container {
    max-width: 1200px;
    width: 100%;
    background-color: #fff;
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    flex: 1; /* Đảm bảo container chiếm không gian còn lại của trang */
}

        .left, .right {
            padding: 20px;
        }

        .left {
            flex: 2;
        }

        .right {
            flex: 1;
            border-left: 1px solid #ddd;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .section input, .section select, .section button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .section button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .section button:disabled {
            background-color: #ddd;
            cursor: not-allowed;
        }

        .order-summary {
            font-size: 14px;
        }

        .order-summary .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .order-summary .item img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            margin-right: 10px;
        }

        .order-summary .item-details {
            flex: 1;
        }

        .order-summary .total {
            font-weight: bold;
            margin-top: 10px;
        }

        .order-summary .promo-code {
            margin-top: 10px;
            text-align: center;
        }

        .order-summary .promo-code a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        /* Button styles */
        #nextButton {
            width: 100%;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 20px;
        }

        #nextButton:hover {
            background-color: black;
            transform: scale(1.05);
        }

        #nextButton:active {
            background-color: black;
            transform: scale(0.98);
        }

        #nextButton:disabled {
            background-color: #ddd;
            color: #aaa;
            cursor: not-allowed;
        }

        #shippingOption {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            background-color: #fff;
            color: #333;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        #shippingOption:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.5);
        }

        .promo-code {
            margin-top: 20px;
            font-size: 14px;
            cursor: pointer;
        }

        .promo-code:hover {
            text-decoration: underline;
        }

        .promo-input {
            margin-top: 10px;
            display: none;
            padding: 10px;
            background-color: #f7f7f7;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .promo-input input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.3s;
        }

        .promo-input input:focus {
            border-color: #007bff;
        }

        .promo-input button {
            width: 100%;
            padding: 12px;
            background-color: rgb(62, 54, 54);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .promo-input button:hover {
            background-color: black;
        }
        .payment-method p,input {
        display: inline; /* Đặt radio button và label nằm cùng một dòng */
        font-size: 16px;
        cursor: pointer;
        } 
        footer {
    margin-top: auto; /* Đảm bảo footer luôn ở dưới cùng */
    background-color: white;
    color: black;
    text-align: center;
    padding: 10px 0;
}

    </style>
</head>
<body>
  <?php include('header.php'); ?>
  <div class="container">
    <div class="left">
    <h1>THANH TOÁN</h1>
      <p><?php echo $item['quantity']; ?> sản phẩm - <?php echo number_format($total_price, 0, ',', '.'); ?>₫</p>      
      <form action="thankyou.html" method="POST">
      <div class="section">
        <h3>THÔNG TIN GIAO HÀNG</h3>
            <input type="text" name="name" placeholder="Họ và tên *">
            <input type="number" name="phone" placeholder="Số điện thoại *">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="address" placeholder="Địa chỉ cụ thể">
            <select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm" required="">
            <option value="" selected>Chọn tỉnh thành</option>           
            </select>   
            <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm" required="">
            <option value="" selected>Chọn quận huyện</option>
            </select>
            <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm" required="">
            <option value="" selected>Chọn phường xã</option>
        </select> 
      </div>
      <div class="section">
        <h3>PHƯƠNG THỨC THANH TOÁN</h3>
        <label class="payment-method">
        <p>Chuyển khoản ngân hàng</p>
        <input type="radio" id="bankTransfer" name="payment_method" value="bank_transfer" />
        </label>
        <label class="payment-method">
        <p>Thanh toán khi nhận hàng (COD)</p>
        <input type="radio" id="cod" name="payment_method" value="cod" />
        </label>
        <div id="bankDetails" style="display:none; margin-top: 20px;">
        <h4>Thông tin chuyển khoản ngân hàng</h4>
        <p>Tên tài khoản: LUNA SHOES</p>
        <p>Số tài khoản: 6211135521</p>
        <p>Ngân hàng: BIDV</p>
    </div>
      </div>
      <div class="section">
        <button id="nextButton" onclick="showDeliveryOptions()" disabled>TIẾP</button>
      </div>
    </div>

    <div class="right">
      <div class="order-summary">
        <h3>ĐƠN HÀNG CỦA BẠN</h3>
        <?php foreach ($cart as $product_id => $item): ?>
          <div class="item">
            <img src="<?php echo htmlspecialchars($item['mainimage']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" />
            <div class="item-details">
              <p><?php echo htmlspecialchars($item['name']); ?></p>
              <p><?php echo number_format($item['price'], 0, ',', '.'); ?>₫</p>
              <p>Kích Cỡ: <?php echo htmlspecialchars($item['size']); ?> / Số lượng: <?php echo $item['quantity']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
        <div class="promo-code" onclick="togglePromoInput()">SỬ DỤNG MÃ KHUYẾN MÃI</div>
        <div class="promo-input">
            <input type="text" placeholder="Nhập mã khuyến mãi" id="promo-code" />
            <button onclick="applyPromoCode()">Áp dụng</button>
        </div>

        <div class="total">
          <span>Tổng cộng</span>
          <span id="totalPrice"><?php echo number_format($total_price, 0, ',', '.'); ?>₫</span>
        </div>
        
        <div class="delivery-option" id="deliveryOption" style="display:none;">
          <h3>Chọn hình thức vận chuyển</h3>
          <select id="shippingOption" name="shippingoption" onchange="updateShippingCost()">
              <option value="0">Giao hoả tốc - 100.000₫</option>
              <option value="1">Giao tiêu chuẩn - 30.000₫</option>
          </select>
          <p>Phí vận chuyển: <span id="shippingCost">100.000₫</span></p>
        </div>
        <div class="section">
            <input type="submit" href="thankyou.html" id="confirmButton" name="btn-pc" value="Xác nhận đơn hàng" disabled />
        </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
	var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
    url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
    method: "GET", 
    responseType: "application/json", 
    };
var promise = axios(Parameter);
promise.then(function (result) {
  renderCity(result.data);
});

function renderCity(data) {
  for (const x of data) {
    citis.options[citis.options.length] = new Option(x.Name, x.Id);
  }
  citis.onchange = function () {
    district.length = 1;
    ward.length = 1;
    if(this.value != ""){
      const result = data.filter(n => n.Id === this.value);

      for (const k of result[0].Districts) {
        district.options[district.options.length] = new Option(k.Name, k.Id);
      }
    }
  };
  district.onchange = function () {
    ward.length = 1;
    const dataCity = data.filter((n) => n.Id === citis.value);
    if (this.value != "") {
      const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

      for (const w of dataWards) {
        wards.options[wards.options.length] = new Option(w.Name, w.Id);
      }
    }
  };
}
    promise.then(function (result) {
    console.log(result.data); 
    renderCity(result.data);
    }).catch(function (error) {
    console.log("Lỗi khi tải dữ liệu API:", error);
    });
    // Enable or disable the "Tiếp" button based on user input
    document.querySelectorAll('input[required], select[required], input[name="payment_method"]').forEach(input => {
    input.addEventListener('input', () => {
        const button = document.getElementById('nextButton'); 
        // Kiểm tra nếu tất cả các trường input và select required đều đã được điền, và người dùng đã chọn phương thức thanh toán
        const allFilled = Array.from(document.querySelectorAll('input[required], select[required]')).every(input => {
            return input.value.trim() !== '' && input.value !== null && input.value !== undefined;
        });

        // Kiểm tra nếu người dùng đã chọn một phương thức thanh toán (radio button)
        const paymentMethodSelected = document.querySelector('input[name="payment_method"]:checked') !== null;

        button.disabled = !(allFilled && paymentMethodSelected); // Kích hoạt nút nếu tất cả các trường required đã được điền và phương thức thanh toán đã được chọn
    });
});
    // Toggle promo code input visibility
    function togglePromoInput() {
        document.querySelector('.promo-input').style.display = document.querySelector('.promo-input').style.display === 'block' ? 'none' : 'block';
    }

    // Apply promo code (for simplicity, no actual promo code logic)
    function applyPromoCode() {
        alert('Mã khuyến mãi đã được áp dụng!');
        document.querySelector('.promo-input').style.display = 'none';
    }
    document.getElementById('bankTransfer').addEventListener('change', function() {
    const bankDetails = document.getElementById('bankDetails');
    // Hiển thị thông tin chuyển khoản nếu chọn "Chuyển khoản ngân hàng"
    if (this.checked) {
      bankDetails.style.display = 'block';
    } else {
      bankDetails.style.display = 'none';
    }
  });

  document.getElementById('cod').addEventListener('change', function() {
    const bankDetails = document.getElementById('bankDetails');
    // Ẩn thông tin chuyển khoản nếu chọn "Thanh toán khi nhận hàng"
    if (this.checked) {
      bankDetails.style.display = 'none';
    }
  });

    // Show delivery options
    function showDeliveryOptions() {
        document.getElementById('deliveryOption').style.display = 'block';
        document.getElementById('nextButton').disabled = true;  // Disable until shipping is selected
    }

    // Update shipping cost based on selection
    function updateShippingCost() {
        const shippingOption = document.getElementById('shippingOption').value;
        const shippingCost = shippingOption === '0' ? 100000 : 30000;
        document.getElementById('shippingCost').textContent = shippingCost.toLocaleString() + '₫';
        const total = <?php echo $total_price; ?> + shippingCost;
        document.getElementById('totalPrice').textContent = total.toLocaleString() + '₫';
    }
    document.getElementById('shippingOption').addEventListener('change', function() {
    const confirmButton = document.getElementById('confirmButton');
    
    // Kiểm tra xem phương thức vận chuyển đã được chọn chưa
    if (this.value !== "") {
        confirmButton.disabled = false; // Kích hoạt nút xác nhận đơn hàng
    } else {
        confirmButton.disabled = true; // Vô hiệu hóa nút nếu không chọn phương thức vận chuyển
    }
});
</script>

</body>

</html>