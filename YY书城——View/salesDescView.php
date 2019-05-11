<?php
//引入book模型
include('BookModel.php');
//引入左侧图书及功能菜单栏
include('leftBookListView.php');


//标志图书类别信息
$sign = "sales";
$book = Book::findDescALL(['status'=>1],$sign);

//数组长度
$book_length = count($book);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>书城主页</title>
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
<div>
<fieldset>
<form  method="POST" action="searchStoreView.php" >
<p>
<label for="searchStore" class="label">搜索商铺:</label>
<input id="searchStore" name="searchStore" type="text" class="input" />
<input type="submit" name="submit" value="  搜 索  " class="left" />
</p>
</form>
</fieldset>
</div >
<hr>
<div >
<fieldset>
<form  method="POST" action="searchBookView.php" >
<p>
<label for="searchBook" class="label">搜索图书:</label>
<input id="searchBook" name="searchBook" type="text" class="input" />
<input type="submit" name="submit" value="  搜 索  " class="left" />
</p>
</form>
</fieldset>
</div>
<div class="book">
<fieldset>
    <!--循环显示数据库内容-->
<?php for($i=0;$i<$book_length;$i++)  {?>
    <div class="book"> 
    <fieldset>
    <div class="pic"> 
            <h3>图书封面：<?php echo "<img src='".$book[$i]->imgname."'/>"; ?> </h3>
    </div>
    <div class="info">
    <h3><a href="storeView.php?id=<?php echo $book[$i]->storeid?>">书店名称：</a><?php echo $book[$i]->storename ?> </h3>
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
    </div>
    </fieldset>
    </div>

<?php } ?>
</fieldset>
</div>
</body>
</html>