<?php
session_start();

//包含数据库文件
include('conn.php');
include('MySQLSelect.php');

//获取数据
$my_id = $_SESSION['userid'];
$selectIDFriend = new select();
$select_row = $selectIDFriend->selectIDFriend($my_id);

$selectIDFriend2 = new select();
$select_query2 = $selectIDFriend2->selectIDFriend2($my_id);

//获取好友详细信息
$friendId = $select_row['friend_id'];
$sql = "select * from user_info where id=$friendId";
$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$row = mysqli_fetch_array($query);
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>我的好友</title>
</head>
<body
background="背景图片4-皮卡丘喝牛奶.jpg" 
style=" background-repeat:no-repeat ;
background-size:100% 100%; 
background-attachment: fixed;"
>
    <hr>
    <h2>YY微博——我的好友</h2>
    <hr>
    <a href="index备份.php" class="left">微博主页 </a>
    <a href="my备份.php"  class="right">用户中心 </a>
<hr/>
<div>
<fieldset>
<!--循环显示数据库内容-->
<?php while($select_row2=mysqli_fetch_array($select_query2)) { ?>
            <h3>我的好友：<?php echo $select_row2['friend_user'] ?> </h3>
                <h3>好友邮箱：<?php echo $row['email'] ?> </h3>
                <h3>好友生日：<?php echo $row['birthday'] ?></h3>
                <h3>好友职业：<?php echo $row['occupation'] ?></h3>
                <h3>好友爱好：<?php echo $row['like'] ?></h3>
                <h3>好友签名：<?php echo $row['personality'] ?></h3>
                <h3>好友说明：<?php echo $row['detail'] ?></h3>
                 <hr/>
<?php } ?>
<hr/>
</fieldset>
</div>
</body>
</html>