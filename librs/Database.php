<?php
class Database {
    protected $conn;
    protected $table;
    protected $join_table;
    protected $sql;
    protected $limit = 0;

    public function __construct()
    {
        $this->conn = new Mysqli(HOST, USER, PASSWORD, DB);
    }

    public static function select($field = "*"){
        $_this = new static;
        $_this->sql = "select $field from $_this->table";
        return $_this;
    }
    public static function join($field = "*",$fk,$joinString){
        $_this = new static;
        $mangKey = explode(', ',$field);
        $fieldString = '';
        $fieldGroup = '';
        foreach($mangKey as $val){
            $fieldString .= "$_this->table.$val, ";
            $fieldGroup .= "$_this->table.$val, ";
        }
        $fieldGroup = "group by ".rtrim($fieldGroup, ', ');
        $fieldString .= $joinString;

        $_this->sql = "select $fieldString from $_this->table join $_this->join_table on $_this->table.$fk = $_this->join_table.id ";
        $_this->sql .= $fieldGroup;
        return $_this;
    }
    public static function leftJoin($field = "*",$fk,$joinString){
        $_this = new static;
        $mangKey = explode(', ',$field);
        $fieldString = '';
        $fieldGroup = '';
        foreach($mangKey as $val){
            $fieldString .= "$_this->table.$val, ";
            $fieldGroup .= "$_this->table.$val, ";
        }
        $fieldGroup = "group by ".rtrim($fieldGroup, ',');
        $fieldString .= $joinString;

        $_this->sql = "select $field from $_this->table left join $_this->join_table on $_this->table.id = $_this->join_table.$fk ";
        $_this->sql .= $fieldGroup;
        return $_this;
    }
    public static function rightJoin($field = "*",$fk,$joinString){
        $_this = new static;
        $mangKey = explode(', ',$field);
        $fieldString = '';
        $fieldGroup = '';
        foreach($mangKey as $val){
            $fieldString .= "$_this->table.$val, ";
            $fieldGroup .= "$_this->table.$val, ";
        }
        $fieldGroup = "group by ".rtrim($fieldGroup, ',');
        $fieldString .= $joinString;

        $_this->sql = "select $field from $_this->table right join $_this->join_table on $_this->table.id = $_this->join_table.$fk ";
        $_this->sql .= $fieldGroup;
        return $_this;
    }
    public function limit($limit = 25) {
        $this->limit = $limit;
        return $this;
    }
    public function orderby($field,$order) {
        $this->sql .= " order by $field $order";
        return $this;
    }
    public function get(){
        $result = [];
        if($this->limit){
            $this->sql .= "limit $this->limit";
        }
        $query = $this->conn->query($this->sql);
        while($row = $query->fetch_object()){
            $result[] = $row;
        }
        return $result;
    }
    public function find($category_id){
        $this->sql.= "where category_id = $category_id";
        $query = $this->conn->query($this->sql);
        return $query->fetch_object();
    }
    public function findJoin($id){
        $this->sql.= "having id = $id";
        $query = $this->conn->query($this->sql);
        return $query->fetch_object();
    }
    public static function delete($id){
        $_this = new static;
        $sql = "delete from $_this->table where id = $id";
        return $_this->conn->query($sql);
    }
    public static function create($data){
        $_this = new static;
        $keys = array_keys($data);
        $keys = implode(',',$keys);
        $values = array_values($data);
        $values = "'".implode("','",$values)."'";
        $sql = "insert into $_this->table($keys) values ($values)";
        return $_this->conn->query($sql);
    }
    public static function update($id,$data){
        $_this = new static;
        $sql = "update from $_this->table set ";
        foreach ($data as $key => $value){
            $sql .= " $key = '$value', ";
        }
        $sql = rtrim(', ',$sql);
        $sql .= "where id = $id";
        return $_this->conn->query($sql);
    }
}
?>