<?php
session_start();
//引入book模型
include('BookModel.php');

//接受图书商家id以及商家name
$store_id   = $_SESSION['userid'];
$store_name = $_SESSION['store_name'];
$bookid     = $_SESSION['update_book_id'];

//接受基本数据
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
    $insert = Book::findOne(['id'=>$bookid]);
    $insert->bookname = $bookname;
    $insert->author   = $author  ;
    $insert->number   = $number  ;
    $insert->publish  = $publish ;
    $insert->variety  = $aselect ;
    $insert->imgname  = $imgname ;
    $insert->disinfo  = $disinfo ;
 //   $insert->insert();
      if( $insert->update())
      {
          echo "<script>alert('修改成功');history.go(-2);</script>";
      }
      else 
      {
          echo "<script>alert('修改失败');history.go(-1);</script>";      
      }
}
