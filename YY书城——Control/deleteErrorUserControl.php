<?php
session_start();
//引入user模型
include('UserModel.php');

//获取用户id
$userid = $_GET['id'];

//添加数据进入数据库
$label = User::findOne(['id'=>$userid]);
if($label->delete())
{
    echo "<script>alert('用户封闭成功！');history.go(-1);</script>";
}
