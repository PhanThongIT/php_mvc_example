<?php
if(!defined('IN_SITE')) die ('page not found');
function db_user_get_by_username($username){
    $username = addslashes($username); //  tránh lỗi sql injection
    $sql = "SELECT * FROM tb_user WHERE username='{$username}'";
    return db_get_row($sql);
}
?>