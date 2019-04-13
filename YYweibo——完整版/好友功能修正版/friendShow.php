<?php
session_start();

//包含数据库文件
include('conn.php');

//获取数据
$be_apply_user = $_SESSION['username'];
$apply_status = 0;

//获取申请数据
$select_sql = "select * from friend_apply where be_apply_user='$be_apply_user' and apply_status='$apply_status' ";
$select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
//$select_row = mysqli_fetch_array($select_query);

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>好友申请</title>        

</head>
<body
background="背景图片4-皮卡丘喝牛奶.jpg" 
style=" background-repeat:no-repeat ;
background-size:100% 100%; 
background-attachment: fixed;"
>
    <hr>
    <h2>YY微博好友申请</h2>
    <hr>
    <a href="index.php" class="left">微博主页 </a>
    <a href="my.php"  class="right">用户中心 </a>
<hr/>
<form action="friendRight.php" method="POST">
<div>
<fieldset>
<!--循环显示数据库内容-->
<?php while($select_row=mysqli_fetch_array($select_query)) { ?>
            <h3>申请人：<?php echo $select_row['apply_user'] ?> </h3>
            <h3>是否同意</h3>
            <input type="radio" name="aradio" value="a1"/>同意
            <input type="radio" name="aradio" value="a2" checked="checked"/>反对
            <hr/>
            <p>
            <input type="submit" name="submit" value="  确 认  " class="left" />
            <input type="RESET" value="  重 置  " class="right"/>
            </p>
<?php } ?>
<hr/>
</fieldset>
</div>
</body>
</html>