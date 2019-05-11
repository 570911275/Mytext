<?php
session_start();
//引入comment模型
include('CommentModel.php');

//接受数据
$comment = "您好，您的商家申请审核环节未通过，请重新申请";
$be_comment_user_id = $_SESSION['apply_merchant_user_id'];
$comment_user_id = $_SESSION['userid'];
$comment_user_name = $_SESSION['username'];

//发送信息
$label = new Comment();
$label->be_comment_user_id = $be_comment_user_id;
$label->comment_user_id = $comment_user_id;
$label->comment_user_name = $comment_user_name;
$label->comment = $comment;
if($label->insert())
{
    echo "<script>alert('发送信息成功！');history.go(-2);</script>";
}
