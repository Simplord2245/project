<?php
include 'header.php';
$cat = Categories::select()->where('id',$_GET['id'])->find();
$error = '';
if(isset($_POST['name'])){
    $name = $_POST['name'];
    if($name == ''){
        $error = 'Tên danh mục không được để trống';
    }
    if(!$error && Categories::update($_GET['id'],$_POST)){
    header('location: category.php');
    }
}
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Chỉnh sửa danh mục </h1>
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
    <legend>Chỉnh sửa danh mục</legend>

    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" value="<?php echo $cat->name;?>" name="name" id="" placeholder="Nhập tên danh mục">
    </div>
    <div class="form-group">
        <label for="">Trạng thái</label>
        
        <div class="radio">
            <label style="margin-right: 5px;">
                <input type="radio" name="status" id="input" value="1" <?php echo $cat->status == 1 ? 'checked': '';?>>
                Hiển thị
            </label>
            <label>
                <input type="radio" name="status" id="input" value="0" <?php echo $cat->status == 0 ? 'checked': '';?>>
                Tạm ẩn
            </label>
        </div>
        
    </div>

    <a href="category.php" type="button" class="btn btn-danger">Quay lại</a>
    
    <button style="margin-left: 50px;" type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Lưu lại</button>
    
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