<?php
session_start();
//引入location模型
include('LocationModel.php');

//接受数据
$id = $_SESSION['updateid'];
$location = $_POST['location'];
$username = $_POST['username'];
$sex      = $_POST['sex'];
$phone    = $_POST['phone'];

//检验是否有数据
if($location == "")
{
    echo "<script>alert('请输入收货地址！');history.go(-1);</script>";
}
else if($username =="")
{
    echo "<script>alert('请输入收件人姓名！');history.go(-1);</script>";
}
else if($sex =="")
{
    echo "<script>alert('请输入收件人性别！');history.go(-1);</script>";
}
else if($phone =="")
{
    echo "<script>alert('请输入电话号码！');history.go(-1);</script>";
}
else 
{
//插入数据进入数据库
$label = Location::findOne(['id'=>$id]);
$label->username = $username;
$label->sex      = $sex;
$label->phone    = $phone;
$label->location = $location;
if($label->update())
{
    echo "<script>alert('地址修改成功！');location.href='myLocView.php';</script>";
}
}
?>