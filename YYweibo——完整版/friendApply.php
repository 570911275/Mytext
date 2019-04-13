<?php
session_start();

//包含数据库文件
include('conn.php');

//获取数据
$apply_id = $_SESSION['userid'];
$apply_user = $_SESSION['username'];
$be_apply_user = $_SESSION['searchUser'];
$apply_status = 0;

//插入数据进入数据库
$insert_sql = "insert into friend_apply(apply_id,apply_user,be_apply_user,apply_status) values('$apply_id','$apply_user','$be_apply_user','$apply_status')";
$insert_query = mysqli_query($conn,$insert_sql) or die(mysqli_error($conn));

echo "<script>alert('申请成功！等待该用户同意');location.href='index.php';</script>";
?>