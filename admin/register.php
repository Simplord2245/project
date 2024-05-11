<?php
require '../config.php';
$erorrs = [];
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $re_password = $_POST['re_password'];
  if(empty($name)){
    $erorrs = 'Tên tài khoản không được để trống';
  } else {
    if(Customer::checkName($name) > 0){
      $erorrs = 'Tên tài khoản đã tồn tại';
    }
  }
  if(empty($email)){
    $erorrs = 'Email không được để trống';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors = 'Email không đúng định dạng';
  } else {
    if(Customer::checkName($name) > 0){
      $erorrs = 'Email đã tồn tại';
    }
  }
  if(empty($phone)){
    $erorrs = 'Số điện thoại không được để trống';
  } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
      $errors['phone'] = 'Số điện thoại không đúng định dạng';
  } else {
    if(Customer::checkName($name) > 0){
      $erorrs = 'Tên tài khoản đã tồn tại';
    }
  }
  if(empty($password)){
    $erorrs = 'Mật khẩu không được để trống';
  }
  if(empty($re_password)){
    $erorrs = 'Nhập lại mật khẩu không được để trống';
  }
  if($password != $re_password){
    $erorrs = 'Mật khẩu không khớp';
  }
  if(empty($erorrs)){
    Customer::create("name=>$name,email=>$email,phone=>$phone,password=>$password");
    header('location:login.php');
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
    <a href="admin/assets/index2.html"><b>Admin</b>PjRed</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="admin/assets/index.html" method="post">
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
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="re_password" placeholder="Retype password">
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
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
