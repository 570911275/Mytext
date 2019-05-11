<?php
session_start();
//引入location模型
include('LocationModel.php');

//接受数据
$location = $_POST['location'];
$username = $_POST['username'];
$sex      = $_POST['sex'];
$phone    = $_POST['phone'];
$userid   = $_SESSION['userid'];

//检验是否有数据
if($location == "")
{
    echo "<script>alert('请输入收货地址！');history.go(-1);</script>";
}
else if($username =="")
{
    echo "<script>alert('请输入收件人姓名！');history.go(-1);</script>";
}
else if($sex =="")
{
    echo "<script>alert('请输入收件人性别！');history.go(-1);</script>";
}
else if($phone =="")
{
    echo "<script>alert('请输入电话号码！');history.go(-1);</script>";
}
else
{
//获取添加数据
$label = new Location();
$label->userid   = $userid;
$label->username = $username;
$label->sex      = $sex;
$label->phone    = $phone;
$label->location = $location;
//查看是否存在相同数据
$label2 = Location::findAll(['userid'=>$userid]);
$label2_length = count($label2);
for($i=0;$i<$label2_length;$i++)
{
    if($label2[$i]->username==$username and $label2[$i]->sex==$sex and $label2[$i]->phone==$phone and $label2[$i]->location==$location)
    {
        echo "<script>alert('该地址已经存在！');history.go(-1);</script>";
    }
}

while($i==$label2_length)
{
$label->insert();
echo "<script>alert('地址添加成功！');location.href='myLocView.php';</script>";
}

}
?>