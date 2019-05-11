<?php
session_start();
//引入orders模型
include('OrderModel.php');

//获取bookid
$id = $_GET['id'];

//获取相关数据
$status = 0;
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
$store_number = $_SESSION['number_collect'];
$price = $_SESSION['price_collect'];

//添加数据进入数据库
$label = new Order();
$label->status = $status;
$label->userid = $userid;
$label->username = $username;
$label->bookid = $id;
$label->bookname = $bookname;
$label->storeid = $storeid;
$label->storename = $storename;
$label->author = $author;
$label->publish = $publish;
$label->variety = $variety;
$label->imgname = $imgname;
$label->disinfo = $disinfo;
$label->store_number = $store_number;
$label->price = $price;


$sign = Order::findOne(['bookid'=>$id,'userid'=>$userid]);
if(isset($sign))
{
    echo "<script>alert('该商品已处于您的购物车，不可重复添加！');history.go(-1);</script>";
    exit;
}
else
{   $label->insert();
    echo "<script>alert('添加购物车成功！');history.go(-1);</script>";
}