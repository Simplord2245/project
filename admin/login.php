<?php
require '../config.php';

$erorrs = [];
if(isset($_POST['email'])){
  $email = $_POST['email'];
  $pass = $_POST['password'];
  if(empty($email)){
    $erorrs['email'] = 'Email không được để trống';
  } else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $erorrs['email'] = 'Email không đúng định dạng';
  }
  if(empty($pass)){
    $erorrs['pass'] = 'Password không được để trống';
  }
  if(!$erorrs){
    $admin = Admin::checkLogin($email,$pass);
    $user = Customer::checkLogin($email,$pass);

if($admin){
  $_SESSION['admin_login'] = $admin;
  header('location: index.php'); 
} else if($user){
  if($user == 'email-not-found'){
    $erorrs['email'] = 'Email không tồn tại';
  } else if($user == 'password-not-match'){
    $erorrs['password'] = 'Mật khẩu không chính xác';
  } else {
  $_SESSION['customer_login'] = $user;
  header('location: http://localhost:8080/radios/'); 
  }
} else {
  $erorrs['login_fail'] = 'Tài khoản hoặc mật khẩu không đúng';
}
  }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../admin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../admin/assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../admin/assets/plugins/iCheck/square/blue.css">


</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Admin</b>PjRed</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php if($erorrs) : ?>

            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php foreach($erorrs as $er) : ?>
                <li><?php echo $er;?></li>
                <?php endforeach ?>
            </div>
            <?php endif ?>
            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">LogIn</button>
                    </div>
                </div>
            </form>
            <a href="register.php" class="text-center">I am not a membership yet</a>
        </div>
    </div>

</body>

</html>