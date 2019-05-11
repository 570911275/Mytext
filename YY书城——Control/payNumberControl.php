<?php
session_start();
//引入order模型
include('OrderModel.php');


//接收数据
$id = $_SESSION['payid'];
$number = $_POST['number'];
$my_require = $_POST['my_require'];
$number_max   = $_SESSION['number_collect'];
echo $number_max;

//存入数据
$label = Order::findOne(['id'=>$id]);
$label->number = $number;
$label->my_require = $my_require;

//判断数量是否超过max
if($number>$number_max)
{
      echo "<script>alert('您好，所选图书数量超过现有数量，请重新选择！');history.go(-1);</script>";
}
else
{
    $label->update();
    echo "<script>alert('您好，图书数量选择成功，请前往确认确认信息！');location.href='payAffirmView.php';</script>";
}