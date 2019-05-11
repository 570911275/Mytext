<?php
session_start();
//引入order模型
include('OrderModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//接收数据
$id = $_GET['id'];
$userid = $_SESSION['userid'];
$status = 01;
//获取数据
$label = Order::findAll(['userid'=>$userid,'status'=>$status,'id'=>$id]);
$label_length = count($label);

//保存数据
for($i=0;$i<$label_length;$i++)
{
  $bookid[$i]=$label[$i]->bookid;
}
$_SESSION['pay_bookid']= $bookid;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>确认信息</title>
<style type="text/css">
      body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
  html{font-size:15px;}
  fieldset{width:700px; margin:20px 550px;}
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
<legend>YY书城——订单确认</legend>
</fieldset>
</div>
<div>
<fieldset>
<p>
<?php for($i=0;$i<$label_length;$i++){?>
            <h3>我的图书：<?php echo $label[$i]->bookname ?> </h3>
            <h3>图书数量：<?php echo $label[$i]->my_number ?> </h3>
            <h3>我的地址：<?php echo $label[$i]->location ?> </h3>
            <h3>电话号码：<?php echo $label[$i]->phone ?> </h3>
            <h3>收件人姓名：<?php echo $label[$i]->rep_username ?> </h3>
            <h3>收件人性别：<?php echo $label[$i]->sex ?> </h3>  
            <hr>
<?php }?>
</p>             
<button type="button"><a href="payBookControl.php">确认订单</a></button> 
<button type="button"><a href="deleteOrderControl.php?id=<?php echo $label[$i]->id?>">取消订单</a></button>
</fieldset>
</div>
</body>
</html>