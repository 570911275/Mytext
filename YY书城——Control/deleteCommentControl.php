<?php
session_start();
//引入collect模型
include('CollectModel.php');

//获取id
$id = $_GET['id'];

//删除数据
$label = Collect::findOne(['id'=>$id]);
if($label->delete())
{
    echo "<script>alert('已移出收藏成功');history.go(-1);</script>";
}