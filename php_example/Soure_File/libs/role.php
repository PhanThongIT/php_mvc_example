<?php
if(!defined('IN_SITE')) die('THE REQUEST NOT FOUND');

// Hàm thiết lập là đã đăng nhập ss_user_token là key , lưu value  username và level

function set_logged($username, $level)
{
    set_session('ss_user_token', array(
        'username' => $username,
        'level'    => $level
    ));
}

// Hàm thiết lập đăng xuất
function set_logout()
{
    remove_session('ss_user_token');
}

// hàm kiểm tra xem đã đăng nhập hay chưa ?

function is_logged()
{
    $user = get_session('ss_user_token');
    return $user;
}

//Hàm kiểm tra xem có phải là admin hay không
function is_admin()
{
    $user = is_logged();
    if (!empty($user['level']) && $user['level'] == '1')
    {
        return true;
    }
    return false;
}
?>