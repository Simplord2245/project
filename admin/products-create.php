<?php
include 'header.php';
    $cats = Categories::select('id,name')->get();
$errors = [];
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sale = $_POST['sale'] ? $_POST['sale'] : 0;
    $descriptions = $_POST['descriptions'];
    $category_id = $_POST['category_id'];
    $image = File::upload('image');
    $_POST['image'] = $image;

    if($name == ''){
    $errors['name'] = 'Tên sản phẩm không được để trống'; 
    }
    if($category_id == ''){
        $errors['category_id'] = 'Danh mục sản phẩm không dược để trống';
    }
    if($price == ''){
    $errors['price'] = 'Giá sản phẩm không được để trống'; 
    } else if(!is_numeric($price)){
        $errors['price'] = 'Giá sản phẩm phải là số';
    }
    if($sale && !is_numeric($sale)){
        $errors['sale'] = 'Giá khuyến mãi phải là số';
    } else if($sale && $sale > 100){
        $errors['sale'] = 'Giá khuyến mãi không được vượt quá 100';
    }
    if(!$errors && Products::create($_POST)){
        header('location: products.php');
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Quản lý sản phẩm </h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <legend>Thêm mới sản phẩm</legend>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-success">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name" id=""
                                            placeholder="Nhập tên sản phẩm">
                                            <?php if(isset($errors['name'])) : ?>
                                                <div class="help-block" style="color:red;"><?php echo $errors['name'];?></div>
                                                <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mô tả</label>
                                        <textarea name="descriptions" id="" cols="30" rows="10"
                                            style="width: 1052px; height: 244px;"
                                            placeholder="Nhập mô tả sản phẩm"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="panel panel-success">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <select name="category_id" id="category_id" class="form-control"
                                                required="required">
                                                <option value="">Chọn danh mục sản phẩm</option>
                                                <?php foreach($cats as $cat) : ?>
                                                <option value="<?php echo $cat->id;?>">
                                                    <?php echo $cat->name; ?>
                                                    <?php endforeach ?>
                                                </option>
                                            </select>
                                            <?php if(isset($errors['category_id'])) : ?>
                                                <div class="help-block" style="color:red;"><?php echo $errors['category_id'];?></div>
                                                <?php endif ?>
                                        </div>
                                        <label for="">Trạng thái</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" id="input" value="1"
                                                    checked="checked">
                                                Hiển thị
                                            </label>
                                            <label>
                                                <input type="radio" name="status" id="input" value="0">
                                                Tạm ẩn
                                            </label>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá</label>
                                        <input type="text" class="form-control" name="price" id=""
                                            placeholder="Nhập giá">
                                            <?php if(isset($errors['price'])) : ?>
                                                <div class="help-block" style="color:red;"><?php echo $errors['price'];?></div>
                                                <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá khuyến mãi</label>
                                        <input type="text" class="form-control" name="sale" id=""
                                            placeholder="Nhập giá khuyến mãi">
                                            <?php if(isset($errors['sale'])) : ?>
                                                <div class="help-block" style="color:red;"><?php echo $errors['sale'];?></div>
                                                <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ảnh</label>
                                        <input type="file" name="image">
                                    </div>
                                    <a href="products.php" type="button" class="btn btn-danger"><i class="fas fa-arrow-left-long"></i>Quay lại</a>
                                    <button type="submit" style="margin-left: 310px;" class="btn btn-primary"><i class="fa fa-plus"></i>Thêm
                                        mới</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
</div>
<?php
include 'footer.php';
?>