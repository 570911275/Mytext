<?php
session_start();

//包含数据库
include('conn.php');
include('MySQL.php');

//获取id和name
$my_id = $_SESSION['userid'];
$my_name = $_SESSION['username'];

//搜索该用户的相关被访客记录
$selectVisitor = new select();
$select_query = $selectVisitor->selectVisitor($my_name);
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
<!--循环显示数据库内容-->
<p>
<?php while($select_row = mysqli_fetch_array($select_query)) { ?>
            <h3>访问人员：<?php echo $select_row['visitor'] ?> </h3>
            <h3>被访问者：<?php echo $select_row['be_visitor'] ?> </h3>
            <h3>访问时间：<?php echo $select_row['visit_time'] ?> </h3>
            <hr/>
<?php } ?>
</p>
<hr/>
</fieldset>
</div>
</body>
</html>


