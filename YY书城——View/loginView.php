<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>用户登录</title>
<style type="text/css">
  body{background-image: linear-gradient(to right, #ff9569 0%, #e92758 100%);}
  html{font-size:15px;}
  fieldset{width:320px; margin:0 auto;}
  legend{font-weight:bold; font-size:30px; margin:0 auto; color:rgb(118, 173, 199)}
  .label{float:left; width:100px; margin-left:10px; color:#29bdd9}
  .h3{float:left; width:70px; margin-left:10px; color:}
  .fieldset{float:left; width:70px; margin-left:10px; color:turquoise}
  .left{margin-left:80px;}
  .input{width:150px;}
  span{color: #29bdd9;}
</style>

<script language="JavaScript">

function InputCheck(LoginForm)
{
  if (LoginForm.username.value == "")
    {
       alert("请输入用户名!");
       LoginForm.username.focus();
       return (false);
    }
  if (LoginForm.password.value == "")
    {
       alert("请输入密码!");
       LoginForm.password.focus();
       return (false);
    }
}
</script>
</head>
<body>
<div>
<fieldset>
<legend>YY书城——登录界面</legend>
</fieldset>
</div>
<div>
<div>
<fieldset>
<legend><a href= "regView.php">YY书城——用户注册</a><br/></legend>
</fieldset>
</div>
<div>
<fieldset>
<form name="LoginForm" method="POST" action="loginControl.php" onsubmit="InputCheck(this)">
<p>
<label for="username" class="label">用户名:</label>
<input id="username" name="username" type="text" class="input" />
</p>
<p>
<label for="password" class="label">密 码:</label>
<input id="password" name="password" type="password" class="input" />
</p>
<p>
<label for="email" class="label">邮箱:</label>
<input id="email" name="email" type="email" class="input" />
</p>
<p>
<h3>请选择用户权限</h3>
<select name="aselect" size="1">
<option value="1" selected>用户</option>
<option value="4">商家</option>
<option value="5">管理员</option>
</select>
</p>
    <p>验证码图片:<img src="code.php" onClick="this.src='code.php?nocache='+Math.random()" style="cursor:hand" alt="点击换一张"/></p>
    <span>(点击图片可更换验证码)</span>
    <p>请输入图片中的内容:<input type="text" name="authcode" value=""/></p>
<p>
<input type="submit" name="submit" value="  确 定  " class="left" />
<input type="RESET" value="  重 置  " class="right"/>
</p>
</form>
</fieldset>
</div>
</body>
</html>