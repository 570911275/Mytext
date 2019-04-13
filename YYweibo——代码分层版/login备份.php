<?php
session_start();
//登录
if (!isset($_POST['submit']))
{
    exit('非法访问！！！');
}

$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);
$email = $_POST['email'];

//包含数据库连接文件
include('conn.php');

//检验用户名及其密码等信息是否正确
include('MySQL.php');
$selectRight = new select();
$row = $selectRight->selectRight($username,$password,$email);
mysqli_error($conn);
if($row>0)
{ 
    //登录成功
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $row['id'];
    echo "<script>alert('YY微博欢迎您！');location.href='my备份.php';</script>";
    exit;
}
else 
{
    echo "<script>alert('登录失败，请点击此处重新登录');history.go(-1);</script>";
}
?>
