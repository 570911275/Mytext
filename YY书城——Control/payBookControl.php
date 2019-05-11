<?php
session_start();
//引入book模型
include('BookModel.php');

//接收数据
$number = $_SESSION['pay_number'];
$bookid = $_SESSION['pay_bookid'];
$bookid_length = count($bookid);
$price_all = 0;

//判断是单选还是多选
if(is_array($number))
{
    $number_length = count($number);
    //获取数据
    for($i=0;$i<$bookid_length;$i++)
    {
        $label = Book::findOne(['id'=>$bookid[$i]]);
        $old_number = $label->number;
        $new_number = $old_number-$number[$i];
        if($new_number<0)
        {
            echo "<script>alert('您好，您打算购买的图书".$label->bookname."所选数量超过该店库存,请重新选择！');location.href='myOrderView.php';</script>";
        }
        else 
        {
            $price_all = $price_all+($number[$i]*$label->price);
            $label->number = $new_number;
            $label->sales  = $new_number;
            $label->update();    
        }
    }
} 
else 
{
    $number_length = 1;
    //获取数据
    for($i=0;$i<$bookid_length;$i++)
    {
        $label = Book::findOne(['id'=>$bookid[$i]]);
        $old_number = $label->number;
        $new_number = $old_number-$number;
        if($new_number<0)
        {
            echo "<script>alert('您好，您打算购买的图书".$label->bookname."所选数量超过该店库存,请重新选择！');location.href='myOrderView.php';</script>";
        }
        else 
        {
            $price_all = $price_all+($number*$label->price);
            $label->number = $new_number;
            $label->sales  = $new_number;
            $label->update();    
        }  
    }
}
    $_SESSION['price_all'] = $price_all;
//前往修改user表
     echo "<script>location.href='payUserControl.php';</script>";
?>