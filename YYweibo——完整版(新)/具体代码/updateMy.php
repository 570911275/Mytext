<?php
//获取用户id
session_start();
$userid =$_SESSION['userid'];

//包含数据库文件
include('conn.php');

//获取数据得到原来的个人信息内容
$sql ="SELECT * FROM `user_info` WHERE id ='$userid' limit 1";
$query = mysqli_query($conn,$sql) or die('SQL执行失败');
$result = mysqli_fetch_array($query);


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
        <a href= "my.php">返回用户中心</a><br/>
        <form action="updateMy2.php" method="POST">
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
            个性签名:  <input type="text" name="personality"  value="<?php echo $result['personality'] ?>  "><br/>
            </p>
            <p>
            个人说明:  <input type="text" name="detail" value="<?php echo $result['detail'] ?>  "><br/>
            </p>
            <p>
            兴趣爱好:  <input type="text" name="love" value="<?php echo $result['love'] ?>  "><br/>
            </p>
            <p>
            <input type="submit" name="submit" value="  修 改  " class="left" />
            <input type="RESET" value="  重 置  " class="right"/>
            </p>
        </form>
    </body>
</html>