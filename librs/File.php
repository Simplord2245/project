<?php
class File {
    public static function upload($input_name){
        $img_name = '';
        if(!empty($_FILES[$input_name]['name'])){
            $img_name = $_FILES[$input_name]['name'];
            $tmp_name = $_FILES[$input_name]['tmp_name'];
            move_uploaded_file($tmp_name, UPLOAD_PATH.'/'.$img_name);
        }
    return $img_name;
    }
    public static function upload_ava($input_name){
        $img_name = '';
        if(!empty($_FILES[$input_name]['name'])){
            $img_name = $_FILES[$input_name]['name'];
            $tmp_name = $_FILES[$input_name]['tmp_name'];
            move_uploaded_file($tmp_name, UPLOAD_AVA_PATH.'/'.$img_name);
        }
    return $img_name;
    }
    public static function unlink($input_name){
        $image = UPLOAD_PATH.'/'.$input_name;
        if (file_exists($image)) {
            unlink($image);
        }
    }
}
?>