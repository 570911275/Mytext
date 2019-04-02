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
$sql = "select * from `weibo_info`".$searchWeibo;
//获取资源句柄
$queryhandle = mysqli_query($conn,$sql) or die('sql执行失败');
$result = mysqli_fetch_array($queryhandle);

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>搜索微博</title>
</head>
<body>
    <hr>
    <h3>有关<?php echo $result['weiboName']?>的微博</h3>
    <hr>
<!--循环显示数据库内容-->
<?php while($result = mysqli_fetch_array($queryhandle)) { ?>
            <h3>微博类别：<?php echo $result['title'] ?></a>
            <h3>微博作者：<?php echo $result['author'] ?> </h3>
            <h3>微博标题：<?php echo $result['weiboName'] ?> </h3>
            <h3>发布时间：<?php echo $result['pub_time'] ?> </h3>
            <h3>点击数量：<?php echo $result['click'] ?> </h3>
            <p><?php echo $result['content'] ?> </p>
            <hr/>
<?php } ?>
</body>
</html>