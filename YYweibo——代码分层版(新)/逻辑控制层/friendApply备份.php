<?php
session_start();

//包含数据库文件
include('conn.php');
include('MySQLInsert.php');

//获取数据
$apply_id = $_SESSION['userid'];
$apply_user = $_SESSION['username'];
$be_apply_user = $_SESSION['searchUser'];
$apply_status = 0;

//插入数据进入数据库
$insertFriend2 = new insert();
$insert_query = $insertFriend2->insertFriend2($apply_id,$apply_user,$be_apply_user,$apply_status);

echo "<script>alert('申请成功！等待该用户同意');location.href='index备份.php';</script>";
?>