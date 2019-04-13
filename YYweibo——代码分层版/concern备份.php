<?php
session_start();
//包含数据库
include('conn.php');
include('MySQL.php');

//获取数据
$concern_id = $_SESSION['userid'];
$be_concern_id = $_SESSION['be_concern_id'];
$be_concern_user = $_SESSION['searchUser'];
$concern_user = $_SESSION['username'];

//判断是否重复关注
$selectId_Concern = new select();
$select_row = $selectId_Concern->selectId_Concern($be_concern_id,$concern_id);

if($select_row)
{
    echo "<script>alert('不可重复关注');location.href='index备份.php';</script>";
}
else
{
//插入数据进入数据库
$insert_sql = "insert into weibo_concern (concern_id,be_concern_id,concern_user,be_concern_user) values('$concern_id','$be_concern_id','$concern_user','$be_concern_user')";
$insert_query = mysqli_query($conn,$insert_sql) or die(mysqli_error($conn));

echo "<script>alert('用户关注成功');location.href='my备份.php';</script>";
}
?>