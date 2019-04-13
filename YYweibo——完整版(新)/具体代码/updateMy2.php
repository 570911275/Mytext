<?php
//获取用户id
session_start();
$userid =$_SESSION['userid'];

//包含数据库文件
include('conn.php');

//获取数据得到原来的个人信息内容
/*$sql ="SELECT * FROM `user_info` WHERE id ='$userid' limit 1";
$query = mysqli_query($conn,$sql) or die('SQL执行失败');
$result = mysqli_fetch_array($query);*/

//判断是否提交数据
if(!empty($_POST['submit']))
{
//接受数据
$hid = $_POST['hid'];
$username = $_POST['username'];
$password = MD5($_POST['password']);
$email = $_POST['email'];
$sex = $_POST['sex'];
$birthday = $_POST['birthday'];
$blood = $_POST['blood'];
$occupation = $_POST['occupation'];
$hometown = $_POST['hometown'];
$love = $_POST['love'];
$personality = $_POST['personality'];
$detail = $_POST['detail'];

    //个人信息判断
    if(!preg_match('^[\w\x80-\xff]{3,15}$^', $username)){
     echo "<script>alert('用户名不规范');history.go(-1);</script>";
    }
    if(strlen($password) < 6){
     echo "<script>alert('密码长度不符合规矩');history.go(-1);</script>";
    }
    if(!preg_match('^[a-zA-Z0-9_.]+@[a-zA-Z0-9_]+\.[a-zA-Z0-9.]+$^', $email)){
     echo "<script>alert('电子邮箱格式错误');history.go(-1);</script>";
    }

         //判断是否已填写信息
        if($username =='' || $password =='' || $email =='')
        { 
         echo '请填写完整个人信息';
         exit;
        }

         //更新个人信息
         $sql2 = "UPDATE user_info SET username = '$username',password = '$password' where id ='$hid'";
         
        //更新性别
        $update_sex = "update user_info set sex = '$sex' where id='$hid'";
        $update_sex_query = mysqli_query($conn,$update_sex);
        //更新生日
        $update_birthday = "update user_info set birthday = '$birthday' where id='$hid'";
        $update_birthday_query = mysqli_query($conn,$update_birthday);
        //更新血型
        $update_blood = "update user_info set blood = '$blood' where id='$hid'";
        $update_blood_query = mysqli_query($conn,$update_blood);
        //更新职业
        $update_occupation = "update user_info set occupation = '$occupation' where id='$hid'";
        $update_occupation_query = mysqli_query($conn,$update_occupation);
        //更新家乡
        $update_hometown = "update user_info set hometown = '$hometown' where id='$hid'";
        $update_hometown_query = mysqli_query($conn,$update_hometown);
        //更新个性签名
        $update_personality = "update user_info set personality = '$personality' where id='$hid'";
        $update_personality_query = mysqli_query($conn,$update_personality);
        //更新个人说明
        $update_detail = "update user_info set detail = '$detail' where id='$hid'";
        $update_detail_query = mysqli_query($conn,$update_detail);
        //更新个人说明
        $update_love = "update user_info set love = '$love' where id='$hid'";
        $update_love_query = mysqli_query($conn,$update_love);
         
        //执行并判断是否执行成功
        if( mysqli_query($conn,$sql2) or die('SQL执行异常！'))
        {
         echo "<script>alert('微博个人信息修改成功');location.href='my.php';</script>";
         exit;
        }
}
