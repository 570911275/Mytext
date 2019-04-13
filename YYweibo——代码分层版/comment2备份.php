<?php
//获取数据库数据
include('conn.php');

//获取id
$id = $_GET['id'];
$be_id = $_SESSION['be_id'];

//获取数据库数据
$selectId_comment = new select();
$insert_row = $selectId_comment->selectId_comment($be_id);
?>

<html>
<head>
<meta charset=utf-8 />
<title>微博评论</title>
</head>
<body>
<div>
<fieldset>
        <legend>微博评论:</legend>
        <hr>
<!--显示微博评论内容-->
<?php while($insert_con = mysqli_fetch_array($insert_row)) { ?>
            <h3>微博标题：<?php echo $insert_con['weiboName'] ?></h3>
            <h4>评论作者：<?php echo $insert_con['comment_user'] ?></h4>
            <h4>微博作者：<?php echo $insert_con['be_comment_user'] ?></h4>
            <h4>发布时间：<?php echo $insert_con['datetime'] ?> </h4>
            <h4>评论内容：<?php echo $insert_con['comment_content'] ?> </h4>
            <hr>
<?php } ?>
</form>
</fieldset>
</div> 
</body>
</html>   