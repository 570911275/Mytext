<?php
session_start();
//引入book模型
include('BookModel.php');

//获取图书id
$storeid = $_GET['id'];

//删除数据数据库
$label = Book::deleteAll(['storeid'=>$storeid]);

echo "<script>alert('商铺封闭成功！');history.go(-1);</script>";

