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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改个人信息</title>
<style type="text/css">
      body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
  html{font-size:15px;}
  fieldset{width:1000px; margin:50 auto;}
  legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
  .label{float:left; width:70px; margin-left:10px; color:turquoise}
  .left{margin-left:80px;}
  .input{width:600px;}
</style>
</head>
<body>
<div>
<fieldset>
<legend>YY书城——修改信息</legend>
</fieldset>
</div>
<div>
<fieldset>
<form action="myUpdateControl.php" method="POST" enctype="multipart/form-data">
<p>
<label for="username" class="label">用户名称:</label>
<input id="username" name="username" type="text" class="input" />
</p>
<p>
<label for="sex" class="label">用户性别:</label>
<input id="sex" name="sex" type="text" class="input" />
</p>
<p>
<label for="email" class="label">电子邮箱:</label>
<input id="email" name="email" type="text" class="input" />
</p>
<p>
<label for="phone" class="label">电话号码:</label>
<input id="phone" name="phone" type="text" class="input" />
</p>
</p>
<h4>用户头像：</h4>
<input type="file" name='userPicture'  size="25"/>
<p>
<p>
<input type="submit" name="submit" value="  确 定  " class="left" />
<input type="RESET" value="  重 置  " class="right"/>
</p>
</form>
</fieldset>
</div>
</body>
</html>
