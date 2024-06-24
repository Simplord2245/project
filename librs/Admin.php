<?php 
class Admin extends Database {
    protected $table = 'admins';

    public static function checkLogin($email,$pass){
        $_this = new static;
        $sql = "select * from $_this->table where email = '$email' and password = '$pass'";
        $query = $_this->conn->query($sql);
        return $query->fetch_object();
    }
}
?>