<?php 
header('Content-Type: application/json'); 

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'Cuối kì';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Kết nối cơ sở dữ liệu thất bại: ' . $conn->connect_error]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'] ?? ''; 
    $password = $_POST['password'] ?? ''; 

    if (empty($phone) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Vui lòng điền đầy đủ thông tin.']);
        exit();
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE phone = ?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(['success' => false, 'message' => 'Thông tin đăng nhập không hợp lệ.']);
    } else {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo json_encode(['success' => true, 'message' => 'Đăng nhập thành công!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Mật khẩu không chính xác.']);
        }
    }

    $stmt->close();
}

$conn->close();
?>
