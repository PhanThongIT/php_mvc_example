<?php
/**
 * Created by PhpStorm.
 * User: Phan Thông  IT
 * Date: 2018-05-12
 * Time: 5:58 AM
 */

// Kiểm tra request IN_SITE . nếu chưa có thì báo lỗi
if(!defined('IN_SITE')) die('THE REQUEST NOT FOUND');
$conn  = null ;
// hàm kết nối
function  db_connect(){
    global  $conn;
    if(!$conn){
        $conn = mysqli_connect('localhost' , 'root' , '','php_example') or die('Cant connect database');
        mysqli_set_charset($conn , 'UTF-8');
    }
}
//Xây dựng hàm ngắt kết nối
function db_Close(){
    global  $conn ;
    if(!$conn){
        mysqli_close($conn);
    }
}

//Lấy danh sách kết quả trả về danh sách các record
function db_get_list($sql){
    db_connect();
    global $conn ;
    $data = array();
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
    $data[]  = $row;
    }
    return $data;

}

// hàm lấy chi tiết. trả về record đầu tiên
function db_get_row($sql){
    db_connect();
     global $conn;
     $result = mysqli_query($conn , $sql);
     $row = array();
     if(mysqli_num_rows($result) > 0 ){
         $row = mysqli_fetch_assoc($result) ;

         // trả về dạng mảng : 'tên feild => 'value'
     }
     return  $row;
}

// hàm thực thi câu lệnh truy vấn. kết quả trả về là true or false
function db_excute($sql){
    db_connect() ;
    global $conn ;
    return mysqli_query($conn , $sql);
}







?>