<?php
session_start();
//引入comment模型
include('CommentModel.php');

//获取id
$id = $_GET['id'];

//删除数据
$label = Comment::findOne(['id'=>$id]);
if($label->delete())
{
    echo "<script>alert('信息删除成功！');history.go(-1);</script>";
}