<?php
session_start();
//引入user模型
include('UserModel.php');

//获取商家注册用户id
$merchant_id = $_GET['id'];
//更新商家注册用户power
$merchant = User::findOne(['id'=>$merchant_id]);
$merchant->power = 1;
$_SESSION['apply_merchant_user_id'] = $merchant->id;
$_SESSION['apply_merchant_user_name'] = $merchant->username;
$merchant->update();
echo "<script>location.href='newsMerUnAudControl.php';</script>";