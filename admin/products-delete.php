<?php
include 'header.php';
$id = $_GET['id'];
$select  = Products::find($id);
$img = $select->fetch_object();
$image = 'assets/img/product' . $img->image;
if (file_exists($image)) {
    unlink($image);
}
$delete = Products::delete($id);
header('location: products.php');
?>