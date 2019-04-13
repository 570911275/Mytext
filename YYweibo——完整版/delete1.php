<?php
//包含数据库文件
include('conn.php');

//接受id
if(!empty($_GET['id']))
{
//接受数据
$id = $_GET['id'];

//删除数据
$delete ="delete from weibo_info where id='$id' limit 1";
$delete_query = mysqli_query($conn,$delete) or die('SQL执行失败');

//判断是否删除成功
    if($delete_query)
    {
        echo "<script>alert('微博删除成功');location.href='my.php';</script>";
       exit;
    } 
}
?>