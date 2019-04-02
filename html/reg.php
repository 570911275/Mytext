<?php
if(!isset($_POST['submit'])){
    exit('非法访问!');
}
$username = $_POST['username'];
$password = MD5($_POST['password']);
$email = $_POST['email'];
$regdate = date("Y-m-d H:i:s");
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
//连接数据库服务器、数据库
include('conn.php');

//检测用户名是否已经存在以及存入数据
$sql = "select username from user_info where username='$username'";
$query = mysqli_query($conn,$sql);
$rows = mysqli_num_rows($query);
if($rows > 0)
{
    echo "<script>alert('该用户名已存在');history.go(-1);</script>";
}
else
{
    $user_in = "insert into user_info(username,password,email,regdate)values('$username','$password','$email','$regdate')";
    $result=mysqli_query($conn,$user_in) or die(mysqli_error($conn));
    if($result)
    {
    echo "<script>alert('注册成功');location.href='login.html';</script>";
    }
    else die('插入数据库失败');
}

?>