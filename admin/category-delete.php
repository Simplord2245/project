<?php
include 'header.php';
$error = '';
if(empty($_GET['id'])){
    $error = 'Bạn chưa chọn danh mục để xoá';
} else {
    $cat = Categories::leftJoin('id','id','category_id','count(products.category_id) as total')->where('id',$_GET['id'])->groupBy('id')->find();
    if($cat->total > 0){
        $error = 'Danh mục đan có sản phẩm, không thể xoá';
    } else {
        Categories::delete($_GET['id']);
        header('location: category.php');
    }

}
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Xoá danh mục </h1>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            <?php if($error) :?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Lỗi!</strong> <?php echo $error; ?> 
            </div>
            <?php endif ?>
            <a href="category.php" type="button" class="btn btn-danger">Quay lại</a>
        </div>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include 'footer.php';
?>