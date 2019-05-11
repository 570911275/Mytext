<?php
session_start();
//引入user模型
include('UserModel.php');

//获取注册店铺商家id
$reg_id = $_GET['id'];
//更新注册店铺商家power
$reg = User::findOne(['id'=>$reg_id]);
$reg->power = 1;
$_SESSION['apply_store_user_id'] = $reg->id;
$_SESSION['apply_store_user_name'] = $reg->username;
$reg->update();
echo "<script>location.href='newsStoreUnAuditControl.php';</script>";