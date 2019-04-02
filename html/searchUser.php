<?php
//获取搜索信息
$searchUser = $_POST['searchUser'];

//包含数据库连接文件
include('conn.php');

//查询该用户名
$search_query = "select * from user_info where username='$searchUser'";
$query = mysqli_query($conn,$search_query);
$row = mysqli_fetch_array($query);

//查询该用户微博内容
$search = "select * from weibo_info where author='$searchUser'";
$queryhandle = mysqli_query($conn,$search);
$result = mysqli_fetch_array($queryhandle);

//判断该用户是否存在且输出基本信息
if($row>0)
{
    echo '用户信息：<br />';
    echo '用户名：',$row['username'],'<br />';
    echo '邮箱：',$row['email'],'<br />';
}
else
{
    echo 'YY微博中不存在用户，请重新搜索<a href="index.php">微博主页</a><br/>';
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>搜索用户微博</title>
</head>
<body>
    <hr>
    <h3><?php echo $row['username']?>的微博:</h3>
    <hr>
<!--循环显示数据库内容-->
<?php 
    if($result==0)
    {
        echo "你好，该用户尚未发布微博，您可选择关注等待其发布微博.";
    }
?>
<?php while($result = mysqli_fetch_array($queryhandle)) { ?>
            <h3>微博标题：<a href = "disinfo.php?weiboName=<?php echo $result['weiboName'] ?>"><?php echo $result['weiboName'] ?></a>
            <h3>微博类别：<?php echo $result['title'] ?> </h3>
            <h3>微博作者：<?php echo $result['author'] ?> </h3>
            <h3>发布时间：<?php echo $result['pub_time'] ?> </h3>
            <h3>点击数量：<?php echo $result['click'] ?> </h3>
            <p><?php echo $result['content'] ?> </p>
            <hr/>
<?php } ?>
</body>
</html>