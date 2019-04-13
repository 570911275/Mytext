<?php
session_start();

//包含数据库文件
include('conn.php');

//获取数据
$myId = $_SESSION['userid'];
$select_sql = "select * from weibo_collect where my_id=$myId";
$select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
$select_row = mysqli_fetch_array($select_query);

$weiboId = $select_row['collect_id'];//显示微博内容使用
$select_query2 = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));//循环使用
//$select_row2 = mysqli_fetch_arror($select_query2);//循环使用

$sql = "select * from weibo_info where id=$weiboId ";
$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$row = mysqli_fetch_array($query);
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>我的收藏</title>
</head>
<body
background="背景图片4-皮卡丘喝牛奶.jpg" 
style=" background-repeat:no-repeat ;
background-size:100% 100%; 
background-attachment: fixed;"
>
    <hr>
    <h2>YY微博——我的收藏</h2>
    <hr>
    <a href="index.php" class="left">微博主页 </a>
    <a href="my.php"  class="right">用户中心 </a>
<hr/>
<div>
<fieldset>
<!--循环显示数据库内容-->
<?php while($select_row2=mysqli_fetch_array($select_query2)) { ?>
            <h3>我的收藏：<?php echo $row['weiboName'] ?> </h3>
                <h3>收藏时间：<?php echo $select_row2['collect_time'] ?> </h3>
                <h3>微博类别：<?php echo $row['title'] ?></h3>
                <h3>微博作者：<?php echo $row['author'] ?></h3>
                <h3>点赞数量：<?php echo $row['praise'] ?></h3>
                <h3>微博内容：</h3>
                <p><?php echo $row['content'] ?></p>
                 <hr/>
<?php } ?>
<hr/>
</fieldset>
</div>
</body>
</html>