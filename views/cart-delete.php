<?php
$id = !empty($_GET['id']) ? (int) $_GET['id'] : 0;
Cart::delete($id);
header('location: '.$this->app_url('cart'));
?>