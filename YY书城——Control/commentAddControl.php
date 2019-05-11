<?php
session_start();
//引入comment模型
include('CommentModel.php');

//接受数据
$comment = $_POST['comment'];
$comment_book_id = $_SESSION['comment_id'];
$comment_book = $_SESSION['comment_name'];
$comment_user_name = $_SESSION['username'];
$comment_user_id = $_SESSION['userid'];
$imgname     = $_FILES['bookPicture']['name'];//文件名称
$tmp         = $_FILES['bookPicture']['tmp_name'];//临时存储的文件名

//获取回复数据
if(move_uploaded_file($tmp,$imgname))
{
$label = new Comment();
$label->imgname = $imgname;
$label->comment_book_id = $comment_book_id;
$label->comment_book = $comment_book;
$label->comment_user_name = $comment_user_name;
$label->comment_user_id = $comment_user_id;
$label->comment = $comment;
if($label->insert())
{
    echo "<script>alert('回复成功！');history.go(-2);</script>";
}
}