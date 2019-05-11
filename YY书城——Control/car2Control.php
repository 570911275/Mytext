<?php
session_start();
//引入orders模型
include('OrderModel.php');

//接收数据
if( $_POST ) 
{ 
$id = $_POST['id']; 
$number = $_POST['number']; 
}
//去除空值元素
$number=array_filter($number);

//判断购买书籍与购买数量是否相符
$id_length = count($id);
$number_length = count($number);
if($id_length>$number_length)
{
    echo "<script>alert('您好，您所购买的图书未填写购买数量，请重新选择！');history.go(-1);</script>";
}
else if($id_length<$number_length)
{
    echo "<script>alert('您好，您打算购买的图书未进行勾选，请重新选择！');history.go(-1);</script>";
}
else
{

//获取相关数据
$status = 1;
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
$my_number = $number[0];

//添加数据进入数据库
$label = new Order();
$label->status = $status;
$label->userid = $userid;
$label->username = $username;
$label->bookid = $id[0];
$label->bookname = $bookname;
$label->storeid = $storeid;
$label->storename = $storename;
$label->author = $author;
$label->publish = $publish;
$label->variety = $variety;
$label->imgname = $imgname;
$label->disinfo = $disinfo;
$label->store_number = $store_number;
$label->my_number = $my_number;
$label->price = $price;
}
if($label->insert())
{
    $_SESSION['pay_id']=$label->id;
    $_SESSION['pay_number']=$label->my_number;
    echo "<script>alert('请选择收货地址！');location.href='payLocView.php';</script>";
}