<?php
session_start();
//引入comment模型
include('CommentModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取id
$id = $_SESSION['userid'];

//获取数据
$label = Comment::findAll(['be_comment_user_id'=>$id]);
$label_length = count($label);
if($label_length==0)
{
    echo "<script>alert('您好，目前尚没有消息通知！');history.go(-1);</script>";
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的消息</title>
    <style type="text/css">
          body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
     .book{width:1000px; margin:50px auto; border:solid 1px gray; overflow:hidden;}
     .pic{width:250px; float:left;}
     .pic img{
         display:block;
         width:200px;
         height:300px;
     }
     .info{float:left; width:650px;}
</style>
</head>
<body>
<div class="book"> 
<fieldset>
    <!--循环显示数据库内容-->
<?php for($i=0;$i<$label_length;$i++)  {?>
    <div class="book"> 
    <fieldset>
            <div class="info">
            <h3>信息内容：<br/> </h3>
            <h3><?php echo $label[$i]->comment ?> </h3>
            <button type="button"><a href="deleteMyNewsControl.php?id=<?php echo $label[$i]->id?>">删除消息</a></button>
            </div>
    </fieldset>
    </div>
<?php } ?>
</fieldset>
</div>
</body>
</html>