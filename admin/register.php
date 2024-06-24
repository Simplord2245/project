<?php
require '../config.php';
$erorrs = [];
if(isset($_POST['name'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $re_password = $_POST['re_password'];
  if($name == ''){
    $erorrs['name'] = 'Họ và tên không được để trống';
  }
  if($email == ''){
    $erorrs['email'] = 'Email không được để trống';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Email không đúng định dạng';
  }
  if($phone == ''){
    $erorrs['phone'] = 'Số điện thoại không được để trống';
  } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
      $errors['phone'] = 'Số điện thoại không đúng định dạng';
  }
  if($address == ''){
    $erorrs['address'] = 'Địa chỉ không được để trống';
  }
  if($password == ''){
    $erorrs['password'] = 'Mật khẩu không được để trống';
  } else {
    $_POST['password'] = password_hash($password,PASSWORD_BCRYPT);
  }
  if($re_password == ''){
    $erorrs['re_password'] = 'Xác nhận mật khẩu không được để trống';
  } else if($password != $re_password){
    $erorrs['re_password'] = 'Mật khẩu không khớp';
  }
  if(!$erorrs){
    unset($_POST['re_password']);
    Customer::create($_POST);
    header('location: login.php');
  } 
}
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminPjRed | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../admin/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../admin/assets/plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="!#"><b>Admin</b>PjRed</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="" method="post" enctype="multipart/form-data">
    <?php if($erorrs) : ?>
      
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php foreach($erorrs as $er) : ?>
          <li><?php echo $er;?></li>
          <?php endforeach ?>
      </div>
    <?php endif ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="phone" placeholder="Phone">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="address" placeholder="Address">
        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="re_password" placeholder="Confirm password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck" style="margin-left: 20px;">
            <label>
              <input type="checkbox"><a href="#">I agree to the terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="login.php" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.0 -->
<script src="admin/assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="admin/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="admin/assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' 
    });
  });
</script>
</body>
</html>
