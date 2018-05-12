<?php

/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-05-12
 * Time: 11:06 PM
 */

?>
<?php
$error = array(); // lưu lại lỗi trong mảng
//Kiểm tra nếu là admin thì đưa về dashbord
if (is_admin())
{
    rederect(base_url('admin/?m=common&a=dashboard'));  // đưa về trang quản lý
}
// Nếu người dùng submit Form đăng nhập

if (is_submit('login'))
{
// lấy tên đăng nhập và pass
    $username = input_POST('username');
    $password = input_POST('password');
    //Kiểm tra tên username
    if (empty($username))
    {
        $error['username'] = "Please input Username!";
    }
    //kiểm tra mật khẩu
    if (empty($password))
    {
        $error['password'] = "Please input Password";
    }
    // Nếu OK . Xử lý database
    if (!$error)
    {
        include_once('database/user.php');
        //Lấy thông tin theo username
        $user = db_user_get_by_username($username);
        //kiểm tra dữ liệu nhập vào với dữ liệu truy vấn
        if (empty($user))
        {
            $error['username'] = "Not found Username in Database";
        }
        else if ($user['password'] != $password)
        {
            $error['password'] = "Login faile with  Password";
        }
        // nếu kiểm tra thành công thì đưa về trang chủ
        if (!$error)
        {
            set_logged($user['username'], $user['level']);
            rederect(base_url('admin/?m=common&a=dashboard'));

        }
    }
}

?>
<?php
include_once('widgets/header.php');
?>
<h1>Trang đăng nhập!</h1>
<form method="post" action="<?php echo base_url('admin/?m=common&a=login'); ?>">
    <table>
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="username" value=""/>
                <?php show_error($error, 'username'); ?></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" value=""/>
                <?php show_error($error, 'password'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" value="login" name="request_name">
            </td>
            <td><input type="submit" name="login-btn" value="Đăng nhập"/></td>
        </tr>
    </table>
</form>

<?php
include_once('widgets/footer.php');

?>

