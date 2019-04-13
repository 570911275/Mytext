<?php
session_start();

//包含数据库文件
include('conn.php');

//获取信息
$username=$_SESSION['username'];

//读取信息
$select_sql = "select * from weibo_letter where be_letter_user='$username'";
$select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>微博留言</title>
</head>
<body
background="背景图片4-皮卡丘喝牛奶.jpg" 
style=" background-repeat:no-repeat ;
background-size:100% 100%; 
background-attachment: fixed;"
>
    <hr>
    <h2>YY微博留言</h2>
    <hr>
    <a href="index.php" class="left">微博主页 </a>
    <a href="my.php"  class="right">用户中心 </a>
<hr/>

<div>
<fieldset>
<!--循环显示数据库内容-->
<?php while($select_row=mysqli_fetch_array($select_query)) { ?>
            <h3>留言标题：<?php echo $select_row['letter_head'] ?> </h3>
            <h3>留言之人：<?php echo $select_row['letter_user'] ?> </h3>
            <h3>留言内容：<p><?php echo $select_row['letter_detail'] ?> </p></h3>
            <hr/>
<?php } ?>
<hr/>
</fieldset>
</div>
</body>
</html>