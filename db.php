<?php
// db.php
class Database {
    private $host = "localhost";
    private $db_name = "user_auth";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->exec("set names utf8");
        } catch(PDOException $e) {
            echo "数据库连接错误: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>