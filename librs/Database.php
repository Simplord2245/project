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
    public static function join($field = "*",$pk,$fk,$joinString){
        $_this = new static;
        $mangKey = explode(', ',$field);
        $fieldString = '';
        foreach($mangKey as $val){
            $fieldString .= "$_this->table.$val, ";
        }
        $fieldString .= $joinString;

        $_this->sql = "select $fieldString from $_this->table join $_this->join_table on $_this->table.$pk = $_this->join_table.$fk ";
        return $_this;
    }
    public static function leftJoin($field = "*",$pk,$fk,$joinString){
        $_this = new static;
        $mangKey = explode(',',$field);
        $fieldString = '';
        foreach($mangKey as $val){
            $fieldString .= "$_this->table.$val, ";
        }
        $fieldString .= $joinString;

        $_this->sql = "select $field from $_this->table left join $_this->join_table on $_this->table.$pk = $_this->join_table.$fk ";
        return $_this;
    }
    public static function rightJoin($field = "*",$pk,$fk,$joinString){
        $_this = new static;
        $mangKey = explode(', ',$field);
        $fieldString = '';
        foreach($mangKey as $val){
            $fieldString .= "$_this->table.$val, ";
        }
        $fieldString .= $joinString;

        $_this->sql = "select $field from $_this->table right join $_this->join_table on $_this->table.id = $_this->join_table.$fk ";
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
        if($this->limit > 0){
            $this->sql .= " limit $this->limit";
        }
        $query = $this->conn->query($this->sql);
        while($row = $query->fetch_object()){
            $result[] = $row;
        }
        return $result;
    }
    public function where(){
        $args = func_get_args();
        $n = count($args);
        if($n == 3){
            $field = $args[0];
            $op = $args[1];
            $val = $args[2];
            $this->sql .= "where $this->table.$field $op '$val'";
        } else if($n == 2){
            $field = $args[0];
            $val = $args[1];
            $this->sql .= "where $this->table.$field = $val";
        }
            return $this;
    }
    public function whereIn(){
        $args = func_get_args();
            $field = $args[0];
            $val = $args[1];
            $vals = '';
            foreach($val as $v){
                $vals .= $v.', ';
            }
            $vals = rtrim($vals,', ');
            $this->sql .= " where $this->table.$field in $val";
            return $this;
    }
    public function whereNotIn(){
        $args = func_get_args();
            $field = $args[0];
            $val = $args[1];
            $vals = '';
            foreach($val as $v){
                $vals .= $v.', ';
            }
            $vals = rtrim($vals,', ');
            $this->sql .= " where $this->table.$field not in $val";
            return $this;
    }
    public function groupBy($field){
        $mangKey = explode(',',$field);
        $fieldGroup = '';

        foreach($mangKey as $val){
            $fieldGroup .= "$this->table.$val, ";
        }
        $fieldGroup = rtrim($fieldGroup, ', ');
        $this->sql .= " group by $fieldGroup";        
        return $this;
    }
    public function find(){
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