<?php
class SessionCart {
    public $items = [];
    public $quantity = 0;
    public $totalMoney = 0;

    public function __construct(){
        $this->items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $this->totalMoney = $this->getTotalMoney();
    }

    public function add($product){
            $this->items[$product->id] = $product;
        $_SESSION['cart'] = $this->items;
    }
    public function delete($id){
        if(isset($this->items[$id])){
            unset($this->items[$id]);
            $_SESSION['cart'] = $this->items;
        }
    }
    public function clearall(){
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart']);
        }
    }
    private function getTotalMoney(){
        $total = 0;
        foreach($this->items as $cart){
            $total += $cart->quantity * $cart->price;
        }
        return $total;
    }
}
?>