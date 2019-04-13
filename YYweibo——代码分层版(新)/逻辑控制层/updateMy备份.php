<?php
//获取用户id
session_start();
$userid =$_SESSION['userid'];

//包含数据库文件
include('conn.php');
include('MySQLSelect.php');

//获取数据得到原来的个人信息内容
$selectId = new select();
$result = $selectId->selectId($userid);

//判断是否提交数据
if(!empty($_POST['submit']))
{
//接受数据
$hid = $_POST['hid'];
$username = $_POST['username'];
$password = MD5($_POST['password']);
$email = $_POST['email'];

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
         $sql2 = "UPDATE `user_info` SET `username` = '$username',`password` = '$password',`email` = '$email' where id ='$hid'";
         //执行并判断是否执行成功
        if( mysqli_query($conn,$sql2) or die('SQL执行异常！'))
        {
         echo "<script>alert('微博个人信息修改成功');location.href='my.php';</script>";
         exit;
        }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>修改个人信息</title>
        <style type="text/css">
          html{font-size:15px;}
          fieldset{width:320px; margin:0 auto;}
          legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
          .label{float:left; width:70px; margin-left:10px; color:turquoise}
          .left{margin-left:80px;}
          .input{width:150px;}
          span{color: #70b9b0;}
</style>
    </head>
    <body
    background="背景图片4-皮卡丘喝牛奶.jpg" 
    style=" background-repeat:no-repeat ;
    background-size:100% 100%; 
    background-attachment: fixed;"
    >
        <a href= "my备份.php">返回用户中心</a><br/>
        <form action="updateMy.php" method="POST">
            <input type = "hidden" name = "hid" value = "<?php echo $result['id'] ?>">
            <p>
            用户名:<input type="text" name="username" value="<?php echo $result['username'] ?>" /><br/>
            </p>
            <p>
            密码:<input type="text" name="password" value="<?php echo $result['password'] ?>" /><br/>
            </p>
            <p>
            电子邮箱:<input type="text" name="email" value="<?php echo $result['email'] ?>" /><br/>
            </p>
            <p>
            性别:  <input type="text" name="sex" value="<?php echo $result['sex'] ?>" /><br/>
            </p>
            <p>
            生日:  <input type="text" name="birthday" value="<?php echo $result['birthday'] ?>" /><br/>
            </p>
            <p>
            血型:  <input type="text" name="blood" value="<?php echo $result['blood'] ?>" /><br/>
            </p>
            <p>
            职业:  <input type="text" name="occupation" value="<?php echo $result['occupation'] ?>" /><br/>
            </p>
            <p>
            家乡:  <input type="text" name="hometown" value="<?php echo $result['hometown'] ?>" /><br/>
            </p>
            <p>
            兴趣爱好:  <textarea name="like" rows="10" colos="15" value="<?php echo $result['like'] ?>"  ></textarea><br/>
            </p>
            <p>
            个性签名:  <textarea name="personality" rows="10" colos="15" value="<?php echo $result['personality'] ?>  "></textarea><br/>
            </p>
            <p>
            个人说明:  <textarea name="detail" rows="10" colos="15" value="<?php echo $result['detail'] ?>  "></textarea><br/>
            </p>
            <p>
            <input type="submit" name="submit" value="  修 改  " class="left" />
            <input type="RESET" value="  重 置  " class="right"/>
            </p>
        </form>
    </body>
</html>