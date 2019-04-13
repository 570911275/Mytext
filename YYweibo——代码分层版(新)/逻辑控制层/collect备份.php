<?php
session_start();

//包含数据库文件
include('conn.php');
include('MySQLSelect.php');

//获取数据
$collectId = $_SESSION['be_id'];
$myId = $_SESSION['userid'];
$myName = $_SESSION['username'];
$collectTime = date("Y-m-d H:i:s");

//插入数据
$selectCollect = new select();
$insert_query = $selectCollect->selectCollect($myId,$myName,$collectId,$collectTime);
echo "<script>alert('微博收藏成功');location.href='index备份.php';</script>";
?>