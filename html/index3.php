<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登录</title>
<style type="text/css">
    html{font-size:12px;}
    fieldset{width:300px; margin: 0 auto;}
    legend{font-weight:bold; font-size:14px;}
    .label{float:left; width:70px; margin-left:10px;}
    .left{margin-left:80px;}
    .input{width:150px;}
    span{color: #666666;}
</style>
</head>
<body>

<?php
//包含数据库文件
include('conn.php');

//获取数据库数据
$sql = "select * from 'weibo_info'".$s;

//获取资源句柄
$queryhandle = mysqli_query($conn,$sql) or die('sql执行失败');

//获取总条数
$totalnum = "SELECT COUNT(*) FROM 'weibo_info'";
$querytotal = mysqli_query($conn,$totalnum);
$totlnum = mysql_fetch_array($querytotal);
?>

<a hrey="add.php">添加微博</a>
<hr/>
   <form action = "index.php" method = "POST">
       <input type = "text" name = "key"/>
       <input type = "submit" name = "search" value="搜索"/>
   </form>
<hr/>

<!--循环显示数据库内容-->
<?php
    while($result = mysql_fetch_array($queryhandle,MYSQL_ASSOC)){?>
    <h3>微博种类：<a href = "disinfo.php?id=<?php echo $result['id']?>"><?php echo $result['title']?></a> <br> |<a href = "update.php?id=<?php echo $result['id']?>"> 编辑微博</a> | <a href= "delete.php?id=<?php echo $result['id']?>"> 删除微博 </a> </h3>
    <h3>发布时间：<?php echo $result['pub_time']?> </h3>
    <h3>点击数量：<?php echo $result['click']?> </h3>
    <p> <?php echo $result['content']?> </p>
<hr/>
<?php}?>
    </body>
    </html>