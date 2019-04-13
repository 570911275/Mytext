<?php
//获取用户姓名与评论微博
session_start();

//获取相关信息数据
$comment_id = $_SESSION['userid'];
$comment_user = $_SESSION['username'];
$be_id=$_SESSION['be_id'];
$weiboName=$_SESSION['weiboName'];
$be_comment_user=$_SESSION['be_comment_user'];

//包含数据库文件 
include('conn.php');

//获取微博评论
$comment_content = $_POST['comment_content'];

//获取当前时间
$datetime= date("Y-m-d H:i:s");

//插入数据进入数据库
$insert_content = "insert into weibo_comment(comment_user,comment_content,datetime,be_comment_user,be_id,weiboName,comment_id)values('$comment_user','$comment_content','$datetime','$be_comment_user','$be_id','$weiboName','$comment_id')";
$sql = mysqli_query($conn,$insert_content) or die(mysqli_error($conn)); 

//获取数据库数据
$insert_sql = "select * from `weibo_comment` where be_id=$be_id ";
$insert_row = mysqli_query($conn,$insert_sql);

//增加经验
$userid=$_SESSION['userid'];
$select_sql = "select exp from user_info where id=$userid";
$select_query = mysqli_query($conn,$select_sql);
$select_row = mysqli_fetch_array($select_query);
$exp=$select_row['exp'];
$update_sql = "update user_info set exp=$exp+5 where id=$userid";
$update_query =mysqli_query($conn,$update_sql) or die(mysqli_error($conn));

//前往主页
echo '<a href="index备份.php">前往YY微博主页</a><br/>';
?>


<html>
<head>
<meta charset=utf-8 />
<title>微博评论</title>
</head>
<body
background="背景图片5-皮卡丘帽子.jpg" 
style=" background-repeat:no-repeat ;
background-size:100% 100%; 
background-attachment: fixed;"
>
<div>
<fieldset>
        <legend>微博评论:</legend>
        <hr>
<!--显示微博评论内容-->
<?php while($insert_con = mysqli_fetch_array($insert_row)) { ?>
            <h4>微博标题：<?php echo $insert_con['weiboName'] ?></h4>
            <h3>评论作者：<?php echo $insert_con['comment_user'] ?></h3>
            <h3>微博作者：<?php echo $insert_con['be_comment_user'] ?></h3>
            <h3>发布时间：<?php echo $insert_con['datetime'] ?> </h3>
            <h3>评论内容：<?php echo $insert_con['comment_content'] ?> </h3>
            <hr>
<?php } ?>
</form>
</fieldset>
</div> 
</body>
</html>   


