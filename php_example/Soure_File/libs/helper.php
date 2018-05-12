<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-05-12
 * Time: 11:32 PM
 */
//tạo url
function base_url($url){
    return 'http://localhost:81/login_mvc/php_mvc_example/php_example/Soure_File/'.$url;
}
// Hàm đưa về trang xử lý
function rederect($url){
    header("location:{$url}");
    exit();
}
//hàm lấy value từ POST
function input_POST($key){
    return (isset($_POST[$key])? trim($_POST[$key]):false);
}
// lấy value từ GET
function  input_GET($key){
    return (isset($_GET[$key]) ? trim($_GET[$key]):false);
}
// kiểm tra hàm submit Button
function is_submit($key){
    return (isset($_POST['request_name']) && $_POST['request_name'] == $key );
}
//hàm show error
function show_error($error , $key){
    echo '<span style="color: red">'.(empty($error[$key]) ? "" : $error[$key]). '</span>';

}
?>