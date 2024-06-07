<?php
session_start();
$file_path = $_SERVER['SCRIPT_FILENAME'];
$n = strpos($file_path,'admin');
$n = $n > 0 ? $n : strpos($file_path,'index.php');
$app_folder =  substr($file_path, 0, $n);

define('APP_PATH',$app_folder);
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('DB','radios');
spl_autoload_register(function($class_name){
    $class_path = APP_PATH.'librs/'.$class_name.'.php';
    if(file_exists($class_path)){
        require $class_path;
    } else {
        echo "Class <b>$class_path</b> không tồn tại, vui lòng kiểm tra lại";
    }
});
function limitString($string, $maxLength = 35) {
    if (strlen($string) <= $maxLength) {
        return $string;
    } else {
        return substr($string, 0, $maxLength) . '...';
    }
}
$app = new App();
 
?>