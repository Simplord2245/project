<?php
class SessionCart {
    public $items = [];
    public $quantity = 0;
    public $totalMoney = 0;

    public function __construct(){
        $this->items = $_SESSION['cart'] ? $_SESSION['cart'] : [];
    }

    public function add($product){
        if(isset($this->items[$product->id])){
            $this->items[$product->id]->quantity += 1;
        } else {
            $this->items[$product->id] = $product;
        }
    }
}
?>