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
<title>申请商铺</title>
<style type="text/css">
  body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
  html{font-size:15px;}
  fieldset{width:1000px; margin:50 auto;}
  legend{font-weigh  body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}t:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
  .label{float:left; width:70px; margin-left:10px; color:turquoise}
  .left{margin-left:80px;}
  .input{width:600px;}
</style>
</head>
<body>
<div>
<fieldset>
<legend>YY书城——申请商铺</legend>
</fieldset>
</div>
<div>
<fieldset>
<form  method="POST" action="applyStoreControl.php" enctype="multipart/form-data" >
<p>
<label for="storename" class="label">商铺名称:</label>
<input id="storename" name="storename" type="text" class="input" />
</p>
</p>
<h4>商铺封面：</h4>
<input type="file" name='bookPicture'  size="25"/>
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
