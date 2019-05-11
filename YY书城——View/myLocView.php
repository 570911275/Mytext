<?php
session_start();
//引入location模型
include('LocationModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取地址
$userid = $_SESSION['userid'];
$label  = Location::findAll(['userid'=>$userid]);

//数组长度
$location_length = count($label);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户地址</title>
<style type="text/css">
      body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
  html{font-size:15px;}
  fieldset{width:700px; margin:20px 500px;}
  legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
  .label{float:left; width:100px; margin-left:10px; color:turquoise}
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
<legend>YY书城——我的地址</legend>
</fieldset>
</div>
<div>
<fieldset>
<p>
<?php for($i=0;$i<$location_length;$i++){?>
            <th>我的地址：<?php echo $label[$i]->location ?> </th>
            <h3>电话号码：<?php echo $label[$i]->phone ?> </h3>
            <h3>收件人姓名：<?php echo $label[$i]->username ?> </h3>
            <h3>收件人性别：<?php echo $label[$i]->sex ?> </h3>
            <h3><a href="addLocView.php">添加地址</a></h3>
            <h3><a href="deleteLocControl.php?id=<?php echo  $label[$i]->id ?>">删除地址</a></h3> 
            <h3><a href="updateLocView.php?id=<?php echo  $label[$i]->id ?>">修改地址</a></h3>     
            <hr/>
<?php }?>
</p>

</fieldset>
</div>
</body>
</html>