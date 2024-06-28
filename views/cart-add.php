<?php
$product_id = $_POST['product_id'];
$customer_id = Customer::loginInfo()->id;
$cart = Cart::select()->where('product_id', $product_id)->andWhere('customer_id', $customer_id)->find();
$_POST['customer_id'] = $customer_id;
if($cart){
    $quantiy = $cart->quantity + $_POST['quantity'];
    Cart::update($cart->id,['quantity' => $quantiy]);
} else { 
    Cart::create($_POST);
}
header('location: '.$this->app_url('cart'));
?>