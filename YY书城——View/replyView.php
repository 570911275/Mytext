<?php
//引入comment模型
include('CommentModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取replyid
$id = $_GET['id'];

//获取数据
$label = Comment::findOne(['id'=>$id]);
$label_reply = Comment::findAll(['reply_id'=>$id]);
$reply_length = count($label_reply);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>回复主页</title>
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
<div class="book"> 
    <fieldset>
    <div class="pic"> 
            <h3>评论图片：<?php echo "<img src='".$label->imgname."'/>"; ?> </h3>
            </div>
            <div class="info">
            <h3>评论用户：<?php echo $label->comment_user_name ?> </h3>
            <h3>评论内容：<?php echo $label->comment ?> </h3>
            </div>
            </fieldset>
    </div>
    <div>
    <fieldset>
            <h2>回复列表：</h2>
    </fieldset>
    </div>
    <!--循环显示数据库内容-->
<?php for($i=0;$i<$reply_length;$i++)  {?>
            <div class="book"> 
    <fieldset>
            <div class="pic"> 
            <h3>回复图片：<?php echo "<img src='".$label_reply[$i]->imgname."'/>"; ?> </h3>
            </div>
            <div class="info">
            <h3>回复用户：<?php echo $label_reply[$i]->comment_user_name ?> </h3>
            <h3>回复内容：<?php echo $label_reply[$i]->comment ?> </h3>
            <button type="button"><a href="addReplyView.php?id=<?php echo $label_reply[$i]->id?>">发布回复</a></button>
            <button type="button"><a href="replyView.php?id=<?php echo $label_reply[$i]->id?>">查看回复</a></button>
            </div>
    </fieldset>
    </div>
<?php } ?>
</fieldset>
</div>
</body>
</html>
