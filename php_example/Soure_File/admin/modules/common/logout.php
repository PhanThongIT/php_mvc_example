<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-05-14
 * Time: 2:35 PM
 */
if(!defined('IN_SITE')) die('Page not found!');
 // xử lý chức năng đăng xuất
set_logout(); // xóa session của đăng nhập
rederect(base_url('admin/?m=common&a=login'));
?>