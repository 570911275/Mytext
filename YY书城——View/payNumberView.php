<?php
session_start();
//引入order模型
include('OrderModel.php');
//引入左侧功能单
include('leftAbilityListView.php');

//获取id
$_SESSION['payid'] = $_GET['id'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>选择数量</title>
<style type="text/css">
      body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
  html{font-size:15px;}
  fieldset{width:700px; margin:50 auto;}
  legend{font-weight:bold; font-size:30px; margin:50 auto; color:rgb(118, 173, 199)}
  .left{margin-left:80px;}
  .input{width:150px;}
  span{color: #70b9b0;}
</style>

</head>
<body>
<div>
<fieldset>
<legend>YY书城——选择图书数量</legend>
</fieldset>
</div>
<div>
<fieldset>
<form  name="RegForm" method="POST" action="payNumberControl.php" onSubmit="return InputCheck(this)" >
<p>
<label for="number" class="label">图书数量:</label>
<input id="number" name="number" type="text" class="input" />
</p>
<hr/>
<p>
<h3>我的要求：</h3>
<td><textarea name="my_require" rows="10" colos="100"></textarea></td>
</p>
<p>
<input type="submit" name="submit" value="  确 定  " class="left" />
<input type="RESET" value="  重 置  " class="right"/>
</p>
</form>
</fieldset>
</div>
</body>
</html>