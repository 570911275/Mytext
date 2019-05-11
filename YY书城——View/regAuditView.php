<?php
//引入user模型
include('UserModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

$label  = User::findAll(['power'=>0]);
$label_length = count($label);

if($label_length==0)
{
    echo "<script>alert('您好，目前尚无游客申请用户资格！');history.go(-1);</script>";
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>用户审核</title>
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
            <h3>用户名称：<?php echo $label[$i]->username ?> </h3>
            <h3>用户邮箱：<?php echo $label[$i]->email ?> </h3>
            <button type="button"><a href="regAuditControl.php?id=<?php echo $label[$i]->id?>">审核通过</a></button>
            <button type="button"><a href="regAuditUnControl.php?id=<?php echo $label[$i]->id?>">审核失败</a></button>
            </div>
    </fieldset>
    </div>
<?php } ?>
</fieldset>
</div>
</body>
</html>