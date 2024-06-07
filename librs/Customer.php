<?php 
class Customer extends Database {
    protected $table = 'customers';
    public static function checkLogin($email,$pass){
        $_this = new static;
        $sql = "select * from $_this->table where email = '$email' and password = '$pass'";
        $query = $_this->conn->query($sql);
        return $query->fetch_object();
    }
    public static function checkName($name){
        $_this = new static;
        $sql = "select * from $_this->table where name = $name";
        $query = $_this->conn->query($sql);
        return $query->fetch_object();
    }
    public static function checkEmail($email){
        $_this = new static;
        $sql = "select * from $_this->table where email = $email";
        $query = $_this->conn->query($sql);
        return $query->fetch_object();
    }
    public static function checkPhone($phone){
        $_this = new static;
        $sql = "select * from $_this->table where phone = $phone";
        $query = $_this->conn->query($sql);
        return $query->fetch_object();
    }
}
?>