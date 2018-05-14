<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-05-12
 * Time: 11:32 PM
 */
//tạo url
function base_url($url)
{
    return 'http://localhost:81/login_mvc/php_mvc_example/php_example/Soure_File/' . $url;
}

// Hàm đưa về trang xử lý
function rederect($url)
{
    header("location:{$url}");
    exit();
}

//hàm lấy value từ POST
function input_POST($key)
{
    return (isset($_POST[$key]) ? trim($_POST[$key]) : false);
}

// lấy value từ GET
function input_GET($key)
{
    return (isset($_GET[$key]) ? trim($_GET[$key]) : false);
}

// kiểm tra hàm submit Button
function is_submit($key)
{
    return (isset($_POST['request_name']) && $_POST['request_name'] == $key);
}

//hàm show error
function show_error($error, $key)
{
    echo '<span style="color: red">' . (empty($error[$key]) ? "" : $error[$key]) . '</span>';

}

// Tạo chuỗi query string
function create_link($url, $filter = array())
{
    $string = '';
    foreach ($filter as $key => $val)
    {
        if ($val != '')
        {
            $string .= "&{$key}={$val}";
        }
    }
    return $url . ($string ? '?' . ltrim($string, '&') : '');
}

// Xây dựng chức năng hàm phân trang
function paging($link, $total_records, $current_page, $limit)
{
// Tính tổng số trang
    $total_Page = ceil($total_records / $limit); // trả về tổng số trang
    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_Page)
    {
        $current_page == $total_Page;
    }
    else if ($current_page < 1)
    {
        $current_page == 1;
    }
    // Tìm Start điểm bất đầu của 1 record trong list

    $start = ($current_page - 1) * $limit;

    $html = '';
    // nếu như current page > 1  và total page >1 thì hiện thị nút Pre
    if ($current_page > 1 && $total_Page > 1)
    {
        $html .= '<a href="' . str_replace('{page}', $current_page - 1, $link) . '">Pre </a>';
    }

    // Chạy vòng lặp in các số ra
    for ($i = 0; $i < $total_Page; $i++)
    {
        if ($i == $current_page)
        {
            $html .= '<span>' . $i . '</span>';
        }
        else
        {
            $html .= '<a href="' . str_replace('{page}', $i, $link) . '">' . $i . '</a>';
        }
    }
    // Nếu current page <  totalpage  và  totalpage > 1 hiển thị nút Next
    if ($current_page < $total_Page && $total_Page > 1)
    {
        $html .= '<a href="' . str_replace('{page}', $current_page + 1, $link) . '">Next</a>';
    }

    // Trả về kết quả
    return array(
        'start' => $start,  // vị trí đầu tiền recrord chạy
        'limit' => $limit, //  số record muốn lấy về trên 1  trang
        'html'  => $html // nội dụng html phân trang
    );
}

?>