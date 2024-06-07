
<?php 
    include 'header.php';
    $key = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $category = Categories::join('id, name, status','id','category_id','COUNT(products.category_id) as total')->groupBy('id,name,status')->get();

    if($key) {
        $category = Categories::join('id, name, status','id','category_id','COUNT(products.category_id) as total')->where('name','like','%'.$key.'%')->groupBy('id,name,status')->get();
    }
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Quản lý danh mục </h1>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-body">
            
            <form action="" method="get" class="form-inline" role="form">
            
                <div class="form-group">
                    <label class="sr-only" for="">label</label>
                    <input class="form-control" name="keyword" placeholder="Tìm kiếm">
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                <a href="category-create.php" type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Thêm mới</a>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Trạng thái</th>
                        <th>Số lượng sản phẩm</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($category as $cat):?>
                    <tr>
                        <td><?php echo $cat->id;?></td>
                        <td><?php echo $cat->name;?></td>
                        <td><?php echo $cat->status == 0 ? 'Tạm ẩn' : 'Hiển thị';?></td>
                        <td><?php echo $cat->total;?></td>
                        <td class="text-right">
                            
                            <a href="category-edit.php" class="btn btn-primary">Sửa</a>
                            <a href="category-delete.php" class="btn btn-danger">Xoá</a>
                            
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            
        </div>
   
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php';?>