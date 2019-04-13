<?php
session_start();
//获取搜索信息
$searchUser = $_POST['searchUser'];
$_SESSION['searchUser'] = $searchUser;

//包含数据库连接文件
include('conn.php');
include('MySQL.php');

//查询该用户名
$selectUser2 = new select();
$query = $selectUser2->selectUser2($searchUser);

//传递给关注文件
$row = mysqli_fetch_array($query);
$_SESSION['be_concern_id'] = $row['id'];

//查询该用户微博内容
$selectUser_weibo = new select();
$queryhandle = $selectUser_weibo->selectUser_weibo($searchUser);

//包含访客记录文件，插入访客记录进入数据库
include('visit备份.php');
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>搜索用户微博</title>
</head>
<body
background="背景图片6-皮卡丘吃东西.gif" 
style=" background-repeat:no-repeat ;
background-size:100% 100%; 
background-attachment: fixed;"
>
<h2><img src="标签3-皮卡丘.jpg" width="50" height="70"  align="middle" align ="left">YY微博——搜索用户</h2>
<hr>
<img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php
//判断该用户是否存在且输出基本信息
if($row>0)
{
    echo '用户信息：<br />';
    echo '用户名：',$row['username'],'<br />';
    echo '邮箱：',$row['email'],'<br />';
}
else
{
    echo 'YY微博中不存在用户，请重新搜索<a href="index备份.php">微博主页</a><br/>';
}
echo '<a href=concern备份.php>关注用户</a><br/>';
echo '<a href="index备份.php">前往YY微博主页</a><br/>';
?>
    <hr>
    <h3><img src="标签3-皮卡丘.jpg" width="50" height="70"  align="middle" align ="left"><?php echo $row['username']?>的微博:</h3>
    <hr>
<!--循环显示数据库内容-->

<?php while($result = mysqli_fetch_array($queryhandle)) { ?>
    <?php 
    if($result==0)
    {
        echo "你好，该用户尚未发布微博，您可选择关注等待其发布微博.";
    }
    ?>
            <h3><img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">微博标题：<a href = "disinfo备份.php?id=<?php echo $result['id'] ?>"><?php echo $result['weiboName'] ?></a>
            <h3>微博类别：<?php echo $result['title'] ?> </h3>
            <h3>微博作者：<?php echo $result['author'] ?> </h3>
            <h3>发布时间：<?php echo $result['pub_time'] ?> </h3>
            <h3>点赞数量：<?php echo $result['praise'] ?> </h3>
            <p><?php echo $result['content'] ?> </p>
            <hr/>
<?php } ?>
</body>
</html>