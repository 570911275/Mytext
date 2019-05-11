<?php
session_start();
//引入order模型
include('OrderModel.php');

//获取id
$id = $_GET['id'];
$label = Order::findOne(['id'=>$id]);
if($label->delete())
{
    echo "<script>alert('您好，订单已成功取消！');location.href='indexView.php';</script>";
}