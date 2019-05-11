<?php
//引入location模型
include('LocationModel.php');

//接受数据
$id = $_GET['id'];
//删除数据库相关数据
$label = Location::findOne(['id'=>$id]);
if($label->delete())
{
    echo "<script>alert('地址删除成功！');location.href='myLocView.php';</script>";
}

?>