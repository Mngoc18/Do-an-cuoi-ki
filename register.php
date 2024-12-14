<?php
header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$password = "";
$dbname = "Cuối kì";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["message" => "Kết nối cơ sở dữ liệu thất bại"]));
}

$data = json_decode(file_get_contents("php://input"), true);

$name = $data["name"];
$email = $data["email"];
$phone = $data["phone"];
$gender = $data["gender"];
$dob = $data["dob"];
$password = password_hash($data["password"], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (name, email, phone, gender, dob, password) VALUES ('$name', '$email', '$phone', '$gender', '$dob', '$password')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Đăng ký thành công!"]);
} else {
    echo json_encode(["message" => "Lỗi: " . $conn->error]);
}

$conn->close();
?>
