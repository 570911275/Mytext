<?php
//引入book模型
include('BookModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

$label  = Book::findAll(['status'=>0]);
$label_length = count($label);

if($label_length==0)
{
    echo "<script>alert('您好，目前尚无书籍等待审核！');history.go(-1);</script>";
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>书籍审核</title>
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
            <h3>商铺名称：<?php echo $label[$i]->storename ?> </h3>
            <h3>图书名称：<?php echo $label[$i]->bookname ?> </h3>
            <h3>图书作者：<?php echo $label[$i]->author ?> </h3>
            <h3>图书种类：<?php echo $label[$i]->variety ?> </h3>
            <h3>图书发布：<?php echo $label[$i]->publish ?> </h3>
            <h3>图书数量：<?php echo $label[$i]->number ?> </h3>
            <h3>图书价格：<?php echo $label[$i]->price ?> </h3>
            <button type="button"><a href="bookAuditControl.php?id=<?php echo $label[$i]->id?>">审核通过</a></button>
            <button type="button"><a href="bookAuditUnControl.php?id=<?php echo $label[$i]->id?>">审核失败</a></button>
            </div>
    </fieldset>
    </div>
<?php } ?>
</fieldset>
</div>
</body>
</html>