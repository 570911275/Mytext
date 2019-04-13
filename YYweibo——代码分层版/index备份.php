<?php
//包含数据库文件
include('conn.php');
include('MySQL.php');

/*获取当前url并且解析
$url = $_SERVER['REQUEST_URI'];
$url = parse_url($url);
$url = $url['path'];*/

//设定分页显示条数
$pageSize = 3;

//获取分页信息
$r = "select * from weibo_info";
$res = mysqli_query($conn,$r);
$num = mysqli_num_rows($res);
$pageNum = ceil($num/$pageSize);

//判断页面是否是提交状态
if ( isset($_GET['page']) && $_GET['page'] >1) {
    $pageVal = $_GET['page'];
}else {
    $pageVal = 1;
}

//计算起始位置
$page = ($pageVal-1)*$pageSize;

//获取微博数据信息并且使用limit语句进行分页
$r2 ="select * from weibo_info limit $page,$pageSize";
$res2 = mysqli_query($conn,$r2);
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>微博主页</title>
</head>
<body
background="背景图片-皮卡丘.jpg" 
style=" background-repeat:no-repeat ;
background-size:100% 100%; 
background-attachment: fixed;"
>
    <hr>
    <h2><img src="标签3-皮卡丘.jpg" width="50" height="70"  align="middle" align ="left">YY微博主页</h2>
    <hr>
    <a href="add备份.html" class="left">发布微博 </a>
    <a href="my备份.php"  class="right">用户中心 </a>
<hr/>
<div>
<fieldset>
<form  method="POST" action="searchWeibo备份.php" >
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
<form  method="POST" action="searchUser备份.php" >
<p>
<label for="searchUser" class="label">搜索用户:</label>
<input id="searchUser" name="searchUser" type="text" class="input" />
<input type="submit" name="submit" value="  搜 索  " class="left" />
</p>
</form>
</fieldset>
</div>

<!--循环显示数据库内容-->
<?php while($row = mysqli_fetch_assoc($res2)) { ?>
            <h3><img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">微博标题：<a href = "disinfo备份.php?id=<?php echo $row['id'] ?>"><?php echo $row['weiboName'] ?></a>| <a href = "delete2备份.php?id=<?php echo $row['id'] ?>"> 删除 </a> |</h3>
            <h3>微博类别：<?php echo $row['title'] ?> </h3>
            <h3>微博作者：<?php echo $row['author'] ?> </h3>
            <h3>发布时间：<?php echo $row['pub_time'] ?> </h3>
            <h3>点赞数量：<?php echo $row['praise'] ?> </h3>
            <h3>微博内容：<p><?php echo $row['content'] ?> </p></h3>
            <hr/>
<?php } ?>

<hr>
<div>
<fieldset>
<p>
<a href="?page=1">1</a>
<a href="?page=2">2</a>
<a href="?page=3">3</a>
<a href="?page=4">4</a>
<a href="?page=5">5</a>
<a href="?page=6">6</a>
<a href="?page=7">7</a>
<a href="?page=8">8</a>
<a href="?page=9">9</a>
<a href="?page=10">10</a>
总共<?php echo $pageNum; ?>页,当前在<?php echo $pageVal;?>页
</p>
<hr/>
</fieldset>
</div>
</body>
</html>
