<?php
session_start();
//引入collect模型
include('CollectModel.php');

//获取bookid
$id = $_GET['id'];

//获取相关数据
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$bookname = $_SESSION['bookname_collect'];
$author = $_SESSION['author_collect'];
$publish = $_SESSION['publish_collect'];
$variety = $_SESSION['variety_collect'];
$imgname = $_SESSION['imgname_collect'];
$disinfo = $_SESSION['disinfo_collect'];
$storeid = $_SESSION['storeid_collect'];
$storename = $_SESSION['storename_collect'];

//添加数据进入数据库
$label = new Collect();
$label->bookid = $id;
$label->userid = $userid;
$label->username = $username;
$label->bookname = $bookname;
$label->author = $author;
$label->publish = $publish;
$label->variety = $variety;
$label->imgname = $imgname;
$label->disinfo = $disinfo;
$label->storeid = $storeid;
$label->storename = $storename;

$sign = Collect::findOne(['bookid'=>$id,'userid'=>$userid]);
if(isset($sign))
{
    echo "<script>alert('该商品已处于您的收藏夹，不可重复添加！');history.go(-1);</script>";
    exit;
}
else
{
    echo "<script>alert('收藏成功！');history.go(-1);</script>";
}