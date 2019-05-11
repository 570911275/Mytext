<?php
//引入左侧功能单
include('leftAbilityListView.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加地址</title>
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
<legend>YY书城——添加地址</legend>
</fieldset>
</div>
<div>
<fieldset>
<form name="Add" method="POST" action="addLocControl.php" onsubmit="InputCheck(this)">
    <p>
    <label for="username" class="label">收件人姓名:</label>
    <input id="username" name="username" type="text" class="input" />
    </p>
    <p>
    <label for="sex" class="label">收件人性别:</label>
    <input id="sex" name="sex" type="text" class="input" />
    </p>
    <p>
    <label for="phone" class="label">电话号码:</label>
    <input id="phone" name="phone" type="text" class="input" />
    </p>
    <p>
    <h3>收货地址:</h3>
    <hr/>
    <td><textarea name="location" rows="10" colos="100"></textarea></td>
    </p>
    <p>
    <input type="submit" name="submit" value="添加地址" class="left"/> 
    <input type="RESET" value="  重 置  " class="right"/>
    </p>
</form>
</fieldset>
</div>
</body>
</html>    