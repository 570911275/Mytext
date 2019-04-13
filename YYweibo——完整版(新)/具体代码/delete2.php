<?php
session_start();
//包含数据库文件
include('conn.php');

//接受id
if(!empty($_GET['id']))
{
//接受数据
$id = $_GET['id'];

//获取id
$manageId = $_SESSION['userid'];

//查询该id是否具有权限
$select_sql = "select * from user_info where id='$manageId' ";
$select_query = mysqli_query($conn,$select_sql);
$select_row = mysqli_fetch_array($select_query);

if($select_row['power']>0)
{
//删除数据
$delete ="delete from weibo_info where id='$id' limit 1";
$delete_query = mysqli_query($conn,$delete) or die('SQL执行失败');

//判断是否删除成功
    if($delete_query)
    {
        echo "<script>alert('微博删除成功');location.href='index.php';</script>";
       exit;
    } 
}
else 
{
    echo "<script>alert('您好，您权限不足以删除');location.href='index.php';</script>";
}
}
?>

