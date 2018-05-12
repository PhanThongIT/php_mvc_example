<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-05-12
 * Time: 5:56 AM
 */
// Khai báo hàm bảo vệ project
define('IN_SITE', true); // hàm số ngăn chặn truy cập thẳng vào thư viện định nghĩa sẵn

// Lấy module và action trên url
$module = isset($_GET['m']) ? $_GET['m'] : ''; // nếu tồn tại module thì lấy giá trị ngược lại trả về rỗng
$action = isset($_GET['a']) ? $_GET['a'] : ''; // tương tự như module là kiểm tra và lấy giá trị action /.

// Trường hợp không truyền module và action thì ta lấy module và action mặc định
if (empty($module) || empty($action))
{
    $module = 'common';
    $action = 'login';

}

// Tạo thư mục đường dẫn và lưu vào biến path;
$path = 'modules/' . $module . '/' . $action . '.php';
// Trường hợp truyền url đúng với action và modules
if (file_exists($path))
{
    include_once('../libs/database.php');
    include_once('../libs/role.php');
    include_once('../libs/session.php');
    include_once ('../libs/helper.php');
    include_once($path);
}
else
{
    //Trường hợp không đúng thì đưa về lỗi 404
    include_once ('modules/common/404.php');
}


?>