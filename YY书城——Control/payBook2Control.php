<?php
session_start();
//引入book模型
include('BookModel.php');

//接收数据
$number = $_SESSION['pay_number'];
$bookid = $_SESSION['pay_bookid'];
$bookid_length = count($bookid);
if(is_array($number))
{
    $number_length = count($number);
    $price_all = 0;
    //获取数据
for($i=0;$i<$bookid_length;$i++)
{
    //恢复原值
    $label = Book::findOne(['id'=>$bookid[$i]]);
    $old_number = $label->number;
    $new_number = $old_number+$number[$i];
    $label->number = $new_number;
    $label->update();    
}
echo "<script>alert('您好，您的余额不足以支付，请及时充值！');location.href='myOrderView.php';</script>";
}
else 
{
    $number_length =1;
    $price_all = 0;
    //获取数据
for($i=0;$i<$bookid_length;$i++)
{
    //恢复原值
    $label = Book::findOne(['id'=>$bookid[$i]]);
    $old_number = $label->number;
    $new_number = $old_number+$number[$i];
    $label->number = $new_number;
    $label->update();    
}
echo "<script>alert('您好，您的余额不足以支付，请及时充值！');location.href='myOrderView.php';</script>";
}
$number_length = count($number);
$price_all = 0;


?>