<?php
session_start();

//包含数据库
include('conn.php');
include('MySQL.php');

//获取id和name
$my_id = $_SESSION['userid'];
$my_name = $_SESSION['username'];

//搜索我的详细信息
$selectId = new select();
$select_row = $selectId->selectId($my_id)
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>访客记录</title>
</head>
<body
background="背景图片4-皮卡丘喝牛奶.jpg" 
style=" background-repeat:no-repeat ;
background-size:100% 100%; 
background-attachment: fixed;"
>
    <a href="my备份.php">返回用户主页</a>
<hr/>
<div>
<fieldset>  
<!--显示用户详细信息-->
<p>
    <?php echo '用户姓名:',$select_row['username']?>
    <hr>
    <?php echo '电子邮箱:',$select_row['email']?>
    <hr>
    <?php echo '性别:',$select_row['sex']?>
    <hr>
    <?php echo '生日:',$select_row['birthday']?>
    <hr>
    <?php echo '血型:',$select_row['blood']?>
    <hr>
    <?php echo '职业:',$select_row['occupation']?>
    <hr>
    <?php echo '家乡:',$select_row['hometown']?>
    <hr>
</p>
</fieldset>
</div>
<div>
<fieldset>  
<p>
    <?php echo '兴趣爱好:',$select_row['like']?>
    <hr>
</P>
</fieldset>
</div>
<div>
<fieldset>  
<p>
    <?php echo '个性签名:',$select_row['personality']?>
    <hr>
</P>
</fieldset>
</div>
<div>
<fieldset>  
<p>    
    <?php echo '个人说明:',$select_row['detail']?>
    <hr>
</p>
</fieldset>
</div>
</body>
</html>