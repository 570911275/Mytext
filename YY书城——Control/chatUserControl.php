<?php
session_start();
//引入chat模型
include('ChatModel.php');

//接受数据
$talkwords = $_POST['talkwords'];
$book_id   = $_SESSION['chat_bookid'];
$book_name = $_SESSION['chat_bookname'];
$userid    = $_SESSION['userid'];
$username  = $_SESSION['username'];
$status    = 0;
$datetime  = date("Y-m-d H:i:s"); 
//插入数据
$label = new Chat();
$label->status  = $status;
$label->comment = $talkwords;
$label->datetime = $datetime;
$label->comment_book_id = $book_id;
$label->comment_user_id = $userid;
$label->comment_book_name = $book_name;
$label->comment_user_name = $username;
$label->insert();
echo "<script>location.href='chatUserView.php';</script>";