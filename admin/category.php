
<?php 
    include 'header.php';
    $category = Categories::select();
    // echo '<pre>';
    // print_r($category);
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
            
            <form action="" method="POST" class="form-inline" role="form">
            
                <div class="form-group">
                    <label class="sr-only" for="">label</label>
                    <input type="text" class="form-control" id="" placeholder="Tìm kiếm">
                </div>
            
                
            
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Thêm mới</button>
            </form>
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($category as $cat):?>
                    <tr>
                        <td><?php echo $cat->id;?></td>
                        <td><?php echo $cat->name;?></td>
                        <td><?php echo $cat->status;?></td>
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