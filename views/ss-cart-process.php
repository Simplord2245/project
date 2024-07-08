<?php
$id = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
$action = !empty($_GET['action']) ? $_GET['action'] : 'add';
$customer_id = Customer::loginInfo()->id;
$cartSS = new SessionCart();
// $cartSS->clearall();
// die;
if($action == 'add'){
$cart = Cart::join('id, quantity, product_id, price,(cart_detail.price * cart_detail.quantity) as total','product_id','id','products.name, products.image')->where('customer_id', $customer_id)->andWhere('id', $id)->find();
    $cartSS->add($cart);
}
// if($action == 'update'){
//     $cartSS->update($id, $quantity);
// }
if($action == 'delete'){
    $cartSS->delete($id);
}
if($action == 'clearall'){
    $cartSS->clearall();
}

header('location: '.$this->app_url('checkout'));
// header('location: '.$this->app_url('cart'));
?>