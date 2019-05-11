<?php
session_start();
//引入order模型
include('OrderModel.php');

//接收数据
if( $_POST ) 
{ 
$id = $_POST['id']; 
$number = $_POST['number'];
}
//去除空值元素
$number=array_filter($number);
//保存数据
$_SESSION['pay_id']= $id;
$_SESSION['pay_number']= $number;

//判断购买书籍与购买数量是否相符
$id_length = count($id);
$number_length = count($number);
if($id_length>$number_length)
{
    echo "<script>alert('您好，您所购买的图书未填写购买数量，请重新选择！');history.go(-1);</script>";
}
else if($id_length<$number_length)
{
    echo "<script>alert('您好，您打算购买的图书未进行勾选，请重新选择！');history.go(-1);</script>";
}
else
{
    for($i=0;$i<$id_length;$i++)
    {
        $label = Order::findOne(['id'=>$id[$i]]);
        $label->status = 1;
        $label->my_number = $number[$i];
        $label->update();
    }
    echo "<script>alert('请选择收货地址！');location.href='payLocView.php';</script>";
}