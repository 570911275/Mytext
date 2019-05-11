<?php
//引入comment模型
include('CommentModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取commentid
$id = $_GET['id'];

//获取数据
$label = Comment::findAll(['comment_book_id'=>$id]);
$label_length = count($label);
if($label_length==0)
{
    echo "<script>alert('您好，目前该书籍尚无评论！');history.go(-1);</script>";
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>评论主页</title>
    <style type="text/css">
     .book{width:1000px; margin:50px auto; border:solid 1px gray; overflow:hidden;}
     .pic{width:250px; float:left;}
     .pic img{
         display:block;
         width:200px;
         height:300px;
     }
     .info{float:left; width:650px;}
    body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
</style>
</head>
<body>
<div class="book"> 
<fieldset>
    <!--循环显示数据库内容-->
<?php for($i=0;$i<$label_length;$i++)  {?>
    <div class="book"> 
    <fieldset>
            <div class="pic"> 
            <h3>评论图片：<?php echo "<img src='".$label[$i]->imgname."'/>"; ?> </h3>
            </div>
            <div class="info">
            <h3>评论图书：<?php echo $label[$i]->comment_book ?> </h3>
            <h3>评论用户：<?php echo $label[$i]->comment_user_name ?> </h3>
            <h3>评论内容：<?php echo $label[$i]->comment ?> </h3>
            <button type="button"><a href="addReplyView.php?id=<?php echo $label[$i]->id?>">发布回复</a></button>
            <button type="button"><a href="replyView.php?id=<?php echo $label[$i]->id?>">查看回复</a></button>
            </div>
    </fieldset>
    </div>
<?php } ?>
</fieldset>
</div>
</body>
</html>