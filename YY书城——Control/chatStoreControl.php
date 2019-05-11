<?php
session_start();
//引入chat模型
include('ChatModel.php');

//接受数据
$reply_id  = $_GET['id'];
$be_comment_user_id = $_GET['be_userid'];
$talkwords = $_POST['talkwords'];
$book_id   = $_SESSION['chat_bookid'];
$book_name = $_SESSION['chat_bookname'];
$userid    = $_SESSION['userid'];
$username  = $_SESSION['username'];
$datetime  = date("Y-m-d H:i:s"); 
//插入数据
$label = new Chat();
$label->reply_id = $reply_id;
$label->comment = $talkwords;
$label->datetime = $datetime;
$label->comment_book_id = $book_id;
$label->comment_user_id = $userid;
$label->comment_book_name = $book_name;
$label->comment_user_name = $username;
$label->be_comment_user_id = $be_comment_user_id;
$label->insert();
//更新数据
$label_update = Chat::findOne(['id'=>$reply_id]);
$label_update->status = 1;
$label_update->update();
echo "<script>location.href='chatStoreView.php';</script>";