<?php
session_start();
//引入concern模型
include('ConcernModel.php');

//获取相关数据
$userid = $_SESSION['userid'];
$storename = $_GET['name'];
$storeid = $_GET['id'];

//添加数据进入数据库
$label = new Concern();
$label->userid = $userid;
$label->storename = $storename;
$label->storeid = $storeid;

$sign = Concern::findOne(['userid'=>$userid,'storeid'=>$storeid]);
if(isset($sign))
{
    echo "<script>alert('该店铺已在您的关注列表，不可重复添加！');history.go(-1);</script>";
    exit;
}
else
{
    $label->insert();
    echo "<script>alert('关注成功！');history.go(-1);</script>";
}
