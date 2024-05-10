<?php 
    include 'header.php';
    $products = Products::join('id, name, status, price, sale, image, descriptions','category_id','categories.name as cat_name')->get();
    // echo '<pre>';
    // print_r($products);
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
                        <th>Giá</th>
                        <th>Giá sale</th>
                        <th>Ảnh</th>
                        <th>Mô tả</th>
                        <th>Thể loại</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $pro):?>
                    <tr>
                        <td><?php echo $pro->id;?></td>
                        <td><?php echo limitString($pro->name,45);?></td>
                        <td><?php echo $pro->status > 0 ? 'Còn hàng':'Hết hàng';?></td>
                        <td><?php echo $pro->price;?></td>
                        <td><?php echo $pro->sale;?></td>
                        <td><img src="../assets/img/product/<?php echo $pro->image;?>" width="40" height="30"></td>
                        <td><?php echo limitString($pro->descriptions,20);?></td>
                        <td><?php echo $pro->cat_name;?></td>
                        <td class="text-right">
                            
                            <a href="products-edit.php?id=<?php echo $pro->id;?>" class="btn btn-primary">Sửa</a>
                            <a href="productss-delete.php?id=<?php echo $pro->id;?>" class="btn btn-danger">Xoá</a>
                            
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