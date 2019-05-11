<?php
session_start();
//引入user模型
include('UserModel.php');

//获取数据
$userid = $_SESSION['userid'];
$price_all = $_SESSION['price_all']; 

//对比金额
$label = User::findOne(['id'=>$userid]);
if($price_all>$label->money)
{
  //余额不足
  $label->status = 01;
  echo "<script>location.href='payBook2Control.php';</script>";
}
else 
{
    $label->money = $label->money-$price_all;
    $label->exp   = $label->exp+10; 
    $label->update();
    echo "<script>location.href='payOrderControl.php';</script>";
}