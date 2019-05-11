<?php
session_start();
//引入book模型
include('BookModel.php');

//获取图书id
$bookid = $_GET['id'];

//删除数据数据库
$label = Book::findOne(['id'=>$bookid]);
if($label->delete())
{
    echo "<script>alert('书籍下架成功！');history.go(-1);</script>";
}
