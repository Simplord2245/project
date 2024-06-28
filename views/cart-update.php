<?php
$quantity = $_POST['quantity'] > 0 ? $_POST['quantity'] : 1;
Cart::update($_POST['id'], ['quantity' => $quantity]);
header('location: '.$this->app_url('cart'));
?>