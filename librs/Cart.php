<?php 
class Cart extends Database {
    protected $table = 'cart_detail';
    protected $join_table = 'products';

    public static function totalOders(){
        $customer_id = 0;
        $_this = new static;

        if(Customer::loginInfo()){
            $customer_id = Customer::loginInfo()->id;
        }

        if($customer_id == 0){
            return 0;
        }
        $sql = "select count(customer_id) as total from $_this->table where customer_id = $customer_id";
        $query = $_this->conn->query($sql);
        $row = $query->fetch_object();
        return $row ? $row->total : 0;
    }
}
?>