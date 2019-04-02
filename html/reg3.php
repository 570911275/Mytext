<?php
//用户注册
if (!isset($_POST))
{
    exit('非法访问！！！');
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
//注册信息判断
if (!preg_match('^[\w\80-\xff]{3,15}$^',$username))
{
    echo "<script>alert('用户名不规范');history.go(-1);</script>";
}
if (strlen($password) < 6)
{
    echo "<script>alert('密码长度不符合规矩');history.go(-1);</script>";
}
if (!preg_match('^[a-zA-Z0-9_.]+@[a-zA-Z0-9_]+\.[a-zA-Z0-9.]+$^',$email))
{
    echo "<script>alert('电子邮箱格式错误');history.go(-1);</script>";
}
if (!preg_match('^[0-9]$^',$phone) and strlen($phone)<=4 or strlen($phone)>=15)
{
    echo "<script>alert('手机号码格式错误');history.go(-1);</script>";
}
//包含数据库连接文件
include('conn.php');
//检验用户名是否存在
$check_query = mysqli_query($conn,"select id from user_reg where username='$username' limit 1 ");
if (mysqli_num_rows($check_query)>0)
{
    echo '错误：用户名',$username,'已经存在';
    echo "<script>alert('请重新注册');history.go(-1);</script>";
}
//写入数据
$password = MD5 ($password);
$regdate = time ();
$sql = "INSERT INTO user_reg(username,password,email,phone,regdate)VALUES('$username','$password','$email','$phone','$regdate')";
if (mysqli_query($conn,$sql))
{
    exit('用户注册成功！点击此处 <a href="login.heml"> 登录 </a>');
}
else
{
    echo '抱歉！添加数据失败：',mysqli_error($conn),'<br/>';
    echo "<script>alert('请点击此处重新注册');history.go(-1);</script>";
}
?>