<?php
session_start();
//引入book模型
include('BookModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取数据
$label = Book::findAll(null);
$label_length = count($label);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>下架书籍</title>
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
            <h3>图书封面：<?php echo "<img src='".$label[$i]->imgname."'/>"; ?> </h3>
            </div>
            <div class="info">
            <h3><a href="storeView.php?id=<?php echo $label[$i]->storeid?>">书店名称：</a><?php echo $label[$i]->storename ?> </h3>
            <h3><a href="bookDisinfoView.php?id=<?php echo  $label[$i]->id ?>">图书详情</a></h3>
            <h3>图书名称：<?php echo $label[$i]->bookname ?> </h3>
            <h3>图书作者：<?php echo $label[$i]->author ?> </h3>
            <h3>图书发布：<?php echo $label[$i]->publish ?> </h3>
            <h3>图书数量：<?php echo $label[$i]->number ?> </h3>
            <h3>图书种类：<?php echo $label[$i]->variety ?> </h3>
            <h3>图书简介：<?php echo $label[$i]->disinfo ?> </h3>
            <button type="button"><a href="deleteErrorBookControl.php?id=<?php echo $label[$i]->id?>">下架书籍</a></button>
            </div>
    </fieldset>
    </div>
<?php } ?>
</fieldset>
</div>
</body>
</html>