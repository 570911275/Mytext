<?php

//包含数据库
include('conn.php');

//获取id和name
$visitor = $_SESSION['username'];
$be_visitor = $_SESSION['searchUser']; 
$visit_time = date("Y-m-d H:i:s");

//插入数据进入数据库
$sql = "INSERT INTO weibo_visit(visitor,visit_time,be_visitor) VALUES ('$visitor','$visit_time','$be_visitor')";
$query = mysqli_query($conn,$sql) or die ("SQL语句插入失败");

?>
