<?php
session_start();
//引入order模型
include('OrderModel.php');

//获取地址数据
$location = $_GET['location'];
$rep_username = $_GET['username'];//收货人姓名
$sex      = $_GET['sex'];
$phone    = $_GET['phone'];
$status   = 0;

//获取相应数据
$pay_id = $_SESSION['pay_id'];
if(is_array($pay_id))
{
  $pay_length = count($pay_id);
  for($i=0;$i<$pay_length;$i++)
  {
    $label = Order::findOne(['id'=>$pay_id[$i]]);
    $label->location = $location;
    $label->rep_username = $rep_username;
    $label->sex      = $sex;
    $label->phone    = $phone;
    $label->update();
  }
}
else 
{  $pay_length = 1;
  for($i=0;$i<$pay_length;$i++)
  {
    $label = Order::findOne(['id'=>$pay_id]);
    $label->location = $location;
    $label->rep_username = $rep_username;
    $label->sex      = $sex;
    $label->phone    = $phone;
    $label->update();
  }
}


//判断数量是否超过max
if($i==$pay_length)
{
    echo "<script>alert('您好，地址选择成功，请前往确认信息！');location.href='payAffirmView.php';</script>";
}

