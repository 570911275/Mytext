<?php
//引入report模型
include('ReportModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取已处理举报
$status = 1;
$label = Report::findAll(['status'=>$status]);
$label_length = count($label);
if($label_length==0)
{
    echo "<script>alert('您好，目前尚无处理举报！');history.go(-2);</script>";
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>已处理举报</title>
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
            <h3>举报图片：<?php echo "<img src='".$label[$i]->imgname."'/>"; ?> </h3>
            </div>
            <div class="info">
            <h3>评论用户：<?php echo $label[$i]->report_user_name ?> </h3>
            <h3>举报对象(商铺/用户)：<?php echo $label[$i]->be_report_user; echo $label[$i]->be_report_store?> </h3>
            <h3>评论内容：<?php echo $label[$i]->report ?> </h3>
            <p>
            <a href="reportDoView2.php?id=<?php echo $label[$i]->id?>">回复内容</a>
            </p>
            </div>
            </fieldset>
    </div>
    <div>
    <fieldset>
<?php } ?>
</fieldset>
</div>
</body>
</html>