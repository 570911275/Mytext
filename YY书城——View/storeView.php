<?php
session_start();
//引入book模型
include('BookModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取storeid
$id = $_GET['id'];

//获取数据
$label_store = Book::findAll(['storeid'=>$id,'status'=>1]);
$store_length = count($label_store);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>商店主页</title>
    <style type="text/css">
          body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
     .book{width:1000px; margin:50px auto; border:solid 1px gray; overflow:hidden;}
     .pic{width:250px; float:left;}
     .pic img{
         display:block;
         width:200px;
         height:300px;
     }
     .pic_store{width:250px; float:left;}
     .pic_store img{
         display:block;
         width:75px;
         height:85px;
     }
     .info{float:left; width:650px;}
</style>
</head>
<body>
<div class="book"> 
<fieldset>
    <div class="pic_store">      
    <h3>书店图标：<?php echo "<img src='".$label_store[0]->imgname_store."'  />"; ?> </h3>
    </div>
    <div class="info">
    <h2>书店名称：<?php echo $label_store[0]->storename ?> </h2>
    <button type="button" onclick="concern_LogicControl()"><a href="concernControl.php?name=<?php echo  $label_store[0]->storename ?>&id=<?php echo  $label_store[0]->storeid ?>" >关注书店</a></button>
    </div>
    <!--循环显示数据库内容-->
<?php for($i=0;$i<$store_length;$i++)  {?>
    <div class="book"> 
    <fieldset>
            <div class="pic"> 
            <h3>图书封面：<?php echo "<img src='".$label_store[$i]->imgname."'/>"; ?> </h3>
            </div>
            <div class="info">
            <h3><a href="storeView.php?id=<?php echo $id?>">书店名称：</a><?php echo $label_store[$i]->storename ?> </h3>
            <h3><a href="bookDisinfoView.php?id=<?php echo  $label_store[$i]->id ?>">图书详情</a></h3>
            <h3>图书名称：<?php echo $label_store[$i]->bookname ?> </h3>
            <h3>图书作者：<?php echo $label_store[$i]->author ?> </h3>
            <h3>图书发布：<?php echo $label_store[$i]->publish ?> </h3>
            <h3>图书数量：<?php echo $label_store[$i]->number ?> </h3>
            <h3>图书种类：<?php echo $label_store[$i]->variety ?> </h3>
            <h3>图书简介：<?php echo $label_store[$i]->disinfo ?> </h3>
            </div>
    </fieldset>
    </div>
<?php } ?>
</fieldset>
</div>
</body>
</html>