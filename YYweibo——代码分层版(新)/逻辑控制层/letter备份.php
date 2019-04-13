<?php
session_start();
//包含数据库文件
include('conn.php');
include('MySQLSelect.php');

//获取数据
$letterHead = $_POST['letterHead'];
$letterDetail = $_POST['letterDetail'];
$letter_id = $_SESSION['userid'];
$letter_user = $_SESSION['username'];
$be_letter_user = $_SESSION['searchUser'];
//判断留言字数是否超过200字
if (strlen($letterDetail) >200)
{   
    echo "<script>alert('字数超过200字，请重新输入');history.go(-1);</script>";
}

//插入数据进入数据库
$insertLetter = new select();
$insert_query = $insertLetter->insertLetter($letter_id,$be_letter_user,$letter_user,$letterDetail,$letterHead);

echo "<script>alert('留言成功！');location.href='index备份.php';</script>";

?>
