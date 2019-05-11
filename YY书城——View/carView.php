<?php
session_start();
//引入order模型
include('OrderModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取userid
$userid = $_SESSION['userid'];

//获取数据
$label = Order::findAll(['userid'=>$userid,'status'=>0]);
$label_length = count($label);
$_SESSION['check_pay']=$label_length;
if($label_length==0)
{
    echo "<script>alert('您好，目前购物车内尚无商品');history.go(-1);</script>";
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的购物车</title>
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
<form action="payControl.php" method="POST">
    <!--循环显示数据库内容-->
<?php for($i=0;$i<$label_length;$i++)  {?>
    <div class="book"> 
    <fieldset>
       <?php $value=$label[$i]->id?>
       <?php echo "勾选购买"?>
       <input type='checkbox' name='id[]' value=<?php echo $value?> /> 
            <div class="pic"> 
            <h3>图书封面：<?php echo "<img src='".$label[$i]->imgname."'/>"; ?> </h3>
            </div>
            <div class="info">
            <h3><a href="bookDisinfoView.php?id=<?php echo  $label[$i]->bookid ?>">图书详情</a></h3>
            <h3>书店名称：<?php echo $label[$i]->storename ?> </h3>
            <h3>图书名称：<?php echo $label[$i]->bookname ?> </h3>
            <h3>图书作者：<?php echo $label[$i]->author ?> </h3>
            <h3>图书发布：<?php echo $label[$i]->publish ?> </h3>
            <h3>图书价格：<?php echo $label[$i]->price ?> </h3>
            <h3>图书种类：<?php echo $label[$i]->variety ?> </h3>
            <h3>图书简介：<?php echo $label[$i]->disinfo ?> </h3>
            <button type="button"><a href="deleteCarControl.php?id=<?php echo  $label[$i]->id ?>">移除购物车</a></button>
            <button type="button"><a href="commentView.php?iid=<?php echo  $label[$i]->id ?>">查看评论</a></button>
            <h3>填写购买数量:</h3>
            <input type="text" name="number[]" size="15"/>
            </div>
    </fieldset>
    </div>  
<?php } ?>
<label> <input type="submit" name="Submit" value="购 买"></label>
</form>
</fieldset>
</div>
</body>
</html>       
