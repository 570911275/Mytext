<?php
session_start();
//引入concern模型
include('ConcernModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取地址
$userid = $_SESSION['userid'];
$label  = Concern::findAll(['userid'=>$userid]);

//数组长度
$label_length = count($label);
if($label_length==0)
{
  echo "<script>alert('您好，目前尚无关注店铺');history.go(-1);</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的关注</title>
<style type="text/css">
      body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
  html{font-size:15px;}
  fieldset{width:700px; margin:20px 500px;}
  legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
  .label{float:left; width:100px; margin-left:10px; color:turquoise}
  .h3{float:left; width:70px; margin-left:10px; color:turquoise}
  .div{float:left; width:70px; margin-left:10px; color:turquoise}
  .fieldset{float:left; width:70px; margin-left:10px; color:turquoise}
  .left{margin-left:80px;}
  span{color: #70b9b0;}
</style>
</head>
<body>
<div>
<fieldset>
<p>
<?php for($i=0;$i<$label_length;$i++){?>
            <h3><a href="storeView.php?id=<?php echo  $label[$i]->storeid ?>">关注商铺：<?php echo $label[$i]->storename ?> </h3>
            <h3><a href="deleteConcernControl.php?id=<?php echo  $label[$i]->id ?>">取消关注</a></h3>    
            <hr/>
<?php }?>
</p>

</fieldset>
</div>
</body>
</html>