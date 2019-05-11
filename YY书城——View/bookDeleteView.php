<?php
session_start();
//引入book模型
include('BookModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取storeid
$id = $_SESSION['userid'];

//获取数据
$book = Book::findAll(['storeid'=>$id]);
$length = count($book);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>删除图书</title>
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
    <h2>书店名称：<?php echo $book[0]->storename ?> </h2>
    <!--循环显示数据库内容-->
<?php for($i=0;$i<$length;$i++)  {?>
    <div class="book"> 
    <fieldset>
            <div class="pic"> 
            <h3>图书封面：<?php echo "<img src='".$book[$i]->imgname."'/>"; ?> </h3>
            </div>
            <div class="info">
            <h3><a href="bookDisinfoView.php?id=<?php echo  $book[$i]->id ?>">图书详情</a></h3>
            <h3>图书名称：<?php echo $book[$i]->bookname ?> </h3>
            <h3>图书作者：<?php echo $book[$i]->author ?> </h3>
            <h3>图书发布：<?php echo $book[$i]->publish ?> </h3>
            <h3>图书价格：<?php echo $book[$i]->price ?> </h3>
            <h3>图书数量：<?php echo $book[$i]->number ?> </h3>
            <h3>图书种类：<?php echo $book[$i]->variety ?> </h3>
            <h3>上架时间：<?php echo $book[$i]->pub_time ?> </h3>
            <h3>好评数量：<?php echo $book[$i]->praise ?> </h3>
            <h3>总销售量：<?php echo $book[$i]->sales ?> </h3>
            <h3>图书简介：<?php echo $book[$i]->disinfo ?> </h3>
            <p>
            <button type="button"><a href="bookDeleteControl.php?id=<?php echo $book[$i]->id?>">删除图书</a></button>
            </p>
            </div>
    </fieldset>
    </div>
<?php } ?>
</fieldset>
</div>
</body>
</html>