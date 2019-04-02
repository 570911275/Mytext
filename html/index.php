<?php
//包含数据库文件
include('conn.php');

//获取数据库数据 
$sql = "select * from `weibo_info`";
//获取资源句柄
$queryhandle = mysqli_query($conn,$sql) or die('sql执行失败');

//获取总条数
$totalnum = "SELECT COUNT(*) FROM `weibo_info`";
$querytotal = mysqli_query($conn,$totalnum);
$totlnum = mysqli_fetch_array($querytotal);

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>添加微博</title>
</head>
<body>
    <a href="add.html">添加微博</a>
<hr/>
<div>
<fieldset>
<form  method="POST" action="searchWeibo.php" >
<p>
<label for="searchWeibo" class="label">搜索微博:</label>
<input id="searchWeibo" name="searchWeibo" type="text" class="input" />
<input type="submit" name="submit" value="  搜 索  " class="left" />
</p>
</form>
</fieldset>
</div>
<hr>
<div>
<fieldset>
<form  method="POST" action="searchUser.php" >
<p>
<label for="searchUser" class="label">搜索用户:</label>
<input id="searchUser" name="searchUser" type="text" class="input" />
<input type="submit" name="submit" value="  搜 索  " class="left" />
</p>
</form>
</fieldset>
</div>
<hr/>

<!--循环显示数据库内容-->
<?php while($result = mysqli_fetch_array($queryhandle)) { ?>
            <h3>微博标题：<a href = "disinfo.php?id=<?php echo $result['id'] ?>"><?php echo $result['weiboName'] ?></a>  　　　　　　　　 |  <a href = "update.php?id=<?php echo $result['id'] ?>"> 评论 </a> | <a href = "delete.php?id=<?php echo $result['id'] ?>"> 删除 </a> |</h3>
            <h3>微博类别：<?php echo $result['title'] ?> </h3>
            <h3>微博作者：<?php echo $result['author'] ?> </h3>
            <h3>发布时间：<?php echo $result['pub_time'] ?> </h3>
            <h3>点击数量：<?php echo $result['click'] ?> </h3>
            <p><?php echo $result['content'] ?> </p>
            <hr/>
<?php } ?>
</body>
</html>
