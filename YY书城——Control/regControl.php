<?php
//引入user模型
include('UserModel.php');

//接受数据
$username = $_POST['username'];
$password = MD5($_POST['password']);
$email    = $_POST['email'];
$regdate  = date("Y-m-d H:i:s");
$power    = 0;

//注册信息判断
if(!preg_match('^[\w\x80-\xff]{3,15}$^', $username)){
    echo "<script>alert('用户名不规范');history.go(-1);</script>";
}
if(strlen($password) < 6){
    echo "<script>alert('密码长度不符合规矩');history.go(-1);</script>";
}
if(!preg_match('^[a-zA-Z0-9_.]+@[a-zA-Z0-9_]+\.[a-zA-Z0-9.]+$^', $email)){
    echo "<script>alert('电子邮箱格式错误');history.go(-1);</script>";
}


//判断用户名是否重复
$label = User::findOne(['username'=>$username]);
if(isset($label))
{
    $insert = new User();
    $insert->username = $username;
    $insert->password = $password;
    $insert->email    = $email;
    $insert->power    = $power;
    $insert->insert();
   if($insert)
    {
        echo "<script>alert('等待审核');location.href='regAuditControl.php';</script>";
    }
}
else
{
    echo "<script>alert('该用户名已存在');history.go(-1);</script>";
}

