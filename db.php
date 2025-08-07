<?php
class Database {
    // Azure Database for MySQL 连接配置
    private $host = "starry.database.windows.net"; // Azure 服务器地址
    private $db_name = "website"; // 数据库名称
    private $username = "Starry0114"; // Azure 管理员用户名
    private $password = "Dark0689@@"; // 管理员密码
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password,
                [
                    PDO::MYSQL_ATTR_SSL_CA => '/path/to/BaltimoreCyberTrustRoot.crt.pem',
                    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true
                ]
            );
            $this->conn->exec("set names utf8");
        } catch(PDOException $e) {
            echo "数据库连接错误: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>