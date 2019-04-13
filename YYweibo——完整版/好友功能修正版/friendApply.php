<?php
session_start();

//包含数据库文件
include('conn.php');

//获取数据
$apply_id = $_SESSION['userid'];
$apply_user = $_SESSION['username'];
$be_apply_user = $_SESSION['searchUser'];
$apply_status = 0;

//判断是否已为好友
$select_sql = "select * from friend_list where my_id='$apply_id' and friend_user='$be_apply_user' ";
$select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
$select_row = mysqli_fetch_array($select_query);

if($select_row)
{
    echo "<script>alert('您好，您们已经是好友了！');location.href='index.php';</script>";
}
else
{
//插入数据进入数据库
$insert_sql = "insert into friend_apply(apply_id,apply_user,be_apply_user,apply_status) values('$apply_id','$apply_user','$be_apply_user','$apply_status')";
$insert_query = mysqli_query($conn,$insert_sql) or die(mysqli_error($conn));

echo "<script>alert('申请成功！等待该用户同意');location.href='index.php';</script>";
}
?>