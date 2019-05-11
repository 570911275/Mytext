<?php
session_start();
//引入book模型
include('BookModel.php');

//获取id
$id = $_GET['id'];

//更新数据
$label = Book::findOne(['id'=>$id]);
$old_praise = $label->praise;
$new_praise=$old_praise+1;
$label->praise = $new_praise;
if($label->update())
{
    echo "<script>alert('您好，您已评论成功！');location.href='indexView.php';</script>";
}
?>