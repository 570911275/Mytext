<?php
session_start();
//引入chat模型
include('ChatModel.php');
//引入左侧功能单
include('leftAbilityListView.php');


//获取id
$bookid = $_SESSION['chat_bookid'];
$userid = $_SESSION['userid'];

//获取数据
$label = Chat::findAll(['comment_book_id'=>$bookid,'status'=>0]);
$label_length = count($label);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>查看询问用户</title>
    <style type="text/css">
            .talk_word{
            width:500px;
            height:30px;
            padding:0px;
            float:left;
            margin-left:10px;
            outline:none;
            text-indent:10px;
        }        
        .talk_sub{
            width:56px;
            height:30px;
            float:left;
            margin-left:10px;
        }
        legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
        .label{float:left; width:500px; margin-left:10px; color:turquoise}
        .input{width:500px;}
        body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
    </style>
    </head>
<body>
<div>
<fieldset>
<legend>YY书城——联系商家</legend>
</fieldset>
</div>
<div>
<fieldset>
<p>
<?php for($i=0;$i<$label_length;$i++){?>
    <?php if($label[$i]->comment_user_id!=$userid) {?>
    <h3>询问用户:<?php echo $label[$i]->comment_user_name?></h3>
    <h3>询问图书:<?php echo $label[$i]->comment_book_name?></h3>
    <h3>询问时间:<?php echo $label[$i]->datetime?></h3>
    <h3>询问内容:<?php echo $label[$i]->comment?></h3>
    <div>
        <form   method="POST" action="chatStoreControl.php?id=<?php echo $label[$i]->id?>& be_userid=<?php echo $label[$i]->comment_user_id?>"  >  
        <p>
        <input id="talkwords" name="talkwords" type="text" class="talk_word" />
        </p>
        <input type="submit" naem="submit" value="发 送" class="talk_sub" >     
        <button type="button"><a href="chatStoreControl.php?id=<?php echo $label[$i]->id?>& be_userid=<?php echo $label[$i]->comment_user_id?>">售后联系</a></button>     
        </form>            
    </div>
    <br/>
    <?php }?>
<?php }?>
</p>
</fieldset>
</div>
</body>
</html>
