<?php
session_start();

//检测是否登录，若没登录则转向登录界面
//if(!isset($_SESSION['userid'])){
    //echo '登录失败，请合法登录。<a href="login.html">YY微博——登录界面</a><br/>';
//}

//包含数据库连接文件
include('conn.php');
include('MySQL.php');

//获取id和name
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

//获取数据库数据 
$selectUser = new select();
$queryhandle = $selectUser->selectUser_weibo($username);

//获取个人信息
$selectId = new select();
$row = $selectId->selectId($userid);

//调用等级函数，查看自身经验的等级
$_SESSION['exp']=$row['exp'];
include('grade备份.php');

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>我的微博</title>
</head>
<body
background="背景图片3-皮卡丘.jpg" 
style=" background-repeat:no-repeat ;
background-size:100% 100%; 
background-attachment: fixed;"
>
<h2>YY微博——用户中心</h2>
<hr>

<h4><img src="标签3-皮卡丘.jpg" width="50" height="70"  align="middle" align ="left">
<?php echo '用户信息：<br />';?></h4>
<img src="标签1-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo '用户ID：',$userid,'<br />';?> 
<img src="标签1-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo '用户名：',$username,'<br />';?>
<img src="标签1-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo '用户经验: ',$row['exp'],' 用户等级: ',$grade,'<br />';?>
<img src="标签1-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo '邮箱：',$row['email'],'<br />';?>
<img src="标签1-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo '注册时间：',$row['regdate'],'<br />';?>
<img src="标签1-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo '当前日期：',$nowtime=date("Y-m-d H:i:s"),'<br/>';?>
<img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo "<a href='myInfo备份.php'>个人详细信息</a><br/>";?>
<img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo "<a href='updateMy备份.php'>修改个人信息</a><br/>";?>
<img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo "<a href='myLetter备份.php'>我的留言</a><br/>";?>
<img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo "<a href='friendShow备份.php'>好友申请</a><br/>";?>
<img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo "<a href='friendList备份.php'>我的好友</a><br/>";?>
<img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo "<a href='myCollect备份.php'>我的收藏</a><br/>";?>
<img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo '<a href="visit2备份.php">访客记录</a><br/>';?>
<img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo '<a href="concern2备份.php">关注列表</a><br/>';?>
<img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo '<a href="login备份.html">注销登录</a><br />';?>
<img src="标签2-皮卡丘.jpg" width="50" height="70"  align="middle">
<?php echo '<a href="index备份.php">前往YY微博主页</a><br/>';?>

    <a href ="add备份.html">>>>添加微博</a>
    <hr>
    <h3>我的微博:</h3>
    <hr>
<!--循环显示数据库内容-->
<?php while($result = mysqli_fetch_array($queryhandle)) { ?>
            <h3>1.微博标题：<a href = "disinfo.php?id=<?php echo $result['id'] ?>"><?php echo $result['weiboName'] ?></a>  　　　　　　　　 |  <a href = "updateWeibo.php?id=<?php echo $result['id'] ?>>"> 编辑 </a> | <a href = "delete1.php?id=<?php echo $result['id'] ?>"> 删除 </a> |</h3>
            <h4>2.微博类别：<?php echo $result['title'] ?> </h4>
            <h4>3.微博作者：<?php echo $result['author'] ?> </h4>
            <h4>4.发布时间：<?php echo $result['pub_time'] ?> </h4>
            <h4>5.点赞数量：<?php echo $result['praise'] ?> </h4>
            <h4>6.微博内容：<p><?php echo $result['content'] ?> </p></h4>
            <hr/>
<?php } ?>
</body>
</html>
