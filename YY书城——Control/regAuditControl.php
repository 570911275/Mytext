<?php
session_start();
//引入user模型
include('UserModel.php');

//获取注册用户id
$reg_id = $_GET['id'];
//更新注册用户power
$reg = User::findOne(['id'=>$reg_id]);
$_SESSION['apply_reg_user_id'] = $reg->id;
$_SESSION['apply_reg_user_name'] = $reg->username;
$reg->power = 1;
$reg->update();
echo "<script>location.href='newsRegAuditControl.php';</script>";