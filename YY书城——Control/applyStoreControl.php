<?php
session_start();
//引入user模型
include('UserModel.php');

//接受数据
$id = $_SESSION['userid'];
$power = 2;
$storename   = $_POST['storename'];
$imgname     = $_FILES['bookPicture']['name'];//文件名称
$tmp         = $_FILES['bookPicture']['tmp_name'];//临时存储的文件名

//更新数据
if(move_uploaded_file($tmp,$imgname))
{
    $label = User::findOne(['id'=>$id]);
    if($label->power==2)
    {
        echo "<script>alert('不可重复申请，请耐心等待审核！');location.href='indexView.php';</script>";
    }
    else if($label->power>2)
    {
        echo "<script>alert('您好，一个商家只可开一间商铺，请勿重复操作！');location.href='indexView.php';</script>"; 
    }
    else 
    {
    $label->store_name = $storename;
    $label->power = $power;
    $label->imgname_store = $imgname;
         if($label->update())
        {
            echo "<script>alert('申请成功，请等待管理员审核！');location.href='indexView.php';</script>";
        }
    }
}