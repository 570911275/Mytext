<?php
session_start();
//引入user模型
include('UserModel.php');

//获取数据
$userid   = $_SESSION['userid'];
$username = $_POST['username'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$sex      = $_POST['sex'];
$imgname     = $_FILES['userPicture']['name'];//文件名称
$tmp         = $_FILES['userPicture']['tmp_name'];//临时存储的文件名

//更新数据
if(move_uploaded_file($tmp,$imgname))
{
    $label = User::findOne(['id'=>$userid]);
    $label->username = $username;
    $label->email    = $email;
    $label->phone    = $phone;
    $label->sex      = $sex;
    $label->imgname_user = $imgname;
    if($label->update())
    {
        echo "<script>alert('修改成功');location.href='myView.php';</script>";
    }
}

