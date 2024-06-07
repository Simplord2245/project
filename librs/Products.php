<?php 
class Products extends Database {
    protected $table = 'products';
    protected $join_table = 'categories';
    public static function select_pro($category_id){
        $_this = new static;
        $result = [];
        $sql = "select * from $_this->table where category_id = $category_id ";
        $query = $_this->conn->query($sql);
        while($row = $query->fetch_object()){
            $result[] = $row;
        }
        return $result;
    }
}
?>