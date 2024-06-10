<?php
include 'header.php';
$error = '';
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $cat = Categories::select()->where('name', $name)->find();
    if ($name == '') {
        $error = 'Tên danh mục không được để trống';
    }
    if ($cat) {
        $error = 'Tên danh mục đã tồn tại';
    }
    if (!$error && Categories::create($_POST)) {
        header('location: category.php');
    }
}
?>
<div class="content-wrapper">

    <section class="content-header">
        <h1>Thêm mới danh mục </h1>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-body">
                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <legend>Thêm mới danh mục</legend>

                    <div class="row">
                        <div class="col-md-3">

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="">Tên danh mục</label>
                                        <input type="text" class="form-control" name="name" id="" placeholder="Nhập tên danh mục">
                                        <?php if (isset($error)) : ?>
                                            <div class="help-block" style="color:red;"><?php echo $error; ?></div>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Trạng thái</label>

                                        <div class="radio">
                                            <label>
                                                <input style="margin-right: 5px;" type="radio" name="status" id="input" value="1" checked="checked">
                                                Hiển thị
                                            </label>
                                            <label>
                                                <input type="radio" name="status" id="input" value="0">
                                                Tạm ẩn
                                            </label>
                                        </div>

                                    </div>
                                    <a href="category.php" type="button" class="btn btn-danger"><i class="fas fa-arrow-left-long"></i>Quay lại</a>

                                    <button type="submit" style="margin-left: 170px;" class="btn btn-primary"><i class="fa fa-plus"></i>Thêm mới</button>

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