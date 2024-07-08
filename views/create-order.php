<?php
$_POST['customer_id'] = Customer::loginInfo()->id;

$cartSS = new SessionCart();
$carts = $cartSS->items;
$order_id = Orders::create($_POST);
if($order_id){
    foreach($carts as $cart){
        $detail = [
            'quantity' => $cart->quantity,
            'product_id' => $cart->product_id,
            'price' => $cart->price,
            'order_id' => $order_id
        ];
        OrderDetails::create($detail);
    }
}
// echo '<pre>';
// print_r($carts);
?>