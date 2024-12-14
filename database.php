<?php
// Kết nối cấu hình từ file config.php
include "config.php";

class Database {
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
    private $pdo;

    public $link;
    public $error;

    // Khởi tạo kết nối khi tạo đối tượng Database
    public function __construct(){
        $this->connectDB();
    }

    // Hàm kết nối cơ sở dữ liệu
    private function connectDB(){
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        // Kiểm tra lỗi kết nối
        if ($this->link->connect_error) {
            die("Kết nối cơ sở dữ liệu thất bại: " . $this->link->connect_error);
        }
    }

    // Phương thức lấy đối tượng kết nối
    public function getConnection() {
        return $this->link;
    }

    // Select dữ liệu
    public function select($query) {
        $result = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if($result->num_rows > 0){
            return $result;
        } else {
            return false;
        }
    }

    // Insert dữ liệu
    public function insert($query) {
        $insert_row = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if($insert_row){
            return $insert_row;
        } else {
            return false;
        }
    }

    // Update dữ liệu
    public function update($query) {
        $update_row = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if($update_row){
            return $update_row;
        } else {
            return false;
        }
    }

    // Delete dữ liệu
    public function delete($query) {
        $delete_row = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if($delete_row){
            return $delete_row;
        } else {
            return false;
        }
    }
}
?>
