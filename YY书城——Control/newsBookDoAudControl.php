<?php
session_start();
//引入comment模型
include('CommentModel.php');

//接受数据
$be_comment_user_id = $_SESSION['apply_storeid'];
$comment_user_id = $_SESSION['userid'];
$comment_user_name = $_SESSION['username'];
$comment_book_id = $_SESSION['apply_book_id'];
$comment_book = $_SESSION['apply_book_name'];
$comment = "恭喜您，您的".$comment_book."图书审核已通过";

//发送信息
$label = new Comment();
$label->be_comment_user_id = $be_comment_user_id;
$label->comment_book_id = $comment_book_id;
$label->comment_book = $comment_book;
$label->comment_user_id = $comment_user_id;
$label->comment_user_name = $comment_user_name;
$label->comment = $comment;
if($label->insert())
{
    echo "<script>alert('发送信息成功！');history.go(-2);</script>";
}
