<?php
if(!isset($_POST['submit'])){
    exit('非法访问!');
}
$username = $_POST['username'];
$password = MD5($_POST['password']);
$email = $_POST['email'];
$regdate = date("Y-m-d H:i:s");
$password2 = $_POST['password2'];

//给予管理员权限
if(!empty($password2))
{
    $power=1;
}
//注册信息判断
if(!preg_match('^[\w\x80-\xff]{3,15}$^', $username)){
    echo "<script>alert('用户名不规范');history.go(-1);</script>";
}
if(strlen($password) < 6){
    echo "<script>alert('密码长度不符合规矩');history.go(-1);</script>";
}
if(!preg_match('^[a-zA-Z0-9_.]+@[a-zA-Z0-9_]+\.[a-zA-Z0-9.]+$^', $email)){
    echo "<script>alert('电子邮箱格式错误');history.go(-1);</script>";
}

//包含数据库
include('conn.php');

//检测用户名是否已经存在以及存入数据
include('MySQL.php');
$selectUser=new select();
$rows=$u->selectUser($username);
if($rows > 0)
{
    echo "<script>alert('该管理员名已存在');history.go(-1);</script>";
}
else
{
    $insertUser=new insert();
    $result=$s->insertUser($username,$password,$email,$regdate);
    if($result)
    {
    echo "<script>alert('前往验证');location.href='codePicture备份.html';</script>";
    }
    else die('插入数据库失败');
}

?>