<?php
session_start();
//包含数据库文件 
include('conn.php');
include('MySQLSelect.php');

//获取微博类别
$id = $_GET['id'];

//查询该微博
$selectId_weibo = new select();
$query = $selectId_weibo->selectId_weibo($id);

//获取该微博作者和id以及微博标题
$selectId_weibo2 = new select();
$row = $selectId_weibo2->selectId_weibo2($id);

$be_id = $row['id'];
$weiboName = $row['weiboName'];
$be_comment_user = $row['author'];

//使得该id和标题保存
$_SESSION['be_id']=$be_id;
$_SESSION['weiboName']=$weiboName;
$_SESSION['be_comment_user']=$be_comment_user;

//获取当前时间
$datetime= date("Y-m-d H:i:s");

//获取评论人姓名和id
$comment_id = $_SESSION['userid'];
$comment_user = $_SESSION['username'];

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>微博详细内容</title>
</head>
<body
background="背景图片5-皮卡丘帽子.jpg" 
style=" background-repeat:no-repeat ;
background-size:100% 100%; 
background-attachment: fixed;"
>
<hr>
<h3><a href = "index备份.php">YY微博——微博主页</a></h3>
<h3><a href = "my备份.php">YY微博——用户主页</a></h3>
<hr>
<!--循环显示数据库内容-->
<?php while($result = mysqli_fetch_array($query)) { ?>
            <hr>
            <h2><?php echo $result['weiboName']?></h2>
            <hr>
            <h3>微博标题：<?php echo $result['weiboName']?></h3>
            <h3>微博类别：<?php echo $result['title'] ?> </h3>
            <h3>微博作者：<?php echo $result['author'] ?> </h3>
            <h3>发布时间：<?php echo $result['pub_time'] ?> </h3>
            <h3>点赞数量：<?php echo $result['praise'] ?> </h3>
            <h3>微博内容：</h3>
            <p><?php echo $result['content'] ?> </p>
<?php } ?>
<button ><a href="praise备份.php">点赞</a></button>
            <hr/>
<a href="comment备份.html">发布评论</a>
<!--评论内容-->
<?php
include('comment2备份.php');
?>
<hr>
</body>
</html>
