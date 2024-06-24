<?php 
    include 'header.php';
    $cats = Categories::select('id,name')->get();
    $key = isset($_GET['keyword']) ? $_GET['keyword'] : '';
    $cat_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;
    $products = Products::join('id, name, status, price, sale, image, quantity, sold, descriptions','category_id','id','categories.name as cat_name')->orderby('id','asc')->get();

    if ($key && !$cat_id) {
        $products = Products::join('id, name, status, price, sale, image, quantity, sold, descriptions','category_id','id','categories.name as cat_name')->where('name','like','%'.$key.'%')->groupBy('id, name, status, price, sale, image, descriptions')->get();
    } else if (!$key && $cat_id) {
        $products = Products::join('id, name, status, price, sale, image, quantity, sold, descriptions','category_id','id','categories.name as cat_name')->where('category_id',$cat_id)->groupBy('id, name, status, price, sale, image, descriptions')->get();
    } else if ($key && $cat_id) {
        $products = Products::join('id, name, status, price, sale, image, quantity, sold, descriptions','category_id','id','categories.name as cat_name')->where('name','like','%'.$key.'%')->andWhere('category_id',$cat_id)->groupBy('id, name, status, price, sale, image, descriptions')->get();
    }
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Quản lý sản phẩm </h1>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-body">

                <form action="" method="get" class="form-inline" role="form">

                    <div class="form-group">
                        <label class="sr-only" for="">label</label>
                        <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm">
                    </div>
                    <div class="form-group">
                        <select name="cat_id" id="category_id" class="form-control" required="required">
                            <option value="">Chọn danh mục sản phẩm</option>
                            <?php foreach($cats as $cat) : ?>
                            <option value="<?php echo $cat->id;?>">
                                <?php echo $cat->name; ?>
                                <?php endforeach ?>
                            </option>
                        </select>
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
                            <th>Số lượng</th>
                            <th>Bán</th>
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
                            <td><?php echo $pro->quantity;?></td>
                            <td><?php echo $pro->sold;?></td>
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

    </section>
</div>
<?php include 'footer.php';?>