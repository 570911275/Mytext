<?php
session_start();
//引入location模型
include('LocationModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取数据
$id = $_SESSION['userid'];
$name = $_SESSION['username'];

$label = Location::findAll(['userid'=>$id]);
$label_length = count($label);
if($label_length==0)
{
    echo "<script>alert('您好，您目前尚无地址，请添加');location.href='addLocView.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>选择地址</title>
<style type="text/css">
  html{font-size:15px;}
  body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
  fieldset{width:700px; margin:20px 500px;}
  legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
  .h3{float:left; width:70px; margin-left:10px; color:turquoise}
  .div{float:left; width:70px; margin-left:10px; color:turquoise}
  .fieldset{float:left; width:70px; margin-left:10px; color:turquoise}
  .left{margin-left:80px;}
  .input{width:150px;}
  span{color: #70b9b0;}
</style>
</head>
<body>
<div>
<fieldset>
<legend>YY书城——选择地址</legend>
</fieldset>
</div>
<div>
<fieldset>
<p>
<?php for($i=0;$i<$label_length;$i++){?>
            <th>我的地址：<?php echo $label[$i]->location ?> </th>
            <h3>电话号码：<?php echo $label[$i]->phone ?> </h3>
            <h3>收件人姓名：<?php echo $label[$i]->username ?> </h3>
            <h3>收件人性别：<?php echo $label[$i]->sex ?> </h3>
            <h3><a href="payLocControl.php?location=<?php echo $label[$i]->location?>& phone=<?php echo $label[$i]->phone?>& username=<?php echo $label[$i]->username?>& sex=<?php echo $label[$i]->sex?>">选择该地址</a></h3>   
            <hr/>
<?php }?>
</p>
</fieldset>
</div>
</body>
</html>