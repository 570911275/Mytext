<?php
session_start();
//引入user模型
include('UserModel.php');

//获取商家注册用户id
$reg_id = $_GET['id'];
//更新商家注册用户power
$reg = User::findOne(['id'=>$reg_id]);
$reg->power = 3;
$_SESSION['apply_merchant_user_id'] = $reg->id;
$_SESSION['apply_merchant_user_name'] = $reg->username;
$reg->update();
echo "<script>location.href='newsMerDoAudControl.php';</script>";