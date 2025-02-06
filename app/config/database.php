<?php
class Database{
   private $host = 'localhost';
   private $database = 'student_manager';
   private $username = 'root';
   private $password = '';
   private $driver = 'mysql';
   public $conn;
   public $options;
   public function connect(){
    $this->conn = null;

    try{
        $this->options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
        ];
        $dsn = $this->driver.':host='.$this->host.';dbname='.$this->database;
        $this->conn = new PDO($dsn,$this->username,$this->password,$this->options);
        $stmt = $this->conn->query("SELECT 1");
        if($stmt){
            echo "kết nối thành công";
        }

    }catch(PDOException  $e){
        echo 'Lỗi kết nối đến database :'.$e ;
    }
    return $this->conn;
   }
}