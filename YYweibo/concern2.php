<?php
session_start();
//包含数据库
include('conn.php');

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

//获取关注用户数据
$select_sql = "select * from weibo_concern where concern_id=$userid ";
$select_query = mysqli_query($conn,$select_sql) or die(mysqli_error($conn));
$select_row = mysqli_fetch_array($select_query);

//获取关注用户信息
$sql = "select * from user_info where id=$userid";
$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$row = mysqli_fetch_array($query);
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>关注列表</title>
</head>
<body
background="背景图片4-皮卡丘喝牛奶.jpg" 
style=" background-repeat:no-repeat ;
background-size:100% 100%; 
background-attachment: fixed;"
>
    <a href="index.php" class="left">微博主页 </a>
    <a href="my.php"  class="right">用户中心 </a>
<hr/>
<?php while($select_row = mysqli_fetch_array($select_query)) { ?>
            <h3>关注用户：<?php echo $select_row['be_concern_user'] ?> </h3>
            <h3>电子邮箱: <?php echo $row['email']?></h3>
            <h3>性别: <?php echo $row['sex']?></h3>
            <h3>生日: <?php echo $row['birthday']?></h3>
            <h3>职业: <?php echo $row['occupation']?></h3>
            <h3>家乡: <?php echo $row['hometown']?></h3>
            <h3>兴趣爱好: <?php echo $row['like']?></h3>
            <h3>个性签名: <?php echo $row['personality']?></h3>
            <h3>个人说明: <?php echo $row['detail']?></h3>
            <hr>
<?php } ?>
<hr>
</body>
</html>