<?php
session_start();
//引入order模型
include('OrderModel.php');

//接受id
$id = $_GET['id'];

//更新状态
$label = Order::findOne(['id'=>$id]);
$label->status = 4;
$label->update();
echo "<script>alert('已确认收货');history.go(-1);</script>";