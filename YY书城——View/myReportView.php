<?php
session_start();
//引入report模型
include('ReportModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取id
$id = $_SESSION['userid'];

//获取数据
$label = Report::findAll(['report_user_id'=>$id]);
$label_length = count($label);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>回复主页</title>
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
            <h3>举报对象：(店铺/用户)<?php echo $label[$i]->be_report_store ?> <?php echo $label[$i]->be_report_user ?></h3>
            <h3>举报内容：<?php echo $label[$i]->report ?> </h3>
            </div>
    </fieldset>
    </div>
            <h2>举报反馈：</h2>
    <?php $label_report = Report::findOne(['report_id'=>$label[$i]->report_id]);?>
    <?php if(isset($label_report)){?>
    <div <?php if($label_report->status==1) echo "style=\"display:none\"";?>>
    <div class="book"> 
    <fieldset>
            <div class="pic"> 
            <h3>反馈图片：<?php echo "<img src='".$label_report->imgname."'/>"; ?> </h3>
            </div>
            <div class="info">
            <h3>反馈内容：<?php echo $label_report->report ?> </h3>
            </div>
    </fieldset>
    </div>
    </div>
    <?php }else{?>
    <div class="book"> 
    <fieldset>
    <h2>该举报内容暂时无反馈，请等待管理员处理！<h2>
    </fieldset>
    </div>
    <?php }?>
    <hr/>
    <hr/>
<?php } ?>
</fieldset>
</div>
</body>
</html>