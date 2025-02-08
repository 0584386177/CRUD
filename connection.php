<?php
$servername = "localhost";
$db_name = 'student_manager';
$username = 'root';
$password  = '';

$option = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
];

try {
    $dsn = 'mysql:host='.$servername.';dbname='.$db_name.'';
    $conn = new PDO($dsn,$username,$password,$option);
    
} catch (PDOException $e) {
    echo $e->getMessage();
}

return $conn;
