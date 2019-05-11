<?php
session_start();
//引入report模型
include('ReportModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取reportid
$report_id = $_GET['id'];

//获取数据
$label = Report::findAll(['report_id'=>$report_id]);
$label_length = count($label);

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>回复举报内容</title>
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
            <h3>回复图片：<?php echo "<img src='".$label[$i]->imgname."'/>"; ?> </h3>
            </div>
            <div class="info">
            <h3>回复内容：<?php echo $label[$i]->report ?> </h3>
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