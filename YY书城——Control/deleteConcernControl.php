<?php
//引入concern模型
include('ConcernModel.php');

//获取id
$id = $_GET['id'];
$label  = Concern::findOne(['id'=>$id]);

if($label->delete())
{
    echo "<script>alert('取消关注成功！');history.go(-1);</script>";
}
