<?php

//包含数据库
include('conn.php');
include('MySQLInsert.php');

//获取id和name
$visitor = $_SESSION['username'];
$be_visitor = $_SESSION['searchUser']; 
$visit_time = date("Y-m-d H:i:s");

//插入数据进入数据库
$insertVisit = new insert();
$query = $insertVisit->insertVisit($visitor,$visit_time,$be_visitor);
?>
