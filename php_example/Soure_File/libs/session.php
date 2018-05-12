<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-05-12
 * Time: 6:27 AM
 */
// Gán các session
session_start();

if(!defined('IN_SITE')) die('THE REQUEST NOT FOUND');
function set_session($key,$value){
    $_SESSION[$key] = $value;
}

// Lấy các session true / false
function get_session($key){
    return (isset($_SESSION[$key])) ? $_SESSION[$key] : false;
}

//Xóa session. kiểm trả tồn tại trước khi xóa.
function remove_session($key){
    if(isset($_SESSION[$key])){
        unset($_SESSION[$key]);
    }
}


?>