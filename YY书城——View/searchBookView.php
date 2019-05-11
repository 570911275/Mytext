<?php
session_start();
//引入book模型
include('BookModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取bookname
$bookname = $_POST['searchBook'];
$label = Book::findOne(['bookname'=>$bookname,'status'=>1]);
if(isset($label))
{
    $label_book = Book::findAll(['bookname'=>$bookname]);
    $book_length = count($label_book);
}
else 
{
    echo "<script>alert('您好，目前本书城尚无此书出售！');history.go(-1);</script>";
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>搜索图书</title>
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
<?php for($i=0;$i<$book_length;$i++)  {?>
    <div class="book"> 
    <fieldset>
            <div class="pic"> 
            <h3>图书封面：<?php echo "<img src='".$label_book[$i]->imgname."'/>"; ?> </h3>
            </div>
            <div class="info">
            <h3><a href="storeView.php?id=<?php echo $label_book[$i]->storeid?>">书店名称：</a><?php echo $label_book[$i]->storename ?> </h3>
            <h3><a href="bookDisinfoView.php?id=<?php echo  $label_book[$i]->id ?>">图书详情</a></h3>
            <h3>图书名称：<?php echo $label_book[$i]->bookname ?> </h3>
            <h3>图书作者：<?php echo $label_book[$i]->author ?> </h3>
            <h3>图书发布：<?php echo $label_book[$i]->publish ?> </h3>
            <h3>图书数量：<?php echo $label_book[$i]->number ?> </h3>
            <h3>图书种类：<?php echo $label_book[$i]->variety ?> </h3>
            <h3>图书简介：<?php echo $label_book[$i]->disinfo ?> </h3>
            </div>
    </fieldset>
    </div>
<?php } ?>
</fieldset>
</div>
</body>
</html>