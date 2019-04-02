<?php
session_start();
//登录
var_dump($_POST);
if (!isset($_POST['submit']))
{
    exit('非法访问！！！');
}

$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);
$email = $_POST['email'];
$phone = $_POST['phone'];

//包含数据库连接文件
include('conn.php');

//检验用户名及其密码等信息是否正确
$check_query = mysqli_query($conn,"select id from user_rag where username='$username' and password='$password' and email='$email' phone='$phone' limit 1");
$row = mysqli_fetch_array($check_query)
if($row)
{
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['id'];
    echo $username,'YY微博欢迎你！进入<a href="my.php">用户中心</a><br/>';
    exit;
}
else 
{
    echo "<script>alert('登录失败，请点击此处重新登录');history.go(-1);</script>";
}
?>