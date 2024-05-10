<?php
include 'header.php';
    $cate = Categories::select();
$image = '';
if (!empty($_FILES['image']['name'])) {
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, 'assets/img/product' . $image);
}
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $descriptions = $_POST['descriptions'];
    $category_id = $_POST['category_id'];
    $products = Products::create(["name=>$name,price=>$price,sale=>$sale,image=>$image,descriptions=>$descriptions,category_id=>$category_id"]);
    header('location: products.php');
}
?>


<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Quản lý sản phẩm </h1>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            
<form action="" method="POST" role="form" enctype="multipart/form-data">
    <legend>Thêm mới sản phẩm</legend>

    <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" name="name" id="" placeholder="Nhập tên sản phẩm">
    </div>
    <div class="form-group">
        <label for="">Giá</label>
        <input type="text" class="form-control" name="price" id="" placeholder="Nhập giá">
    </div>
    <div class="form-group">
        <label for="">Giá giảm</label>
        <input type="text" class="form-control" name="sale" id="" placeholder="Nhập giá giảm">
    </div>
    <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" name="image" id="" placeholder="Input field">
    </div>
    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea name="descriptions" id="" cols="30" rows="10" style="width: 1638px; height: 70px;"></textarea>
    </div>
    <div class="form-group">
        <select name="category_id" id="category_id" class="form-control" required="required">
            <option value="">Chọn loại sản phẩm</option>
            <?php foreach($cate as $cat) : ?>
                <option value="<?php echo $cat->id;?>">
                <?php echo $cat->name; ?>
                <?php endforeach ?>
            </option>
        </select>
        </div>

    

    <button type="submit" class="btn btn-primary">Thêm mới</button>
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