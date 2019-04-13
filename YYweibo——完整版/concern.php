<?php
session_start();
//包含数据库
include('conn.php');

//获取数据
$concern_id = $_SESSION['userid'];
$be_concern_id = $_SESSION['be_concern_id'];
$be_concern_user = $_SESSION['searchUser'];
$concern_user = $_SESSION['username'];

//判断是否重复关注
$select_sql = "select * from weibo_concern where be_concern_id=$be_concern_id and concern_id=$concern_id";
$select_query = mysqli_query($conn,$select_sql);
$select_row = mysqli_fetch_array($select_query);

if($select_row)
{
    echo "<script>alert('不可重复关注');location.href='index.php';</script>";
}
else
{
//插入数据进入数据库
$insert_sql = "insert into weibo_concern (concern_id,be_concern_id,concern_user,be_concern_user) values('$concern_id','$be_concern_id','$concern_user','$be_concern_user')";
$insert_query = mysqli_query($conn,$insert_sql) or die(mysqli_error($conn));

echo "<script>alert('用户关注成功');location.href='my.php';</script>";
}
?>