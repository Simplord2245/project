<?php
include 'header.php';
$error = '';
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $cat = Categories::select()->where('name',$name)->find();
    if($name == ''){
        $error = 'Tên danh mục không được để trống';
    }
    if($cat){
        $error = 'Tên danh mục đã tồn tại';
    }
    if(!$error && Categories::create($_POST)){
    header('location: category.php');
    }
}
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Thêm mới danh mục </h1>
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
<form action="" method="POST" role="form" enctype="multipart/form-data">
    <legend>Thêm mới danh mục</legend>

    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" name="name" id="" placeholder="Nhập tên danh mục">
    </div>
    <div class="form-group">
        <label for="">Trạng thái</label>
        
        <div class="radio">
            <label>
                <input style="margin-right: 5px;" type="radio" name="status" id="input" value="1" checked="checked">
                Hiển thị
            </label>
            <label>
                <input type="radio" name="status" id="input" value="0" >
                Tạm ẩn
            </label>
        </div>
        
    </div>
    <a href="category.php" type="button" class="btn btn-danger"><i class="fa-solid fa-arrow-left-long"></i>Quay lại</a>
    
    <button type="submit" style="margin-left: 50px;" class="btn btn-primary"><i class="fa fa-plus"></i>Thêm mới</button> 
</form>
            
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