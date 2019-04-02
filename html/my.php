<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    echo '登录失败，请合法登录。<a href="login.html">YY微博——登录界面</a><br/>';
}

//包含数据库连接文件
include('conn.php');

//获取数据库数据 
$sql = "select * from `weibo_info`";
//获取资源句柄
$queryhandle = mysqli_query($conn,$sql) or die('sql执行失败');

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$user_query = mysqli_query($conn,"select * from user_info where id=$userid ");
$row = mysqli_fetch_array($user_query);
echo '用户信息：<br />';
echo '用户ID：',$userid,'<br />';
echo '用户名：',$username,'<br />';
echo '邮箱：',$row['email'],'<br />';
echo '注册日期：',$row['regdate'],'<br />';
echo '当前日期：',$nowtime=date("Y-m-d H:i:s"),'<br/>';
echo '<a href="login.html">注销登录</a><br />';
echo '<a href="index.php">前往YY微博主页</a><br/>';
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>添加微博</title>
</head>
<body>
    <a href ="add.html">添加微博</a>
    <hr>
    <h3>我的微博:</h3>
    <hr>
<!--循环显示数据库内容-->
<?php while($result = mysqli_fetch_array($queryhandle)) { ?>
            <h3>微博类别：<a href = "disinfo.php?id=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a>  　　　　　　　　 |  <a href = "update.php?id=<?php echo $result['id'] ?>"> 编辑 </a> | <a href = "delete.php?id=<?php echo $result['id'] ?>"> 删除 </a> |</h3>
            <h3>微博作者：<?php echo $result['author'] ?> </h3>
            <h3>发布时间：<?php echo $result['pub_time'] ?> </h3>
            <h3>点击数量：<?php echo $result['click'] ?> </h3>
            <p><?php echo $result['content'] ?> </p>
            <hr/>
<?php } ?>
</body>
</html>
