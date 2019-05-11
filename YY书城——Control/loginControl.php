<?php
session_start();

//引入user模型
include('UserModel.php');
//登录
if (!isset($_POST['submit']))
{
    exit('非法访问！！！');
}

//接受登录信息
$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);
$email = $_POST['email'];
$aselect = $_POST['aselect'];

//session权利等级
$_SESSION['show_power'] = $aselect;

//判断登录验证码以及相应权限，密码等是否错误
$label = User::findOne(['username'=>$username]);
//判断验证码是否正确
if (isset($_REQUEST['authcode'])) 
{
    //验证码正确
    if (strtolower($_REQUEST['authcode'])==$_SESSION['authcode']) 
    {
        //判断是否具有该用户
        if(isset($label))
        {
            //是否通过审核
            if($label->power==0)
            {echo "<script>alert('请等待管理员审核注册');history.go(-1);</script>";}

            //用户选择权限的对应关系
            else if($aselect > $label->power)
            {echo "<script>alert('您好，您目前还不具备相应的权限！');history.go(-1);</script>";}

                //判断密码等是否正确
                else if($label->power!=0 and $label->password==$password and $label->email==$email)
                {
                    $_SESSION['username']   = $username;
                    $_SESSION['userid']     = $label->id;
                    $_SESSION['store_name'] = $label->store_name;
                    echo "<script>alert('YY书城欢迎您！');location.href='indexView.php';</script>";
                }
                else
                {echo "<script>alert('登录失败，请点击此处重新登录');history.go(-1);</script>";}
        }
        //不具备该用户
        else
        {echo "<script>alert('登录失败，请点击此处重新登录');history.go(-1);</script>";}
    }
    //验证码错误
    else
    {echo "<script>alert('验证码错误，请点击此处重新登录');history.go(-1);</script>";}
exit();
}
?>
