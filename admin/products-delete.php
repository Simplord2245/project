<?php
include 'header.php';
$error = '';
if (empty($_GET['id'])) {
    $error = 'Bạn chưa chọn sản phẩm để xoá';
} else {
    // $image = Products::select('image')->where('id',$_GET['id'])->get();
    // File::unlink($image);
    Products::delete($_GET['id']);
    header('location: products.php');
}
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Xoá sản phẩm 
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <?php if ($error) : ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Lỗi!</strong> <?php echo $error; ?>
                    </div>
                <?php endif ?>
                <a href="products.php" type="button" class="btn btn-danger">Quay lại</a>
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