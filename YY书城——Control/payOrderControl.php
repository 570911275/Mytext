<?php
session_start();
//引入order模型
include('OrderModel.php');

//接收数据
$id = $_SESSION['pay_id'];
if(is_array($id))
{
   $id_length = count($id);
   for($i=0;$i<$id_length;$i++)
   {
        $label = Order::findOne(['id'=>$id[$i]]);
        $label->status = 2;
        $label->update();
   } 
   echo "<script>alert('您好，您已下单成功！');location.href='myOrderUndoView.php';</script>";
}
else 
{
    $id_length = 1;
    for($i=0;$i<$id_length;$i++)
    {
         $label = Order::findOne(['id'=>$id]);
         $label->status = 2;
         $label->update();
    } 
    echo "<script>alert('您好，您已下单成功！');location.href='myOrderUndoView.php';</script>";
}
