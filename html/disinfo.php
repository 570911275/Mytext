<?php
//包含数据库文件 
include('conn.php');

//获取微博类别
$weiboName = $_POST['weiboName'];

//查询该微博
$search_query = "select * from weibo_info where weiboName='$weiboName'";
$query = mysqli_query($conn,$search_query);
$row = mysqli_fetch_query($query);

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>微博详细内容</title>
</head>
<body>
    <hr>
    <h3><?php echo $row['weiboName']?>:</h3>
    <hr>
<!--循环显示数据库内容-->
<?php while($row = mysqli_fetch_array($queryhandle)) { ?>
            <h3>微博标题：<?php echo $result['weiboName'] ?>
            <h3>微博类别：<?php echo $result['title'] ?> </h3>
            <h3>微博作者：<?php echo $result['author'] ?> </h3>
            <h3>发布时间：<?php echo $result['pub_time'] ?> </h3>
            <h3>点击数量：<?php echo $result['click'] ?> </h3>
            <p><?php echo $result['content'] ?> </p>
            <hr/>
<?php } ?>
</body>
</html>