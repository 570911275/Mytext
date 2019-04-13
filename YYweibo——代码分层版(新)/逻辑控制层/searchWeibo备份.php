<?php
//获取搜索信息
$searchWeibo = $_POST['searchWeibo'];

//包含数据库文件
include('conn.php');

//判断该信息是否存在
if(empty($searchWeibo))
{
    $searchWeibo = '';
    echo "YY微博中不存在该微博请重新选择";
    exit;
}
else 
{
    $searchWeibo = "where `weiboName` like '%$searchWeibo%'";
}

//获取数据库数据
$sql = "select * from `weibo_info`  ".$searchWeibo;
//获取资源句柄
$queryhandle = mysqli_query($conn,$sql) or die('sql执行失败');

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>搜索微博</title>
</head>
<body
background="背景图片6-皮卡丘吃东西.gif" 
style=" background-repeat:no-repeat ;
background-size:100% 100%; 
background-attachment: fixed;"
>
<h2><img src="标签3-皮卡丘.jpg" width="50" height="70"  align="middle" align ="left">YY微博——搜索微博</h2>
<hr>
<a href="index备份.php">前往YY微博主页</a>
<hr>
<!--循环显示数据库内容-->
<?php while($result = mysqli_fetch_array($queryhandle)) { ?>
            <h3><img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">有关<mark><?php echo $result['weiboName']?></mark>的微博</h3>
            <h3>微博类别：<?php echo $result['title'] ?></a>
            <h3>微博作者：<?php echo $result['author'] ?> </h3>
            <h3>微博标题：<?php echo $result['weiboName'] ?> </h3>
            <h3>发布时间：<?php echo $result['pub_time'] ?> </h3>
            <h3>点赞数量：<?php echo $result['praise'] ?> </h3>
            <h3>微博内容：<p><?php echo $result['content'] ?> </p></h3>
            <hr/>
<?php } ?>
</body>
</html>