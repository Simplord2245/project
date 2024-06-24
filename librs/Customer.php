<?php 
class Customer extends Database {
    protected $table = 'customers';

    public static function checkLogin($email,$pass){
        $_this = new static;
        $sql = "select * from $_this->table where email = '$email'";
        $query = $_this->conn->query($sql);
        if($query->num_rows == 1){
            $obj = $query->fetch_object();
            if(password_verify($pass,$obj->password)){
                return $obj;
            } else {
                return 'password-not-match';
            }
        }
        return 'email-not-found';
    }
    public static function loginInfo(){
        if(!empty($_SESSION['customer_login'])){
            return $_SESSION['customer_login'];
        }
        return null;
    }
}
?>