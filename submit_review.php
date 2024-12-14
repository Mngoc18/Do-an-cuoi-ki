<?php
require_once 'config.php';
require_once 'Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = intval($_POST['product_id']);
    $reviewer_name = $_POST['reviewer_name'];
    $review_text = $_POST['review_text'];
    $rating = intval($_POST['rating']);

    if ($product_id && $reviewer_name && $review_text && $rating) {
        $db = new Database();
        $query = "INSERT INTO reviews (product_id, reviewer_name, review_text, rating) VALUES ('$product_id', '$reviewer_name', '$review_text', '$rating')";
        if ($db->insert($query)) {
            echo 'Đánh giá đã được thêm!';
        } else {
            echo 'Lỗi khi thêm đánh giá!';
        }
    } else {
        echo 'Vui lòng điền đầy đủ thông tin!';
    }
}