<?php
session_start();
//引入book模型
include('BookModel.php');

//获取图书id
$book_id = $_GET['id'];
//更新图书power
$book = Book::findOne(['id'=>$book_id]);
$_SESSION['apply_storeid'] = $book->storeid;
$_SESSION['apply_book_id'] = $book->id;
$_SESSION['apply_book_name'] = $book->bookname;
$book->delete();
echo "<script>location.href='newsBookUnAudControl.php';</script>";