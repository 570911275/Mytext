<?php
session_start();
//引入book模型
include('BookModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取bookid
$id = $_GET['id'];
$userid = $_SESSION['userid'];
$_SESSION['logic_bookid'] = $id;

//变量逻辑控制语句
include('LogicControl.php');

//获取相关数据
$label = Book::findOne(['id'=>$id]);
$store_id = $label->storeid;
$_SESSION['chat_storeid'] = $label->storeid;
$_SESSION['chat_bookid'] = $label->id;
$_SESSION['chat_bookname'] = $label->bookname;
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>图书详情</title>
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
<br/>
<br/>
<br/>
<form action="car2Control.php" method="POST">
<div class="book">
<fieldset>
       <?php $value=$label->id?>
       <?php echo "勾选购买"?>
       <input type='checkbox' name='id[]' value=<?php echo $value?> /> 
            <div class="pic">      
            <h3>图书封面：<?php echo "<img src='".$label->imgname."'  />"; ?> </h3>
            </div>
            <div class="info">
            <h3><a href="storeView.php?id=<?php echo $store_id?>">书店名称：</a><?php echo $label->storename ?> </h3>
            <h3>图书名称：<?php echo $label->bookname ?> </h3>
            <h3>图书作者：<?php echo $label->author ?> </h3>
            <h3>图书发布：<?php echo $label->publish ?> </h3>
            <h3>图书价格：<?php echo $label->price ?> </h3>
            <h3>图书数量：<?php echo $label->number ?> </h3>
            <h3>图书种类：<?php echo $label->variety ?> </h3>
            <h3>图书简介：<?php echo $label->disinfo ?> </h3>
            <button type="button"><a href="carControl.php?id=<?php echo $id?>">加入购物车</a></button>
            <button type="button"><a href="commentView.php?id=<?php echo $id?>">查看评论</a></button>
            <button type="button"><a href="myCollectControl.php?id=<?php echo $id?>">加入收藏</a></button>
            <div <?php if($label->storeid!=$userid) echo "style=\"display:none\"";?>>
            <button type="button"><a href="chatStoreView.php?id=<?php echo $id?>">查看用户询问</a></button>
            </div>
            <div <?php if($label->storeid==$userid) echo "style=\"display:none\"";?>>
            <button type="button"><a href="chatUserView.php?id=<?php echo $id?>">联系商家</a></button>
            </div>
            <h3>填写购买数量:</h3>
            <input type="text" name="number[]" size="15"/>
             <label> <input type="submit" name="Submit" value="购 买"></label>
            </div>            
</fieldset>
</div>
</form>
</body>
</html>