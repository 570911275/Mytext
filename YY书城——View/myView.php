<?php
session_start();
//引入user模型
include('UserModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取id和name
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

//获取数据
$label = User::findOne(['id'=>$userid]);

//获取等级
$exp = $label->exp;
$_SESSION['exp'] = $exp;
include('gradeControl.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户中心</title>
<style type="text/css">
      body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
  legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
  .book{width:1000px; margin:50px auto; border:solid 1px gray; overflow:hidden;}
     .pic{width:250px; float:left;}
     .pic img{
         display:block;
         width:50px;
         height:70px;
     }
     .info{float:left; width:650px;}
  span{color: #70b9b0;}
</style>
</head>
<body>
<div>
<fieldset>
<legend>YY书城——用户中心</legend>
</fieldset>
</div>
<div class="book"> 
<fieldset>
<p>

<div> 
<fieldset>
    <div class="pic">
            <h3>用户名称：<?php echo "<img src='".$label->imgname_user."'/>"; ?> </h3>
    </div> 
    <div class="info">
            <h3><?php echo $label->username ?> </h3>
    </div>
    </fieldset>
</div>

            <h3>我的邮箱：<?php echo $label->email ?> </h3>
            <h3>我的性别：<?php echo $label->sex ?> </h3>
            <h3>我的YY值：<?php echo $label->exp ?> </h3> 
            <h3>我的等级：<?php echo $grade ?> </h3> 
            <h3>电话号码：<?php echo $label->phone ?> </h3>
            <h3>我的余额：<?php echo $label->money ?> </h3>   
            <button type="button"><a href="myUpdateView.php">修改个人信息</a></button>
            <hr>
</p> 
</fieldset>
</div>
</body>
</html>


