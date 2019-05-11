<?php
//引入book模型
include('BookModel.php');

//开启session接受图书商家id以及商家name
session_start();
$store_id   = $_SESSION['userid'];
$store_name = $_SESSION['store_name'];
$imgname_store = $_SESSION['imgname_store'];

//接受基本数据
$status      = 0;
$pub_time    = date("Y-m-d H:i:s");//上架时间
$price       = $_POST['price'];//图书价格
$bookname    = $_POST['bookname'];//图书名称
$author      = $_POST['author'];//图书作者
$number      = $_POST['number'];//图书数量
$publish     = $_POST['publish'];//图书出版社
$aselect     = $_POST['aselect'];//图书分类
$disinfo     = $_POST['disinfo'];//图书简介
$imgname     = $_FILES['bookPicture']['name'];//文件名称
$tmp         = $_FILES['bookPicture']['tmp_name'];//临时存储的文件名
//"D:/wnmp/nginx-1.14.2/html"
//上传图片
if(move_uploaded_file($tmp,$imgname))
{
//$_SESSION['imgname'] = $imgname;

    //插入图书数据至数据库
    $insert = new Book();
    $insert->status   = $status;
    $insert->storeid  = $store_id;
    $insert->storename = $store_name;
    $insert->bookname = $bookname;
    $insert->author   = $author  ;
    $insert->number   = $number  ;
    $insert->publish  = $publish ;
    $insert->variety  = $aselect ;
    $insert->imgname  = $imgname ;
    $insert->imgname_store = $imgname_store;
    $insert->disinfo  = $disinfo ;
    $insert->price    = $price   ;
    $insert->pub_time = $pub_time;
 //   $insert->insert();
      if( $insert->insert())
      {
          echo "<script>alert('添加成功，请等待管理员审核');location.href='indexView.php';</script>";
      }
      else 
      {
          echo "<script>alert('添加失败');history.go(-1);</script>";      
      }
}
