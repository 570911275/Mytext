<?php
//引入car模型
include('OrderModel.php');

//获取id
$id = $_GET['id'];
$label  = Order::findOne(['id'=>$id]);

if($label->delete())
{
    echo "<script>alert('移出购物车成功！');history.go(-1);</script>";
}
