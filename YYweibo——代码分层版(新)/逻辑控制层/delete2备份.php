<?php
session_start();
//包含数据库文件
include('conn.php');
include('MySQLDelete.php');
include('MySQLSelect.php');

//接受id
if(!empty($_GET['id']))
{
//接受数据
$id = $_GET['id'];

//获取id
$manageId = $_SESSION['userid'];

//查询该id是否具有权限
$selectId = new select();
$select_row = $selectId->selectId($manageId);

if($select_row['power']>0)
{
//删除数据
$deleteWeibo = new delete();
$delete_query = $deleteWeibo->deleteWeibo($id);

//判断是否删除成功
    if($delete_query)
    {
        echo "<script>alert('微博删除成功');location.href='index备份.php';</script>";
       exit;
    } 
}
else 
{
    echo "<script>alert('您好，您权限不足以删除');location.href='index备份.php';</script>";
}
}
?>

