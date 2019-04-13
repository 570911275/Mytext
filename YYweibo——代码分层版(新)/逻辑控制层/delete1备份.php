<?php
//包含数据库文件
include('conn.php');
include('MySQLDelete.php');

//接受id
if(!empty($_GET['id']))
{
//接受数据
$id = $_GET['id'];

//删除数据
$deleteWeibo = new delete();
$delete_query = $deleteWeibo->deleteWeibo($id);

//判断是否删除成功
    if($delete_query)
    {
        echo "<script>alert('微博删除成功');location.href='my备份.php';</script>";
       exit;
    } 
}
?>