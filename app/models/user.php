<?php

class User{
    private $conn;

    public function __construct($db){
        $db = (new Database())->connect();
        $this->conn = $db;
    }

    public function runQuery($sql){
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function insert($fullname,$email,$phone,$image){
        try{
            $stmt = $this->conn->prepare("INSERT INTO students(fullname,email,phone,image) VALUES (:fullname,:email,:phone,:image)");
        $stmt ->bindParam(":fullname",$fullname);
        $stmt ->bindParam(":email",$email);
        $stmt ->bindParam(":phone",$phone);
        $stmt ->bindParam(":image",$image);
        $stmt->execute();
        return $stmt;
        }catch(Exception $e){
            echo "Lỗi : ".$e->getMessage();
        }
    }

    public function update($id,$fullname,$email,$phone,$image){
        try{
            $stmt = $this->conn->prepare("UPDATE students SET fullname = :fullname,email=:email,phone=:phone,image =:image WHERE id=:id");
            $stmt->bindParam(":id",$id);
            $stmt->bindParam(":fullname",$fullname);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":phone",$iphone);
            $stmt->bindParam(":image",$image);
            $stmt->execute();
            return $stmt;
        }catch(Exception $e){
        echo "Lỗi : ".$e->getMessage();

        }
    }
    public function delete ($id){
        try {
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id=:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt;            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}