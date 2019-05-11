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
$label = Chat::findAll(['comment_book_id'=>$bookid,'comment_user_id'=>$userid]);
$label_length = count($label);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>联系用户</title>
    <style type="text/css">
        .talk_con{
            width:600px;
            height:500px;
            border:1px solid #666;
            margin:50px auto 0;
            background:#f9f9f9;
        }
        .talk_show{
            width:580px;
            height:420px;
            border:1px solid #666;
            background:#fff;
            margin:10px auto 0;
            overflow:auto;
        }
        .talk_input{
            width:580px;
            margin:10px auto 0;
        }
        .whotalk{
            width:80px;
            height:30px;
            float:left;
            outline:none;
        }
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
        .atalk{
           margin:5px; 
        }
        .atalk span{
            display:inline-block;
            background:#0181cc;
            border-radius:10px;
            color:#fff;
            padding:5px 10px;
        }
        .btalk{
            margin:10px;
            text-align:right;
        }
        .btalk span{
            display:inline-block;
            background:#ef8201;
            border-radius:10px;
            color:#fff;
            padding:5px 10px;
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
<legend>YY书城——联系用户</legend>
</fieldset>
</div>
    <div class="talk_con">
        <div class="talk_show">
            <div class="btalk"><span id="bsay">您好丫，欢迎光临,很高兴为您服务</div>
            <?php for($i=0;$i<$label_length;$i++){?>
            <div class="atalk"><span id="asay"><?php echo $label[$i]->comment?></div>
            <?php 
            $id = $label[$i]->id;
            $label_reply = Chat::findOne(['reply_id'=>$id]);
            ?>
            <div class="btalk"><span id="bsay"><?php 
                                                     if($label[$i]->comment =="请问，什么时候发货") echo "亲，您拍下的书42个小时内就可以为您安排发货。";
                                                     else if($label[$i]->comment =="请问，什么时候到货") echo "亲，揽收后一般江浙沪1-2天之内左右到货。其他地区3天左右到货。如果物流有异常情况，欢迎及时联系我们，查件催件我们样样在行哟！";
                                                     else if($label[$i]->comment =="请问，发什么快递")   echo "亲，我们默认为中通快递，您这边可以收到中通快递的货么，中通快递送不到的地方我们可以为您安排EMS,EMS是全国通达的，但是EMS是不包邮的呢，这边需要您补邮费10元，(发顺丰的一样要补邮费15元)。";
                                                     else if($label[$i]->comment =="请问，关于退换货")   echo "亲，7天内是可以无条件退换货的，质量问题您退换货单邮费都是由我们为您承担，如果是非质量问题呢，那您退回来的邮费以及我们给您换货发出的邮费都是由您承担的哟。";
                                                     else if($label[$i]->comment =="请问，可以便宜一点么") echo "亲，非常抱歉，我们的定价已经是最低销售价了呢，没有办法再优惠了哟。";
                                                     else if($label[$i]->comment =="请问，书的质量怎么样") echo "亲，我们是书城正品，质量都是有保证的，您这边可以完全放心的拍下哟。";
                                                     else if(isset($label_reply))    echo $label_reply->comment;
                                                     else echo "正在为您转接人工服务，请耐心等待"; ?></div>
                                               <?php }?>
            </div>
        <div class="talk_input">
        <form   method="POST" action="chatUserControl.php"  >  
        <p>
        <input id="talkwords" name="talkwords" type="text" class="talk_word" />
        </p>
        <input type="submit" naem="submit" value="发 送" class="talk_sub" >            
        </form>            
        </div>
    </div>
</body>
</html>
