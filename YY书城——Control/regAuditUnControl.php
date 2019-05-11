<?php
//引入user模型
include('UserModel.php');

//获取id
$id = $_GET['id'];

//删除数据
$label = User::findOne(['id'=>$id]);
if($label->delete())
{
    echo "<script>alert('用户未通过审核！');history.go(-1);</script>";
}