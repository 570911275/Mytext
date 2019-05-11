<?php
session_start();
//引入user模型
include('UserModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取数据
$label = User::findAll(null);
$label_length = count($label);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>封闭用户</title>
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
            <div class="pic"> 
            <h3>用户头像：<?php echo "<img src='".$label[$i]->imgname_user."'/>"; ?> </h3>
            </div>
            <div class="info">
            <h3>用户名称：<?php echo $label[$i]->username ?> </h3>
            <h3>用户邮箱：<?php echo $label[$i]->email ?> </h3>
            <h3>用户性别：<?php echo $label[$i]->sex ?> </h3>
            <h3>电话号码：<?php echo $label[$i]->phone ?> </h3>
            <h3>用户余额：<?php echo $label[$i]->money ?> </h3>
            <button type="button"><a href="deleteErrorUserControl.php?id=<?php echo $label[$i]->id?>">封闭用户</a></button>
            </div>
    </fieldset>
    </div>
<?php } ?>
</fieldset>
</div>
</body>
</html>