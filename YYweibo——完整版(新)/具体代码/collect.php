<?php
session_start();

//包含数据库文件
include('conn.php');

//获取数据
$collectId = $_SESSION['be_id'];
$myId = $_SESSION['userid'];
$myName = $_SESSION['username'];
$collectTime = date("Y-m-d H:i:s");

//插入数据
$insert_sql = "insert into weibo_collect(my_id,my_user,collect_id,collect_time) values('$myId','$myName','$collectId','$collectTime')";
$insert_query = mysqli_query($conn,$insert_sql) or die(mysqli_error($conn));
echo "<script>alert('微博收藏成功');location.href='index.php';</script>";
?>