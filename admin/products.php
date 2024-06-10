<?php 
    include 'header.php';
    $key = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $products = Products::join('id, name, status, price, sale, image, descriptions','category_id','id','categories.name as cat_name')->orderby('id','asc')->get();

    if($key) {
        $products = Products::join('id, name, status, price, sale, image, descriptions','category_id','id','categories.name as cat_name')->where('name','like','%'.$key.'%')->groupBy('id, name, status, price, sale, image, descriptions')->get();
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

                <form action="" method="get" class="form-inline" role="form">

                    <div class="form-group">
                        <label class="sr-only" for="">label</label>
                        <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm">
                    </div>



                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    <a href="products-create.php" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Thêm
                        mới</a>
                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Thể loại</th>
                            <th>Trạng thái</th>
                            <th>Giá</th>
                            <th>Giá khuyến mãi</th>
                            <th>Ảnh</th>
                            <th>Mô tả</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $pro):?>
                        <tr>
                            <td><?php echo $pro->id;?></td>
                            <td><?php echo limitString($pro->name,45);?></td>
                            <td><?php echo $pro->cat_name;?></td>
                            <td><?php echo $pro->status == 0 ? 'Tạm ẩn':'Hiển thị';?></td>
                            <td><?php echo $pro->price;?></td>
                            <td><?php echo $pro->sale;?></td>
                            <td><img src="../assets/img/product/<?php echo $pro->image;?>" width="40" height="30"></td>
                            <td><?php echo limitString($pro->descriptions,20);?></td>
                            <td class="text-right">

                                <a href="products-edit.php?id=<?php echo $pro->id;?>" class="btn btn-primary">Sửa</a>
                                <a onclick="return confirm('Bạn có muốn xoá không?')"
                                    href="products-delete.php?id=<?php echo $pro->id;?>" class="btn btn-danger">Xoá</a>

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